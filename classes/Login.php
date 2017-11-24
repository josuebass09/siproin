<?php
/* Siproin (v0.4) 
Licensed under MIT (https://github.com/josuebass09/siproin/blob/master/LICENSE)
 */

/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
        
        elseif (isset($_POST["loginEmpresa"])) {
            $this->dologinWithPostDataEmpresa();
        }
        
        elseif (isset($_POST["loginAdmin"])) {
            $this->dologinWithPostDataAdmin();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['cedula'])) {
            $this->errors[] = "Número de cédula vacío.";
        } elseif (empty($_POST['contrasena'])) {
            $this->errors[] = "La contraseña está vacía.";
        } elseif (!empty($_POST['cedula']) && !empty($_POST['contrasena'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $cedula = $this->db_connection->real_escape_string($_POST['cedula']);


                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT cedula, contrasena, id_role
                        FROM Estudiantes
                        WHERE cedula = '" . $cedula . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists

                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();
                    ;

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
            
                    if ($_POST['contrasena'] == $result_row->contrasena) {

                        // write user data into PHP SESSION (a file on your server)
                        
                        $_SESSION['cedula'] = $result_row->cedula;
                        $_SESSION['contrasena'] = $result_row->contrasena;
                        $_SESSION['role'] = $result_row->id_role;
                        
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }
    
    private function dologinWithPostDataEmpresa()
    {
        // check login form contents
        if (empty($_POST['email'])) {
            $this->errors[] = "Email vacío.";
        } elseif (empty($_POST['contrasena'])) {
            $this->errors[] = "La contraseña está vacía.";
        } elseif (!empty($_POST['email']) && !empty($_POST['contrasena'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $email = $this->db_connection->real_escape_string($_POST['email']);


                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT email, contrasena, id_role, id_empresa
                        FROM Empresas
                        WHERE email = '" . $email . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists

                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();
                    ;

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
            
                    if ($_POST['contrasena'] == $result_row->contrasena) {

                        // write user data into PHP SESSION (a file on your server)
                        
                        $_SESSION['email'] = $result_row->email;
                        $_SESSION['contrasena'] = $result_row->contrasena;
                        $_SESSION['idEmpresa'] = $result_row->id_empresa;
                        $_SESSION['role'] = $result_row->id_role;
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }
    
    private function dologinWithPostDataAdmin()
    {
        // check login form contents
        if (empty($_POST['cedula'])) {
            $this->errors[] = "Número de cédula vacío.";
        } elseif (empty($_POST['contrasena'])) {
            $this->errors[] = "La contraseña está vacía.";
        } elseif (!empty($_POST['cedula']) && !empty($_POST['contrasena'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $cedula = $this->db_connection->real_escape_string($_POST['cedula']);


                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT cedula, contrasena, id_role
                        FROM administradores
                        WHERE cedula = '" . $cedula . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists

                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();
                    ;

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
            
                    if ($_POST['contrasena'] == $result_row->contrasena) {

                        // write user data into PHP SESSION (a file on your server)
                        echo "Holi";;
                        $_SESSION['cedula'] = $result_row->cedula;
                        $_SESSION['contrasena'] = $result_row->contrasena;
                        $_SESSION['role'] = $result_row->id_role;
                        
                        $_SESSION['user_login_status'] = 1;

                    } else {
                        $this->errors[] = "Usuario y/o contraseña no coinciden.";
                    }
                } else {
                    $this->errors[] = "Usuario y/o contraseña no coinciden.";
                }
            } else {
                $this->errors[] = "Problema de conexión de base de datos.";
            }
        }
    }
    

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "Has sido desconectado.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}






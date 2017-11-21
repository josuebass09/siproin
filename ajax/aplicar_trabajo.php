<?php



/*include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version */
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}		
		/*if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacíos";
		} elseif (empty($_POST['user_name'])) {
            $errors[] = "Nombre de usuario vacío";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $errors[] = "Contraseña vacía";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $errors[] = "la contraseña y la repetición de la contraseña no son lo mismo";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $errors[] = "La contraseña debe tener como mínimo 6 caracteres";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $errors[] = "Nombre de usuario no puede ser inferior a 2 o más de 64 caracteres";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $errors[] = "Nombre de usuario no encaja en el esquema de nombre: Sólo aZ y los números están permitidos , de 2 a 64 caracteres";
        } elseif (empty($_POST['email'])) {
            $errors[] = "El correo electrónico no puede estar vacío";
        } elseif (strlen($_POST['email']) > 64) {
            $errors[] = "El correo electrónico no puede ser superior a 64 caracteres";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        } elseif (
			
			&& !empty($_POST['firstname'])
			&& !empty($_POST['lastname'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {*/
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $cedula=intval($_POST['cedula']);
				
				$id_proyecto=intval($_POST['id_proyecto']);
                $estado=intval($_POST['estado']);
             
              

               

	
				
					
       

                // write new user's data into database
                    $sql = "INSERT INTO Postulados(id_proyecto,id_estudiante,estado)
                            VALUES('".$id_proyecto."','".$cedula."','".$estado."');";
                    $query_new_user_insert = mysqli_query($con,$sql);




                     


                       
                    $sqlResta="UPDATE Proyectos SET vacantes=vacantes-1 WHERE id_proyecto='".$id_proyecto."'";
                    $query_resta_vacantes = mysqli_query($con,$sqlResta);



                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $messages[] = "Proyecto ha sido ingresado satisfactoriamente.";

                    } else {
                        $errors []= "Intente de nuevo.".mysqli_error($con);
                    }


                        if (isset($errors)){
            
            ?>
            <div class="alert alert-danger" style="text-align: center;" role="alert">
                
                    <strong>Solictud no enviada.</strong> <br>
                    <?php
                        foreach ($errors as $error) {
                                echo $error;
                            }
                        ?>
            </div>
            <?php
            }
            if (isset($messages)){
                
                ?>
                <br>
                <br>
                <div class="alert alert-success" style="text-align: center;" role="alert">
                     

                        <strong>!Solicitud enviada¡</strong>
                       
                </div>
                <?php
            }



            
     
		
	

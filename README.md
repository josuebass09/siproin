README

1- Descargar los archivos fuentes del sistema en el repositorio de la comunidad. http://comunidaduna.net/index.php/projects/Proyectos/siproin.tar.xz/ 
2- Copiar y descomprimir el archivo en la carpeta /var/www/html/, al final tendrás una carpeta llamada “SIPROIN”, a la cual podrás acceder desde el navegador como: http://localhost/siproin/
3- Crear una base de datos usando PHPMyAdmin accediendo a la url siguiente: http://localhost/phpmyadmin/ .
4- Importar las tablas de la base de datos para ello vamos a buscar el archivo "simple_stock.sql" en el directorio root de nuestro sistema, una vez localizado procedemos a hacer la importación de los datos desde PHPMyAdmin
5- Configurar los datos de conexión a la base de datos editando el archivo de configuración que se encuentra en la siguiente ruta: simple_stock/config/db.php
          
<?php
/*Datos de conexión a la base de datos*/
define('DB_HOST', 'localhost');//DB_HOST: generalmente suele ser "127.0.0.1"
define('DB_USER', ' ');//Usuario de tu base de datos
define('DB_PASS', ' ');//Contraseña del usuario de la base de datos
define('DB_NAME', 'simple_stock');//Nombre de la base de datos
?>

6- Vista web: http://localhost/simple_stock/
7- Datos de acceso por defecto: usuario: admin y contraseña: admin

<?php
/* Siproin (v0.4) 
Licensed under MIT (https://github.com/josuebass09/siproin/blob/master/LICENSE)
 */
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		$active_usuarios="active";	
	$title="Perfil Estudiante";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
  </head>
  <body>
 	<?php
	include("header.php");
	?> 
<?php

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("funciones.php");

		$sql="SELECT * FROM Empresas;";
		$query = mysqli_query($con, $sql);
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM Empresas");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="container">
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Telefono</th>
					<th><span class="pull-right">Acciones</span></th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_empresa=$row['id_empresa'];
						$user_name=$row['nombre'];
						$direccion=$row['direccion'];
						$user_email=$row['email'];
						$telefono=$row['telefono'];
						//$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
				
					<tr>

						<td ><?php echo $user_name; ?></td>
						<td ><?php echo $direccion; ?></td>
						<td ><?php echo $user_email; ?></td>
						<td ><?php echo $telefono; ?></td>
						
						
					<td ><span class="pull-right">
						<a href="#" class='btn btn-default' title='Editar usuario' onclick="obtener_datos('<?php echo $id_empresa;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
						<a href="#" class='btn btn-default' title='Cambiar contraseña' onclick="get_user_id('<?php echo $id_empresa;?>');" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-cog"></i></a>	
						<a href="#" class='btn btn-default' title='Borrar usuario' onclick="eliminar('<? echo $id_empresa; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
					
					</td>
					</tr>
					<?php
				}
				?>
				
			</div>
			</div>
			 </body>
			 </html>
			<?php
		}
?>
	<?php
	include("footer.php");
	?>



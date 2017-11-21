<?php

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

		$sql="SELECT * FROM  Estudiantes WHERE cedula = '" . $_SESSION['cedula'] . "';";
		$query = mysqli_query($con, $sql);
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM Estudiantes WHERE cedula = '" . $_SESSION['cedula'] . "'");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Email</th>
					
				</tr>
				<?php
				if ($row=mysqli_fetch_array($query)){
						$user_id=$row['cedula'];
						//$fullname=$row['nombre']." ".$row["Apellidos"];
						$user_name=$row['nombre'];
						$user_apellidos=$row['Apellidos'];
						$user_email=$row['email'];
						//$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					
					<input type="hidden" value="<?php echo $row['nombre'];?>" id="nombres<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $row['Apellidos'];?>" id="apellidos<?php echo $user_apellidos;?>">
			
					<input type="hidden" value="<?php echo $user_email;?>" id="email<?php echo $user_id;?>">
				
					<tr>
						<td><?php echo $user_id; ?></td>
					
						<td ><?php echo $user_name; ?></td>
						<td ><?php echo $user_apellidos; ?></td>
						<td ><?php echo $user_email; ?></td>
						
						
					</tr>
					<?php
				}
				?>
				
			</div>
			 </body>
			 </html>
			<?php
		}
?>
	<?php
	include("footer.php");
	?>



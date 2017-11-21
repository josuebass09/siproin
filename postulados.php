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

		$sql="SELECT * FROM Proyectos WHERE id_empresa='".$_SESSION['idEmpresa']."';";
		$query = mysqli_query($con, $sql);
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM Proyectos");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows']; 
		//loop through fetched data
		if ($numrows>0){
			
			?>

			<?php
			while ($row=mysqli_fetch_array($query)){
					$id_proyecto=$row['id_proyecto'];
					$id_contrato=$row['id_contrato'];
					$descripcion=$row['descripcion'];
					
					$sqlPostulante="SELECT id_estudiante, estado FROM Postulados WHERE id_proyecto='".$id_proyecto."';";
		            $queryPostulante=mysqli_query($con, $sqlPostulante);
		            $count_queryPostulante=mysqli_query($con, "SELECT count(*) AS numrows FROM Postulados");
		            $rowPostulante= mysqli_fetch_array($count_queryPostulante);
		            $numrowsPostulante = $rowPostulante['numrows'];
					
					while ($rowPostulante=mysqli_fetch_array($queryPostulante)){
						$id_estudiante=$rowPostulante['id_estudiante'];
						$estado=$rowPostulante['estado'];
						
						$sqlEstudiante="SELECT nombre, Apellidos FROM Estudiantes WHERE cedula='".$id_estudiante."';";
						$queryEstudiante=mysqli_query($con, $sqlEstudiante);
						$count_queryEstudiante=mysqli_query($con, "SELECT count(*) AS numrows FROM Estudiantes");
						$rowEstudiantes= mysqli_fetch_array($count_queryEstudiante);
						$numrowsEstudiantes = $rowEstudiantes['numrows'];
					
						while ($rowEstudiantes=mysqli_fetch_array($queryEstudiante)){
							$nombre=$rowEstudiantes['nombre'];
							$apellidos=$rowEstudiantes['Apellidos'];
							
							$sqlContrato="SELECT descripcion FROM tipo_contrato WHERE id_contrato='".$id_contrato."';";
							$queryContrato=mysqli_query($con, $sqlContrato);
							$count_queryContrato=mysqli_query($con, "SELECT count(*) AS numrows FROM tipo_contrato");
							$rowContrato= mysqli_fetch_array($count_queryContrato);
							$numrowsContrato = $rowContrato['numrows'];
					
							while ($rowContrato=mysqli_fetch_array($queryContrato)){
								$descripcionContrato=$rowContrato['descripcion'];

			?>
							<div class="container">
							<div class="table-responsive">
							<table class="table">
							<tr  class="success">
								<th>Nombre</th>
								<th>Descripcion del proyecto</th>
								<th>Tipo de Proyecto</th>
								<th>Estado de la Solicitud</th>	
								<th>Acciones</th>									
								</tr>
							<tr>

							<td ><?php echo $nombre . " " . $apellidos; ?></td>
							<td ><?php echo $descripcion; ?></td>
							<td ><?php echo $descripcionContrato; ?></td>
						    <td ><?php
                            if($estado == 0)							
								echo "Rechazada"; 
							if($estado == 1)							
								echo "Aceptada";
                            if($estado == 2)							
								echo "Pendiente"; 							
							?>
							</td>
							<td ><span class="pull-left">
								<a id="aceptar" href="#" class='btn btn-default' title='Aceptar' onclick="" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-ok"></i></a> 
								<a id="rechazar" href="#" class='btn btn-default' title='Rechazar' onclick="" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-remove"></i></a>	
					        </td>
							<div id="estado">
							</div>
							</tr>
							<?php
							}
							?>
							
						<?php
						}
						?>
					 <?php
					 }
					 ?>
				
			</div>
			</div>
						
			<?php
			}
			?>
			
			
</body>
</html>
<?php
}
?>
<?php
include("footer.php");
?>

<script>

var estado=1;
var id_proyecto=<?php echo $id_proyecto?>;


$("#aceptar").click(function()
   {
  var parametros = {"id_proyecto": id_proyecto };
	 $.ajax({
			type: "POST",
			url: "ajax/aceptar_postulante.php",
			data: parametros,
			 beforeSend: function(objeto){
				
			  },
			success: function(datos){
				
			$("#estado").html(datos);
			
			document.getElementById("btn-aplicar").disabled = true;
			document.getElementById("btn-deshacer").disabled = false;
			
		  }
 }); 
	
 event.preventDefault();
});

$("#rechazar").click(function()
   {
  var parametros = {"id_proyecto": id_proyecto };
	 $.ajax({
			type: "POST",
			url: "ajax/rechazar_postulante.php",
			data: parametros,
			 beforeSend: function(objeto){
				
			  },
			success: function(datos){
				
			$("#estado").html(datos);
			
			document.getElementById("btn-aplicar").disabled = false;
			document.getElementById("btn-deshacer").disabled = true;
			
		  }
 }); 
	
 event.preventDefault();
});


</script>





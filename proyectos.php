<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_productos="active";
	$title="Siproin";
	$cedula=$_SESSION['cedula']; 
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
	
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<?php if($_SESSION['role']!=2){?>	
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoProyecto"><span class="glyphicon glyphicon-plus" ></span> Agregar</button>
			</div>
			
			<h4>Proyectos</h4>
			<?php }else{?>
             <h4><i class='glyphicon glyphicon-search'></i> Buscar pasantías</h4>
			<?php }?>
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_productos.php");
			include("modal/agregar_proyecto.php");
			include("modal/editar_productos.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				
				<?php if($_SESSION['role']!=2){?>	
				<div class="row">
					<div class='col-md-4'>
						
					</div>
					
					
					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div> 	
				

				<?php }else{?>
                <div class="row">
					<div class='col-md-4'>
						<label>Filtrar por código o nombre</label>
						<input type="text" class="form-control" id="busqueda" placeholder="Busca un proyecto" onkeyup='cargaProyectosKey(1);'>
					</div>
					
					<div class='col-md-4'>
						<label>Filtrar por categoría</label>
						<select class='form-control' name='id_tipo_contrato' id='id_tipo_contrato'">
							<option value="">¿Que tipo de proyecto busca?</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from tipo_contrato order by descripcion");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_contrato'];?>"><?php echo $rw['descripcion'];?></option>			
								<?php
							}
							?>
						</select>
					</div>
					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div> 

				<?php } ?>
				<hr>
				<div class='row-fluid'>
					<div id="resultados"></div><!-- Carga los datos ajax -->
				</div>	
				<div class='row'>
					<div class='outer_div'></div><!-- Carga los datos ajax -->
				</div>
			</form>
				
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");

	?>
	
  </body>
</html>
<script>
function eliminar (id){
		var q= $("#q").val();
		var id_categoria= $("#id_categoria").val();
		$.ajax({
			type: "GET",
			url: "./ajax/buscar_productos.php",
			data: "id="+id,"q":q+"id_categoria="+id_categoria,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados").html(datos);
			load(1);
			}
		});
	}
		
	$(document).ready(function(){
			
		<?php 
			if (isset($_GET['delete'])){
		?>
			eliminar(<?php echo intval($_GET['delete'])?>);	
		<?php
			}
		
		?>	
		cargaProyectosEmpresa(1);
	});
		
$( "#guardar_proyecto" ).submit(function( event ) {
  $('#btn_agrega_proyecto').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_proyecto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
				alert(datos);
			$("#resultados_ajax_proyectos").html(datos);
			//$('#guardar_datos').attr("disabled", false);
			
		  }
	});
  event.preventDefault();
}) 


function cargaProyectos(page){
			var busqueda= $("#busqueda").val();
			var id_tipo_contrato= $("#id_tipo_contrato").val();
			
			var parametros={'action':'select','page':page,'busqueda':busqueda,'id_tipo_contrato':id_tipo_contrato};
			$("#loader").fadeIn('slow');
			$.ajax({
				data: parametros,
				url:'./ajax/busca_proyectos.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

function cargaProyectosKey(page){
			var busqueda= $("#busqueda").val();
			var id_tipo_contrato= $("#id_tipo_contrato").val();
			
			var parametros={'action':'keyup','page':page,'busqueda':busqueda,'id_tipo_contrato':id_tipo_contrato};
			$("#loader").fadeIn('slow');
			$.ajax({
				data: parametros,
				url:'./ajax/busca_proyectos.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}		

function cargaProyectosEmpresa(page){
			
			
			
			var parametros={'action':'empresa','page':page};
			$("#loader").fadeIn('slow');
			$.ajax({
				data: parametros,
				url:'./ajax/busca_proyectos.php',
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}


$("#id_tipo_contrato").change(function()
{
cargaProyectos(1);
});		


</script>
<style>
	
</style>
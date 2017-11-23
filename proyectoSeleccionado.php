
<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("funciones.php");
	
	$active_productos="active";
	$active_clientes="";
	$active_usuarios="";	
	$title="Simple Stock Proyecto";
	$cedula=$_SESSION['cedula'];
	
	if (isset($_POST['reference']) and isset($_POST['quantity'])){
		$quantity=intval($_POST['quantity']);
		$reference=mysqli_real_escape_string($con,(strip_tags($_POST["reference"],ENT_QUOTES)));
		$id_producto=intval($_GET['id_proyecto']);
		$user_id=$_SESSION['user_id'];
		$firstname=$_SESSION['firstname'];
		$nota="$firstname agregó $quantity producto(s) al inventario";
		$fecha=date("Y-m-d H:i:s");
		guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);
		$update=agregar_stock($id_producto,$quantity);
		if ($update==1){
			$message=1;
		} else {
			$error=1;
		}
	}
	
	/*if (isset($_POST['reference_remove']) and isset($_POST['quantity_remove'])){
		$quantity=intval($_POST['quantity_remove']);
		$reference=mysqli_real_escape_string($con,(strip_tags($_POST["reference_remove"],ENT_QUOTES)));
		$id_producto=intval($_GET['id']);
		$user_id=$_SESSION['user_id'];
		$firstname=$_SESSION['firstname'];
		$nota="$firstname eliminó $quantity producto(s) del inventario";
		$fecha=date("Y-m-d H:i:s");
		guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);
		$update=eliminar_stock($id_producto,$quantity);
		if ($update==1){
			$message=1;
		} else {
			$error=1;
		}
	} */
	
	if (isset($_GET['id'])){
		$id_proyecto=intval($_GET['id']);
		$query=mysqli_query($con,"select * from Proyectos where id_proyecto='$id_proyecto'");
		$row=mysqli_fetch_array($query);

		
	} else {
		die("Producto no existe");
	}
	
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

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="margin-top:12px;">
          <div class="panel-body" style="margin-top: 75px;">
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2 text-center">
				 <img class="item-img img-responsive" src="img/job.png" alt=""> 
				  <br>
                    
					
              </div>
			  
              <div class="col-sm-4 text-left">
                <div class="row margin-btm-20">
                    <div class="col-xs-12 col-sm-12">
                      <span class="item-title"><?php echo $row['descripcion'];?></span>
                    </div>
                 
                   
                  
					<div class="col-xs-12 col-sm-12">
                      <span class="current-stock">Vacantes disponibles:</span>
                      <span class="item-price"><?php echo $row['vacantes'];?></span>
                    </div>
					<div class="col-sm-12">
                      
                    </div>
					
                    <div class="col-sm-12 margin-btm-10">
					</div>

                    <?php if($_SESSION['role']!=1){ ?>
                    <div class="col-sm-6 col-xs-12 col-md-4 ">
                    	<br>
                    	


                    	<button class="btn col-xs-12 col-md-12" id="btn-aplicar" style="background-color: #5cb85c!important;color: white; ">
                    	   Aplicar
                    	</button>

                    	
                   
                    </div>
                    <div class="col-sm-6 col-xs-12 col-md-4">
                    	<br>
                    	<button class="btn col-xs-12 col-md-12" id="btn-deshacer" style="background-color: #d9534f!important; color: white;">
                    		Deshacer
                    	</button>

                    	<script>document.getElementById("btn-deshacer").disabled = true;</script>
                      
                    </div>
                    <?php  }else{?>
                
                <div class="col-sm-9 col-xs-12 col-md-9">
                    	<br>
                    	<button class="btn col-xs-12 col-md-12" id="btn-deshacer" style="background-color: #d9534f!important; color: white;">
                    		Deshacer Proyecto
                    	</button>

                    	
                      
                    </div>


                <?php }?>
                    <div id="estado" class="col-xs-12 col-md-8">
                    	<?php
            
            $sqlPostulante = "SELECT * FROM Postulados WHERE id_estudiante = '" . $cedula ."' AND id_proyecto ='".$id_proyecto."';";
              $queryPostulante=mysqli_query($con, $sqlPostulante);
              $rowPostulante=mysqli_fetch_array($queryPostulante);
              $estado=$rowPostulante['estado'];
              $id_empresa=$row['id_empresa'];
         
              //$verificaRegistro=mysqli_num_rows($ejecuta);
                      if ($estado==1){
                
                ?>
                <script>
            document.getElementById("btn-aplicar").disabled = true;
			document.getElementById("btn-deshacer").disabled = false;
                	</script>
               <br>
                <div class="alert alert-success" style="text-align: center;" role="alert">
                	
                     

                        <strong>Solicitud aceptada</strong>

                       
                </div>
                <?php
            }
             ?>
<?php
               if ($estado==10){
                
                ?>
                <script>
            document.getElementById("btn-aplicar").disabled = true;
			document.getElementById("btn-deshacer").disabled = false;
                	</script>
                <br>
                <div class="alert alert-danger" style="text-align: center; margin-top:10px" role="alert">
                	
                     

                        <strong>Rechazada</strong>

                       
                </div>
                <?php
            }
             ?>

             <?php
               if ($estado==2){
                
                ?>
                <script>
            document.getElementById("btn-aplicar").disabled = true;
			document.getElementById("btn-deshacer").disabled = false;
                	</script>
                
                <br>
                <div class="alert alert-warning" style="text-align: center;margin-top:10px" role="alert">
                	
                     

                        <strong>En espera</strong>

                       
                </div>
                <?php
            }
             ?>
          
           
            
                         
							
								
                    	
                    </div>
                    
                   
                  </div>
              </div>
            </div>
            <br>
            <div class="row">

            <div class="col-sm-8 col-sm-offset-2 text-left">
                  <div class="row">
                    <?php
						if (isset($message)){
							?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Aviso!</strong> Datos procesados exitosamente.
						</div>	
							<?php
						}
						if (isset($error)){
							?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Error!</strong> No se pudo procesar los datos.
						</div>	
							<?php
						}
					?>	
					 
                  </div>
                                    
                                    
				</div>
            </div>
          </div>
        </div>
    </div>
</div>



</div>

	
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
  </body>
</html>
<script>




$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});
				location.replace('stock.php');
			}, 4000);
		  }
	});
  event.preventDefault();
})

	$('#myModal2').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var codigo = button.data('codigo') // Extract info from data-* attributes
		var nombre = button.data('nombre')
		var categoria = button.data('categoria')
		var precio = button.data('precio')
		var stock = button.data('stock')
		var id = button.data('id')
		var modal = $(this)
		modal.find('.modal-body #mod_codigo').val(codigo)
		modal.find('.modal-body #mod_nombre').val(nombre)
		modal.find('.modal-body #mod_categoria').val(categoria)
		modal.find('.modal-body #mod_precio').val(precio)
		modal.find('.modal-body #mod_stock').val(stock)
		modal.find('.modal-body #mod_id').val(id)
	})
	
	function eliminar (id){
		var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el producto")){	
			location.replace('stock.php?delete='+id);
		}
	}


     var cedula=<?php echo $cedula ?>;
   var id_proyecto=<?php echo $id_proyecto?>;
   var id_empresa=<?php echo $id_empresa?>;
   

   $("#btn-aplicar").click(function()
   {




  var parametros = {"cedula": cedula,
                  "id_proyecto": id_proyecto,"estado":2 ,"id_empresa":id_empresa};
	 $.ajax({
			type: "POST",
			url: "ajax/aplicar_trabajo.php",
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




   $("#btn-deshacer").click(function()
   {




  var parametro = {"cedula": cedula, "id_proyecto": id_proyecto};
	 $.ajax({
			type: "POST",
			url: "ajax/eliminarPostulante.php",
			data: parametro,
			 beforeSend: function(objeto){
				
			  },
			success: function(datos){
			alert(datos);	
			document.getElementById("btn-aplicar").disabled = false;
			document.getElementById("btn-deshacer").disabled = true;
			//$("#estado").html(datos);

			
		  }
 }); 
	
  event.preventDefault();




   });
  //$('#btn_agrega_proyecto').attr("disabled", true);
 



</script>

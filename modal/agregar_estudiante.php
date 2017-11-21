	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="estudiante-nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo usuario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="lastname" class="col-sm-3 control-label">Apellidos</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
				</div>
			  </div> 
			  <div class="form-group">
				<label class="col-sm-3 control-label">Cédula</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="cedula"  name="cedula" placeholder="Cédula" required>
				</div>
			  </div>
               
                 <div class="form-group">
				<label for="user_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="email"  name="email" placeholder="Correo electrónico" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="user_email" class="col-sm-3 control-label">Número de teléfono</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="telefono"  name="telefono" placeholder="teléfono" required>
				</div>
			  </div>
			   <div class="form-group">
				<label for="user_email" class="col-sm-3 control-label">Número de habitación</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="tel_casa"  name="tel_casa" placeholder="teléfono de habitación" required>
				</div>
			  </div>

			   <div class="form-group">
				<label for="id_role" class="col-sm-3 control-label">Role</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="id_role" value="0" name="id_role" placeholder="role" required>
				</div>
			  </div>
			
			  <div class="form-group">
				<label for="user_password_new" class="col-sm-3 control-label">Contraseña</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña"  pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
				</div>
			  </div>
			 
			  <!-- <div class="form-group">
				<label for="user_password_repeat" class="col-sm-3 control-label">Repite contraseña</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="Repite contraseña" pattern=".{6,}" required>
				</div>
			  </div> -->
			 
			  

			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
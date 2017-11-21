	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar Proyecto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_proyecto" name="guardar_proyecto">
			<div id="resultados_ajax_proyectos"></div>
			

            <div class="form-group">
				<label for="categoria" class="col-sm-3 control-label">Tipo de contrato</label>
				<div class="col-sm-8">
					<select class='form-control' name='id_contrato' id='id_contrato' required>
						<option value="">Selecciona un contrato</option>
							<?php 
							$query_contrato=mysqli_query($con,"select * from tipo_contrato order by id_contrato");
							while($rw=mysqli_fetch_array($query_contrato))	{
								?>
							<option value="<?php echo $rw['id_contrato'];?>"><?php echo $rw['descripcion'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
			<div class="form-group">
				<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder=" Acerca del proyecto" required >
				</div>
			</div>

			<div class="form-group">
				<label for="stock" class="col-sm-3 control-label">Vacantes</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control" id="vacantes" name="vacantes" placeholder=" Numero de vacantes" required  maxlength="3">
				</div>
			</div>
			<!--  <div class="form-group">
				<label for="upload" class="col-sm-3 control-label">Imagen</label>
				<input id = "input-b1" name="uploadedfile" type = "file" class = "file">

			</div> -->
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="btn_agrega_proyecto">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>


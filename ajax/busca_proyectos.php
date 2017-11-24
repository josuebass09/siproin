<?php
/* Siproin (v0.4) 
Licensed under MIT (https://github.com/josuebass09/siproin/blob/master/LICENSE)
 */

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id_proyecto'])){
		$id_producto=intval($_GET['id_proyecto']);
		if ($delete1=mysqli_query($con,"DELETE FROM products WHERE id_producto='".$id_producto."'")){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		 
		
		
		
	}

    if($action == 'empresa'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         
         $id_empresa=$_SESSION['idEmpresa'];
		 
		 $aColumns = array('id_proyecto', 'descripcion');//Columnas de busqueda
		 $sTable = "Proyectos";
	
		
	
		$sWhere.=" order by id_proyecto desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 18; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './proyectos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  Proyectos WHERE id_empresa='".$id_empresa."';";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			  
				<?php
				$nums=1;
				$cuenta=0;
				$array = array("img/php.png", "img/net.png", "img/wordpress.png");
				while ($row=mysqli_fetch_array($query)){
						$id_contrato=$row['id_contrato'];
						$descripcion=$row['descripcion'];
						$id_proyecto=$row['id_proyecto'];
						
					?>
					
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 thumb text-center ng-scope" ng-repeat="item in records">
						  <a class="thumbnail" href="proyectoSeleccionado.php?id=<?php echo $id_proyecto;?>">
							  <span title="Current quantity" class="badge badge-default stock-counter ng-binding"><?php echo number_format($stock,2); ?></span>
							  <span title="Low stock" class="low-stock-alert ng-hide" ng-show="item.current_quantity <= item.low_stock_threshold"><i class="fa fa-exclamation-triangle"></i></span>
							  <img class="img-responsive" src="<?php echo $array[$cuenta]?>" alt="<?php echo $nombre_producto;?>">
						  </a>
						  <span class="thumb-name"><strong><?php echo $id_contrato;?></strong></span>
						  <span class="thumb-code ng-binding"><?php echo $descripcion;?></span>
					</div>
					<?php
					if ($nums%6==0){
						echo "<div class='clearfix'></div>";
					}
					$nums++;
					$cuenta++;
				}
				?>
				<div class="clearfix"></div>
				<div class='row text-center'>
					<div ><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></div>
				</div>
			
			<?php
		}
	}









	if($action == 'select'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['busqueda'], ENT_QUOTES)));
		 $id_tipo_contrato =intval($_REQUEST['id_tipo_contrato']);
		 $aColumns = array('id_proyecto', 'descripcion');//Columnas de busqueda
		 $sTable = "Proyectos";
		 $sWhere = "";
		
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		
	
		$sWhere.=" order by id_proyecto desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 18; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './proyectos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  Proyectos WHERE id_contrato='".$id_tipo_contrato."';";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			  
				<?php
				$nums=1;
				$cuenta=0;
				$array = array("img/php.png", "img/net.png", "img/wordpress.png");
				while ($row=mysqli_fetch_array($query)){
						$id_contrato=$row['id_contrato'];
						$descripcion=$row['descripcion'];
						$id_proyecto=$row['id_proyecto'];
						
					?>
					
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 thumb text-center ng-scope" ng-repeat="item in records">
						  <a class="thumbnail" href="proyectoSeleccionado.php?id=<?php echo $id_proyecto;?>">
							  <span title="Current quantity" class="badge badge-default stock-counter ng-binding"><?php echo number_format($stock,2); ?></span>
							  <span title="Low stock" class="low-stock-alert ng-hide" ng-show="item.current_quantity <= item.low_stock_threshold"><i class="fa fa-exclamation-triangle"></i></span>
							  <img class="img-responsive" src="<?php echo $array[$cuenta]?>" alt="<?php echo $nombre_producto;?>">
						  </a>
						  <span class="thumb-name"><strong><?php echo $id_contrato;?></strong></span>
						  <span class="thumb-code ng-binding"><?php echo $descripcion;?></span>
					</div>
					<?php
					if ($nums%6==0){
						echo "<div class='clearfix'></div>";
					}
					$nums++;
					$cuenta++;
				}
				?>
				<div class="clearfix"></div>
				<div class='row text-center'>
					<div ><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></div>
				</div>
			
			<?php
		}
	}
    if($action == 'keyup'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['busqueda'], ENT_QUOTES)));
		 $id_tipo_contrato =intval($_REQUEST['id_tipo_contrato']);
		 $aColumns = array('id_proyecto', 'descripcion');//Columnas de busqueda
		 $sTable = "Proyectos";
		 $sWhere = "";
		
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		
	
		$sWhere.=" order by id_proyecto desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 18; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './proyectos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			  
				<?php
				$nums=1;
				$cuenta=0;
				$array = array("img/php.png", "img/net.png", "img/wordpress.png");
				while ($row=mysqli_fetch_array($query)){
						$id_contrato=$row['id_contrato'];
						$descripcion=$row['descripcion'];
						$id_proyecto=$row['id_proyecto'];
						
					?>
					
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 thumb text-center ng-scope" ng-repeat="item in records">
						  <a class="thumbnail" href="proyectoSeleccionado.php?id=<?php echo $id_proyecto;?>">
							  <span title="Current quantity" class="badge badge-default stock-counter ng-binding"><?php echo number_format($stock,2); ?></span>
							  <span title="Low stock" class="low-stock-alert ng-hide" ng-show="item.current_quantity <= item.low_stock_threshold"><i class="fa fa-exclamation-triangle"></i></span>
							  <img class="img-responsive" src="<?php echo $array[$cuenta]?>" alt="<?php echo $nombre_producto;?>">
						  </a>
						  <span class="thumb-name"><strong><?php echo $id_contrato;?></strong></span>
						  <span class="thumb-code ng-binding"><?php echo $descripcion;?></span>
					</div>
					<?php
					if ($nums%6==0){
						echo "<div class='clearfix'></div>";
					}
					$nums++;
					$cuenta++;
				}
				?>
				<div class="clearfix"></div>
				<div class='row text-center'>
					<div ><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></div>
				</div>
			
			<?php
		}
	} 

?>

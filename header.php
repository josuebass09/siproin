<!--/* Siproin (v0.4) 
Licensed under MIT (https://github.com/josuebass09/siproin/blob/master/LICENSE)
 */ -->
  <?php
    if (isset($title))
    {
  ?>
  <style>
    

    .notificacion {
  color: white;
  display: inline-block; /* Inline elements with width and height. TL;DR they make the icon buttons stack from left-to-right instead of top-to-bottom */
  position: relative; /* All 'absolute'ly positioned elements are relative to this one */
  padding: 2px 5px; 
  margin-top: 7px;
}


.button__badge {
  background-color: #5fba7d;;
  border-radius: 2px;
  color: white;
 
  padding: 1px 3px;
  font-size: 10px;
  
  position: absolute; 
  top: 0;
  right: 0;
}
  </style>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="proyectos.php">SIPROIN</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

  <?php 
    if($_SESSION['role'] == 2 || $_SESSION['role'] == 0){
    ?>
      <li class="<?php if (isset($active_productos)){echo $active_productos;}?>"><a href="proyectos.php"><i class='glyphicon glyphicon-barcode'></i> Proyectos</a></li>
    <?php
    }
    ?>
  
    <?php  
    if($_SESSION['role'] == 0){
    ?>
      <li class="<?php if (isset($active_usuarios)){echo $active_usuarios;}?>"><a href="estudiantes.php"><i  class='glyphicon glyphicon-user'></i>Estudiantes</a></li>
    <?php
    }
    ?>
  
  <?php
  if($_SESSION['role'] == 2){
    ?>
    <li class="<?php if (isset($active_usuarios)){echo $active_usuarios;}?>"><a href="perfilEstudiante.php"><i  class='glyphicon glyphicons-group'></i>Perfil Estudiantes</a></li>      
    <?php
    }
    ?>
    
  <?php 
    if($_SESSION['role'] == 0){
    ?>
      <li class="<?php if (isset($active_usuarios)){echo $active_usuarios;}?>"><a href="empresas.php"><i  class='glyphicon glyphicons-building'></i>Empresas</a></li>
    <?php
    }
    ?>
  
  <?php 
    if($_SESSION['role'] == 1){
             
             $sql="SELECT count(*) FROM Postulados WHERE id_empresa = '" . $_SESSION['idEmpresa'] ."';";  
              $result = mysqli_query($con,$sql);
              $row = mysqli_fetch_array($result);
              $total = $row[0];
              
              
              
    ?>


       
      <li><a href="postulados.php" style="font-size:1.3em;" class="col-md-6" >Postulados</a></li>
       <!--<li style="margin-top: 9px;">
        <img src="img/notification.png" width="32" height="32"><p style="float: right; background-color: green; color: white; width: 20px;height: 16px; font-size: 10px; text-align: center;"><small>3</small></p>
      </li>  -->
      <li>
        <div class="notificacion">
          <img src="img/notification.png" width="32" height="32">
          <span class="button__badge">2</span>
        </div>
        
      </li>
      



      
      
    <?php
    }
    ?>
  
    </ul>
    <ul class="nav navbar-nav navbar-right">
        
    <?php 
    if($_SESSION['role'] == 0){
    ?>
      <li><a href="admin.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
    <?php
    }else{
    ?>
      <li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
    <?php
    }
    ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <?php
    }
  ?>




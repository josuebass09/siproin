<!--/* Siproin (v0.4) 
Licensed under MIT (https://github.com/josuebass09/siproin/blob/master/LICENSE)
 */ -->
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="form">
      <h1>Registro</h1>
      <ul class="tab-group" id="ul-opcion">
        <li class="tab active" value="estudiante"><a href="#reg-estudiante">Estudiante</a></li>
        <li class="tab" value="empresa"><a href="#reg-empresa">Empresa</a></li>
      </ul>
      <div class="alert alert-success" id="div-aviso" style="text-align: center; font-size: 1.8em; margin-bottom: 40px;">
      </div>
      
      <div class="tab-content">
        <!--MODAL DEL ESTUDIANTE -->
        <div id="reg-estudiante">   
          
          
          <form method="post" id="formulario-estudiante">
          
          <div class="top-row">
            <div class="field-wrap">
                <label>
                  Nombre<span class="req">*</span>
                </label>
                <input type="text" id="nombre" name="nombre"  required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Apellidos<span class="req">*</span>
              </label>
              <input type="text"  id="apellidos" name="apellidos" required autocomplete="off"/>
            </div>
           
          </div>


          <div class="field-wrap">
             <div class="field-wrap">
              <label>
                Cédula<span class="req">*</span>
              </label>
              <input type="number" id="cedula"  name="cedula"  required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Correo electrónico<span class="req">*</span>
              </label>
              <input type="text"  id="email"  name="email" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Teléfono<span class="req">*</span>
              </label>
              <input type="number"  id="telefono"  name="telefono" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Teléfono de habitación<span class="req">*</span>
              </label>
              <input type="number"  id="tel_casa"  name="tel_casa" required autocomplete="off"/>
            </div>
            
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password"  required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Confirmar Contraseña<span class="req">*</span>
            </label>
            <input type="password" id="contrasena" name="contrasena" title="Contraseña ( min . 6 caracteres)" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block" id="registrar_estudiante" />Registrarse</button>
          
          </form>

        </div>


            


        <!--MODAL DE LA EMPRESA -->
        <div id="reg-empresa">   
          
          
           <form  method="post" id="formulario-empresa">
             
          
          
          <div class="field-wrap">
              <label>
                Nombre<span class="req">*</span>
              </label>
              <input  id="nombre" name="nombre" type="text" required autocomplete="off"/>
            </div>


          <div class="field-wrap">
             <div class="field-wrap">
              <label>
                Dirección<span class="req">*</span>
              </label>
              <input   id="direccion" name="direccion" type="text" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Correo electrónico<span class="req">*</span>
              </label>
              <input   id="correo" name="correo" type="text" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Descripción<span class="req">*</span>
              </label>
              <input  id="descripcion" name="descripcion" type="text" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <label>
                Teléfono<span class="req">*</span>
              </label>
              <input  id="telefono" name="telefono" type="number" required autocomplete="off"/>
             
            </div>
              <div class="field-wrap">
              <label>
                Teléfono 2<span class="req">*</span>
              </label>
              <input   id="tel_secundario" name="tel_secundario" type="number" autocomplete="off"/>
             
            </div>
            
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input id="contrasena" name="contrasena" type="password" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Confirmar Contraseña<span class="req">*</span>
            </label>
            <input   type="password" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block" id="registrar_empresa" />Registrarse</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
<style>
  input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type="number"] {
    -moz-appearance: textfield;
}
</style>

<script >
  
$( "#formulario-estudiante" ).submit(function( event ) {
var parametros = $(this).serialize();
   $.ajax({
      type: "POST",
      url: "ajax/nuevo_estudiante.php",
      data: parametros,
       beforeSend: function(objeto){
        /*$("#resultados_ajax").html("Mensaje: Cargando...");*/
    
        },
      success: function(datos){
        
        alert(datos);
           if(datos==1)
          {
             $("#div-aviso").html("<strong style='color:#1ab188;'>!Cuenta creada con éxito!</strong><br><a href='login.php' style='color:#d9534f; text-decoration: underline;'>Iniciar Sesión</a>");
          }
          else
          {
            $("#div-aviso").html("<strong style='color:#B33A3A;'>!Error de registro¡</strong><br><p style='color:#d9534f;'>Por favor intente de nuevo</a>");
          }
    
      
      }
  });
    event.preventDefault();
})
  $( "#formulario-empresa" ).submit(function( event ) {

   var parametros = $(this).serialize();
   $.ajax({
      type: "POST",
      url: "ajax/nueva_empresa.php",
      data: parametros,
       beforeSend: function(objeto){
        /*$("#resultados_ajax").html("Mensaje: Cargando...");*/
    
        },
      success: function(datos){
        
          if(datos==1)
          {
             $("#div-aviso").html("<strong style='color:#1ab188;'>!Cuenta creada con éxito!</strong><br><a href='login.php' style='color:#d9534f; text-decoration: underline;'>Iniciar Sesión</a>");
          }
          else
          {
            $("#div-aviso").html("<strong style='color:#B33A3A;'>!Error de registro¡</strong><br><p style='color:#d9534f;'>Por favor intente de nuevo</a>");
          }
        
        
    
      
      }
  });
   event.preventDefault();
})








</script>
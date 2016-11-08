<?php
/*====================================================================+
|| # Formulario PHP - Desarrollo Web 2016 - Universidad de Valparaíso
|+====================================================================+
|| # .
|| # 
|+====================================================================*/

// Función para evitar inyecciones
function Filtro($texto) {
  return htmlspecialchars(trim($texto), ENT_QUOTES); //evitan que caracteres que dejen la caga en la db o inyeccciones sql
}
//trim borran espacio 

// Variables
$directorio = 'C:/wamp/www/FormularioPHP/assets/';
$nombre = isset($_POST['nombre']) ? Filtro($_POST['nombre']) : '';
$direccion = isset($_POST['direccion']) ? Filtro($_POST['direccion']) : '';
$comuna = isset($_POST['comuna']) ? Filtro($_POST['comuna']) : '';
 //isset(determina si viene un valor) recibe el campo y lo guarda con una variable y pasa por filtro pa sacar carateres especiales 
$alcalde = isset($_POST['alcalde']) ? Filtro($_POST['alcalde']) : '';
$concejal = isset($_POST['concejal']) ? Filtro($_POST['concejal']) : '';
$sexo = isset($_POST['sexo']) ? Filtro($_POST['sexo']) : '';
$error = '';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Proyecto para enseñar el funcionamiento de un formulario en PHP">
  <meta name="keywords" content="html, bootstrap, php, formulario, desarrollo, web">
  <meta name="author" content="Alguien">
  <title>Formulario enviado</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">
  <span style="padding-top: 10px;"></span>
<?php
// Mostrar contenido
if($enviado == 1 && $contenido == 1) {
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  exit;
} else if(empty($nombre)) {
  $error = 'Por favor, ingrese su nombre.';
} else if(empty($direccion)) {
  $error = 'Por favor, ingrese su correo dirección.';
} else if(empty($comuna)) {
  $error = 'Por favor, ingrese su comuna.';
} else if(empty($alcalde)) {
  $error = 'Por favor, seleccione su alcalde.';
} else if(empty($concejal)) {
  $error = 'Por favor, ingrese su concejal.';
} else if(empty($sexo)) {
  $error = 'Por favor, ingrese su sexo.';
} 

// Vista de error
if(!empty($error)) {
?>
<div class="alert alert-info">
  <i class="glyphicon glyphicon-info-sign"></i>
  <?php echo $error; ?>
</div>
<a href="./" class="btn btn-warning">
  <i class="glyphicon glyphicon-chevron-left"></i>
  Volver
</a>
<?php
// Vista de éxito
} else {
  // Subir imagen<!--
//  move_uploaded_file($foto['tmp_name'], $foto_subida);
?>
  <h3>¡Formulario enviado satisfactoriamente!</h3>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos enviados</h3>
    </div>
    <div class="panel-body">
      <p>Bienvenido(a) <b><?php echo $nombre; ?></b>,</p>
      <p>tu direccion es  <b><?php echo $direccion; ?></b>, y tu comuna es <b><?php echo $comuna; ?></b> caracteres.</p>
      
      <p>
        Tu sexo es: <b><?php echo ($sexo == 'm' ? 'Masculino' : 'Femenino'); ?></b>
      </p>


      
    </div>
    <div class="panel-footer">
      <div class="text-right">
        <a href="./" class="btn btn-primary">
          <i class="glyphicon glyphicon-chevron-left"></i>
          Volver
        </a>
      </div>
    </div>
  </div>
<?php } ?>
  <!-- Pie de página -->
  <footer>
    <div class="text-center">
      <i class="glyphicon glyphicon-leaf"></i>
      Robado por <a> Alguien</a>
    </div>
  </footer>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>JMP Prog</title>

	<!-- CSS -->
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
	<link href="assets/css/animate.css" rel="stylesheet">
    
	<!-- Custom styles CSS -->
	<link href="assets/css/style.css" rel="stylesheet" media="screen">
    
    <script src="assets/js/modernizr.custom.js"></script>
    <link rel="shortcut icon" href="assets/images/icono.ico" />
       
</head>
<body>

<style>

.mail-container {
	
	background-color:#f9f9f9;
	width:100%;
	
	
	
}
</style>

      <?php


$para  = $_POST['c_email'] . ', '; // atención a la coma
$para .= 'contacto@josmaspergri.com.ve';
 
// Asunto
$titulo = 'Mensaje enviado';
 
// Cuerpo o mensaje
$mensaje = '
<html>
<head>
  <title>Hemos recibido su mensaje</title>
</head>
<div class="mail-container">
Hemos recibido su mensaje, estamos anciosos por leerlo y darle un respuesta rapida.
</div>
</body>
</html>
';
 
// Cabecera que especifica que es un HMTL
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Cabeceras adicionales
$cabeceras .= 'From: JMP Prog <no-responder@josmaspergri.com.ve>' . "\r\n";
$cabeceras .= 'Cc: no-responder@josmaspergri.com.ve' . "\r\n";
$cabeceras .= 'Bcc: no-responder@josmaspergri.com.ve' . "\r\n";
 
// enviamos el correo!
mail($para, $titulo, $mensaje, $cabeceras);

 {
	 sleep(0);
header('Location: index.php');  
 }


?>
</body>
</html>
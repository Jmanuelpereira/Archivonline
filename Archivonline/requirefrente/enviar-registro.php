<?php require_once('../Connections/archivo.php'); ?>
<style>.advertencia {
	background-color: #FFFFCE;
	text-align: left;
	padding: 10px;
	width: 200px;
	float: left;
	height: auto;
	width: 580px;
	border: 1px solid #FFDF00;
	
	}</style>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$varDato_Recordset1 = "0";
if (isset($_POST['Correo'])) {
  $varDato_Recordset1 = $_POST['Correo'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varDato_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);



// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = $_POST['Correo'];
$email_subject = "Recuperar contraseña";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['Correo'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}


$email_message = "Datos de usuario:\n\n";
$email_message .= "E-mail: " . $row_Recordset1['Correo'] . "\n";
$email_message .= "Contraseña provicional: " . $row_Recordset1['Contrasena'] . "\n\n";
$email_message .= "Esta contraseña es provicional, solo podra usarla para acceder por este link, deberas ingresar a Editar perfil > Cambiar contraseña y colocar una nueva contraseña con la que podas ingresar de manera normal."."\n"." www.archivonline.com.ve/restaurar-contrasena.php?r=3"."\n\n";
$email_message .= "----------------------------------------------------------------------------------------------------------". "\n";
$email_message .= "Atentamente su equipo de Archivo Online, recuerda visitarnos en www.archivonline.com.ve";



// Ahora se envía el e-mail usando la función mail() de PHP
$headers =  'From: '."Archivo Online<no-responder@archivonline.com.ve>"."\r\n".
 
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
 {
	 sleep(0);
header('Location: ../recuperar.php?action=recuperado-ok&metodo=correo');  
?><?php }


mysql_free_result($Recordset1);


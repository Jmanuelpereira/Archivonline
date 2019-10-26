<?php require_once('Connections/archivo.php'); ?>
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

mysql_select_db($database_archivo, $archivo);
$query_usuarios = "SELECT * FROM usuarios";
$usuarios = mysql_query($query_usuarios, $archivo) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=md5($_POST['contrasena']);
  $MM_fldUserAuthorization = "Rango";
  $MM_redirectLoginSuccess = "ao/indexad.php";
  $MM_redirectLoginFailed = "iniciar-sesion.php?r=2";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_archivo, $archivo);
  	
  $LoginRS__query=sprintf("SELECT Nombre, Apellido, Correo, Contrasena, Rango, Universidad, Carrera, Semestre, Estado, Sede, Sexo, Cedula, Tipocedula, Fecharegistro, Telefono, Vperfil, Imagen FROM usuarios WHERE Correo=%s AND Contrasena=%s AND Estado=1",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $archivo) or die(mysql_error());
  $row_usuarios = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'Rango');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_Idusuario'] = $row_usuarios["Contador"];
	$_SESSION['MM_Nombre'] = $row_usuarios["Nombre"];
	$_SESSION['MM_Apellido'] = $row_usuarios["Apellido"];
	$_SESSION['MM_Carrera'] = $row_usuarios["Carrera"];
	$_SESSION['MM_Semestre'] = $row_usuarios["Semestre"];
	$_SESSION['MM_Universidad'] = $row_usuarios["Universidad"];
	$_SESSION['MM_Sede'] = $row_usuarios["Sede"];
	$_SESSION['MM_Sexo'] = $row_usuarios["Sexo"];
	$_SESSION['MM_Cedula'] = $row_usuarios["Cedula"];
	$_SESSION['MM_Tipocedula'] = $row_usuarios["Tipocedula"];
	$_SESSION['MM_Rango'] = $row_usuarios["Rango"];
	$_SESSION['Telefono'] = $row_usuarios["Telefono"];
	$_SESSION['FDR'] = $row_usuarios["Fecharegistro"];
	$_SESSION['Estado'] = $row_usuarios["Estado"];
	$_SESSION['Vperfil'] = $row_usuarios["Vperfil"];
	$_SESSION['MM_Imagen'] = $row_usuarios["Imagen"];
		      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<a href="index.php"><img style="padding-top:10px" src="img/logo4.png" width="250" height="58" /></a>

 <?php
mysql_free_result($usuarios);


?>

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
$action = isset($_GET['action']) ? $_GET['action'] : NULL ;
if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario']; 
  if ($action == "IngresarSinMd5") echo $password= ($_POST['contrasena']); else $password= md5($_POST['contrasena']) ; 
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

$_GET['m'] = 1
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/basefrente.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<title>Archivo Online</title>

<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<style>

.campoindex {
	width:50px
	
	
}
.advertencia {
	box-shadow: 0 0 10px #FFDF00;
    -webkit-box-shadow: 0 0 10px #FFDF00;
    -moz-box-shadow: 0 0 10px #FFDF00;

	border-radius:3px;
	background-color: #FFFFCE;
	text-align: left;
	padding: 10px;
	
	float: left;
	height: auto;
	width: 580px;
	border: 1px solid #FFDF00;
	
	}

</style>
<!-- InstanceEndEditable -->
<link href="css/estilosfrente.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/iconos/favicon2.ico" </link>

<link rel="stylesheet" href="css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

	<script type="text/javascript" src="ao/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="ao/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	
    <link rel="stylesheet" type="text/css" href="ao/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$(".various2").fancybox();
			$("#various5").fancybox();
			

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>

<div class="contenedor">
<!-- InstanceBeginEditable name="Cabecera" -->
<div class="fondoheader"><div class="header">
  <a href="index.php"><img style="padding-top:10px" src="img/logo4.png" width="250" height="58" /></a>

</div></div>
<!-- InstanceEndEditable -->
<div class="container"><!-- InstanceBeginEditable name="Contenido" -->
  
  
  
  <center><div class="sesion" style="height:auto; margin-top:50px; margin-bottom:80px; width:90%">
  <?php
$notifi = isset($_GET['r']) ? $_GET['r'] : NULL ;

   switch ($notifi):
   
   
   case 1: { ?><div class="exito" style="width:90%">
    <h2 style="; padding:0px">Tu registro se ha logrado con exito</h2>
  <p style=" padding:0px">Bienvenido a la comunidad, inicia sesion con tus datos y disfruta.</p></div>
<?php
  

   }break;
   
   
    case 2: { ?><div class="error"  style="width:90%">

  <h3 style="; padding:0px">Acceso negado por combinación erronea</h3>
  <p style=" font-size:12px; ; padding:0px">Has introducido de manera incorrecta tus datos de usuario. </p></div>

  
  <?php } break; 
  default: {
  ?>
 <div class="advertencia" style="margin-right: 10px; width:90%" >
  
  <h3 style=" padding:0px">Bienvenido a archivonline</h3>
  <p style=" font-size:12px; padding:0px">Inicia sesion para disfrutar de las ventajas al compartir y descargar archivos.</p>
 
  
  </div>


 <?php } 
 
 endswitch;?>
<br />
<br />
<br />
<br />
<br />
<br />







 <br />
<br />

  
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" name="acceso">


<div style=" width: 100%;"><span style="margin:0px; float:left;" class="imgboton"><img src="img/iconos/contactop.png" width="16" height="18" /></span><input name="usuario" style="font-size:12px; padding:10px;margin:0px; float:left; border-radius:3px; border-top-left-radius: 0px; border-bottom-left-radius: 0px; width:76%;" type="text" class="campo"  placeholder="Correo electrónico" /><br /><br />
<br />

  <span style="  float:left; padding:10px; padding-top:9px;" class="imgboton"><img src="img/iconos/contra.png" width="14" height="16" /></span><input class="campo"  style="font-size:12px; padding:10px;margin:0px; float:left; border-radius:3px; border-top-left-radius: 0px; border-bottom-left-radius: 0px; width:76%;"  placeholder="Contrase&ntilde;a" type="password" name="contrasena" /></div><br /><br /><br />
  <br />
<br />



  <input type="submit" name="iniciar" class="btn" value="Iniciar sesión" /></form>
  <br />

  <a id="various5" href="requirefrente/registrarse.php" style="float:right; font-size:12px">Registrarse</a>  <a class="various2" href="requirefrente/modorecuperar.php?action=recuperar-contrasena&caso=Rmcorreo" style="float:left; font-size:12px">¿Olvidaste la contraseña?</a>

<br />



   </div></center>
   

  <!-- InstanceEndEditable --><!-- end .container --></div>
  <!-- InstanceBeginEditable name="Footer" -->
   <div class="fondofooter"><div class="footer">
    <?php require("ao/require/pie.php"); ?>
    <!-- end .footer -->
  </div></div>
  <!-- InstanceEndEditable -->
  </div>
</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>

<?php require_once('../../Connections/archivo.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form5")) {
  $updateSQL = sprintf("UPDATE usuarios SET Pperfil=%s, Pcorreo=%s, Pidentidad=%s WHERE Contador=%s",
                       GetSQLValueString(isset($_POST['Pperfil']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Pcorreo']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['Pidentidad']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['Contador'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($updateSQL, $archivo) or die(mysql_error());

  $updateGoTo = "../indexad.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varCorreo_Recordset1 = "0";
if (isset($_GET['u'])) {
  $varCorreo_Recordset1 = $_GET['u'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varCorreo_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$varCorreo_Recordset1 = "0";
if (isset($_SESSION['MM_Username'])) {
  $varCorreo_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varCorreo_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE usuarios SET Nombre=%s, Apellido=%s, Carrera=%s, Sexo=%s, Cedula=%s, Tipocedula=%s, Telefono=%s, Semestre=%s, Universidad=%s, Sede=%s, Materia=%s, Vperfil=%s WHERE Contador=%s",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
                       GetSQLValueString($_POST['Carrera'], "int"),
                       GetSQLValueString($_POST['Sexo'], "int"),
                       GetSQLValueString($_POST['Cedula'], "text"),
                       GetSQLValueString($_POST['Tipocedula'], "int"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString($_POST['Semestre'], "int"),
                       GetSQLValueString($_POST['Universidad'], "int"),
                       GetSQLValueString($_POST['Sede'], "int"),
                       GetSQLValueString($_POST['Materia'], "text"),
                       GetSQLValueString($_POST['Vperfil'], "int"),
                       GetSQLValueString($_POST['Contador'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($updateSQL, $archivo) or die(mysql_error());

  $updateGoTo = "perfil.php?notificacion=ActOk&tipo=datos";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE usuarios SET Imagen=%s WHERE Contador=%s",
                       GetSQLValueString($_POST['Imagen'], "text"),
                       GetSQLValueString($_POST['Contador'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($updateSQL, $archivo) or die(mysql_error());

  $updateGoTo = "perfil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
  $updateSQL = sprintf("UPDATE usuarios SET Contrasena=%s WHERE Contador=%s",
                       GetSQLValueString(md5($_POST['Contrasena']), "text"),
                       GetSQLValueString($_POST['Contador'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($updateSQL, $archivo) or die(mysql_error());

  $updateGoTo = "perfil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varDato_Recordset1 = "0";
if (isset($_GET['u'])) {
  $varDato_Recordset1 = $_GET['u'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varDato_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

$varDato_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $varDato_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varDato_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

?>
<?php
 if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/base.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../../img/iconos/favicon2.ico" </link>

<title>Archivo Online</title>

 <?php

  
   if (isset($_SESSION['MM_Username'])) 
    {?>

<!-- InstanceBeginEditable name="head" -->

<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../../img/iconos/favicon2.ico" </link>
<style>td, th { border-bottom: solid 1px #ececec;}
td {
	width:330px;
	padding:10px}
	
td:hover {
	background-color:#E1E1E1;
	border-radius:10px
	
}
.tdnohover {
	width:auto;
	padding:10px;
	text-align:left
}
.tdnohover:hover {
	background-color:transparent;
	
	border-radius:0px
}
	.fotoperfil {
	

	
	
	height: 150px;
	width: 150px;	
	}

.datosperfil {
	padding-left: 10px;
	float: left;
	}
.opcionesperfil {
	 margin-bottom:5px;
	  margin-top:5px;
	  font-size:14px;
	  width:150px;
	padding:5px; 
	background-color:#ebebeb
	}
.opcionesperfil:hover {
	cursor:pointer;
	background-color:#ccc
	}	
.usuariostr {
	"border-bottom: 1px solid #CCC;}
input {
	padding: 3px;
	border-radius: 3px;
	border: 1px solid #CCC;	
}
select { 
	padding:3px; 
	border-radius:3px;
	border: 1px solid #CCC;
	
}

/*.fotoperfil:hover {
	background-color:#ebebeb;
	opacity: 0.4; filter:blur(4px;
	background-color: rgba(0, 0, 0, 0.5
	box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.48)
	
	}*/
</style>
<!-- InstanceEndEditable -->

<link href="../../css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../../js/script.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

    
	<script type="text/javascript" src="../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	
    <link rel="stylesheet" type="text/css" href="../fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 

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

</head>

<body>

<div class="container">
<!-- InstanceBeginEditable name="Cabecera" --><div class="header">
  <?php require("../require/cabeceracarpetas.php"); ?>
    </div>
  <div class="sidebar1">
    </div><!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="content">
  <?php require("../require/menu.php"); ?> 
  <?php 
  $action = isset($_GET['action']) ? $_GET['action'] : NULL ;
  switch ($action):
  case "config": { ?>
  
  <div class="inicio" style="float:left; height:auto; width:910px">
  <h1><img src="../../img/iconos/1418285364_services.png" width="28" height="28" /> Configuración de tu cuenta</h1>
  <form action="<?php echo $editFormAction; ?>" method="post" name="form5" id="form5">
    <table align="center" style=" font-size:12px; text-align:left">
      <tr valign="baseline">
        <td class="tdnohover" nowrap="nowrap" align="right">¿Permitir que tu perfil sea público?</td>
        <td class="tdnohover"><input type="checkbox" name="Pperfil" value=""  <?php if (!(strcmp(htmlentities($row_Recordset1['Pperfil'], ENT_COMPAT, 'utf-8'),"1"))) {echo "checked=\"checked\"";} ?> /></td>
      </tr>
      <tr valign="baseline">
        <td class="tdnohover" nowrap="nowrap" align="right">¿Permitir que todos los usuarios vean tu e-mail y tu cédula?</td>
        <td class="tdnohover"><input type="checkbox" name="Pcorreo" value=""  <?php if (!(strcmp(htmlentities($row_Recordset1['Pcorreo'], ENT_COMPAT, 'utf-8'),"1"))) {echo "checked=\"checked\"";} ?> /></td>
      </tr>
      <tr valign="baseline">
        <td class="tdnohover" nowrap="nowrap" align="right">¿Permitir que los usarios conozcan tu identidad al subir un documento?</td>
        <td class="tdnohover"><input type="checkbox" name="Pidentidad" value=""  <?php if (!(strcmp(htmlentities($row_Recordset1['Pidentidad'], ENT_COMPAT, 'utf-8'),"1"))) {echo "checked=\"checked\"";} ?> /></td>
      </tr>
      <tr valign="baseline">
        <td class="tdnohover" nowrap="nowrap" align="right">&nbsp;</td>
        <td class="tdnohover"><input type="submit" class="opcionesperfil" style="width:auto" value="Guardar configuración" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form5" />
    <input type="hidden" name="Contador" value="<?php echo $row_Recordset1['Contador']; ?>" />
  </form>

  </div>
  
  
  <?php } 
  break;
  case "editar": { ?>
  <div class="inicio" style="float:left; width:942px; height:auto">
    <a href="<?php echo $logoutAction ?>"><div class="top2" style="width:auto; margin-left:10px"><img src="../../img/iconos/1411692928_user-logout.png" width="10" height="10" /> Cerrar sesión</div></a>
    
    
<a class="various2" href="../documentos/documento-agregar.php?d=2"><div class="top2" style="width:auto; margin-left:10px"><img src="../../img/agregados/1411615358_678092-sign-add-128.png" width="10" height="10" /> Agregar documento</div></a>  
     
     <div class="top"><img src="../../img/iconos/1418285152_money_bag.png" width="10" height="10" /> Créditos: <?php echo $row_Recordset1['Creditos']; ?>,00</div>
     
 <!--    <div class="top" style="width:auto; height:14px"><img src="../../img/iconos/1418291668_search.png" width="10" height="10" /> <input height="10px" style="height:8px; font-size:8px" type="search" /></div>-->   

     <div class="top" style="width:auto"><img src="../../img/iconos/1418290844_calendar.png" width="10" height="10" /> FDR: <?php echo $row_Recordset1['Fecharegistro']; ?></div> 
     
     <div class="top" style="width:auto"><img src="../../img/agregados/1410926052_user-group-128.png" width="10" height="10" /> Amigos: <?php echo $row_Recordset1['Documentos']; ?></div>
     
     <div class="top" style="width:auto"><img src="../../img/iconos/1418286037_View_Details.png" width="10" height="10" /> Documentos: <?php echo $row_Recordset1['Documentos']; ?></div>
     
     <div class="top" style="width:auto"><img src="../../img/iconos/contacto.png" width="10" height="10" /> <a class="lineado" href="../mensajes/mensajes.php?acc=sa&mopcion=1">Mensajes: 0</a></div>
     
     <div class="top" style="width:auto"><img src="../../img/iconos/1412129464_user.png" width="10" height="10" /> ID: <?php echo $row_Recordset1['Contador']; ?></div>
     
<a href="perfil.php?action=config"><div class="top2" style="width:auto; float:left"><img title="Configuración" src="../../img/iconos/1418285364_services.png" width="14" height="14" /></div></a>
  </div>
     <div class="inicio" style="float:left; width:auto; height:auto"><a href="?a=1">
     
     <img style="border-radius:3px" class="fotoperfil" style="" src="imgp/<?php if ($row_Recordset1['Imagen'])  
		   {?><?php echo $row_Recordset1['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="150" height="150" /></a><br />
            
            <?php 
if ($_GET['editar'] == "imagen") {  ?>
<a style="color:#000; text-decoration:none" href="perfil.php"><div class="opcionesperfil" style="width:140px;"><img src="../../img/iconos/1412129464_user.png" width="12" height="12" /> Ver perfil</a></div>
   <a style="color:#000; text-decoration:none;" href="perfil.php?action=editar&editar=datos"><div class="opcionesperfil" style="width:140px;"><img src="../../img/iconos/editar-usuario.png" width="14" height="14" /> Cambiar datos</div></a><?php } else {?>
   <a style="color:#000; text-decoration:none" href="perfil.php"><div class="opcionesperfil" style="width:140px;"><img src="../../img/iconos/1412129464_user.png" width="12" height="12" /> Ver perfil</a></div>
   <a style="color:#000; text-decoration:none;" href="perfil.php?action=editar&editar=imagen"><div class="opcionesperfil" style="width:140px;"><img src="../../img/iconos/imgeditar.png" width="14" height="14" /> Cambiar imagen</div></a><?php } ?>
   <div class="opcionesperfil" style="width:140px;"><a style="color:#000; text-decoration:none" href="perfil.php?action=editar&editar=contrasena"><img src="../../img/iconos/pe.png" width="12" height="12" /> Cambiar contrase&ntilde;a</a></div> 
  
   </div>
  
  
  <div class="inicio" style="float:left; width:749px; height:268px; font-size:12px">
  
  
  
 
      <?php  }
	  break;
	  
	  default: { ?><div style="float:left; width: 984px;">
  
  
  <div class="inicio" style="float:left; width:942px; height:auto">
    <a href="<?php echo $logoutAction ?>"><div class="top2" style="width:auto; margin-left:10px"><img src="../../img/iconos/1411692928_user-logout.png" width="10" height="10" /> Cerrar sesión</div></a>
    
    
<a class="various2" href="../documentos/documento-agregar.php?d=2"><div class="top2" style="width:auto; margin-left:10px"><img src="../../img/agregados/1411615358_678092-sign-add-128.png" width="10" height="10" /> Agregar documento</div></a>  
     
     <div class="top"><img src="../../img/iconos/1418285152_money_bag.png" width="10" height="10" /> Créditos: <?php echo $row_Recordset1['Creditos']; ?>,00</div>
     
 <!--    <div class="top" style="width:auto; height:14px"><img src="../../img/iconos/1418291668_search.png" width="10" height="10" /> <input height="10px" style="height:8px; font-size:8px" type="search" /></div>-->   

     <div class="top" style="width:auto"><img src="../../img/iconos/1418290844_calendar.png" width="10" height="10" /> FDR: <?php echo $row_Recordset1['Fecharegistro']; ?></div> 
     
     <div class="top" style="width:auto"><img src="../../img/agregados/1410926052_user-group-128.png" width="10" height="10" /> Amigos: <?php echo $row_Recordset1['Documentos']; ?></div>
     
     <div class="top" style="width:auto"><img src="../../img/iconos/1418286037_View_Details.png" width="10" height="10" /> Documentos: <?php echo $row_Recordset1['Documentos']; ?></div>
     
     <div class="top" style="width:auto"><img src="../../img/iconos/contacto.png" width="10" height="10" /> <a class="lineado" href="../mensajes/mensajes.php?acc=sa&mopcion=1">Mensajes: 0</a></div>
     
     <div class="top" style="width:auto"><img src="../../img/iconos/1412129464_user.png" width="10" height="10" /> ID: <?php echo $row_Recordset1['Contador']; ?></div>
     
<a href="perfil.php?action=config"><div class="top2" style="width:auto; float:left"><img title="Configuración" src="../../img/iconos/1418285364_services.png" width="14" height="14" /></div></a>
  </div>
  <div class="inicio" style="float:left; width:auto; height:auto">
  <?php 
    $open = 0;
if (isset($_GET['act']))
  $open = $_GET['act'];
  $_GET ['act'] = '1';
   if ($_GET ['act'] == $open) { ?>
  
  Actualizado
<?php } else { ?>
  
  
  <div class="" style="width:150px; float:left"><a id="example2" href="imgp/<?php if ($row_Recordset1['Imagen'])  
		   {?><?php echo $row_Recordset1['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>"><img class="fotoperfil" style="border-radius:3px" src="imgp/<?php if ($row_Recordset1['Imagen'])  
		   {?><?php echo $row_Recordset1['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="150" height="150" /></a><br />
   <div class="opcionesperfil" style="width:140px;"><a style="color:#000; text-decoration:none;" href="perfil.php?action=editar&editar=datos"><img src="../../img/iconos/editar-usuario.png" width="12" height="12" /> Editar perfil</a></div>
   <div class="opcionesperfil" style="width:140px;"><a style="color:#000; text-decoration:none" href="../documentos/mis-documentos.php"><img src="../../img/iconos/1413095094_678084-folder-512.png" width="12" height="12" /> Mis documentos</a></div> 
  
</div></div>

  <div class="inicio" style="float:left; width:auto; height:auto">
<table style="text-align:left; float:left; font-size:12px" width="auto" border="0" cellspacing="2" cellpadding="2">

<h3><img src="../../img/iconos/1412129464_user.png" width="14" height="14" /> Datos personales</h3>
  
  
  <tr>
    
    <td class="td"><strong>Nombre:</strong> <?php echo $row_Recordset1['Nombre']; ?> <?php echo $row_Recordset1['Apellido']; ?></td>
  </tr>
  

  
    
    <td class="td"><strong>Género:</strong> <?php if ($row_Recordset1['Sexo'] == 1) echo "Hombre";
	if ($row_Recordset1['Sexo'] == 2) echo "Mujer";
	 ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Correo:</strong> <?php switch ($row_Recordset1['Pcorreo']):
	

	case 0:
	 { ?><a class="completar" style="padding:3px; margin:0px; font-size:10px; float:none; cursor:auto; color:#CC3333; width:140px">Este e-mail no es público</a> <?php 
	 }
	 break;
	 
	 default: echo $row_Recordset1['Correo'];
	 
	 endswitch;
	 ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Cédula:</strong> <?php switch ($row_Recordset1['Pcorreo']):
	
	case 0:
	 { ?><a class="completar" style="padding:3px; margin:0px; font-size:10px; float:none; cursor:auto; color:#CC3333; width:140px">Esta cédula no es pública</a> <?php 
	 }
	 break;
	 
	 default: { ?><?php if ($row_Recordset1['Tipocedula'] == 1) echo "V-";
	if ($row_Recordset1['Tipocedula'] == 2) echo "E-";
	 ?><?php echo $row_Recordset1['Cedula']; ?><?php }
	 
	 endswitch;
	 ?>
  
   </td>
  </tr>
  <tr>
  
    <td class="td"><strong>Teléfono:</strong> <?php echo $row_Recordset1['Telefono']; ?></td>
  </tr>
 
  </table><div>
  
  
  </div></div>
  
  <div class="inicio" style="float:left; width:auto; height:auto">
<table style="text-align:left; float:left; font-size:12px" width="auto" border="0" cellspacing="2" cellpadding="2">

<?php switch ($row_Recordset1['Rango']):
case 2: { ?><h3><img src="../../img/iconos/trabajo.png" width="18" height="18" /> Datos laborales</h3><?php }
break;
default: {?><h3><img src="../../img/iconos/1418283112_graduation_cap.png" width="18" height="18" /> Datos académicos</h3><?php } 

 endswitch;?>

 
  <tr>
  
    <td class="td"><strong>Universidad:</strong> <?php 
	if  ($row_Recordset1['Universidad'] == 0) 
	echo "No especificado";
	if  ($row_Recordset1['Universidad'] == 1) 
	echo "Universidad Bicentenaria de Aragua";
	if  ($row_Recordset1['Universidad'] == 2) 
	echo "Universidad Central de Venezuela";
	if  ($row_Recordset1['Universidad'] == 3) 
	echo "Universidad Simón Bolívar";
	if  ($row_Recordset1['Universidad'] == 4) 
	echo "Universidad de Carabobo";
	if  ($row_Recordset1['Universidad'] == 5) 
	echo "Universidad de Los Andes";
	if  ($row_Recordset1['Universidad'] == 6) 
	echo "Universidad Arturo Michelena";
	if  ($row_Recordset1['Universidad'] == 8) 
	echo "Universidad sin sistema";
	 ?></td>
  </tr>
  <tr>
  
    <td class="td"><strong>Sede:</strong> <?php 
	if  ($row_Recordset1['Sede'] == 0) 
	echo "No especificado";
	if  ($row_Recordset1['Sede'] == 1) 
	echo "San Joaquín de Turmero";
	if  ($row_Recordset1['Sede'] == 2) 
	echo "San Antonio de los altos";
	if  ($row_Recordset1['Sede'] == 3) 
	echo "San Fernando de Apure";
	if  ($row_Recordset1['Sede'] == 4) 
	echo "Puerto Ordaz";
	
	 ?></td>
  </tr>
  <?php if($row_Recordset1['Rango'] == 2)  { ?> 
   <tr>
    
    <td class="td"><strong>Materia(s):</strong> <?php 
	echo $row_Recordset1['Materia']; ?>
	</td>
     
  </tr>
  <tr>
    
    <td class="td"><strong>Verificación:</strong> <?php 
	if ($row_Recordset1['Vperfil'] == 1)
	 {?>Verificado <img src="../../img/iconos/pequeno.png" width="12" height="12" />
      <?php } 
	if ($row_Recordset1['Vperfil'] == 0)
	 { ?>No verificado <a href=""><strong style="color:#FF4A4A">(VERIFICAR)</strong></a><?php } ?>
	</td>
     
  </tr>
  
  
  
  <?php } else  {?>
  <tr>
    
    <td class="td"><strong>Carrera:</strong> <?php 
	if  ($row_Recordset1['Carrera'] == 0) 
	echo "No especificado";
	if  ($row_Recordset1['Carrera'] == 1) 
	echo "Ingeneria en sistemas";
	if  ($row_Recordset1['Carrera'] == 2) 
	echo "Ingeneria electrica";
	if  ($row_Recordset1['Carrera'] == 3) 
	echo "Administración de empresas";
	if  ($row_Recordset1['Carrera'] == 4) 
	echo "Derecho";
	if  ($row_Recordset1['Carrera'] == 5) 
	echo "Psicología";
	if  ($row_Recordset1['Carrera'] == 6) 
	echo "Comunicación social";
	if  ($row_Recordset1['Carrera'] == 7) 
	echo "Contaduría pública";
	 ?></td>
     
  </tr>
  
  <tr>
    
    <td class="td"><strong>Semestre:</strong> <?php 
	if ($row_Recordset1['Semestre'] == 0) echo "No especificado";
	if ($row_Recordset1['Semestre'] == 1) echo "1er semestre";
	if ($row_Recordset1['Semestre'] == 2) echo "2do semestre";
	if ($row_Recordset1['Semestre'] == 3) echo "3er semestre";
	if ($row_Recordset1['Semestre'] == 4) echo "4to semestre";
	if ($row_Recordset1['Semestre'] == 5) echo "5to semestre";
	if ($row_Recordset1['Semestre'] == 6) echo "6to semestre";
	if ($row_Recordset1['Semestre'] == 7) echo "7mo semestre";
	if ($row_Recordset1['Semestre'] == 8) echo "8vo semestre";
	if ($row_Recordset1['Semestre'] == 9) echo "9no semestre";
	if ($row_Recordset1['Semestre'] == 10) echo "10mo semestre";
	 ?></td>
  </tr>
<?php } ?>
  <tr>
    
    <td class="td"><strong>Ocupación:</strong> <?php if ($row_Recordset1['Rango'] == 1) echo "Estudiante";
	if ($row_Recordset1['Rango'] == 2) echo "Profesor";
	if ($row_Recordset1['Rango'] == 5) echo "Administrador"; ?></td>
  </tr>
  

</table>

<div></div></div>

<div class="inicio" style="float:left; width:942px; height:auto; font-size:12px">
<marquee scrollamount="5">


<img src="../../img/iconos/1409342503_error.png" width="10" height="10" /> Cualquier problema o error escribenos al correo electronico <strong>contacto@archivonline.com.ve</strong>



</marquee>
    
  </div>

  <!--<div class="inicio" style="float:left; font-size:14px; width:auto; height:auto"><a href="../servicios/impresiones.php" target="_blank"><img src="http://i1287.photobucket.com/albums/a621/jmanuelpereira/IMPRESION2_zpsdsgzqgb9.gif" border="0" alt=" photo IMPRESION2_zpsdsgzqgb9.gif"/></a>
</div>-->


</div><?php } }
	  
	  endswitch;
	 
	  $editar = isset($_GET['editar']) ? $_GET['editar'] : NULL ;
	  switch($editar):
	 
	  
	  
	  
	  case "contrasena": { ?>
      <form style="float:left" action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="left" class="tdnohover">Contraseña nueva:</td>
            <td class="tdnohover"><input type="password" name="Contrasena" value="" size="32" /></td>
          </tr>
           <tr valign="baseline">
            <td  nowrap="nowrap" align="left" class="tdnohover">Repetir contraseña:</td>
            <td class="tdnohover"><input type="password" name="Contrasenarepetir" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td class="tdnohover" nowrap="nowrap" align="left">&nbsp;</td>
            <td align="right" class="tdnohover"><input type="submit" class="opcionesperfil" style="width:auto" value="Cambiar contraseña" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form3" />
        <input type="hidden" name="Contador" value="<?php echo $row_Recordset1['Contador']; ?>" />
      </form>
      <?php }
	  break;
	  case "imagen": {
	   ?>

   <script>
function subirimagen(nombrecampo)
{
	self.name = 'opener';
	remote = open('../acciones/subir-imagen.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script>
    <form action="<?php echo $editFormAction; ?>" method="POST" name="form2" id="form2">
       <table align="center" style="float:left"><tr  valign="baseline">
           <td  nowrap="nowrap" align="right" class="tdnohover">Imagen:</td>
           <td class="tdnohover"><input type="text" id="Imagen" name="Imagen" value="" size="28" /> 
           <input style="width:auto; font-size:12px; padding:3px"  name="button" type="button" class="opcionesperfil" id="button2" onClick="javascript:subirimagen('Imagen');" value="Seleccionar archivo"/></td>
         </tr>
         <tr valign="baseline">
           <td nowrap="nowrap" align="right" class="tdnohover"></td>
           <td class="tdnohover"><input type="submit" class="opcionesperfil" style="float:right" value="Actualizar" /></td>
         </tr>
         <input type="hidden" name="Contador" value="<?php echo $row_Recordset1 ['Contador']; ?>" />
      </table>
       <input type="hidden" name="MM_update" value="form2" />
       </form><?php }  
	   break;
	   
	   
	   case "datos": { ?>
  

   <div style="float:left; margin-left:10px">
     <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
       <table align="center" style="float:left">
        
         <tr valign="baseline">
           <td nowrap="nowrap" align="right" class="tdnohover">Nombre:</td>
           <td class="tdnohover"><input type="text" name="Nombre" value="<?php echo htmlentities($row_Recordset1['Nombre'], ENT_COMPAT, 'utf-8'); ?>" size="28" /></td>
         </tr>
         <tr valign="baseline">
           <td nowrap="nowrap" align="right" class="tdnohover">Apellido:</td>
           <td class="tdnohover"><input type="text" name="Apellido" value="<?php echo htmlentities($row_Recordset1['Apellido'], ENT_COMPAT, 'utf-8'); ?>" size="28" /></td>
         </tr>
       <!--  <tr valign="baseline">
           <td nowrap="nowrap" align="right">Correo:</td>
           <td><input type="text" name="Correo" value="<?php echo htmlentities($row_Recordset1['Correo'], ENT_COMPAT, 'utf-8'); ?>" size="28" /></td>
         </tr>         <tr valign="baseline">
           <td nowrap="nowrap" align="right">Usuario:</td>
           <td><input type="text" name="Usuario" value="<?php echo htmlentities($row_Recordset1['Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="28" /></td>
         </tr>-->

         
         <!--<tr valign="baseline">
           <td nowrap="nowrap" align="right">CA:</td>
           <td><input type="text" name="Correoalternativo" value="<?php echo htmlentities($row_Recordset1['Correoalternativo'], ENT_COMPAT, 'utf-8'); ?>" size="28" /></td>
         </tr>-->
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Género:</td>
           <td class="tdnohover"><select name="Sexo">
             <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Sexo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Hombre</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Sexo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Mujer</option>
           </select></td>
         </tr>
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Cédula:</td>
           <td class="tdnohover"><select name="Tipocedula">
         
             <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Tipocedula'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>V-</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Tipocedula'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>E-</option>
             <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Tipocedula'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>J-</option>
           </select> <input type="text" name="Cedula" value="<?php echo htmlentities($row_Recordset1['Cedula'], ENT_COMPAT, 'utf-8'); ?>" size="21" /></td>
         </tr>
          <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Teléfono:</td>
           <td class="tdnohover"><input type="text" name="Telefono" value="<?php echo htmlentities($row_Recordset1['Telefono'], ENT_COMPAT, 'utf-8'); ?>" size="28" /></td>
         </tr>
         </table><table style="float:left">
       
         
         
        
         
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Universidad:</td>
           <td class="tdnohover"><select name="Universidad">
           <option value="0" <?php if (!(strcmp(0, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Escoge una universidad</option>
           
             <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Universidad Bicentenaria de Aragua</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Universidad Central de Venezuela</option>
              <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Universidad Simón Bolívar</option>
               <option value="4" <?php if (!(strcmp(4, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Universidad de Carabobo</option>
                <option value="5" <?php if (!(strcmp(5, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Universidad de Los Andes</option>
                <option value="6" <?php if (!(strcmp(6, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Universidad Arturo Michelena</option>
           </select></td>
         </tr>
         
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Sede:</td>
           <td class="tdnohover"><select name="Sede">
           <option value="0" <?php if (!(strcmp(0, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Escoge una sede</option>
             <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Principal</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>San Antonio de Los Altos</option>
             <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>San Fernando de Apure</option>
             <option value="4" <?php if (!(strcmp(4, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Puerto Ordaz</option>
           </select></td>
         </tr>
         <?php if($row_Recordset1['Rango'] == 2) {?>
		 
		 <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Materia(s):</td>
           <td class="tdnohover"><input type="text" name="Materia" value="<?php echo htmlentities($row_Recordset1['Materia'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Materia(s) que ense&ntilde;as" size="28" /><br />


<p style="font-size:11px; padding-left:0px; color:#FF3E3E">Si son varias separalas con una coma.</p></td>
           
         </tr>
         
		 
		 <?php } else {?>
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Carrera:</td>
           <td class="tdnohover"><select name="Carrera">
           <option value="0" <?php if (!(strcmp(0, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Selecciona tu carrera</option>
             <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Ingeneria en sistemas</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Ingeneria electrica</option>
             <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Administración de empresas</option>
             <option value="4" <?php if (!(strcmp(4, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Derecho</option>
             <option value="5" <?php if (!(strcmp(5, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Psicología</option>
             <option value="6" <?php if (!(strcmp(6, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Comunicación social</option>
             <option value="7" <?php if (!(strcmp(7, htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Contaduría pública</option>
           </select></td>
         </tr>
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right">Semestre:</td>
           <td class="tdnohover"><select name="Semestre">
           <option value="0" <?php if (!(strcmp(0, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Semestre</option>
             <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>1er semestre</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>2do semestre</option>
             <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>3er semestre</option>
             <option value="4" <?php if (!(strcmp(4, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>4to semestre</option>
             <option value="5" <?php if (!(strcmp(5, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>5to semestre</option>
             <option value="6" <?php if (!(strcmp(6, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>6to semestre</option>
             <option value="7" <?php if (!(strcmp(7, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>7mo semestre</option>
             <option value="8" <?php if (!(strcmp(8, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>8vo semestre</option>
             <option value="9" <?php if (!(strcmp(9, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>9no semestre</option>
             <option value="10" <?php if (!(strcmp(10, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>10mo semestre</option>
           </select></td>
         </tr><?php } ?> 
         <tr valign="baseline">
           <td class="tdnohover" nowrap="nowrap" align="right"></td>
           <td class="tdnohover"><input type="submit" class="opcionesperfil" style="float:right" value="Actualizar" /></td>
         </tr>
         
         
           
         
       </table>
        <input type="hidden" name="MM_update" value="form1" />
       <input type="hidden" name="Contador" value="<?php echo $row_Recordset1 ['Contador']; ?>" />
       
       <input type="hidden" name="Vperfil" value="1" />
     </form>
    
     <!--<div class="completar" style="width:auto; padding:5px; margin-left:50px; float:right; margin-top:0px; cursor:auto"><p style="color:#CC3333; font-size:11px; padding:0px; margin-bottom:0px; padding-bottom:0px">Luego de actualizar tus datos es necesario que cierres sesión y vuelvas a iniciar para poder ver los cambios en el inicio de la pagina.</p>
 </div>-->
 
 
 
 		</div>
 
   
   
    <?php }  break; default: { ?>
   


  
  
 
  
 
    </div>
<?php } 




  endswitch;?>
  <?php if(isset($_GET['editar']))  echo "</div></div>"; 
  else "";?>

  <!-- InstanceEndEditable -->
 
  <div class="footer"> <!-- InstanceBeginEditable name="Footer" --><?php require("../require/pie.php"); ?><!-- InstanceEndEditable --></div>
	
	
  <!-- end .container --></div>
    <?php } else {?>
  <script>
  location.href = "../../index.php";</script>
  <?php }?>
</body>
<!-- InstanceEnd --></html>

<?php
mysql_free_result($Recordset1);
?>

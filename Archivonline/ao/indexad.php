<?php require_once('../Connections/archivo.php'); ?>
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
	
  $logoutGoTo = "../index.php";
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

$maxRows_Recordset2 = 8;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_archivo, $archivo);
$query_Recordset2 = "SELECT * FROM documentos ORDER BY documentos.Contador DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $archivo) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$maxRows_Recordset2 = 5;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_archivo, $archivo);
$query_Recordset2 = "SELECT * FROM documentos WHERE documentos.Categoria = 1 ORDER BY documentos.Contador DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $archivo) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
<?php
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

$maxRows_Usuariosr = 100;
$pageNum_Usuariosr = 0;
if (isset($_GET['pageNum_Usuariosr'])) {
  $pageNum_Usuariosr = $_GET['pageNum_Usuariosr'];
}
$startRow_Usuariosr = $pageNum_Usuariosr * $maxRows_Usuariosr;

mysql_select_db($database_archivo, $archivo);
$query_Usuariosr = "SELECT * FROM usuarios ORDER BY usuarios.Contador DESC";
$query_limit_Usuariosr = sprintf("%s LIMIT %d, %d", $query_Usuariosr, $startRow_Usuariosr, $maxRows_Usuariosr);
$Usuariosr = mysql_query($query_limit_Usuariosr, $archivo) or die(mysql_error());
$row_Usuariosr = mysql_fetch_assoc($Usuariosr);

if (isset($_GET['totalRows_Usuariosr'])) {
  $totalRows_Usuariosr = $_GET['totalRows_Usuariosr'];
} else {
  $all_Usuariosr = mysql_query($query_Usuariosr);
  $totalRows_Usuariosr = mysql_num_rows($all_Usuariosr);
}
$totalPages_Usuariosr = ceil($totalRows_Usuariosr/$maxRows_Usuariosr)-1;
?>
<?php if (!isset($_SESSION)) {
  session_start();
} ?>
<?php require("require/funciones.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/base.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../img/iconos/favicon2.ico" </link>

<title>Archivo Online</title>

 <?php

  
   if (isset($_SESSION['MM_Username'])) 
    {?>

<!-- InstanceBeginEditable name="head" -->
<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style>
td {
	border-bottom: solid 1px #ccc;
	font-size: 10px;
}
td {
	width:130px;
	padding:5px}
.td2 {
	width:350px;
	padding:10px;
	font-size: 14px;
	border-bottom: solid 1px #ececec;
	
	}
.tdnohover {
	width:auto;
	padding:10px;
	text-align:left;
	border-bottom: solid 1px #ececec;
}
.tdnohover:hover {
	background-color:transparent;
	
	border-radius:0px
}
.recientes3:hover {
	
}
.contactar {
	font-size:9px;
	background-color:#CCC;
	border:#999 solid 1px;
	width:48px;
	padding:1px;
	text-align:center;
	cursor:pointer
	
	
	
	}
h6 {
	margin:0px}
	
	.recientes3 {
	box-shadow: 0 0 10px #ccc;
    -webkit-box-shadow: 0 0 10px #ccc;
    -moz-box-shadow: 0 0 10px #ccc;
    border:1px solid #ccc;
	border-radius:3px;
	background-color: #f7f7f7;
	margin: 5px;
	padding: 5px;
	
	width: 210px;
	
	height: 20px;
}
input {
	padding: 3px;
	border-radius: 3px;
	border: 1px solid #CCC;	
}
</style>
<!-- InstanceEndEditable -->

<link href="../css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../js/script.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

    
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 

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
<!-- InstanceBeginEditable name="Cabecera" -->
  <div class="header">
  <?php require("require/cabecera.php"); ?>
    </div>
  <div class="sidebar1">
    </div><!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="content" style="height:550px">
  
  <?php 
  $action = isset($_GET['action']) ? $_GET['action'] : NULL ;
  switch ($action):
  case "UsuariosNuevoss": { ?>FUNCIONAAAA <?php }
   break;
  
  case "UsuariosNuevos": { ?>
  
  
  
 <?php do { ?>
     <div class="usariosrecientes" style=" width:195px">
        
       <a id="example2" href="usuarios/imgp/<?php if ($row_Usuariosr['Imagen'])  
		   {?><?php echo $row_Usuariosr['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>"><img style="float:left; border-radius:3px" src="usuarios/imgp/<?php if ($row_Usuariosr['Imagen'])  
		   {?><?php echo $row_Usuariosr['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="50" height="50" /> </a>
        
       <div style="margin-left:40px"><h3 style="padding-top:5px; margin-bottom:0px"><?php echo $row_Usuariosr['Nombre']; ?> <?php echo $row_Usuariosr['Apellido']; ?></h3>
         <h4 style="padding-top:5px; margin-bottom:0px; padding-right:0px"><?php 
	if  ($row_Usuariosr['Universidad'] == 0) 
	echo "U.B.A";
	if  ($row_Usuariosr['Universidad'] == 1) 
	echo "U.B.A";
	if  ($row_Usuariosr['Universidad'] == 2) 
	echo "U.C.V";
	if  ($row_Usuariosr['Universidad'] == 3) 
	echo "U.S.B";
	if  ($row_Usuariosr['Universidad'] == 4) 
	echo "U.C";
	if  ($row_Usuariosr['Universidad'] == 5) 
	echo "U.L.A";
	if  ($row_Usuariosr['Universidad'] == 6) 
	echo "U.A.M";
	if  ($row_Usuariosr['Universidad'] == 8) 
	echo "OTRA";
	 ?>, <?php 
	if  ($row_Usuariosr['Sede'] == 0) 
	echo "Sin espesificar";
	if  ($row_Usuariosr['Sede'] == 1) 
	echo "San Joaquín";
	if  ($row_Usuariosr['Sede'] == 2) 
	echo "San Antonio de los altos";
	if  ($row_Usuariosr['Sede'] == 3) 
	echo "San Fernando de Apure";
	if  ($row_Usuariosr['Sede'] == 4) 
	echo "Puerto Ordaz"; ?></h4>
       <a class="various2" href="usuarios/agregar.php?action=<?php echo $row_Usuariosr['Contador']; ?>" style="padding-top:5px; margin-bottom:0px; float:right; text-decoration: underline;
	cursor:pointer"><img src="../img/agregados/1411615358_678092-sign-add-128.png" width="8" height="8" /> Agregar a conocidos</a></div>
        
        
        
        
     </div>
      <?php } while ($row_Usuariosr = mysql_fetch_assoc($Usuariosr)); ?>
  
  
 
  
  
  
  
  
  
  <?php
   }
   break;
   
   
   default: {
   
    ?>
  
  <?php require("require/menuindex.php"); ?>
  
   <?php require("require/contenidoindex.php"); ?>
  <?php }
  endswitch; ?>
  </div>
  <!-- InstanceEndEditable -->
 
  <div class="footer"> <!-- InstanceBeginEditable name="Footer" -->
   <?php require("require/pie.php"); ?>
    <!-- end .footer --><!-- InstanceEndEditable --></div>
	
	
  <!-- end .container --></div>
    <?php } else {?>
  <script>
  location.href = "../../index.php";</script>
  <?php }?>
</body>
<!-- InstanceEnd --></html>

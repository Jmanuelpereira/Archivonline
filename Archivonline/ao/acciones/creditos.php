
<?php require_once('../../Connections/archivo.php'); ?>
<?php require_once('../../Connections/archivo.php'); 




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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO creditos (Cantidad, Comprador, Recibo) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Cantidad'], "double"),
                       GetSQLValueString($_POST['Comprador'], "text"),
                       GetSQLValueString($_POST['Recibo'], "int"));
					   
					  

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());

  $insertGoTo = "creditos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

 if (!isset($_SESSION)) {
  session_start();
}




$varDato_Recordset1 = "0";
if (isset($_SESSION['MM_Username'])) {
  $varDato_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varDato_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

$totalRows_Recordset1 = "0";
if (isset($_SESSION['MM_Username'])) {
  $totalRows_Recordset1 = $_SESSION['MM_Username'];
}

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varDato_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE usuarios SET Creditos=%s WHERE Contador=%s",
                       GetSQLValueString($_POST['Creditos'], "int"),
                       GetSQLValueString($_POST['Contador'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($updateSQL, $archivo) or die(mysql_error());
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
<style>td, th { border-bottom: solid 1px #ececec;}
td {
	;
	padding:10px}
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
	padding:5px; 
	background-color:#ebebeb
	}
.opcionesperfil:hover {
	cursor:pointer;
	background-color:#ccc
	}	
.usuariostr {
	"border-bottom: 1px solid #CCC;}

.fotoperfil:hover {
	background-color:#ebebeb;
	opacity: 0.4; filter:blur(4px;
	background-color: rgba(0, 0, 0, 0.5
	box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.48) }
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:14px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
  border-bottom: 1px solid #22262e;
}
tr:nth-child(odd):hover td {
  background:#4E5066;
}
th {
  color:#D5DDE5;;
  background:#6a92bf;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:14px;
  font-weight: 100;
  padding:10px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  

 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 


tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:10px;
  text-align:left;
  vertical-align:middle;
  font-weight:50;
  font-size:14px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;

  padding:5px;

  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
	
	
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
 
  
 
<!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="content">
  <?php require("../require/menucarpetas.php"); ?>
  
  <div class="inicio" style="float:left; width:950px; height:auto">
  <?php
  
  
if (isset($_GET['cmp'])) 
  $cmp = $_GET['cmp'];

   if ($_GET['cmp'] == "150") { ?>
  <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
    <table align="left">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Cantidad:</td>
        <td><input type="text" name="Cantidad" value="<?php echo  $_GET['cmp'] ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Comprador:</td>
        <td><input type="text" name="Comprador" value="<?php echo $_SESSION['MM_Username']; ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Monto:</td>
        <td><input type="text" name="Recibo" value="<?php echo  $_GET['cmp'] * 0.8 ?>" size="32" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" class="opcionesperfil" value="Comprar" /></td>
      </tr>
    </table>
    <input type="hidden" name="Creditos" value="<?php echo  $_GET['cmp'] + $row_Recordset1['Creditos']; ?>" />
    <input type="hidden" name="Contador" value="<?php echo $row_Recordset1['Contador']; ?>" />
    <input type="hidden" name="MM_insert" value="form1" />
    <input type="hidden" name="MM_update" value="form1" />
  </form>
 
  <div style="float:right">
  <img  src="../../img/agregados/banesco.jpg" width="120" height="50" />
  <img src="../../img/agregados/mercantil.jpg" width="120" height="50" />
  <img src="../../img/agregados/provincial.jpg" width="120" height="50" />
  </div>
  <p><br />
    
  </p>
  <div style="float:right; margin-top:20px">
  <table width="370" class="table-fill" style="font-size:12px" border="1">
  
    <th width="99">Mercantil</th>
    <td width="255"  class="text-left">Cta corriente:</td>
  </tr>
  <tr>
    <th>Banesco</th>
    <td class="text-left">Cta corriente:</td>
  </tr>
  <tr>
    <th>Provincial</th>
    <td class="text-left">Cta corriente:</td>
  </tr>

 
</table>


</div>
<?php } else  { ?>
  <a href="creditos.php?cmp=150"><div style="width:150px; float:left">
  <img src="../../img/agregados/150.jpg" width="155" height="150" /><br />

  </div></a>
  
<?php } ?>
  </div>
 
  </div>
  <!-- InstanceEndEditable -->
 
  <div class="footer"> <!-- InstanceBeginEditable name="Footer" -->
    <?php require("../require/pie.php"); ?>
  <!-- InstanceEndEditable --></div>
	
	
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

<?php require_once('../../Connections/archivo.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO impresiones (Documento, Cliente, Fecha, Urgencia, Monto) VALUES (%s, %s, NOW(),%s, %s)",
                       GetSQLValueString($_POST['Documento'], "text"),
                       GetSQLValueString($_POST['Cliente'], "text"),
                       GetSQLValueString($_POST['Urgencia'], "int"),
                       GetSQLValueString($_POST['Monto'], "text"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());

  $insertGoTo = "imprimir.php?ik=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$varCon_Recordset1 = "0";
if (isset($_GET['Documento'])) {
  $varCon_Recordset1 = $_GET['Documento'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM documentos WHERE documentos.Contador = %s", GetSQLValueString($varCon_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$varDao_Recordset2 = "0";
if (isset($_SESSION['MM_Username'])) {
  $varDao_Recordset2 = $_SESSION['MM_Username'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset2 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varDao_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $archivo) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

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
	box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.48)
	
	}
</style>
<script src="../../SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
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
  
  <?php
  $new = "2";
if (isset($_GET['ik'])) 
  $new = $_GET['ik'];
$_GET ['ik'] = '1';
   if ($_GET['ik'] == $new) { ?>
  <div class="exito2" style="float:left; font-size:12px; width:450px; margin-top:180px; margin-left:290px; height:auto">Tu impresion fue procesada de manera exitosa, responderemos tu solicitud en breve, recuerda que es necesario que anotes el numero de comprobante para poder entregarte la impresión.<br />
<br />
Los detalles de tu compra podras verlos <br />
<br />
<a href="../usuarios/mis-compras.php">AQUÍ</a></div><?php } else {?>
  
  <div class="inicio" style="float:left; font-size:12px; width:450px; height:auto"><h1>Imprimir documento #<?php echo $_GET['Documento'] ?></h1>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Cliente:</td>
          <td><input type="text" readonly="readonly" name="Cliente" value="<?php echo $_SESSION['MM_Username']; ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Color:</td>
          <td><span id="spryradio1">
            <label style="float:left; padding:5px">
              <input type="radio" name="Urgencia" value="1" id="Urgencia" />
              Blanco y negro</label>
      
            <label style="float:left; padding:5px; margin-left:10px">
              <input type="radio" name="Urgencia" value="2" id="Urgencia" />
              Color</label>
            <br />
          <span class="radioRequiredMsg"></span></span></td>
        </tr>


        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Monto:</td>
          <td><input type="text" readonly="readonly"name="Monto" value="Crd.<?php
		  $precio = 2;
		  $cantidad = $row_Recordset1['Paginas'];
		  
		  echo ( $precio * $cantidad) + 5

		   ?>,00" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input class="opcionesperfil" style="float:right; width:120px" type="submit" value="Imprimir documento" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
      
      <input type="hidden" name="Documento" value="<?php echo $_GET['Documento']?>" size="32" />
      
      <input type="hidden" name="Verificacion" value="5" size="32" />
    </form>
    <p>&nbsp;</p>
  </div>
  
  <?php }?>
  </div>
  <!-- InstanceEndEditable -->
 
  <div class="footer"> <!-- InstanceBeginEditable name="Footer" -->
    <?php require("../require/pie.php"); ?>
  <script type="text/javascript">
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
  </script>
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

mysql_free_result($Recordset2);


?>

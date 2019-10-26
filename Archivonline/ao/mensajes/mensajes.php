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
  $insertSQL = sprintf("INSERT INTO mensajes (Asunto, Contenido, Emisor, Receptor, Fecha) VALUES (%s, %s, %s, %s, NOW())",
                       GetSQLValueString($_POST['Asunto'], "text"),
                       GetSQLValueString($_POST['Contenido'], "text"),
                       GetSQLValueString($_POST['Emisor'], "text"),
                       GetSQLValueString($_POST['Receptor'], "text"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());

  $insertGoTo = "../indexad.php?acc=enviado";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 require_once('../../Connections/archivo.php') ?>
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
<style>


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
  <?php require("../require/menu.php"); ?>
  
  
<div class="inicio" style="float:left; width:760px">
<?php


 if ($_GET['acc'] == "enviado" and $_GET['acc'] == "mensaje" and $_GET['mopcion'] == 2) echo "Tu mensaje fue enviado"; else {?>

<div style="float:left; width:760px">

<h1 style="float:left"><img src="../../img/agregados/1411668363_Mail -2.png" width="28" height="28" /> Buzón de mensajes</h1><?php if ($_GET['mopcion'] == 1) {  ?><a href="mensajes.php?acc=mensaje&mopcion=2"><div class="opcionesperfil" style="float:right"> Escribir mensaje</div></a><?php } ?>

</div>

<?php 
 switch ($_GET['mopcion']):
        case '1':
             { ?><div class="mensaje">

<img style="float:left; margin-right:10px" src="../../img/iconos/contacto.png" width="20" height="20" />
<p style="margin:0px; padding:0px; padding-top:3px">Hola jose te escribo par saber si ya subiste el documento que necesitamos para elaborar el trabajo de fisica y el de matematicas.</p>
<br />
<br />




  <p style="margin:0px; padding:0px; float:right; padding-top:3px; font-size:10px"> Jose Pereira</p>


</div><?php };
            break;
            case '2':
            {?>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
  <table align="left">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td><input type="text" placeholder="Asunto" name="Asunto" value="" size="32" /></td>
    </tr>
     <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td><input type="text" placeholder="¿A quien quieres enviar el mensaje?" name="Receptor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top"></td>
      <td><textarea style="resize:none" name="Contenido" placeholder="Escribe tu mensaje" cols="90" rows="15"></textarea></td>
    </tr>


  
   
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" class="opcionesperfil" style="float:right" value="Enviar mensaje" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
      <input type="hidden" name="Emisor" value="<?php echo $_SESSION['MM_Username']; ?>" size="32" />
</form>
<p>&nbsp;</p>
<?php }
            break;
			case '5': { ?>Tu mensaje ha sido enviado de manera exitosa <?php }
			break;
            default:
                echo "No existe este rango";


 endswitch;

}
?>



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


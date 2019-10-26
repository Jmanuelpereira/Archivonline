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
  $insertSQL = sprintf("INSERT INTO denuncias (Denunciante, Razon, Comentario, NDD) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Denunciante'], "text"),
                       GetSQLValueString($_POST['Razon'], "int"),
                       GetSQLValueString($_POST['Comentario'], "text"),
                       GetSQLValueString($_POST['NDD'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());

  $insertGoTo = "denunciar.php?dk=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_archivo, $archivo);
$query_DetailRS1 = "SELECT * FROM documentos";
$DetailRS1 = mysql_query($query_DetailRS1, $archivo) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$varDato_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $varDato_DetailRS1 = $_GET['recordID'];
}
$varBuscador_DetailRS1 = "0";
if (isset($_GET['Buscador'])) {
  $varBuscador_DetailRS1 = $_GET['Buscador'];
}
mysql_select_db($database_archivo, $archivo);
$query_DetailRS1 = sprintf("SELECT * FROM documentos WHERE documentos.Contador = %s AND documentos.Codigo = %s", GetSQLValueString($varDato_DetailRS1, "int"),GetSQLValueString($varBuscador_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $archivo) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 if (!isset($_SESSION)) {
  session_start();
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/base.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../../img/iconos/favicon2.ico" </link>
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
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
<script src="../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->

<link href="../../css/estilos.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../../css/styles.css">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
if (isset($_GET['dk'])) 
  $new = $_GET['dk'];
$_GET ['dk'] = '1';
   if ($_GET['dk'] == $new) { ?><div class="exito2" style="float:left; font-size:12px; width:450px; margin-top:220px; margin-left:290px; height:auto">Tu denuncia fue procesada de manera exitosa, gracias por colaborar con el funcionmiento limpio y correcto del sistema.</div><?php } else {?>
  
  <div class="inicio" style="float:left; font-size:12px; width:450px; height:auto"><h1>Denunciar documento #<?php echo $_GET['documento'] ?></h1>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" style="float:left" id="form1">
      <table align="center">
        <tr valign="baseline">
          <th nowrap="nowrap" align="right">Denunciante:</th>
          <td><input name="Denunciante" type="text" style="padding:1px" value="<?php if (isset($_SESSION['MM_Username'])) echo "".$_SESSION['MM_Username'];?>" size="32" readonly="readonly" /></td>
        </tr>
        <tr valign="baseline">
          <th nowrap="nowrap" align="right">Razón:</th>
          <td valign="baseline"><table>
            <tr>
              <td><input type="radio" name="Razon" value="1" />
                Contenido inapropiado</td>
            </tr>
            <tr>
              <td><input type="radio" name="Razon" value="2" />
                Contenido falso</td>
            </tr>
            <tr>
              <td><input type="radio" name="Razon" value="3" />
                Vulgar u ofensivo</td>
            </tr>
            <tr>
              <td><input type="radio" name="Razon" value="4" />
                Fuera de lugar</td>
            </tr>
            <tr>
              <td><input type="radio" name="Razon" value="5" />
                Otros</td>
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          <th nowrap="nowrap" align="right"></th>
          <td><span id="sprytextarea1">
            <textarea style="margin-bottom:10px" name="Comentario" cols="32" rows="4" class="" placeholder="Escribir explicación"></textarea>
         <br />

<span style="margin-top:30px" class="textareaRequiredMsg"><img src="../../img/iconos/1409342503_error.png" width="10" height="10" /> Explicanos porque realizas esta denuncia.</span></span></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" class="opcionesperfil" value="Enviar denuncia" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
      <input type="hidden" name="NDD" value="<?php echo $_GET['documento'] ?>" />
    </form>
    <p>&nbsp;</p>
  </div>
  
  <?php }?>
  </div>
  <!-- InstanceEndEditable -->
 
  <div class="footer"> <!-- InstanceBeginEditable name="Footer" -->
    <?php require("../require/pie.php"); ?>
  <script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
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
mysql_free_result($DetailRS1);

mysql_free_result($Recordset1);
?>

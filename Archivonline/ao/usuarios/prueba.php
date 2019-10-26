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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE usuarios SET Nombre=%s, Apellido=%s, Correo=%s, Usuario=%s, Carrera=%s, Correoalternativo=%s, Sexo=%s, Imagen=%s, Cedula=%s, Tipocedula=%s, Telefono=%s, Semestre=%s, Universidad=%s, Sede=%s WHERE Contador=%s",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
                       GetSQLValueString($_POST['Correo'], "text"),
                       GetSQLValueString($_POST['Usuario'], "text"),
                       GetSQLValueString($_POST['Carrera'], "int"),
                       GetSQLValueString($_POST['Correoalternativo'], "text"),
                       GetSQLValueString($_POST['Sexo'], "int"),
                       GetSQLValueString($_POST['Imagen'], "text"),
                       GetSQLValueString($_POST['Cedula'], "text"),
                       GetSQLValueString($_POST['Tipocedula'], "int"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString($_POST['Semestre'], "int"),
                       GetSQLValueString($_POST['Universidad'], "int"),
                       GetSQLValueString($_POST['Sede'], "int"),
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

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$varUsuario_Recordset1 = "-1";
if (isset($_POST['u'])) {
  $varUsuario_Recordset1 = $_POST['u'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Usuario = %s", GetSQLValueString($varUsuario_Recordset1, "text"));
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

<title>Archivo Online</title>

 <?php

  
   if (isset($_SESSION['MM_Username'])) 
    {?>

<!-- InstanceBeginEditable name="head" -->
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
    <?php require("../require/menucarpetas.php"); ?></div><!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="content"> 
   <div style="float:left; width:650px">
   
   <?php
   echo $_SESSION['MM_Username'];
   
   
    echo $row_Recordset1['Correo']; ?>
   
   
   </div>
   <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
     <table align="center">
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Nombre:</td>
         <td><input type="text" name="Nombre" value="<?php echo htmlentities($row_Recordset1['Nombre'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Apellido:</td>
         <td><input type="text" name="Apellido" value="<?php echo htmlentities($row_Recordset1['Apellido'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Correo:</td>
         <td><input type="text" name="Correo" value="<?php echo htmlentities($row_Recordset1['Correo'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Usuario:</td>
         <td><input type="text" name="Usuario" value="<?php echo htmlentities($row_Recordset1['Usuario'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Carrera:</td>
         <td><input type="text" name="Carrera" value="<?php echo htmlentities($row_Recordset1['Carrera'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Correoalternativo:</td>
         <td><input type="text" name="Correoalternativo" value="<?php echo htmlentities($row_Recordset1['Correoalternativo'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Sexo:</td>
         <td><select name="Sexo">
           <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Sexo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Hombre</option>
           <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Sexo'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Mujer</option>
         </select></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Imagen:</td>
         <td><input type="text" name="Imagen" value="<?php echo htmlentities($row_Recordset1['Imagen'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Cedula:</td>
         <td><input type="text" name="Cedula" value="<?php echo htmlentities($row_Recordset1['Cedula'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Tipocedula:</td>
         <td><select name="Tipocedula">
           <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Tipocedula'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>V-</option>
           <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Tipocedula'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>E-</option>
           <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Tipocedula'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>J-</option>
         </select></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Telefono:</td>
         <td><input type="text" name="Telefono" value="<?php echo htmlentities($row_Recordset1['Telefono'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Semestre:</td>
         <td><select name="Semestre">
           <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>sdcsc</option>
           <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Semestre'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>sdc</option>
         </select></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Universidad:</td>
         <td><select name="Universidad">
           <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>ewfwf</option>
           <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Universidad'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>ef1</option>
         </select></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Sede:</td>
         <td><select name="Sede">
           <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>elemento1</option>
           <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>elemento2</option>
         </select></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">&nbsp;</td>
         <td><input type="submit" value="Actualizar registro" /></td>
       </tr>
     </table>
     <input type="hidden" name="MM_update" value="form1" />
     <input type="hidden" name="Contador" value="<?php echo $row_Recordset1['Contador']; ?>" />
   </form>
   <p>&nbsp;</p>
<p style="float:left" align="center">
  <img src="../../img/Agregados/logoarchivo.png" width="250" height="250" /></p></div>
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

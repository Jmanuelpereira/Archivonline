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
  $insertSQL = sprintf("INSERT INTO documentos (Nombre, Nombreachivo, Uplauder, Fecha, Categoria, Verificacion, Semestre, Materia, Carrera, Paginas, Profesor, Pidentidad) VALUES (%s, %s, %s, NOW(), %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Nombreachivo'], "text"),
                       GetSQLValueString($_POST['Uplauder'], "text"),
                       GetSQLValueString($_POST['Categoria'], "int")
					   ,
                       GetSQLValueString($_POST['Verificacion'], "int")
					   ,
                       GetSQLValueString($_POST['Semestre'], "int")
					   ,
                       GetSQLValueString($_POST['Materia'], "int")
					   ,
                       GetSQLValueString($_POST['Carrera'], "int")
					   ,
                       GetSQLValueString($_POST['Paginas'], "text") ,
					   
                       GetSQLValueString($_POST['Profesor'], "text") ,
					   
                       GetSQLValueString($_POST['Pidentidad'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());

  $insertGoTo = "documento-add.php?d=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE usuarios SET Documentos=%s WHERE Contador=%s",
                       GetSQLValueString($_POST['Documentos'], "int"),
                       GetSQLValueString($_POST['Contadordocumento'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($updateSQL, $archivo) or die(mysql_error());
}

$varUsuario_Recordset1 = "0";
if (isset($_GET['u'])) {
  $varUsuario_Recordset1 = $_GET['u'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varUsuario_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

$varUsuario_Recordset1 = "-1";
if (isset($_SESSION["MM_Username"])) {
  $varUsuario_Recordset1 = $_SESSION["MM_Username"];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varUsuario_Recordset1, "text"));
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
<link rel="shortcut icon" href="../../../img/iconos/favicon2.ico" </link>

<title>Archivo Online</title>

 <?php

  
   if (isset($_SESSION['MM_Username'])) 
    {?>

<!-- InstanceBeginEditable name="head" -->
<script src="../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script>
function subirimagen(nombrecampo)
{
	self.name = 'opener';
	remote = open('../subir.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script>

<link href="../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style>
.textfieldValidState input, input.textfieldValidState {

	
	
	background-image: url(../../img/agregados/pequeno-mas.png);
	background-position: right;
	background-repeat: no-repeat;
}



/* When the widget is in an invalid state the INPUT has a red background applied on it. */
input.textfieldRequiredState, .textfieldRequiredState input, 
input.textfieldInvalidFormatState, .textfieldInvalidFormatState input, 
input.textfieldMinValueState, .textfieldMinValueState input, 
input.textfieldMaxValueState, .textfieldMaxValueState input, 
input.textfieldMinCharsState, .textfieldMinCharsState input, 
input.textfieldMaxCharsState, .textfieldMaxCharsState input {
	

	
	
	background-image: url(../../img/agregados/pequeno-error-mas.png);
	background-position: right;
	background-repeat: no-repeat;
	
}

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
 </style>
<!-- InstanceEndEditable -->

<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../../css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../../../js/script.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

    
	<script type="text/javascript" src="../../fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="../../fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	
    <link rel="stylesheet" type="text/css" href="../../fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 

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
if (isset($_GET['d'])) 
  $new = $_GET['d'];
$_GET ['r'] = '1';
   if ($_GET['r'] == $new) { ?><div class="exito2" style="float:left; font-size:12px; width:450px; margin-top:220px; margin-left:290px; height:auto">El documento se ha subido con exito, puedes visualizarlo en tus documentos.</div><?php } else 
  { ?>
 <div class="inicio" style="float:left; height:auto; width:430px">
    <form action="<?php echo $editFormAction; ?>" method="POST" style="float:left; margin:10px" name="form1" id="form1">
    <h1><img src="../../img/agregados/1411615358_678092-sign-add-128.png" width="28" height="28" /> Agregar documento</h1>
      <table width="578" height="205" align="center">
        <tr valign="baseline">
          
          <td height="30"><span id="sprytextfield1">
            <input name="Nombre" type="text" style='padding:3px; padding-right:20px' value="" placeholder="Nombre del archivo" size="32" />
          <span class="textfieldValidState"></span></span></td>
        </tr>
        
        <tr valign="baseline">
          
          <td height="31"> <span id="sprytextfield2">
            <input name="Nombreachivo" type="text" style='padding:3px; padding-right:20px' value="" placeholder="Selecciona un archivo..." size="32"/>
          <span class="textfieldValidState"></span></span>            <input style="width:auto; font-size:12px; height:25px; padding:3px; margin-top:0px"  name="button2" type="button" class="opcionesperfil" id="button2" onClick="javascript:subirimagen('Nombreachivo');" value="Seleccionar archivo"/></td>
        </tr>
       
       
       <!-- <tr valign="baseline">
          
          <td><span id="sprytextfield3">
            <input type="text" style="float:left; padding:3px; padding-right:20px" size="32" name="Paginas" placeholder="Nº de paginas del documento" value="0"/>
          <span class="textfieldValidState"></span><span class="textfieldValidState"></span></span></td>
        </tr>-->
        
        <tr valign="baseline">
          
          <td height="26"><span id="spryselect3">
            <select style="float:left; padding:3px; padding-left:15px" name="Semestre" >
              <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Semestre</option>
              <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>1er semestre</option>
              <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>2do semestre</option>
              <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>3er semestre</option>
              <option value="4" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>4to semestre</option>
              <option value="5" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>>5to semestre</option>
              <option value="6" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>6to semestre</option>
              <option value="7" <?php if (!(strcmp(7, ""))) {echo "SELECTED";} ?>>7mo semestre</option>
              <option value="8" <?php if (!(strcmp(8, ""))) {echo "SELECTED";} ?>>8vo semestre</option>
              <option value="9" <?php if (!(strcmp(9, ""))) {echo "SELECTED";} ?>>9no semestre</option>
            </select>
            <span class="selectInvalidMsg"></span></span><span id="spryselect4">
            <select name="Carrera" style='padding:3px; padding-left:15px'>
              <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Carrera</option>
              <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Ing. Sistemas</option>
              <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Ing. Electrica</option>
              <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>Administración</option>
              <option value="4" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Derecho</option>
              <option value="5" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>>Psicología</option>
              <option value="6" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>C. Social</option>
            </select>
            <span class="selectInvalidMsg"></span></span></td>
        </tr>
        <tr valign="baseline">
          
          <td><span id="spryselect1">
            <select style="float:left; padding:3px; padding-left:15px" name="Categoria">
              <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Privacidad</option>
              <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Público</option>
              <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Privado</option>
            </select><span class="selectInvalidMsg"></span><span class="selectValidState"></span></span>
            
            <span id="spryselect2">
            <select  style="float:left; padding:3px; padding-left:15px" name="Materia">
              <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Materia</option>
              <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Deontología</option>
              <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>DHP I</option>
              <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>TGS</option>
              <option value="4" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>Cultura I</option>
              <option value="5" <?php if (!(strcmp(5, ""))) {echo "SELECTED";} ?>>Estructura</option>
              <option value="6" <?php if (!(strcmp(6, ""))) {echo "SELECTED";} ?>>Matematica I</option>
              <option value="7" <?php if (!(strcmp(7, ""))) {echo "SELECTED";} ?>>Log. Matematica</option>
              <option value="8" <?php if (!(strcmp(8, ""))) {echo "SELECTED";} ?>>Matematica II</option>
              <option value="9" <?php if (!(strcmp(9, ""))) {echo "SELECTED";} ?>>Matematica III</option>
              <option value="10" <?php if (!(strcmp(10, ""))) {echo "SELECTED";} ?>>Matematica VI</option>
              <option value="11" <?php if (!(strcmp(11, ""))) {echo "SELECTED";} ?>>Matematica V</option>
              <option value="12" <?php if (!(strcmp(12, ""))) {echo "SELECTED";} ?>>Cultura II</option>
              <option value="13" <?php if (!(strcmp(13, ""))) {echo "SELECTED";} ?>>DHP II</option>
               <option value="14" <?php if (!(strcmp(14, ""))) {echo "SELECTED";} ?>>Otra materia</option>
            </select>
            <span class="selectInvalidMsg"></span></span></td>
        </tr>
        
        <tr valign="baseline">
         
          <td><input style="width:60px" type="submit" class="opcionesperfil" value="Agregar" /></td>
        </tr>
        
        
      </table>
      <input type="hidden" name="Contadordocumento" value="<?php echo $row_Recordset1['Contador']; ?>" />
      <input type="hidden" name="Documentos" value="<?php echo $row_Recordset1['Documentos'] + 1; ?>" />
      <input type="hidden" name="Pidentidad" value="<?php echo $row_Recordset1['Pidentidad']; ?>" />
      <input type="hidden" name="MM_insert" value="form1" />
      <input type="hidden" name="Verificacion" value="<?php echo $row_Recordset1['Rango']; ?>" />
      <input name="Uplauder" type="hidden" style='padding:3px' readonly="readonly" value="<?php echo $_SESSION['MM_Username']; ?>" size="32" />
      
      <?php if ($row_Recordset1['Rango'] > 0){ ?><input type="hidden" name="Profesor" value="<?php echo $row_Recordset1['Nombre']; ?> <?php echo $row_Recordset1['Apellido']; ?>" /><?php } ?>
      <input type="hidden" name="MM_update" value="form1" />
    </form></div>
    
    <div style="float:left; margin-top:20px; font-size:12px; background-color:#FFB7B9; border-radius:10px; width:250px; height:auto; padding:10px; color:#CC3333; margin-left:50px">
      <h2><img src="../../img/iconos/1409342503_error.png" width="14" height="14" /> ¿Como agregar un documento nuevo?</h2>
      <p>1.Coloca el nombre con el que podras ubicar el documento.</p>
      <p>2. Selecciona el archivo y subelo.</p>
      <p>3.Indica los datos academicos dle documento..</p>
      <p>4.Presiona agregar..</p>
      
    <P align="center">LISTA SUBISTE UN ARCHIVO CON EXITO!</P></div><?php } ?>
    <p>&nbsp;</p>
  </div>
  <!-- InstanceEndEditable -->
 
  <div class="footer"> <!-- InstanceBeginEditable name="Footer" --><?php require("../require/pie.php"); ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"0", validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"0", validateOn:["blur"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {invalidValue:"0", validateOn:["blur"]});
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
?>

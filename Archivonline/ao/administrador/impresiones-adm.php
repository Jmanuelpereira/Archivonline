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

$varDocumento_Recordset1 = "0";
if (isset($_GET['Documento'])) {
  $varDocumento_Recordset1 = $_GET['Documento'];
}
mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = sprintf("SELECT * FROM documentos WHERE documentos.Contador = %s", GetSQLValueString($varDocumento_Recordset1, "int"));
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
<style>td, th { border-bottom: solid 1px #ececec;}
td {
	width:450px;
	padding:5px}
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
if (isset($_GET['i'])) 
  $new = $_GET['i'];
$_GET ['i'] = '1';
   if ($_GET['i'] == $new) { ?>
   
  <div class="inicio" style="float:left; width:300px; height:auto">
<div style="float:left;">
<h3>Buscar documento</h3>
<p style="font-size:12px">Introduce el numero de documento que desees imprimir y verifica los datos.</p></div><form action="impresiones-adm.php">
<center><input type="search" id="Documento" name="Documento" style="float:right; transition: none; width: 250px;	color: #000;
	background-color: #FFF;" placeholder="Número de documento" size="30" /></center></form>
    
  </div> 
   
   
   <?php } else {  ?>   
  
  
<div class="inicio" style="float:left; width:950px; height:auto">
<?php 
$_GET['Documento'] = $varDocumento_Recordset1 ;

if ($_GET['Documento'])  { ?>
<h2 style="margin-bottom:0px; float:left"><img src="../../img/iconos/imprimir.png" width="25" height="25" /> Imprimir documento #<?php echo $row_Recordset1['Contador']; ?></h2> 

<div class="opcionesperfil" style="width:110px; height:20px; font-size:18px; float:right" ><a style="color:#000; text-decoration:none" href="../acciones/imprimir.php?Documento=<?php echo $_GET['Documento'] ?>">Siguiente <img src="../../img/iconos/next.png" width="14" height="14" /></a></div>

<?php } else { ?>
<div style="float:left; width:460px">
<h3>Imprisión de documentos</h3>
<div style="font-size:12px"> Servicios de impresión a distancia con la calidad y garantía que ofrece ARCHIVONLINE.
<br />
<br />


<strong>Tarifas</strong><br /><br />
<table style="text-align:left;  margin-left:10px; margin-bottom:10px" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td"><strong>Pagina carta B/N:</strong> 5,00 bsf</td>
  </tr>
  <tr>

    
    <td class="td"><strong>Pagina carta (Color): </strong>12,00 bsf
     </td>
  </tr>
  
  

  <tr>
    
    <td class="td"><strong>Pagina oficio B/N: </strong> 6,00 bsf</td>
  </tr>
  <tr>

    
    <td class="td"><strong>Pagina oficio (Color):</strong>  15,00 bs
     </td>
  </tr>
  <tr>
    
    <td class="td"><strong>Carpeta marrón + Gancho:</strong> 25,00 bsf</td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Carpeta manila</strong> 15,00 bsf</td>
  </tr>
  
 </table>

 <strong>Costos de envío</strong>
 <br /><br />


Al costo final se le recargara <strong style="color:#F00">1 Bsf</strong> por la cantidad de páginas que posea el trabajo, esto equivale a los costos de envió y entrega  del mismo.
<br />
<br />
Si el trabajo que solicitas es de <strong style="color:#F00">URGENCIA</strong> se recargara un costo de <strong style="color:#F00">1,50 Bsf</strong> por pagina.
<br />
<br />
<strong>Ejemplo:</strong> <br />
<br />


<strong>Costo impresión:</strong> 12 Paginas x 5 Bsf c/u = 60,00 Bsf<br />
<strong>Costo envio:</strong> 12 Paginas x 1Bsf=  12,00 Bsf<br />
<strong>Total a pagar:</strong> 12,00 Bsf + 60,00 Bsf = <strong style="color:#F00">72,00 Bsf</strong>

 </div></div>
 <div style="float:left; width:400px"><h3>Entrega de documentos</h3>
<p style="font-size:12px"> Las entregas de los documentos que se soliciten por impresion seran en la entrada de la universidad, la hora y la fecha se enviaran por SMS privado al comprador un dia antes de la entrega.
<br />
<br />




 </p></div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />




<a href="impresiones-adm.php?i=1" style="float:right; width:120px" class="opcionesperfil">Solicitar impresión</a>
    <?php } ?>
  </div>
  
 
  <?php } ?>
  <?php 
    $_GET['Documento'] = $varDocumento_Recordset1 ;
  
   if ($_GET['Documento'])  { ?><div class="inicio" style="float:left; width:950px; height:auto">
   
   <h3><img src="../../img/agregados/buscar.png" width="14" height="14" / > Verificacíon de datos</h3>
   
   <div class="datosperfil"><table style="text-align:left; float:left" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td"><strong>Documento #:</strong> <?php echo $row_Recordset1['Contador']; ?></td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Nombre:</strong> <?php echo $row_Recordset1['Nombre']; ?></td>
  </tr>
  <?php 
  { ?>
  <tr>
    
    <td class="td"><strong>Archivo:</strong> <?php echo $row_Recordset1['Nombreachivo']; ?></td>
  </tr>
  <tr>
  <?php } ?>
    
    <td class="td"><strong>Subido por:</strong> <?php echo $row_Recordset1['Uplauder']; ?><?php if ($row_Recordset1['Verificacion'] > 2 ) { ?>
      <img src="../../img/agregados/1410926033_678134-sign-check-256.png" width="12" title="Verificado" height="12" />      <?php } ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Fecha:</strong> <?php echo $row_Recordset1['Fecha']; ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Categoria:</strong> <?php if ( $row_Recordset1['Categoria'] == 1) echo "Publico";
	if ( $row_Recordset1['Categoria'] == 2) echo "Privado"; ?></td>
  </tr></table>
  <table style="text-align:left; float:left" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td"><strong>Estado:</strong> Activo</td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Carrera:</strong> <?php 
	if ($row_Recordset1['Carrera'] == 0) echo "Sin carrera";
	if ($row_Recordset1['Carrera'] == 1) echo "Ing. Sistemas";
	if ($row_Recordset1['Carrera'] == 2) echo "Ing. Electrica";
	if ($row_Recordset1['Carrera'] == 3) echo "Administración";
	if ($row_Recordset1['Carrera'] == 4) echo "Derecho";
	if ($row_Recordset1['Carrera'] == 5) echo "Psicología";
	if ($row_Recordset1['Carrera'] == 5) echo "C. Social"; ?> </td>
  </tr>

  <tr>
    
    <td class="td"><strong>Semestre:</strong> <?php 
	if ($row_Recordset1['Semestre'] == 0) echo "Sin semestre";
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
  <tr>

    
    <td class="td"><strong>Materia:</strong> <?php 
	if ($row_Recordset1['Materia'] == 0) echo "Sin materia";
	if ($row_Recordset1['Materia'] == 1) echo "Deontología";
	if ($row_Recordset1['Materia'] == 2) echo "DHP I";
	if ($row_Recordset1['Materia'] == 3) echo "TGS";
	if ($row_Recordset1['Materia'] == 4) echo "Cultura I";
	if ($row_Recordset1['Materia'] == 5) echo "Estructura S.";
	if ($row_Recordset1['Materia'] == 6) echo "Matematica I";
	if ($row_Recordset1['Materia'] == 7) echo "Logica Matematica";
	if ($row_Recordset1['Materia'] == 8) echo "Matematica II";
	if ($row_Recordset1['Materia'] == 9) echo "Matematica III";
	if ($row_Recordset1['Materia'] == 10) echo "Matematica IV";
	if ($row_Recordset1['Materia'] == 11) echo "Matematica V";
	if ($row_Recordset1['Materia'] == 12) echo "Cultura II";
	if ($row_Recordset1['Materia'] == 13) echo "DHP II";
	if ($row_Recordset1['Materia'] == 14) echo "Deontología";
	if ($row_Recordset1['Materia'] == 15) echo "Deontología";
	if ($row_Recordset1['Materia'] == 16) echo "Deontología";
	if ($row_Recordset1['Materia'] == 17) echo "Deontología";
	if ($row_Recordset1['Materia'] == 18) echo "Deontología";
	if ($row_Recordset1['Materia'] == 19) echo "Deontología";
	if ($row_Recordset1['Materia'] == 20) echo "Deontología";
	if ($row_Recordset1['Materia'] == 21) echo "Deontología";
	if ($row_Recordset1['Materia'] == 22) echo "Deontología";
	if ($row_Recordset1['Materia'] == 23) echo "Deontología";
	if ($row_Recordset1['Materia'] == 24) echo "Deontología";
	if ($row_Recordset1['Materia'] == 25) echo "Deontología";
	if ($row_Recordset1['Materia'] == 26) echo "Deontología";
	if ($row_Recordset1['Materia'] == 27) echo "Deontología";
	if ($row_Recordset1['Materia'] == 28) echo "Deontología";
	if ($row_Recordset1['Materia'] == 29) echo "Deontología";
	if ($row_Recordset1['Materia'] == 30) echo "Deontología";
	
	 ?>
     </td>
  </tr>
  <tr>

    
    <td class="td"><strong>Universidad:</strong> Universidad Bicentenaria de Aragua
     </td>
  </tr>
 </table>
 

</div>


  


   
   
   

  
  
  </div><?php } ?>
   
  
  
  
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

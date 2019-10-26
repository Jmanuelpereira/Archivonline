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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_archivo, $archivo);
$query_DetailRS1 = sprintf("SELECT * FROM usuarios WHERE Contador = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $archivo) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

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
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<title>Archivo Online</title>

 <?php

  
   if (isset($_SESSION['MM_Username'])) 
    {?>

<!-- InstanceBeginEditable name="head" -->
<style>tr {
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

  
  <table class="table-fill" style="width:520px; margin-bottom:10px; margin-top:10px; float:left" width="388" border="1" align="center">
    <tr>
    <td width="144" style="background-color:#6a92bf; color:#FFFFFF;">ID de usuario</td>
    <td width="590"><?php
  echo $row_DetailRS1['Contador']
 ?></td>
  </tr>
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Razón social</td>
    <td><?php echo $row_DetailRS1['Nombre']; ?> <?php echo $row_DetailRS1['Apellido']; ?></td>
  </tr>
  
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Cédula</td>
    <td><?php if ($row_DetailRS1['Tipocedula'] == 1) 
		echo "V-"; 
		if ($row_DetailRS1['Tipocedula'] == 2)
		echo "E-";
		if ($row_DetailRS1['Tipocedula'] == 3)
		echo "J-";
		 ?> <?php 
	 echo $row_DetailRS1['Cedula'];
	  ?></td>
  </tr>
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Correo</td>
    <td><?php echo $row_DetailRS1['Correo']; ?></td>
  </tr>
   <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Contrasena</td>
    <td><?php echo $row_DetailRS1['Contrasena']; ?></td>
  </tr>
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Telefono</td>
    <td><?php
	 echo $row_DetailRS1['Telefono'];
	  ?></td>
  </tr>
  </table><table class="table-fill" style="width:520px; margin-top:10px; margin-bottom:10px; float:left" width="388" border="1" align="center">
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Universidad</td>
    <td><?php 
	if  ($row_DetailRS1['Universidad'] == 0) 
	echo "No especificado";
	if  ($row_DetailRS1['Universidad'] == 1) 
	echo "Universidad Bicentenaria de Aragua";
	if  ($row_DetailRS1['Universidad'] == 2) 
	echo "Universidad Central de Venezuela";
	if  ($row_DetailRS1['Universidad'] == 3) 
	echo "Universidad Simón Bolívar";
	if  ($row_DetailRS1['Universidad'] == 4) 
	echo "Universidad de Carabobo";
	if  ($row_DetailRS1['Universidad'] == 5) 
	echo "Universidad de Los Andes";
	if  ($row_DetailRS1['Universidad'] == 6) 
	echo "Universidad Arturo Michelena";
	  ?></td>
  </tr>
    <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Sede</td>
    <td><?php
	 if  ($row_DetailRS1['Sede'] == 0) 
	echo "No especificado";
	if  ($row_DetailRS1['Sede'] == 1) 
	echo "Principal";
	if  ($row_DetailRS1['Sede'] == 2) 
	echo "San Antonio de los altos";
	 ?></td>
  </tr>
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Carrera</td>
    <td><?php 
	 if ($row_DetailRS1['Carrera'] == 0) echo "Sin carrera";
	if ($row_DetailRS1['Carrera'] == 1) echo "Ingeneria Sistemas";
	if ($row_DetailRS1['Carrera'] == 2) echo "Ingeneria Electrica";
	if ($row_DetailRS1['Carrera'] == 3) echo "Administración";
	if ($row_DetailRS1['Carrera'] == 4) echo "Derecho";
	if ($row_DetailRS1['Carrera'] == 5) echo "Psicología";
	if ($row_DetailRS1['Carrera'] == 6) echo "Comunicación Social";
	  ?></td>
  </tr>
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Semestre</td>
    <td><?php 
	 if ($row_DetailRS1['Semestre'] == 0) echo "No especificado";
	if ($row_DetailRS1['Semestre'] == 1) echo "1er semestre";
	if ($row_DetailRS1['Semestre'] == 2) echo "2do semestre";
	if ($row_DetailRS1['Semestre'] == 3) echo "3er semestre";
	if ($row_DetailRS1['Semestre'] == 4) echo "4to semestre";
	if ($row_DetailRS1['Semestre'] == 5) echo "5to semestre";
	if ($row_DetailRS1['Semestre'] == 6) echo "6to semestre";
	if ($row_DetailRS1['Semestre'] == 7) echo "7mo semestre";
	if ($row_DetailRS1['Semestre'] == 8) echo "8vo semestre";
	if ($row_DetailRS1['Semestre'] == 9) echo "9no semestre";
	if ($row_DetailRS1['Semestre'] == 10) echo "10mo semestre";
	  ?></td>
  </tr>

  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Fecha de registro</td>
    <td><?php echo $row_DetailRS1['Fecharegistro']; ?>
  </td>
  </tr>
  <tr>
    <td style="background-color:#6a92bf; color:#FFFFFF;">Estado</td>
    <td><?php if ($row_DetailRS1['Estado'] == 1) echo "Activo";
	if ($row_DetailRS1['Estado'] == 5) echo "Administrador";
	  ?>
  </td>
  </tr>
</table>
<a href="javascript:history.back()" style="float:right" class="opcionesperfil">Volver</a>
  

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


?>

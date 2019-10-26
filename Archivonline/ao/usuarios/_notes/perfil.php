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
 if (!isset($_SESSION)) {
  session_start();
}
?>
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
<style>td, th { border-bottom: solid 1px #ececec;}
td {
	width:330px;
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

/*.fotoperfil:hover {
	background-color:#ebebeb;
	opacity: 0.4; filter:blur(4px;
	background-color: rgba(0, 0, 0, 0.5
	box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.48)
	
	}*/
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
  <div class="sidebar1">
    </div><!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="content">
  <?php require("../require/menu.php"); ?> 
  <div class="inicio" style="float:left; width:950px; height:auto">
  <?php 
    $open = 0;
if (isset($_GET['act']))
  $open = $_GET['act'];
  $_GET ['act'] = '1';
   if ($_GET ['act'] == $open) { ?>
  
  Actualizado
<?php } else { ?>
  
  
  <div class="" style="width:150px; float:left; margin-left:10px"><a href="?a=1"><img class="fotoperfil" style="" src="imgp/<?php if ($row_Recordset1['Imagen'])  
		   {?><?php echo $row_Recordset1['Imagen']; ?><?php }
		   else {
		    ?>user2.jpg<?php }?>" width="150" height="150" /></a><br />
   <div class="opcionesperfil" style="width:140px;"><a style="color:#000; text-decoration:none;" href="editar.php"><img src="../../img/iconos/editar-usuario.png" width="12" height="12" /> Editar perfil</a></div>
   <div class="opcionesperfil" style="width:140px;"><a style="color:#000; text-decoration:none" href="../documentos/mis-documentos.php"><img src="../../img/iconos/1413095094_678084-folder-512.png" width="12" height="12" /> Mis documentos</a></div> 
  
   <div class="opcionesperfil" style="width:140px;"><a style="color:#000; text-decoration:none" href=""><img src="../../img/iconos/icono_remove.png" width="12" height="12" /> Eliminar cuenta</a></div></div><div class="datosperfil"><table style="text-align:left; float:left" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td"><strong>ID:</strong> <?php echo $row_Recordset1['Contador']; ?><?php echo $_SESSION['MM_Idusuario']; ?></td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Nombre:</strong> <?php echo $row_Recordset1['Nombre']; ?></td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Apellido:</strong> <?php echo $row_Recordset1['Apellido']; ?></td>
  </tr>
  <tr>
  
    
    <td class="td"><strong>Sexo:</strong> <?php if ($row_Recordset1['Sexo'] == 1) echo "Hombre";
	if ($row_Recordset1['Sexo'] == 2) echo "Mujer";
	 ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Correo:</strong> <?php echo $row_Recordset1['Correo']; ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Cédula:</strong> <?php if ($row_Recordset1['Tipocedula'] == 1) echo "V-";
	if ($row_Recordset1['Tipocedula'] == 2) echo "E-";
	 ?><?php echo $row_Recordset1['Cedula']; ?>
  
   </td>
  </tr>
  <tr>
  
    <td class="td"><strong>Teléfono:</strong> <?php echo $row_Recordset1['Telefono']; ?></td>
  </tr>
  </table>
  <table style="float:left; margin-left:40px">
   
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
	 ?></td>
  </tr>
  <tr>
  
    <td class="td"><strong>Sede:</strong> <?php 
	if  ($row_Recordset1['Sede'] == 0) 
	echo "No especificado";
	if  ($row_Recordset1['Sede'] == 1) 
	echo "Principal";
	if  ($row_Recordset1['Sede'] == 2) 
	echo "San Antonio de los altos";
	if  ($row_Recordset1['Sede'] == 3) 
	echo "San Fernando de Apure";
	if  ($row_Recordset1['Sede'] == 4) 
	echo "Puerto Ordaz";
	
	
	 ?></td>
  </tr>
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
  <tr>
    
    <td class="td"><strong>FDR:</strong> <?php echo $row_Recordset1['Fecharegistro']; ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Rango:</strong> <?php if ($row_Recordset1['Rango'] == 1) echo "Estudiante";
	if ($row_Recordset1['Rango'] == 2) echo "Profesor";
	if ($row_Recordset1['Rango'] == 5) echo "Administrador"; ?></td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Estado:</strong> <?php if ($row_Recordset1['Estado'] == 1) echo "Activo";
	if ($row_Recordset1['Estado'] == 2) echo "Activo";
	if ($row_Recordset1['Estado'] == 5) echo "Administrador"; ?> </td>
  </tr>
</table>

</div></div><?php } ?>  <!--<div class="inicio" style="float:left; font-size:14px; width:auto; height:auto"><a href="../servicios/impresiones.php" target="_blank"><img src="http://i1287.photobucket.com/albums/a621/jmanuelpereira/IMPRESION2_zpsdsgzqgb9.gif" border="0" alt=" photo IMPRESION2_zpsdsgzqgb9.gif"/></a>
</div>-->
  

</div>
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

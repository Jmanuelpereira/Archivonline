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

$varDato_DetailRS1 = "0";
if (isset($_GET['Documento'])) {
  $varDato_DetailRS1 = $_GET['Documento'];
}
mysql_select_db($database_archivo, $archivo);
$query_DetailRS1 = sprintf("SELECT * FROM documentos WHERE documentos.Contador = %s", GetSQLValueString($varDato_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $archivo) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
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
<style>td, th { border-bottom: solid 1px #ececec;}
td {
	width:250px;
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

marquee { display:marker
	
}

marquee:hover { 
	
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
<!-- InstanceBeginEditable name="Cabecera" -->
  <?php require("../require/cabeceracarpetas.php"); ?>
    
 
  
 
<!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  <div class="content" style="height:420px">
    <div class="inicio" style="float:left; width:auto; height:auto; font-size:12px">
      <div class="datosperfil"><table style="text-align:left; float:left; font-size:10px" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td"><strong>Documento #:</strong> <?php echo $row_DetailRS1['Contador']; ?></td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>Nombre:</strong> <?php echo $row_DetailRS1['Nombre']; ?></td>
  </tr>
  <?php 
  { ?>
  <tr>
    
    <td class="td"><strong>Archivo:</strong> <?php echo $row_DetailRS1['Nombreachivo']; ?></td>
  </tr>
  <tr>
  <?php } ?>
    
    <td class="td"><strong>Subido por:</strong><?php if($row_DetailRS1['Pidentidad'] == 0) echo " Anónimo"; else { ?><?php 
	switch($row_DetailRS1['Verificacion']):
	 case 2: 
	 
	 echo
	  "Prof.".  $row_DetailRS1['Profesor'];   
	 break; 
	 
	 default:  echo $row_DetailRS1['Profesor'];   
	 
	 
	 endswitch; }
	 
	 if ($row_DetailRS1['Verificacion'] > 1) { ?>
              <img src="../../img/agregados/1410926033_678134-sign-check-256.png" width="9" height="9" title="Verificado" /> 
            <?php } ?></td>
  </tr>
  <tr>
    
    <td class="td"><strong>Fecha:</strong> <?php echo $row_DetailRS1['Fecha'];?></td>
  </tr>
  </table>
  <table style="text-align:left; float:left; font-size:10px" width="auto" border="0" cellspacing="2" cellpadding="2">
   
  
  <tr>
    
    <td class="td"><strong>Carrera:</strong> <?php 
	if ($row_DetailRS1['Carrera'] == 0) echo "Sin carrera";
	if ($row_DetailRS1['Carrera'] == 1) echo "Ing. Sistemas";
	if ($row_DetailRS1['Carrera'] == 2) echo "Ing. Electrica";
	if ($row_DetailRS1['Carrera'] == 3) echo "Administración";
	if ($row_DetailRS1['Carrera'] == 4) echo "Derecho";
	if ($row_DetailRS1['Carrera'] == 5) echo "Psicología";
	if ($row_DetailRS1['Carrera'] == 5) echo "C. Social"; ?> </td>
  </tr>

  <tr>
    
    <td class="td"><strong>Semestre:</strong> <?php 
	if ($row_DetailRS1['Semestre'] == 0) echo "Sin semestre";
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

    
    <td class="td"><strong>Materia:</strong> <?php 
	if ($row_DetailRS1['Materia'] == 0) echo "Sin materia";
	if ($row_DetailRS1['Materia'] == 1) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 2) echo "DHP I";
	if ($row_DetailRS1['Materia'] == 3) echo "TGS";
	if ($row_DetailRS1['Materia'] == 4) echo "Cultura I";
	if ($row_DetailRS1['Materia'] == 5) echo "Estructura S.";
	if ($row_DetailRS1['Materia'] == 6) echo "Matematica I";
	if ($row_DetailRS1['Materia'] == 7) echo "Logica Matematica";
	if ($row_DetailRS1['Materia'] == 8) echo "Matematica II";
	if ($row_DetailRS1['Materia'] == 9) echo "Matematica III";
	if ($row_DetailRS1['Materia'] == 10) echo "Matematica IV";
	if ($row_DetailRS1['Materia'] == 11) echo "Matematica V";
	if ($row_DetailRS1['Materia'] == 12) echo "Cultura II";
	if ($row_DetailRS1['Materia'] == 13) echo "DHP II";
	if ($row_DetailRS1['Materia'] == 14) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 15) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 16) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 17) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 18) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 19) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 20) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 21) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 22) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 23) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 24) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 25) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 26) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 27) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 28) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 29) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 30) echo "Deontología";
	
	 ?>
     </td>
  </tr>
  <tr>

    
    <td class="td"><strong>Universidad:</strong> Universidad Bicentenaria de Aragua
     </td>
  </tr>
 </table><br /><br />
<br />

        <a style="color:#000; text-decoration:none" onclick="document.location='../archivos/<?php echo $row_DetailRS1['Nombreachivo']; ?>'"><div class="opcionesperfil" style="width:95%; text-align:center; float:left; font-size:22px"><img style="margin-right:3px" src="../../img/iconos/1420593747_download.png" width="20" height="20" /> Descargar</div></a>
   <?php ?><?php ?><?php ?>
  
   <?php if ($row_DetailRS1['Uplauder'] == $_SESSION['MM_Username']){ ?>
  
   <a style="color:#000; text-decoration:none" href="documento-eliminar.php?recordID=<?php echo $_GET['Documento'] ?>"><div class="opcionesperfil" style="width:95%; text-align:center; float:left; font-size:22px"><img style="margin-right:3px" src="../../img/iconos/1420593516_RecycleBin.png" width="20" height="20" /> Borrar documento</div></a><br />


<?php } else { ?><?php }?>
   

   </div>



  


   
   
   

  
<?php /*?><!--  
  </div><?php }  else {?><div class="completar" style="font-size:12px; color:#FF3535; margin-top:220px; margin-left:400px">El documento que buscas es privado, no podras visiualizarlos a menos que el autor lo permita.</div> <?php } ?>--><?php */?>
 </div>
 <!-- <div class="inicio" style="float:left; font-size:14px; width:auto; height:auto"><a href="../servicios/impresiones.php" target="_blank"><img src="http://i1287.photobucket.com/albums/a621/jmanuelpereira/IMPRESION2_zpsdsgzqgb9.gif" border="0" alt=" photo IMPRESION2_zpsdsgzqgb9.gif"/></a>
</div>-->
  
  
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
mysql_free_result($DetailRS1);


?>

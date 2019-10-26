<?php require_once('Connections/archivo.php'); 
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

$vardoc_DetailRS1 = "0";
if (isset($_GET['Doc'])) {
  $vardoc_DetailRS1 = $_GET['Doc'];
}
mysql_select_db($database_archivo, $archivo);
$query_DetailRS1 = sprintf("SELECT * FROM documentos WHERE documentos.Contador = %s", GetSQLValueString($vardoc_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $archivo) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/basefrente.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Archivo Online</title>

<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<style>
td, th { border-bottom: solid 1px #ececec;}
td {
	width:250px;
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
.advertencia {
	background-color: #FFFFCE;
	text-align: left;
	padding: 10px;
	width: 200px;
	float: none;
	height: auto;
	width: 220px;
	border: 1px solid #FFDF00;
	font-size:12px
	}

</style>
<?php $_GET['m'] = 1 ?>
<!-- InstanceEndEditable -->
<link href="css/estilosfrente.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/iconos/favicon2.ico" </link>
<link rel="stylesheet" href="css/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/script.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

	<script type="text/javascript" src="ao/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="ao/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	
    <link rel="stylesheet" type="text/css" href="ao/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 

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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>

<div class="contenedor">
<!-- InstanceBeginEditable name="Cabecera" -->
<div class="fondoheader"><div class="header">
  <?php require("requirefrente/cabecera.php"); ?>
</div></div>
<!-- InstanceEndEditable -->
<div class="container"><!-- InstanceBeginEditable name="Contenido" -->
  <div class="content" style="height:480px">


   
   
   
   <?php  $new = "2";
if (isset($_GET['r'])) 
  $new = $_GET['r'];
$_GET ['r'] = '1';
   if ($_GET['r'] == $new)?>
   
  <div class="sesion" style="width:75%; height:120%; margin: 0 auto; margin-top:20px; font-size:12px">
    <Center><div style=""><img src="img/iconos/1413098475_699328-icon-56-document-text-128.png" width="128" height="128" />
    
    <div onclick="document.location='ao/archivos/<?php echo $row_DetailRS1['Nombreachivo']; ?>'" style="margin-top:20px; text-align:center" class="btn" >Descargar</div>
    </div></Center>
    <br />

    <table style="text-align:left; float:left; margin-left:20px" width="auto" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <th scope="row">Documento #:</th>
    <td><?php echo $row_DetailRS1['Contador']; ?></td>
  </tr>
   <tr>
    <th scope="row">Nombre:</th>
    <td><?php echo $row_DetailRS1['Nombre']; ?></td>
  </tr>
  <tr>
    <th scope="row">Subido por:</th>
    <td> <?php if($row_DetailRS1['Pidentidad'] == 0) echo " Anónimo"; else { ?><?php 
	switch($row_DetailRS1['Verificacion']):
	 case 2: 
	 
	 echo
	  "Prof.".  $row_DetailRS1['Profesor'];   
	 break; 
	 
	 default:  echo $row_DetailRS1['Profesor'];   
	 
	 
	 endswitch; }
	 
	 if ($row_DetailRS1['Verificacion'] > 1) { ?>
              <img src="../img/agregados/1410926033_678134-sign-check-256.png" width="9" height="9" title="Verificado" /> 
            <?php } ?></td>
  </tr>
 
  <tr>
    <th scope="row">Fecha:</th>
    <td><?php echo $row_DetailRS1['Fecha']; ?></td>
  </tr>
  <tr>
    <th scope="row">Datos academicos</th>
    <td><?php 
	if ($row_DetailRS1['Carrera'] == 0) echo "Sin carrera";
	if ($row_DetailRS1['Carrera'] == 1) echo "Ing. Sistemas";
	if ($row_DetailRS1['Carrera'] == 2) echo "Ing. Electrica";
	if ($row_DetailRS1['Carrera'] == 3) echo "Administración";
	if ($row_DetailRS1['Carrera'] == 4) echo "Derecho";
	if ($row_DetailRS1['Carrera'] == 5) echo "Psicología";
	if ($row_DetailRS1['Carrera'] == 6) echo "C. Social"; ?> | <?php 
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
	 ?> | <?php 
	if ($row_DetailRS1['Materia'] == 0) echo "Sin materia";
	if ($row_DetailRS1['Materia'] == 1) echo "Deontología";
	if ($row_DetailRS1['Materia'] == 2) echo "DHP I";
	if ($row_DetailRS1['Materia'] == 3) echo "TGS";
	if ($row_DetailRS1['Materia'] == 4) echo "Cultura I";
	if ($row_DetailRS1['Materia'] == 5) echo "Estructura S.";
	if ($row_DetailRS1['Materia'] == 6) echo "Matematica I";
	if ($row_DetailRS1['Materia'] == 7) echo "Logica M.";
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
	
	 ?></td>
  </tr>
</table>


    <center><div class="advertencia" style="width:90%; float:left; height:auto">
    Te invitamos a registrarte o iniciar sesión en archivonline y asi disfrutar de mas beneficios a la hora de descargar y compartir documentos, es totalmente gratis y lo sera siempre.
    <br />
    <br />
    <br />


<a id="various5" href="requirefrente/registrarse.php">Registrarse</a> o <a href="iniciar-sesion.php?r=3">Iniciar sesión</a>

 


    
    
    
    
    </div></center>
    
    
    
    
    </div>
   
  </div>
  <!-- InstanceEndEditable --><!-- end .container --></div>
  <!-- InstanceBeginEditable name="Footer" -->
  <div class="fondofooter"><div class="footer">
    <?php require("ao/require/pie.php"); ?>
    <!-- end .footer -->
  </div></div>

  <!-- InstanceEndEditable -->
  </div>
</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($DetailRS1);
?>

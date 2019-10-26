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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 8;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = "SELECT * FROM documentos WHERE documentos.Categoria = 1 ORDER BY documentos.Contador DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);

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
  <div class="sidebar1"></div>
<!-- InstanceEndEditable -->
  <!-- InstanceBeginEditable name="Contenido" -->
  
  <div class="content">
    <?php require("../require/menucarpetas.php"); ?>
    <div class="inicio" style="height:auto; margin-bottom:0px; width:965px; float:left; padding:10px; padding-top:0px; padding-left:0px">
       <?php do { ?> 
      <a href="documento.php?Documento=<?php echo $row_Recordset1['Contador']; ?>"><div style="float:left; margin-left:10px; width:450px" class="reciente"><img style="float:left" src="../../img/iconos/1413098475_699328-icon-56-document-text-128.png" width="64" height="64" /><div style="float:left"><h5 style="width:140px; padding:0px"><?php echo $row_Recordset1['Nombre']; ?></h5>
          <p style="font-size:10px; padding:0px"><?php echo $row_Recordset1['Fecha']; ?></p></div>
          
        <div style="float:right">
          <p style="font-size:11px; float:left; padding-right: 5px;
	padding-left: 0px;"><?php 
	if ($row_Recordset1['Carrera'] == 0) echo "Sin carrera";
	if ($row_Recordset1['Carrera'] == 1) echo "Ing. Sistemas";
	if ($row_Recordset1['Carrera'] == 2) echo "Ing. Electrica";
	if ($row_Recordset1['Carrera'] == 3) echo "Administración";
	if ($row_Recordset1['Carrera'] == 4) echo "Derecho";
	if ($row_Recordset1['Carrera'] == 5) echo "Psicología";
	if ($row_Recordset1['Carrera'] == 6) echo "C. Social"; ?> |</p>
            
          <p style="font-size:11px; float:left; padding-right: 5px;
	padding-left: 0px;"><?php 
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
	 ?> |</p>
          <p style="font-size:11px; float:left; padding-right: 0px;
	padding-left: 0px;"><?php 
	if ($row_Recordset1['Materia'] == 0) echo "Sin materia";
	if ($row_Recordset1['Materia'] == 1) echo "Deontología";
	if ($row_Recordset1['Materia'] == 2) echo "DHP I";
	if ($row_Recordset1['Materia'] == 3) echo "TGS";
	if ($row_Recordset1['Materia'] == 4) echo "Cultura I";
	if ($row_Recordset1['Materia'] == 5) echo "Estructura S.";
	if ($row_Recordset1['Materia'] == 6) echo "Matematica I";
	if ($row_Recordset1['Materia'] == 7) echo "Logica M.";
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
	
	 ?></p>
          <p style="font-size:11px; ; padding-right: 0px;
	padding-left: 0px;">&nbsp;</p>
          <p style="font-size:11px;  padding-right: 0px;
	padding-left: 0px; float:right"><?php if($row_Recordset1['Pidentidad'] == 0) echo " Anónimo"; else { ?><?php 
	switch($row_Recordset1['Verificacion']):
	 case 2: 
	 
	 echo
	  "Prof.".  $row_Recordset1['Profesor'];   
	 break; 
	 
	 default:  echo $row_Recordset1['Profesor'];   
	 
	 
	 endswitch; }
	 
	 if ($row_Recordset1['Verificacion'] > 1) { ?>
              <img src="../../img/agregados/1410926033_678134-sign-check-256.png" width="9" height="9" title="Verificado" /> 
            <?php } ?></p>
            
        </div>
    </div></a><?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    
    
    
    </div>
    <div class="inicio" style="float:left; height:auto; background-color:transparent; border: #FFF; width:965px; margin-top:0px">
    
    <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><div style="float:left ; margin-right:740px;" class="paginacion">Anterior</div></a>
    
    
    <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><div style="float:left" class="paginacion">Siguiente</div>
    </div></a>
    
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

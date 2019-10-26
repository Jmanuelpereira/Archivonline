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

<div style="width:1000px; padding:10px">

    

 

    <div style="width:150px; float:left; margin-left:10px"><img style="border-radius:3px" src="../img/iconos/word.png" width="130" height="120" /><br />
<!--   <div class="opcionesperfil" style="width:140px"><a style="color:#000; text-decoration:none;" href="javascript:open('../archivos/<?php echo $row_DetailRS1['Nombreachivo']; ?>')"><img src="../../img/iconos/search-icon.png" width="12" height="12" /> Ver documento</a></div>-->
<div class="opcionesperfil" style="width:120px"><a style="color:#000; text-decoration:none" href="javascript:history.back()"><img style="margin-right:3px" src="../img/iconos/1418289002_arrow-back-128.png" width="12" height="12" /> Volver</a></div> 
   <div class="opcionesperfil" style="width:120px"><a style="color:#000; text-decoration:none" onclick="document.location='archivos/<?php echo $row_DetailRS1['Nombreachivo']; ?>'"><img style="margin-right:3px" src="../img/iconos/1420593747_download.png" width="12" height="12" /> Descargar</a></div> 
   <?php ?><?php ?><div class="opcionesperfil" style="width:120px"><a style="color:#000; text-decoration:none" href="../servicios/impresiones.php?Documento=<?php echo $_GET ['Documento']; ?>" width="12" height="12" /><img style="margin-right:3px" src="../img/iconos/compartir.png" width="10" height="10" /> Compartir</a></div> <?php ?>
  
   <?php if ($row_DetailRS1['Uplauder'] == $_SESSION['MM_Username']){ ?>
  
   <div class="opcionesperfil" style="width:120px"><a style="color:#000; text-decoration:none" href="documentos/documento-eliminar.php?recordID=<?php echo $_GET['Documento'] ?>"><img style="margin-right:3px" src="../img/iconos/1420593516_RecycleBin.png" width="10" height="10" /> Borrar documento</a></div><br />


<?php } else { ?>

<div class="opcionesperfil" style="width:120px"><a style="color:#000; text-decoration:none" href="../acciones/denunciar.php?documento=<?php echo $_GET['Documento'] ?>"><img style="margin-right:3px" src="../img/iconos/1420594514_519900-165_ExclamationMark-128.png" width="10" height="10" /> Denunciar</a></div><?php }?>
   
   </div><div class="datosperfil"><table style="text-align:left; float:left" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td2"><strong>Documento #:</strong> <?php echo $row_DetailRS1['Contador']; ?></td>
  </tr>
  
  <tr>
    
    <td class="td2"><strong>Nombre:</strong> <?php echo $row_DetailRS1['Nombre']; ?></td>
  </tr>
  <?php 
  { ?>
  <tr>
    
    <td class="td2"><strong>Archivo:</strong> <?php echo $row_DetailRS1['Nombreachivo']; ?></td>
  </tr>
  <tr>
  <?php } ?>
    
    <td class="td2"><strong>Subido por:</strong><?php if($row_DetailRS1['Pidentidad'] == 0) echo " Anónimo"; else { ?><?php 
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
    
    <td class="td2"><strong>Fecha:</strong> <?php echo $row_DetailRS1['Fecha'];?></td>
  </tr>
  </table>
  <table style="text-align:left; float:left" width="auto" border="0" cellspacing="2" cellpadding="2">
   
  
  <tr>
    
    <td class="td2"><strong>Carrera:</strong> <?php 
	if ($row_DetailRS1['Carrera'] == 0) echo "Sin carrera";
	if ($row_DetailRS1['Carrera'] == 1) echo "Ing. Sistemas";
	if ($row_DetailRS1['Carrera'] == 2) echo "Ing. Electrica";
	if ($row_DetailRS1['Carrera'] == 3) echo "Administración";
	if ($row_DetailRS1['Carrera'] == 4) echo "Derecho";
	if ($row_DetailRS1['Carrera'] == 5) echo "Psicología";
	if ($row_DetailRS1['Carrera'] == 6) echo "C. Social";
	if ($row_DetailRS1['Carrera'] == 7) echo "Contaduría pública"; ?> </td>
  </tr>

  <tr>
    
    <td class="td2"><strong>Semestre:</strong> <?php 
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

    
    <td class="td2"><strong>Materia:</strong> <?php 
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

    
    <td class="td2"><strong>Universidad:</strong> Universidad Bicentenaria de Aragua
     </td>
  </tr>
 </table>
 <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>




<div class="completar" style="width:auto; padding:5px; margin-left:0px; margin-top:10px; cursor:auto; margin-bottom:5px;"><p style="color:#CC3333; font-size:11px; padding:0px">Todos los documentos disponibles en archivonline son totalmente gratuitos, si algun usuario te cobra por su uso reportalo.</p>
 <p align="right" style="color:#CC3333; font-size:11px; margin-bottom:0px; padding:0px ">ARCHIVONLINE</p></div>
 

</div>

</div>

<?php
mysql_free_result($DetailRS1);


?>
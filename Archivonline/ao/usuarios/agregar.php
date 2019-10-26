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

$varDato_Agregar = "0";
if (isset($_GET['action'])) {
  $varDato_Agregar = $_GET['action'];
}
mysql_select_db($database_archivo, $archivo);
$query_Agregar = sprintf("SELECT * FROM usuarios WHERE usuarios.Contador = %s", GetSQLValueString($varDato_Agregar, "text"));
$Agregar = mysql_query($query_Agregar, $archivo) or die(mysql_error());
$row_Agregar = mysql_fetch_assoc($Agregar);
$totalRows_Agregar = mysql_num_rows($Agregar);$varDato_Agregar = "0";
if (isset($_GET['action'])) {
  $varDato_Agregar = $_GET['action'];
}
mysql_select_db($database_archivo, $archivo);
$query_Agregar = sprintf("SELECT * FROM usuarios WHERE usuarios.Contador = %s", GetSQLValueString($varDato_Agregar, "int"));
$Agregar = mysql_query($query_Agregar, $archivo) or die(mysql_error());
$row_Agregar = mysql_fetch_assoc($Agregar);
$totalRows_Agregar = mysql_num_rows($Agregar);
?>
<div style="width:600px">

<div style="float:left"><img style="float:left; border-radius:3px" src="usuarios/imgp/<?php if ($row_Agregar['Imagen'])  
		   {?><?php echo $row_Agregar['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="150" height="150" /> </div>
            
            
<div style="float:left">

<table style="text-align:left; float:left; font-size:14px; margin-left:10px" width="auto" border="0" cellspacing="2" cellpadding="2">

  
  
  <tr>
    <th style="padding:5px">
    <?php echo $row_Agregar['Nombre']; ?> <?php echo $row_Agregar['Apellido']; ?>
    </th>
  </tr>
  

  
    <tr>
    <th style="padding:5px">
    <?php if ($row_Agregar['Sexo'] == 1) echo "Hombre";
	if ($row_Agregar['Sexo'] == 2) echo "Mujer";
	 ?>
     </th>
  </tr>
  <tr>
    <th style="padding:5px">
 <?php 
	if  ($row_Agregar['Universidad'] == 0) 
	echo "No especificado";
	if  ($row_Agregar['Universidad'] == 1) 
	echo "Universidad Bicentenaria de Aragua";
	if  ($row_Agregar['Universidad'] == 2) 
	echo "Universidad Central de Venezuela";
	if  ($row_Agregar['Universidad'] == 3) 
	echo "Universidad Simón Bolívar";
	if  ($row_Agregar['Universidad'] == 4) 
	echo "Universidad de Carabobo";
	if  ($row_Agregar['Universidad'] == 5) 
	echo "Universidad de Los Andes";
	if  ($row_Agregar['Universidad'] == 6) 
	echo "Universidad Arturo Michelena";
	 ?>
     </th>
  </tr>
  <tr>
    <th style="padding:5px">
    
   <?php 
	if  ($row_Agregar['Carrera'] == 0) 
	echo "No especificado";
	if  ($row_Agregar['Carrera'] == 1) 
	echo "Ingeneria en sistemas";
	if  ($row_Agregar['Carrera'] == 2) 
	echo "Ingeneria electrica";
	if  ($row_Agregar['Carrera'] == 3) 
	echo "Administración de empresas";
	if  ($row_Agregar['Carrera'] == 4) 
	echo "Derecho";
	if  ($row_Agregar['Carrera'] == 5) 
	echo "Psicología";
	if  ($row_Agregar['Carrera'] == 6) 
	echo "Comunicación social";
	if  ($row_Agregar['Carrera'] == 7) 
	echo "Contaduría pública";
	 ?>
   </th>
  </tr>
  <tr>
  <th style="padding:5px">
    <?php echo $row_Agregar['Telefono']; ?></th>
  </tr>
 
  </table>
<!--<br>




<a style="width:120px; float:left; margin-left:317px" class="opcionesperfil">Agregar a conocidos</a>-->


</div>

</div>
<?php
mysql_free_result($Agregar);
?>

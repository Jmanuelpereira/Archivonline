
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

$maxRows_Usuariosr = 4;
$pageNum_Usuariosr = 0;
if (isset($_GET['pageNum_Usuariosr'])) {
  $pageNum_Usuariosr = $_GET['pageNum_Usuariosr'];
}
$startRow_Usuariosr = $pageNum_Usuariosr * $maxRows_Usuariosr;

mysql_select_db($database_archivo, $archivo);
$query_Usuariosr = "SELECT * FROM usuarios ORDER BY usuarios.Contador DESC";
$query_limit_Usuariosr = sprintf("%s LIMIT %d, %d", $query_Usuariosr, $startRow_Usuariosr, $maxRows_Usuariosr);
$Usuariosr = mysql_query($query_limit_Usuariosr, $archivo) or die(mysql_error());
$row_Usuariosr = mysql_fetch_assoc($Usuariosr);

if (isset($_GET['totalRows_Usuariosr'])) {
  $totalRows_Usuariosr = $_GET['totalRows_Usuariosr'];
} else {
  $all_Usuariosr = mysql_query($query_Usuariosr);
  $totalRows_Usuariosr = mysql_num_rows($all_Usuariosr);
}
$totalPages_Usuariosr = ceil($totalRows_Usuariosr/$maxRows_Usuariosr)-1;
?>
<div class="menuizquierdo" style="width:425px; height:200px; padding:10px; padding-left:5px">
 
 
 	<h3><img src="../img/agregados/1410926052_user-group-128.png" width="18" height="18" /> Usuarios nuevos</h3>
    
    
   <?php do { ?>
     <div class="usariosrecientes" style=" width:195px">
        
       <a id="example2" href="usuarios/imgp/<?php if ($row_Usuariosr['Imagen'])  
		   {?><?php echo $row_Usuariosr['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>"><img style="float:left; border-radius:3px" src="usuarios/imgp/<?php if ($row_Usuariosr['Imagen'])  
		   {?><?php echo $row_Usuariosr['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="50" height="50" /> </a>
        
       <div style="margin-left:40px"><h3 style="padding-top:5px; margin-bottom:0px"><?php echo $row_Usuariosr['Nombre']; ?> <?php echo $row_Usuariosr['Apellido']; ?></h3>
         <h4 style="padding-top:5px; margin-bottom:0px; padding-right:0px"><?php 
	if  ($row_Usuariosr['Universidad'] == 0) 
	echo "U.B.A";
	if  ($row_Usuariosr['Universidad'] == 1) 
	echo "U.B.A";
	if  ($row_Usuariosr['Universidad'] == 2) 
	echo "U.C.V";
	if  ($row_Usuariosr['Universidad'] == 3) 
	echo "U.S.B";
	if  ($row_Usuariosr['Universidad'] == 4) 
	echo "U.C";
	if  ($row_Usuariosr['Universidad'] == 5) 
	echo "U.L.A";
	if  ($row_Usuariosr['Universidad'] == 6) 
	echo "U.A.M";
	if  ($row_Usuariosr['Universidad'] == 8) 
	echo "OTRA";
	 ?>, <?php 
	if  ($row_Usuariosr['Sede'] == 0) 
	echo "Sin especificar";
	if  ($row_Usuariosr['Sede'] == 1) 
	echo "San Joaquín de Turmero";
	if  ($row_Usuariosr['Sede'] == 2) 
	echo "San Antonio de los altos";
	if  ($row_Usuariosr['Sede'] == 3) 
	echo "San Fernando de Apure";
	if  ($row_Usuariosr['Sede'] == 4) 
	echo "Puerto Ordaz"; ?></h4>
       <a class="various2" href="usuarios/agregar.php?action=<?php echo $row_Usuariosr['Contador']; ?>" style="padding-top:5px; margin-bottom:0px; float:right; text-decoration: underline;
	cursor:pointer"><img src="../img/agregados/1411615358_678092-sign-add-128.png" width="8" height="8" /> Ver perfil</a></div>
        
        
        
        
     </div>
      <?php } while ($row_Usuariosr = mysql_fetch_assoc($Usuariosr)); ?>
      
      <a href="indexad.php?action=UsuariosNuevos" class="agregarconocido" style="font-size:12px; padding-top:15px; margin-bottom:0px; float:right; padding-right:0px"> Ver todos los usuarios nuevos</a>
 
 
 
 
 </div>
 <?php
mysql_free_result($Usuariosr);
?>

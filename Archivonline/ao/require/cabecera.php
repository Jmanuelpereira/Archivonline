<?php require_once('../Connections/archivo.php'); ?>
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

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<a href="indexad.php"><img style="float:left" src="../img/logo4.png" width="250" height="50" /></a>
<form action="documentos/desearch.php">
<input type="search" aria-autocomplete="list" id="Documento" name="Documento" style="float:right" placeholder="Número de documento" size="30" /></form>

<!--<img style="float:left" src="../img/logo.png" width="150" height="35" />
<p style="float:right; padding:5px; color:#FFF"><img src="../img/iconos/1412129464_user.png" width="12" height="12" /> <?php if (isset($_SESSION['MM_Username'])) echo "".$_SESSION['MM_Username'];?></p>-->
<!--<div style="float:right"><form style="" name="form2" method="get" action="documentos/busqueda.php">
  
  <input type="search" name="Buscar" id="Buscar" class="campoeditable" style="padding:15px" placeholder="Codigo del documento" size="25" />
  <input type="submit" style="width:60px; padding:15px" class="Botontablas" value="Buscar"  /></form>
  </div>-->
<!--<a href="documentos/documento-add.php" title="Agregar documento"><div class="agregar" style="float:right"><img src="../img/iconos/add-document.png" width="40" height="40" /></div></a>-->
<?php
mysql_free_result($Recordset1);
?>

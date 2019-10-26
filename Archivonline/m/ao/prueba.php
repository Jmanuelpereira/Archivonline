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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO documentos (Nombre, Nombreachivo, Categoria, TDC) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Nombreachivo'], "text"),
                       GetSQLValueString($_POST['Categoria'], "int"),
                       GetSQLValueString($_POST['TDC'], "text"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());
}
?>
<div style="width:900px; padding:20px">
<h1><img src="../img/agregados/1411615358_678092-sign-add-128.png" width="25" height="25"> Agregar documento</h1>

<br>
<br>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Nombre:</td>
      <td><input type="text" name="Nombre" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nombreachivo:</td>
      <td><input type="text" name="Nombreachivo" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Categoria:</td>
      <td><input type="text" name="Categoria" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">TDC:</td>
      <td><input type="text" name="TDC" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</div>
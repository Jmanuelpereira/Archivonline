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
  $insertSQL = sprintf("INSERT INTO usuarios (Nombre, Apellido, Correo, Telefono, Contrasena, Rango, Fecharegistro, Carrera, Sexo, Estado) VALUES (%s, %s, %s, %s, %s, 1, NOW(), 0, %s, 1)",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
                       GetSQLValueString($_POST['Correo'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString(md5($_POST['Contrasena']), "text"),
                       GetSQLValueString($_POST['Sexo'], "int"));

  mysql_select_db($database_archivo, $archivo);
  $Result1 = mysql_query($insertSQL, $archivo) or die(mysql_error());

  $insertGoTo = "../iniciar-sesion.php?r=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<form action="<?php echo $editFormAction; ?>" method="post" style="float:right; margin:20px" name="form1" id="form1">
  <h1 style="padding-left:5px; margin-bottom:0px">Abre una cuenta</h1>
    <p style="padding-left:5px; margin-bottom:10px">Es totalmente gratis</p>
      <table align="center">
        <tr valign="baseline">
          
          <td><span id="sprytextfield1">
            <input type="text" class="campoindex" style="width:109px; float:left" name="Nombre" value="" placeholder="Nombre" size="32" />
          <span class="textfieldValidState"></span></span>
          <span id="sprytextfield2">
            <input name="Apellido" type="text" style="width:109px; float:left; margin-left:10px" class="campoindex" value="" placeholder="Apellido" size="32" />
          <span class="textfieldValidState"></span></span>
          </td>
        </tr>
        

        <tr valign="baseline">
          <td><span id="sprytextfield3">
          <input name="Correo" id="usuario" type="text" class="campoindex" value="" placeholder="E-mail" size="32" />
          <span class="textfieldValidState"></span><span class="textfieldValidState"></span></span></td>
        </tr>
        <tr valign="baseline">
          
          <td><span id="sprytextfield4">
            <input name="Telefono" id="Telefono" type="text" class="campoindex" value="" placeholder="Teléfono movil" size="32" />
          <span class="textfieldValidState"></span><span class="textfieldValidState"></span></span></td>
        </tr>
        <tr valign="baseline">
          
          <td><span id="sprytextfield5">
            <input name="Contrasena" type="password" class="campoindex" value="" placeholder="Contrase&ntilde;a" size="32" />
          <span class="textfieldValidState">.</span></span></td>
        </tr>
        <tr valign="baseline">
          
          <td><span id="spryselect1">
            <select class="campoindex" style="width:322px; padding-right:50px" name="select">
              <option value="0" class="campoindex">Selecciona tu universidad</option>
              <option value="1"  class="campoindex">Universidad Bicentenaria de Aragua</option>
              <option value="2"  class="campoindex">Universidad Central de Venezuela</option>
              <option value="3"  class="campoindex">Universidad Simón Bolívar</option>
              <option value="4"  class="campoindex">Universidad de Carabobo</option>
              <option value="5"  class="campoindex">Universidad de Los Andes</option>
              <option value="6"  class="campoindex">Universidad Arturo Michelena</option>
              <option value="8"  class="campoindex">Otra universidad</option>
            </select>
          <span class="selectRequiredState"></span><span class="selectRequiredState"></span></span></td>
        </tr>
        
        <tr valign="baseline">
          
          <td valign="baseline"><table>
            <tr>
            
                
            </tr>
          </table></td>
        </tr>
        <tr valign="baseline">
          
          <td style="font-size:10px"><span id="spryradio1">
          <label style="font-size:16px; float:left">
            <input type="radio" name="Sexo" value="1" id="Sexo_0" />
            Hombre</label>
          
          <label style="font-size:16px; float:left; margin-left:30px">
            <input type="radio" name="Sexo" value="2" id="Sexo_1" />
            Mujer</label>
<span class="radioInvalidMsg"></span></span><br /><br />
<br />


Al registrarse aceptas nuestros terminos y condiciones <br /> de usuarios.</td>
        </tr>
        <tr valign="baseline">
          
          <td align="right"><input type="submit" style="padding:10px; font-size:20px; width:150px;    box-shadow: 0 0 10px #53A9FF;
    -webkit-box-shadow: 0 0 10px #53A9FF;
    -moz-box-shadow: 0 0 10px #53A9FF;
    border:1px solid #53A9FF;" class="boton" value="Abrir cuenta" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
  </form>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "custom", {validateOn:["blur", "change"], pattern:"0000-0000000", useCharacterMasking:true});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"], invalidValue:"0"});
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1", {validateOn:["blur"]});
  </script>
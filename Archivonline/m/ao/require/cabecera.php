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
<script>$(document).ready(main);
 
var contador = 1;
 
function main(){
	$('.menu_bar').click(function(){
		// $('nav').toggle(); 
 
		if(contador == 1){
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
 
	});
 
};</script>
<!--<a href="indexad.php"><img style="float:left" src="../img/logo4.png" width="130" height="30" /></a>-->
<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span><img style="float:left" src="../img/logo4.png" width="160" height="40" /></a>
		</div>
 
		<nav>
			<ul>
				<li><a style="color:#FFF" href="indexad.php"><span class="icon-home3"></span>Inicio</a></li>
				<li><a style="color:#FFF" href=""><span class="icon-box-remove"></span>Subir</a></li>
				<li><a style="color:#FFF" href="#"><span class="icon-folder-open"></span>Archivos</a></li>
				<li><a style="color:#FFF" href="#"><span class="icon-address-book"></span>Perfil</a></li>
				<li><a style="color:#FFF" href="#"><span class="icon-equalizer"></span>Opciones</a></li>
			</ul>
		</nav>
	</header>



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

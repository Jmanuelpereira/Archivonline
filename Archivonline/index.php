<?php require_once('Connections/archivo.php'); ?>
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

$maxRows_Usuariosr = 12;
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

$maxRows_Recordset2 = 4;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_archivo, $archivo);
$query_Recordset2 = "SELECT * FROM documentos WHERE documentos.Categoria = 1 ORDER BY documentos.Contador DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $archivo) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "ao/indexad.php";
  $MM_redirectLoginFailed = "iniciar-sesion.php?r=2";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_archivo, $archivo);
  
  $LoginRS__query=sprintf("SELECT Correo, Contrasena FROM usuarios WHERE Correo=%s AND Contrasena=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $archivo) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/basefrente.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Archivo Online</title>

<!-- InstanceBeginEditable name="head" -->
<script>$( function(){
    var arrImagenes = [ 'fondo.jpg','fondocabezera.jpg', 'inicio.jpg' ];
    var imagenActual = 'inicio.jpg';
	var tiempo = 5000;
	var id_contenedor = 'iniciar'
    setInterval( function(){
        do{
            var randImage = arrImagenes[Math.ceil(Math.random()*(arrImagenes.length-1))];
        }while( randImage == imagenActual )
        imagenActual = randImage;
        cambiarImagenFondo(imagenActual, id_contenedor);
    }, tiempo)
})

function cambiarImagenFondo(nuevaImagen, contenedor){
	var contenedor = $('#' + contenedor);
	//cargar imagen primero
	var tempImagen = new Image();
	$(tempImagen).load( function(){
		contenedor.css('backgroundImage', 'url('+tempImagen.src+')');
	});
	tempImagen.src = 'img/Fondos/' + nuevaImagen;
}</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="styles.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.3.2.js"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />

<style>.selectValidState select, select.selectValidState {
	background-image: url(img/agregados/pequeno.png);
	
	background-repeat: no-repeat;
	background-position:right !important;
	padding-right: 50px }
select.selectRequiredState, .selectRequiredState select,
select.selectInvalidState, .selectInvalidState select {
	

	background-image: url(img/agregados/pequeno-error.png);
	
	background-repeat: no-repeat;
	background-position:right !important;
	padding-right: 50px
}
.container { padding-right:40px
	
	
	
	
}


center { padding-left:0px}

</style>

<!-- InstanceEndEditable -->
<link href="css/estilosfrente.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:600,500' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/iconos/favicon2.ico" </link>
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://m.archivonline.com.ve');
?>
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
  <?php  require("requirefrente/cabecera.php"); ?>
</div></div>
<!-- InstanceEndEditable -->
<div class="container"><!-- InstanceBeginEditable name="Contenido" -->

   <center> <div class="inicio" style=" margin-top:50px; margin-left:0px">
 <h2 style="margin-left:0px">Iniciar sesión</h2>
 <form action="<?php echo $loginFormAction; ?>" name="acceso" style="margin-left:0px" id="acceso" METHOD="POST">
     <span style="margin:0px; float:left;" class="imgboton"><img src="img/iconos/contactop.png" width="16" height="18" /></span><input name="usuario" class="campo" style="margin:0px;font-size:12px; padding:10px; border-radius:3px; float:left; border-top-left-radius: 0px; border-bottom-left-radius: 0px; width:235px " type="text"  id="usuario" placeholder="Correo electrónico" />
   <br />
   <br />
   <br />



   <span style="margin:0px; float:left; padding:10px; padding-top:9px" class="imgboton"><img src="img/iconos/contra.png" width="15" height="16" /></span>
   <input type="password" style="font-size:12px; padding:10px;margin:0px; float:left; border-radius:3px; border-top-left-radius: 0px; border-bottom-left-radius: 0px; width:235px" class="campo" placeholder="Contrase&ntilde;a"  id="contrasena" name="contrasena" /><br />
<br />
<br />



   <center><input  type="submit" class="btn"  value="Iniciar sesión" class="" />
   <br />

<br />

  <a id="various5" href="requirefrente/registrarse.php" style="float:right; font-size:12px">Registrarse</a>  <a class="various2" href="requirefrente/modorecuperar.php?action=recuperar-contrasena&caso=Rmcorreo" style="float:left; font-size:12px">¿Olvidaste la contraseña?</a> 
  <br />


 </form>
</div></center>

 <!--<center><a id="various5" href="requirefrente/registrarse.php" style="padding:15px; text-decoration:none; color:white; font-size:16px" class="btn">Registrarse</a></center>-->
   

  <!-- InstanceEndEditable --><!-- end .container --></div>
  <!-- InstanceBeginEditable name="Footer" -->
  <footer><div class="fondofooter"><div class="footer">
    <?php require("ao/require/pie.php"); ?>
    <!-- end .footer -->
  </div></div></footer>

<!-- InstanceEndEditable -->
  </div>
</body>

<!-- InstanceEnd --></html>

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

mysql_select_db($database_archivo, $archivo);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $archivo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 $_GET['m'] = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/basefrente.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<title>Archivo Online</title>

<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<style>.advertencia {
	background-color: #FFFFCE;
	text-align: left;
	padding: 10px;
	width: 200px;
	float: left;
	height: auto;
	width: 580px;
	border: 1px solid #FFDF00;

	
	}
    
    
    .container {


    padding-bottom: 20px;
	padding-top:20px;
	float:left

	
}</style>
    <script language="JavaScript">

    /* Determinamos el tiempo total en segundos */
    var totalTiempo=10;
    /* Determinamos la url donde redireccionar */
    var url="index.php";

    function updateReloj()
    {
        document.getElementById('CuentaAtras').innerHTML = "Redireccionando en "+totalTiempo+" segundos";

        if(totalTiempo==0)
        {
            window.location=url;
        }else{
            /* Restamos un segundo al tiempo restante */
            totalTiempo-=1;
            /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */
            setTimeout("updateReloj()",1000);
        }
    }

    window.onload=updateReloj;

    </script>
<!-- InstanceEndEditable -->
<link href="css/estilosfrente.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
  
   
    
   
   
   <?php 
  
    $caso = isset($_GET['action']) ? $_GET['action'] : NULL ;
   switch ($caso): 
   
   
   case "recuperar-contrasena": {
   
   ?>
   <div class="sesion" style="width:auto; margin-left:0px; margin-top:10px; font-size:12px">
   <h1>Recuperar contrasena</h1>
   
   <form style="float:left" action="requirefrente/enviar-registro.php" method="post" name="form1" id="form1">
     <table align="center">
 <?php $caso = isset($_GET['caso']) ? $_GET['caso'] : NULL ;
   switch ($caso): 
   
   
   case "Rmtlf": { ?>
       <tr valign="baseline">
         <td><input name="Telefono" type="text" class="campotlf" placeholder="Numero de telefono" size="32" /></td>
       </tr>
       
       
       <tr valign="baseline">
         <td><input type="submit" class="boton" value="Recuperar contrasena" /></td>
       </tr>
       <?php } break;
	   case"Rmcorreo": {?>
        <tr valign="baseline">
         <td><input name="Correo" id="Correo" type="text" class="campocorreo" placeholder="Correo electronico" size="32" /></td>
       </tr>
       
       
       <tr valign="baseline">
         <td><input type="submit" class="boton" value="Recuperar contrasena" /></td>
       </tr>
       <?php } endswitch; ?>
     </table>
 
   
  </div>
    </form>
     <?php } 
	 break;
	 case "recuperado-ok": { ?> 
    <center><div class="advertencia" style="margin-left:400px; margin-top:100px; margin-bottom:140px"><h1 align="left">¡Enhorabuena!</h1>
      

<h3>Tu contraseña fue recuperada, revisa tu correo electronico y sigue las intrucciones.
  
</h3>

<h4> <img src="img/iconos/1409342503_error.png" width="14" height="14" /> El mensaje puede tardar hasta 5 minutos en llegar

</h4>
<br />
<h5 style="color:#F00; margin-bottom:0px" align="center" id='CuentaAtras'></h5>



</div></center>
	 
	 
	 
	 <?php }
	 break;
	 default: { ?>
 
   
   
  
  
<a href="recuperar.php?action=recuperar-contrasena&caso=Rmpregunta"><div class="recuperarpciones">
<h3 align="center"><?php if (4 > 3) echo "NO DISPONIBLE"; else { ?>Recuperar mediante pregunta secreta<?php } ?></h3>

<!--<center><img src="img/iconos/1418510377_live-help-256.png" width="128" height="128" /></center> -->
</div></a>

<a href="recuperar.php?action=recuperar-contrasena&caso=Rmtlf"><div class="recuperarpciones" style="margin-left:10px">
<h3 align="center"><?php if (4 != 3) echo "NO DISPONIBLE"; else { ?>Recuperar mediante mensaje de texto<?php } ?></h3>

<!--<center><img src="img/iconos/1418510595_textsms-256.png" width="128" height="128" /></center> -->


</div></a>

<a class="various2" href="requirefrente/modorecuperar.php?action=recuperar-contrasena&caso=Rmcorreo"><div class="recuperarpciones" style="margin-left:10px">
<h3 align="center">Recuperar mediante un email a tu correo</h3>

<center><img src="img/iconos/contacto.png" width="128" height="128" /></center> 


</div></a>

<div class="sesion" style="width:1155px; margin-left:0px; margin-top:10px; font-size:12px">

<p style="font-size:12px">Si ninguno de estos metodos te fue util para restablecer tu contrasena puedes comunicarte con nosotros directamente por medio del correo <strong>contacto@archivonline.com.ve</strong> y podremos solucionar tu problema.</p>


</div>
   <?php } endswitch; ?>

  <!-- InstanceEndEditable --><!-- end .container --></div>
  <!-- InstanceBeginEditable name="Footer" -->
  <footer><div class="fondofooter"><div class="footer">
    <?php  require("ao/require/pie.php");  ?>
    <!-- end .footer -->
  </div></div></footer>

  <!-- InstanceEndEditable -->
  </div>
</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>

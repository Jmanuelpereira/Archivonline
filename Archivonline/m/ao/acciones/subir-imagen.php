<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="file:///P|/wamp/www/css/estilosadmin.css" rel="stylesheet" type="text/css" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir</title>
<style>.Botontablas {
    background-color: #252525;
    background-image: -moz-linear-gradient(center top , #5bde6a, #2fb442);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-radius: 6px 6px 6px 6px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(255, 255, 255, 0.35) inset, 0 10px 20px rgba(255, 255, 255, 0.12) inset, 0 -10px 30px rgba(0, 0, 0, 0.12) inset;
    color: white;
    display: block;
    cursor:pointer;
    font-size: 15px;
    
    padding: 5px;
    text-align: center;
    text-decoration: none;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.45);
    width: 100px;
	margin-bottom:50px
}
.Botontablas a:hover {
    background-color: #2fb438 !important;
    background-image: -moz-linear-gradient(center top , #2fb45e, #2fb445);
}
body{
	background-image:url(../../img/fondos/fondo.jpg)
	}</style>
</head>

<body>

<?php if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "form2")) {
	$nombre_archivo = $_FILES['userfile']['name']; 
	move_uploaded_file($_FILES['userfile']['tmp_name'], "../usuarios/imgp/".$nombre_archivo);
	
	?>
    <script>
		opener.document.form2.<?php echo $_POST["nombrecampo"]; ?>.value="<?php echo $nombre_archivo; ?>";
		self.close();
	</script>
    <?php
}
else
{?>


<div class="gestionimagen"><form action="../acciones/subir-imagen.php" method="post" style="padding-top:10px" enctype="multipart/form-data" id="form2" name="form2" class="margensuperior">

  <p>
    <input class="Botontablas" style="width:auto" name="userfile" type="file" />
  </p>
  <p>
   <p align="right"><a style="color:#FFF; text-decoration:none; margin-bottom:0" class="Botontablas" href="javascript:document.form2.submit();"><span>Subir</span></a></p> 

  </p><input name="nombrecampo" type="hidden" value="<?php echo $_GET["campo"]; ?>" />
  <input type="hidden" name="enviado" value="form2" />
</form></div>
<?php }?>
</body>
</html>
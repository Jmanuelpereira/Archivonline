<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<style>
.recientes3:hover {
	
}
.contactar {
	font-size:9px;
	background-color:#CCC;
	border:#999 solid 1px;
	width:48px;
	padding:1px;
	text-align:center;
	cursor:pointer
	
	
	
	}
h6 {
	margin:0px}
	
	.recientes3 {
	background-color: #F2F2F2;
	margin: 5px;
	padding: 5px;
	
	width: 210px;
	border: 1px solid #DADADA;
	height: 20px;
}</style>
<div style="float:left; height:485px">

<a href="../indexad.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../../img/agregados/inicio.png" width="20" height="20" /><h4 style="text-align:center">Inicio</h4></div></a>

    
  <a href="publicos.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../../img/agregados/publicos.png" width="20" height="20" /><h5>Documentos publicos</h5></div></a>
  
    <a href="privados.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../../img/agregados/privados.png" width="20" height="20" /><h5>Documentos privados</h5></div></a>
  

  
  <a href="mis-documentos.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../../img/agregados/perfil.png" width="20" height="20" /><h5>Mis documentos</h5></div></a>
  
    <a href="../servicios/servicios.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../../img/agregados/servicios.png" width="20" height="20" /><h5>Servicios y utilidades</h5></div></a>
  
<div class="recientes3" style="height:250px"><h5 style="text-align:center; margin:0px">Versiculo del día</h5>
 <br />

<p style="font-size:12px">Dios bendice
a quienes no siguen malos consejos
ni andan en malas compañías
ni se juntan con los que se burlan de Dios.
</p>
<p style="font-size:12px; float:right">Salmos 1:1</p>
</div>
  
  </div>

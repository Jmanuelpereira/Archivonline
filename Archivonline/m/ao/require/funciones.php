<?php function FnMostrarNombreUsuario ($identificador)

{
		
	$varCorreo_Fusuarios = "0";
	if (isset($_SESSION["MM_Idusuario"])) {
	  $varCorreo_Fusuarios = $_SESSION["MM_Idusuario"];
	}
	mysql_select_db($database_archivo, $archivo);
	$query_Fusuarios = sprintf("SELECT * FROM usuarios WHERE usuarios.Correo = %s", GetSQLValueString($varCorreo_Fusuarios, "text"));
	$Fusuarios = mysql_query($query_Fusuarios, $archivo) or die(mysql_error());
	$row_Fusuarios = mysql_fetch_assoc($Fusuarios);
	$totalRows_Fusuarios = mysql_num_rows($Fusuarios);
	
	mysql_free_result($Fusuarios);
		
}

?>
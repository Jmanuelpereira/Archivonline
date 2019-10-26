<div class="inicio" style="width:auto; margin-left:0px; margin-top:0px; font-size:12px; float:left">
   <h3>Recuperar contraseña</h3>
   
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
         <td><span style="margin:0px; float:left;" class="imgboton"><img src="img/iconos/contactop.png" width="16" height="18" /></span><input style="margin:0px;font-size:12px; padding:10.5px; border-radius:3px; float:left; border-top-left-radius: 0px; border-bottom-left-radius: 0px; width:70% " name="Correo" id="Correo" type="text" class="campo" placeholder="Correo electronico" /></td>
       </tr>
       
       

       <tr style="margin-top:10px" valign="baseline">

         <td style="padding-top:10px" align="right"><input type="submit" class="btn" style="width:40%" value="Recuperar" /></td>
       </tr>
       <?php } endswitch; ?>
     </table>
 
   
  </div>
    </form>
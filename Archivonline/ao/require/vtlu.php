<?php switch (isset($_GET['action'])):
  
  case "UsuariosNuevos": { ?>
  
  
  
 <?php do { ?>
     <div class="usariosrecientes" style=" width:195px">
        
       <a id="example2" href="usuarios/imgp/<?php if ($row_Usuariosr['Imagen'])  
		   {?><?php echo $row_Usuariosr['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>"><img style="float:left; border-radius:3px" src="usuarios/imgp/<?php if ($row_Usuariosr['Imagen'])  
		   {?><?php echo $row_Usuariosr['Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="50" height="50" /> </a>
        
       <div style="margin-left:40px"><h3 style="padding-top:5px; margin-bottom:0px"><?php echo $row_Usuariosr['Nombre']; ?> <?php echo $row_Usuariosr['Apellido']; ?></h3>
         <h4 style="padding-top:5px; margin-bottom:0px; padding-right:0px">U.B.A, <?php 
	if  ($row_Usuariosr['Sede'] == 0) 
	echo "Sin espesificar";
	if  ($row_Usuariosr['Sede'] == 1) 
	echo "San Joaquín";
	if  ($row_Usuariosr['Sede'] == 2) 
	echo "San Antonio de los altos";
	if  ($row_Usuariosr['Sede'] == 3) 
	echo "San Fernando de Apure";
	if  ($row_Usuariosr['Sede'] == 4) 
	echo "Puerto Ordaz"; ?></h4>
       <a class="various2" href="usuarios/agregar.php?action=<?php echo $row_Usuariosr['Contador']; ?>" style="padding-top:5px; margin-bottom:0px; float:right; text-decoration: underline;
	cursor:pointer"><img src="../img/agregados/1411615358_678092-sign-add-128.png" width="8" height="8" /> Agregar a conocidos</a></div>
        
        
        
        
     </div>
      <?php } while ($row_Usuariosr = mysql_fetch_assoc($Usuariosr)); ?>
  
  
 
  
  
  
  
  
  
  <?php
   }
   break;
   
   default: {
   
    ?>
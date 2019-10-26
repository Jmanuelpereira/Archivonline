<div style="float:left">
  <a class="various2" href="documentos/documento-agregar.php?d=3"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/agregar.png" width="20" height="20" />
    <h5>Agregar documento</h5></div></a>
    <?php if ($_SESSION['MM_Rango'] == 5) { ?>
      <a href="administrador/usuarios.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/publicos.png" width="20" height="20" /><h5>Usuarios</h5></div></a>
        <a href="administrador/noticias.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/noticias.png" width="20" height="20" /><h5>Noticias</h5></div></a>
          <a href="administrador/impresiones-adm.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/impresiones.png" width="20" height="20" /><h5>Impresiones</h5></div></a>
            <a href="administrador/administracion.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/config.png" width="20" height="20" /><h5>Administración</h5></div></a>
			
<a href="administrador/administracion.php"><div class="recientes" style="height:330px"><h5 style="text-align:center">Compras recientes</h5></div></a>			
			
			<?php }  else {?>
    
  <a href="documentos/publicos.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/publicos.png" width="20" height="20" /><h5>Documentos publicos</h5></div></a>
  <a  href="documentos/privados.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/privados.png" width="20" height="20" /><h5>Documentos privados</h5></div></a>

  <a href="documentos/mis-documentos.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/perfil.png" width="20" height="20" /><h5>Mis documentos</h5></div></a>
    <a href="servicios/servicios.php"><div class="recientes"><img style="float:left; margin-right:10px" src="../img/agregados/servicios.png" width="20" height="20" /><h5>Servicios y utilidades</h5></div></a>
  
<?php require("require/noticias.php"); ?>
     
     

    

  <?php } ?>
  
  </div>
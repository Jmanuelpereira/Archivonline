<div style="float:none; width: auto;">
    <div style="float:left">
      <div class="inicio" style="height:auto; width:auto; padding:10px" >
      <h2>Documentos más recientes</h2>
       
        <?php do { ?>
        <a class="various2" href="documentos/documento2.php?Documento=<?php echo $row_Recordset2['Contador']; ?>"><div class="reciente" style="width:435px"><img style="float:left" src="../img/iconos/<?php switch ($row_Recordset2['TDC']):
		
		case "pdf": echo "pdf";
		break; 
		
		case "excel": echo "excel";
		break; 
		
		default: echo "drecientes";
		
		
		endswitch;?>.png" width="54" height="64" /><div style="float:left"><h5 style="width:100px; font-stretch:normal; padding-right:5px"  ><?php echo $row_Recordset2['Nombre']; ?></h5>
            <p style="font-size:10px; float:left"><?php echo $row_Recordset2['Fecha']; ?></p></div>
            
            
          <div style="float:right">
            <p style="font-size:11px; float:left; padding-right: 5px;
	padding-left: 0px;"><?php 
	if ($row_Recordset2['Carrera'] == 0) echo "Sin carrera";
	if ($row_Recordset2['Carrera'] == 1) echo "Ing. Sistemas";
	if ($row_Recordset2['Carrera'] == 2) echo "Ing. Electrica";
	if ($row_Recordset2['Carrera'] == 3) echo "Administración";
	if ($row_Recordset2['Carrera'] == 4) echo "Derecho";
	if ($row_Recordset2['Carrera'] == 5) echo "Psicología";
	if ($row_Recordset2['Carrera'] == 6) echo "C. Social"; ?> |</p>
              
            <p style="font-size:11px; float:left; padding-right: 5px;
	padding-left: 0px;"><?php 
	if ($row_Recordset2['Semestre'] == 0) echo "Sin semestre";
	if ($row_Recordset2['Semestre'] == 1) echo "1er semestre";
	if ($row_Recordset2['Semestre'] == 2) echo "2do semestre";
	if ($row_Recordset2['Semestre'] == 3) echo "3er semestre";
	if ($row_Recordset2['Semestre'] == 4) echo "4to semestre";
	if ($row_Recordset2['Semestre'] == 5) echo "5to semestre";
	if ($row_Recordset2['Semestre'] == 6) echo "6to semestre";
	if ($row_Recordset2['Semestre'] == 7) echo "7mo semestre";
	if ($row_Recordset2['Semestre'] == 8) echo "8vo semestre";
	if ($row_Recordset2['Semestre'] == 9) echo "9no semestre";
	if ($row_Recordset2['Semestre'] == 10) echo "10mo semestre";
	 ?> |</p>
            <p style="font-size:11px; float:left; padding-right: 0px;
	padding-left: 0px;"><?php 
	if ($row_Recordset2['Materia'] == 0) echo "Sin materia";
	if ($row_Recordset2['Materia'] == 1) echo "Deontología";
	if ($row_Recordset2['Materia'] == 2) echo "DHP I";
	if ($row_Recordset2['Materia'] == 3) echo "TGS";
	if ($row_Recordset2['Materia'] == 4) echo "Cultura I";
	if ($row_Recordset2['Materia'] == 5) echo "Estructura S.";
	if ($row_Recordset2['Materia'] == 6) echo "Matematica I";
	if ($row_Recordset2['Materia'] == 7) echo "Logica M.";
	if ($row_Recordset2['Materia'] == 8) echo "Matematica II";
	if ($row_Recordset2['Materia'] == 9) echo "Matematica III";
	if ($row_Recordset2['Materia'] == 10) echo "Matematica IV";
	if ($row_Recordset2['Materia'] == 11) echo "Matematica V";
	if ($row_Recordset2['Materia'] == 12) echo "Cultura II";
	if ($row_Recordset2['Materia'] == 13) echo "DHP II";
	if ($row_Recordset2['Materia'] == 14) echo "Otras";
	if ($row_Recordset2['Materia'] == 15) echo "Deontología";
	if ($row_Recordset2['Materia'] == 16) echo "Deontología";
	if ($row_Recordset2['Materia'] == 17) echo "Deontología";
	if ($row_Recordset2['Materia'] == 18) echo "Deontología";
	if ($row_Recordset2['Materia'] == 19) echo "Deontología";
	if ($row_Recordset2['Materia'] == 20) echo "Deontología";
	if ($row_Recordset2['Materia'] == 21) echo "Deontología";
	if ($row_Recordset2['Materia'] == 22) echo "Deontología";
	if ($row_Recordset2['Materia'] == 23) echo "Deontología";
	if ($row_Recordset2['Materia'] == 24) echo "Deontología";
	if ($row_Recordset2['Materia'] == 25) echo "Deontología";
	if ($row_Recordset2['Materia'] == 26) echo "Deontología";
	if ($row_Recordset2['Materia'] == 27) echo "Deontología";
	if ($row_Recordset2['Materia'] == 28) echo "Deontología";
	if ($row_Recordset2['Materia'] == 29) echo "Deontología";
	if ($row_Recordset2['Materia'] == 30) echo "Deontología";
	
	 ?></p>
            <p style="font-size:10px; ; padding-right: 0px;
	padding-left: 0px;">&nbsp;</p>
              
              
            <p style="font-size:11px;  padding-right: 0px;
	padding-left: 0px; float:right"><?php if($row_Recordset2['Pidentidad'] == 0) echo " Anónimo"; else { ?><?php 
	switch($row_Recordset2['Verificacion']):
	 case 2: 
	 
	 echo
	  "Prof. ".  $row_Recordset2['Profesor'];   
	 break; 
	 
	 default:  echo $row_Recordset2['Profesor'];   
	 
	 
	 endswitch; }
	 
	 if ($row_Recordset2['Verificacion'] > 1) { ?>
              <img src="../img/agregados/1410926033_678134-sign-check-256.png" width="9" height="9" title="Verificado" /> 
            <?php } ?></p>
              
          </div>
        </div></a>
          <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
       
      </div></div>
     <div class="menuizquierdo" style="font-size:12px; width:410px">
     <marquee scrollamount="5">


<img src="../img/iconos/1409342503_error.png" width="10" height="10" /> En un mes estara disponible la nueva versión de la pagina, fecha estimada <strong>15/02/15</strong>.



</marquee>

     <!--<?php if ($_SESSION['MM_Rango'] == 6) { ?><div class="completar" style="height:20px; margin-left:75px; width:auto; margin-top:0px">
  <p style="font-size:12px; color:#FF3535">Sección de la pagina aun no disponible</p>
  </div>
     <?php } else { ?>
     <a href="acciones/creditos.php?cmp=compras"><div class="top2" style="width:110px; margin-left:10px"><img src="../img/iconos/1409877326_Credit_Card.png" width="10" height="10" /> Comprar CRD</div></a>
     
     <div class="top"><img src="../img/iconos/1408592056_coins.png" width="10" height="10" /> Créditos: <?php echo $row_Recordset1['Creditos']; ?></div>
     
     
     
     <div class="top" style="width:120px"><img src="../img/iconos/1413098475_699328-icon-56-document-text-128.png" width="10" height="10" /> Documentos: 17</div>
     
     <div class="top" style="width:50px"><img src="../img/iconos/1412129464_user.png" width="10" height="10" /> ID: <?php echo $row_Recordset1['Contador']; ?></div><?php } ?>-->
     
     </div>
  <div class="menuizquierdo" style="width:auto"><div style="float:left; margin-right:5px"><img style="border-radius:3px" src="usuarios/imgp/<?php if ($_SESSION['MM_Imagen'])  
		   {?><?php echo $_SESSION['MM_Imagen']; ?><?php }
		   else {
		    ?>user2.png<?php }?>" width="110" height="110" />
  <a href="usuarios/perfil.php"><div class="opcionesperfil" id="Desconectar"><img src="../img/iconos/1412129464_user.png" width="10" height="10" /> Ver perfil</div></a>
  <a href="<?php echo $logoutAction ?>"><div class="opcionesperfil" id="Desconectar"><img src="../img/iconos/1411692928_user-logout.png" width="10" height="10" /> Cerrar sesión</div></a>
  
  </div>
  
  <?php 
  
  
  if ($_SESSION['Vperfil'] > 0) { ?>
  <table style="text-align:left; float:left; margin-left:5px" width="auto" border="0" cellspacing="2" cellpadding="2">
   <tr>
    
    <td class="td"><strong>Nombre:</strong><?php echo $_SESSION['MM_Nombre']; ?> <?php echo $_SESSION['MM_Apellido']; ?>
	
	
	
	
	</td>
  </tr>
  <tr>

    
    <td class="td"><strong>Cédula:</strong> <?php 
	if( $_SESSION['MM_Tipocedula'] == 1) echo "V-";
	if( $_SESSION['MM_Tipocedula'] == 2) echo "E-";
	if( $_SESSION['MM_Tipocedula'] == 3) echo "J-"; ?><?php echo $_SESSION['MM_Cedula']; ?>
     </td>
  </tr>
  
  

  <tr>
    
    <td class="td"><strong>Ocupación:</strong><?php 
	if( $_SESSION['MM_Rango'] == 1) echo "Estudiante";
	if( $_SESSION['MM_Rango'] == 2) echo "Profesor";
	if( $_SESSION['MM_Rango'] == 5) echo "Administrador"; ?></td>
  </tr>
  <tr>

    
    <td class="td"><strong>Genero:</strong> <?php 
	if( $_SESSION['MM_Sexo'] == 1) echo "Hombre";
	if( $_SESSION['MM_Sexo'] == 2) echo "Mujer";
	?>
     </td>
  </tr>
  <tr>
    
    <td class="td"><strong>Teléfono:</strong> <?php echo $_SESSION['Telefono']; ?></td>
  </tr>
  
  <tr>
    
    <td class="td"><strong>E-mail:</strong> <?php echo $_SESSION['MM_Username']; ?></td>
  </tr>
  
 </table>
 <table style="text-align:left; float:left; margin-left:0px" width="auto" border="0" cellspacing="2" cellpadding="2">
 <tr>

    
    <td class="td"><strong>FDR:</strong>  <?php echo $_SESSION['FDR']; ?></td>
  </tr>
   <tr>
    
    <td class="td"><strong>Estado:</strong> <?php 
	if ( $_SESSION['Estado'] == 1) echo "Activo";
	if ( $_SESSION['Estado'] == 2) echo "Inactivo"; ?></td>
  </tr>
  <?php if ($row_Recordset1['Rango'] == 2) { ?>
  
  <tr>
    
    <td class="td"><strong>Materia(s):</strong> <?php $row_Recordset1['Materia'] = array(
    NULL => 'Nada',
    1    => 'Matematica',
    2    => 'Logica');
	?></td>
  </tr>
  
  <?php } ?>
  <tr>
    
    <td class="td"><strong>Carrera:</strong> <?php 
	if ($_SESSION['MM_Carrera'] == 0) echo "Sin carrera";
	if ($_SESSION['MM_Carrera'] == 1) echo "Ing. Sistemas";
	if ($_SESSION['MM_Carrera'] == 2) echo "Ing. Electrica";
	if ($_SESSION['MM_Carrera'] == 3) echo "Administración";
	if ($_SESSION['MM_Carrera'] == 4) echo "Derecho";
	if ($_SESSION['MM_Carrera'] == 5) echo "Psicología";
	if ($_SESSION['MM_Carrera'] == 6) echo "C. Social";
	if ($_SESSION['MM_Carrera'] == 7) echo "Contaduría"; ?></td>
  </tr>

  <tr>
    
    <td class="td"><strong>Semestre:</strong> <?php 
	if ($_SESSION['MM_Semestre'] == 0) echo "No especificado";
	if ($_SESSION['MM_Semestre'] == 1) echo "1er semestre";
	if ($_SESSION['MM_Semestre'] == 2) echo "2do semestre";
	if ($_SESSION['MM_Semestre'] == 3) echo "3er semestre";
	if ($_SESSION['MM_Semestre'] == 4) echo "4to semestre";
	if ($_SESSION['MM_Semestre'] == 5) echo "5to semestre";
	if ($_SESSION['MM_Semestre'] == 6) echo "6to semestre";
	if ($_SESSION['MM_Semestre'] == 7) echo "7mo semestre";
	if ($_SESSION['MM_Semestre'] == 8) echo "8vo semestre";
	if ($_SESSION['MM_Semestre'] == 9) echo "9no semestre";
	if ($_SESSION['MM_Semestre'] == 10) echo "10mo semestre";
	 ?></td>
  </tr>
  <tr>

    
    <td class="td"><strong>Sede:</strong> <?php 
	if ($_SESSION['MM_Sede'] == 0) echo "Sin sede";
	if ($_SESSION['MM_Sede'] == 1) echo "Principal";
	if ($_SESSION['MM_Sede'] == 2) echo "SADLA";
	if ($_SESSION['MM_Sede'] == 3) echo "SFDA";
	if ($_SESSION['MM_Sede'] == 4) echo "Puerto Ordaz"; ?>
     </td>
  </tr>
  <tr>

    
    <td class="td"><strong>Universidad:</strong> <?php 
	if ($_SESSION['MM_Universidad'] == 0) echo "Sin especificar";
	if ($_SESSION['MM_Universidad'] == 1) echo "Universidad Bicentenaria de Aragua";
	if ($_SESSION['MM_Universidad'] == 2) echo "Universidad Central de Venezuela";
	if ($_SESSION['MM_Universidad'] == 3) echo "Universidad Simón Bólivar";
	if ($_SESSION['MM_Universidad'] == 4) echo "Universidad de Carabobo";
	if ($_SESSION['MM_Universidad'] == 5) echo "Universidad de Los Andes";
	if ($_SESSION['MM_Universidad'] == 6) echo "Universidad Arturo Michelena"; ?>
     </td>
  </tr>
  
 </table>
 <?php } else { ?><a href="usuarios/perfil.php?action=editar&editar=datos"><div class="completar" style="margin-right:15px; margin-left:20px;">
 <p style="font-size:12px; color:#CC3333">Esta seccion de la pagina no se mostrara hasta que completes tus datos de perfil.<br /><br />

	CLICK PARA COMPLETAR</p>
 </div></a><?php }  ?>

    
    </div>
   <?php require("require/comentarios.php"); ?>
   
   
   </div>
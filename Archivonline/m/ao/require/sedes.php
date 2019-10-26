<?php
$options="";
if ($_POST["elegido"]==1) {
    $options= '
	
    <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Principal</option>
             <option value="2" <?php if (!(strcmp(2, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>San Antonio de Los Altos</option>
             <option value="3" <?php if (!(strcmp(3, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>San Fernando de Apure</option>
             <option value="4" <?php if (!(strcmp(4, htmlentities($row_Recordset1['Sede'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>Puerto Ordaz</option>
    
    ';    
}
if ($_POST["elegido"]==2) {
    $options= '
	<option value="0">Materia</option>
    <option value="8">Matematica II</option>
    <option value="12">Cultura II</option>
    <option value="13">DHP II</option>
    
    ';    
}
if ($_POST["elegido"]==3) {
    $options= '

    ';    
}
if ($_POST["elegido"]==4) {
    $options= '
 
    ';    
}
echo $options;    
?>

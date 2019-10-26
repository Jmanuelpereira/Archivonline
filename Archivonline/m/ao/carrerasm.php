<?php
$options="";
if ($_POST["elegido"]==1) {
    $options= '
	<option value="0">Materia</option>
    <option value="1">Deontología</option>
    <option value="2">DHP I</option>
    <option value="7">Logica M.</option>
    <option value="6">Matematica I</option>
    <option value="4">Cultura I</option>
    
    ';    
}
if ($_POST["elegido"]==2) {
    $options= '
	<option value="0">Materia</option>
    <option value="8">Matematica II</option>
    <option value="12">Cultura II</option>
    <option value="13">DHP II</option>
    <option value="4">Arosa</option>
    ';    
}
if ($_POST["elegido"]==3) {
    $options= '
    <option value="1">106</option>
    <option value="2">206</option>
    <option value="3">306</option>
    ';    
}
if ($_POST["elegido"]==3) {
    $options= '
    <option value="1">106</option>
    <option value="2">206</option>
    <option value="3">306</option>
    ';    
}
echo $options;    
?>

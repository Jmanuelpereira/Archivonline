<?php require_once('../../Connections/archivo.php'); ?>
<head>
<script language="javascript" src="../../js/jquery-1.4.3.min.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#marca").change(function () {
           $("#marca option:selected").each(function () {
            elegido=$(this).val();
            $.post("modelos.php", { elegido: elegido }, function(data){
            $("#modelo").html(data);
            });            
        });
   })
});
</script>
</head>
<p>Marca: 
<select name="marca" id="marca">    
    <option value="1">Renault</option>
    <option value="2">Seat</option>
    <option value="3">Peugeot</option>    
</select></p>
<p>Modelo:
<select name="modelo" id="modelo">    
    <option value="1">4</option>
    <option value="2">5</option>
    <option value="3">7</option>
    <option value="4">21</option>
    <option value="5">Scennic</option>
    <option value="6">Traffic</option>
</select></p>
<?php
sleep(1);

if($_REQUEST) {
    $username = $_REQUEST['Usuario'];
    $query = "select * from usuarios where Usuario = '".strtolower($username)."'";
    $results = mysql_query( $query) or die('ok');

    if(mysql_num_rows(@$results) > 0)
        echo '<div id="Error">Usuario ya existente</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
?>
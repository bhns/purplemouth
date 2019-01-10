<?php

/* 
 * You are free for make it better @author everyone that love shared
 
 */
    require_once './_config.php';

    $stmt = $DB->prepare('CALL prcGetRecords();');
    $stmt->execute();

    $json = '{ "Records": [';

    foreach ($stmt as $row) {
        $json .= $row['json'];
        $json .= ',';
    }
   
    $json = rtrim($json, ",");
    $json .= '] }';

    header('Content-Type: application/json');
    echo $json;
?>

<?php

/* 
 * You are free for make it better @author everyone that love shared
 
 */
    require_once './_config.php';

    $check_ = $DB->prepare('CALL prcGetRecords();');
    $check_->execute();

    $json = '{ "Records": [';

    foreach ($check_ as $row) {
        $json .= $row['json'];
        $json .= ',';
    }
   
    $json = rtrim($json, ",");
    $json .= '] }';

    header('Content-Type: application/json');
    echo $json;
?>

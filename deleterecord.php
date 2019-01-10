<?php
    
	/* 
 * You are free for make it better @author everyone that love shared
 
 */

    require_once './_config.php';
    $word_id   = isset($_GET['word_id']) ? $_GET['word_id'] : '0';
    $word_id   = 146;
	$stmt = $DB->prepare('CALL prcDeleteRecord(:word_id)');   

    $stmt->execute(array(':word_id' => $word_id));

?>
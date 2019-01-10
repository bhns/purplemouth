<?php
    
	/* 
 * You are free for make it better @author everyone that love shared
 
 */

    require_once './_config.php';
    $word_name      = isset($_GET['word_name']) ? $_GET['word_name'] : '0';
    $lan_name       = isset($_GET['lan_name']) ? $_GET['lan_name'] : '0';
    $category_word  = isset($_GET['category_word']) ? $_GET['category_word'] : 0;
    $type_name      = isset($_GET['type_name']) ? $_GET['type_name'] : 0;
    $pronunciation  = isset($_GET['pronunciation']) ? $_GET['pronunciation'] : '0';
    $updated        = isset($_GET['updated']) ? $_GET['updated'] : '0000-00-00 00:00:00';
    $color_         = isset($_GET['color_']) ? $_GET['color_'] : '';
    $frequen_       = isset($_GET['frequen_']) ? $_GET['frequen_'] : 0;
    $f_emotion      = isset($_GET['f_emotion']) ? $_GET['f_emotion'] : '';
    $sf_emotion     = isset($_GET['sf_emotion']) ? $_GET['sf_emotion'] : 0;
    $ssf_emotion    = isset($_GET['ssf_emotion']) ? $_GET['ssf_emotion'] : 0;
    $user_code1     = isset($_GET['user_code1']) ? $_GET['user_code1'] : '';
    $user_code2     = isset($_GET['user_code2']) ? $_GET['user_code2'] : '';
  

    $lan_name = 1997; 
    $word_name = "Json";  
    // doing some validation here
    if ($word_name == 0 && $lan_name == 0) {
        exit('-1');
    }

    $params = array(':word_name'        => $word_name,
                    ':lan_name'         => $lan_name,
                    ':category_word'    => $category_word,
                    ':type_name'        => $type_name,
                    ':pronunciation'    => $pronunciation,
                    ':updated'          => $updated,
                    ':color_'           => $color_,
                    ':frequen_'         => $frequen_,
                    ':f_emotion'        => $f_emotion,
                    ':sf_emotion'       => $sf_emotion,
                    ':ssf_emotion'      => $ssf_emotion,
                    ':user_code1'       => $user_code1,
                    ':user_code2'       => $user_code2
					  
					  );

            $check_ = $DB->prepare('CALL prcSaveRecord(
                          :word_name, 
                          :lan_name, 
                          :category_word, 
                          :type_name, 
                          :pronunciation, 
                          :updated, 
                          :color_,
                          :frequen_, 
                          :f_emotion, 
                          :sf_emotion, 
                          :ssf_emotion, 
                          :user_code1, 
                          :user_code2);'
						  
						  );

    // Sqlite>>>  $check_ = $DB->prepare('INSERT INTO main_words (word_name, lan_name, category_word, type_name, pronunciation, ssf_emotion) VALUES (:word_name, :lan_name, :category_word, :type_name, :pronunciation, :updated, :color_, :frequen_, :f_emotion, :sf_emotion, :ssf_emotion, :user_code1, :user_code2)');

    $check_->execute($params);
    $timestamp = $check_->fetchColumn();
    echo $timestamp;    
?>

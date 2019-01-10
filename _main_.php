<?php
    /* 
 * You are free for make it better @author everyone that love shared
 
 */
require './_config.php';
$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {
  $word_name = trim($_POST['word_name']);
  $lan_name = trim($_POST['lan_name']);
  $category_word = trim($_POST['category_word']);
  $pronunciation = trim($_POST['pronunciation']);
  $type_name = trim($_POST['type_name']);
  $email_id = trim($_POST['email_id']);
  $color_ = trim($_POST['color_']);
  $frequen_ = trim($_POST['frequen_']);
  $notes = trim($_POST['notes']);
  $f_emotion = trim($_POST['f_emotion']);
  $sf_emotion = trim($_POST['sf_emotion']);
  $ssf_emotion = trim($_POST['ssf_emotion']);
  $user_code1 = trim($_POST['user_code1']);
  $user_code2 = trim($_POST['user_code2']);
  $user_code3 = trim($_POST['user_code3']);
  $user_code4 = trim($_POST['user_code4']);
  $user_code5 = trim($_POST['user_code5']);
  $user_code6 = trim($_POST['user_code6']);
  $user_code7 = trim($_POST['user_code7']);
  $user_code8 = trim($_POST['user_code8']);
  $user_code9 = trim($_POST['user_code9']);
  $polarity = trim($_POST['polarity']);
  $cust_power = trim($_POST['cust_power']);
  $key_word = trim($_POST['key_word']);
  $updated = trim($_POST['updated']);
  $filename = "";
  $error = FALSE;
  if (is_uploaded_file($_FILES["word_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["word_pic"]["name"];
    $filepath = 'word_pics/' . $filename;
    if (!move_uploaded_file($_FILES["word_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  }
   $word_sound = trim($_POST['word_sound']);
   

 if (!$error) {
    $sql = "INSERT INTO `main_words` (`word_name, `lan_name`, `category_word`, `type_name`, `pronunciation`, `notes`, `color_`, `frequen_`, `email_address`, `f_emotion`, `sf_emotion`, `ssf_emotion`, `user_code1`, `user_code2`, `user_code3`, `user_code4`, `user_code5`, `user_code6`, `user_code7`, `user_code8`, `user_code9`, `polarity`, `cust_power`, `key_word`, `updated`, `word_pic`, `word_sound`) VALUES "
            . "( :wname, :lname, :cname, :tname, :pronunciation, :notes, :color_, :frequen_, :email, :f_emo, :sf_emo, :ssf_emo, :user_c1, :user_c2, :user_c3, :user_c4, :user_c5, :user_c6, :user_c7, :user_c8, :user_c9, :po_la_ri_ty, :cust_t, :key_pass, :last_up, :pic, :sound)";



    try {
      $check_ = $DB->prepare($sql);

      // bind the values
     $check_->bindValue(":wname", $word_name);
	 $check_->bindValue("lname", $lan_name);
     $check_->bindValue(":cname", $category_word);
	 $check_->bindValue(":tname", $type_name);
	 $check_->bindValue(":pronunciation", $pronunciation);
     $check_->bindValue(":notes", $notes);
     $check_->bindValue(":color_", $color_);
     $check_->bindValue(":frequen_", $frequen_);
     $check_->bindValue(":email", $email_id);
	 $check_->bindValue(":f_emo", $f_emotion); 
	 $check_->bindValue(":sf_emo", $sf_emotion);
	 $check_->bindValue(":ssf_emo", $ssf_emotion);
	 $check_->bindValue(":user_c1", $user_code1);
	 $check_->bindValue(":user_c2", $user_code2);
	 $check_->bindValue(":user_c3", $user_code3);
	 $check_->bindValue(":user_c4", $user_code4);
	 $check_->bindValue(":user_c5", $user_code5);
	 $check_->bindValue(":user_c6", $user_code6);
	 $check_->bindValue(":user_c7", $user_code7);
	 $check_->bindValue(":user_c8", $user_code8);
	 $check_->bindValue(":user_c9", $user_code9);
	 $check_->bindValue(":po_la_ri_ty", $polarity);
     $check_->bindValue(":cust_t", $cust_power);
	 $check_->bindValue(":key_pass", $key_word); 
     $check_->bindValue(":last_up", $updated); 
     $check_->bindValue(":pic", $filename);
     $check_->bindValue(":sound", $word_sound);
 
      // execute Query
      $check_->execute();
      $result = $check_->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Word added successfully.";
      } else {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Failed to add word.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "failed to upload image.";
  }
  header("location:index.php");
} elseif ( $mode == "update_old" ) {
     

  $word_name = trim($_POST['word_name']);
  $lan_name = trim($_POST['lan_name']);
  $category_word = trim($_POST['category_word']);
  $type_name = trim($_POST['type_name']);
  $pronunciation = trim($_POST['pronunciation']);
  $notes = trim($_POST['notes']);
  $color_ = trim($_POST['color_']);
  $frequen_ = trim($_POST['frequen_']);
  $email_id = trim($_POST['email_id']);
  $f_emotion = trim($_POST['f_emotion']);
  $sf_emotion = trim($_POST['sf_emotion']);
  $ssf_emotion = trim($_POST['ssf_emotion']);
  $user_code1 = trim($_POST['user_code1']);
  $user_code2 = trim($_POST['user_code2']);
  $user_code3 = trim($_POST['user_code3']);
  $user_code4 = trim($_POST['user_code4']);
  $user_code5 = trim($_POST['user_code5']);
  $user_code6 = trim($_POST['user_code6']);
  $user_code7 = trim($_POST['user_code7']);
  $user_code8 = trim($_POST['user_code8']);
  $user_code9 = trim($_POST['user_code9']);
  $polarity = trim($_POST['polarity']);
  $cust_power = trim($_POST['cust_power']);
  $key_word = trim($_POST['key_word']);
  $updated = trim($_POST['updated']);
  $cid = trim($_POST['cid']);
  $filename = "";
  $error = FALSE;

  if (is_uploaded_file($_FILES["word_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["word_pic"]["name"];
    $filepath = 'word_pics/' . $filename;
    if (!move_uploaded_file($_FILES["word_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  } else {
     $filename = $_POST['old_pic'];
  }

  $word_sound = trim($_POST['word_sound']);


  if (!$error) {
    $sql = "UPDATE `main_words` SET `word_name` = :wname, `lan_name` = :lname, `category_word` = :cname, `type_name` = :tname, `pronunciation` = :pronunciation, `notes` = :notes, `color_` = :color_, `frequen_` = :frequen_, `email_address` = :email, `f_emotion` = :f_emo, `sf_emotion` = :sf_emo, `ssf_emotion` = :ssf_emo, `user_code1` = :user_c1, `user_code2` = :user_c2, `user_code3` = :user_c3, `user_code4` = :user_c4, `user_code5` = :user_c5, `user_code6` = :user_c6, `user_code7` = :user_c7, `user_code8` = :user_c8, `user_code9` = :user_c9, `polarity` = :po_la_ri_ty, `cust_power` = :cust_t, `key_word` = :key_pass, `updated` = :last_up, `word_pic` = :pic, `word_sound` = :sound  "
            . "WHERE word_id = :cid ";

    try {
      $check_ = $DB->prepare($sql);
	  

      // bind the values

      // bind the values
      $check_->bindValue(":wname", $word_name);
	  $check_->bindValue("lname", $lan_name);
      $check_->bindValue(":cname", $category_word);
	  $check_->bindValue(":tname", $type_name);
	  $check_->bindValue(":pronunciation", $pronunciation);
      $check_->bindValue(":notes", $notes);
      $check_->bindValue(":color_", $color_);
      $check_->bindValue(":frequen_", $frequen_);
      $check_->bindValue(":email", $email_id);
	   $check_->bindValue(":f_emo", $f_emotion); 
	   $check_->bindValue(":sf_emo", $sf_emotion);
	   $check_->bindValue(":ssf_emo", $ssf_emotion);
	   $check_->bindValue(":user_c1", $user_code1);
	   $check_->bindValue(":user_c2", $user_code2);
	   $check_->bindValue(":user_c3", $user_code3);
	   $check_->bindValue(":user_c4", $user_code4);
	   $check_->bindValue(":user_c5", $user_code5);
	   $check_->bindValue(":user_c6", $user_code6);
	   $check_->bindValue(":user_c7", $user_code7);
	   $check_->bindValue(":user_c8", $user_code8);
	   $check_->bindValue(":user_c9", $user_code9);
	   $check_->bindValue(":po_la_ri_ty", $polarity);
    $check_->bindValue(":cust_t", $cust_power);
	 $check_->bindValue(":key_pass", $key_word); 
  $check_->bindValue(":last_up", $updated); 
      $check_->bindValue(":pic", $filename);
   $check_->bindValue(":sound", $word_sound);
 
      $check_->bindValue(":cid", $cid);


      // execute Query
      $check_->execute();
      $result = $check_->rowCount();
      if ($result > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Word updated successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "No changes made to word.";
      }
    } catch (Exception $ex) {

      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
    }
  } else {
    $_SESSION["errorType"] = "danger";
    $_SESSION["errorMsg"] = "Failed to upload image.";
  }
  header("location:index.php?pagenum=".$_POST['pagenum']);
} elseif ( $mode == "delete" ) {
   $cid = intval($_GET['cid']);
   
   $sql = "DELETE FROM `main_words` WHERE word_id = :cid";
   try {
     
      $check_ = $DB->prepare($sql);
      $check_->bindValue(":cid", $cid);
        
       $check_->execute();  
       $res = $check_->rowCount();
       if ($res > 0) {
        $_SESSION["errorType"] = "success";
        $_SESSION["errorMsg"] = "Word deleted successfully.";
      } else {
        $_SESSION["errorType"] = "info";
        $_SESSION["errorMsg"] = "Failed to delete word.";
      }
     
   } catch (Exception $ex) {
      $_SESSION["errorType"] = "danger";
      $_SESSION["errorMsg"] = $ex->getMessage();
   }
   
   header("location:index.php?pagenum=".$_GET['pagenum']);
}
?>
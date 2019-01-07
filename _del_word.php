<?php


require './_config.php';
$mode = $_REQUEST["mode"];
if ($mode == "add_new" ) {
  $word_name = trim($_POST['word_name']);
  $category_word = trim($_POST['category_word']);
  $pronunciation = trim($_POST['pronunciation']);
  $type_name = trim($_POST['type_name']);
  $email_id = trim($_POST['email_id']);
  $contact_no1 = trim($_POST['contact_no1']);
  $contact_no2 = trim($_POST['contact_no2']);
  $notes = trim($_POST['notes']);
  $filename = "";
  $error = FALSE;

  if (is_uploaded_file($_FILES["word_pic"]["tmp_name"])) {
    $filename = time() . '_' . $_FILES["word_pic"]["name"];
    $filepath = 'word_pics/' . $filename;
    if (!move_uploaded_file($_FILES["word_pic"]["tmp_name"], $filepath)) {
      $error = TRUE;
    }
  }

  if (!$error) {
    $sql = "INSERT INTO `main_words` (`word_name`, `category_word`, `type_name`, `pronunciation`, `notes`, `contact_no1`, `contact_no2`, `email_address`, `word_pic`) VALUES "
            . "( :wname, :cname, :tname, :pronunciation, :notes, :contact1, :contact2, :email, :pic)";



    try {
      $check_ = $DB->prepare($sql);

      // bind the values
      $check_->bindValue(":wname", $word_name);
      $check_->bindValue(":cname", $category_word);
	  $check_->bindValue(":pronunciation", $pronunciation);
      $check_->bindValue(":tname", $type_name); 
      $check_->bindValue(":notes", $notes);
      $check_->bindValue(":contact1", $contact_no1);
      $check_->bindValue(":contact2", $contact_no2);
      $check_->bindValue(":email", $email_id);
      $check_->bindValue(":pic", $filename);


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
  $category_word = trim($_POST['category_word']);
  $pronunciation = trim($_POST['pronunciation']);
  $type_name = trim($_POST['type_name']);
  $email_id = trim($_POST['email_id']);
  $contact_no1 = trim($_POST['contact_no1']);
  $contact_no2 = trim($_POST['contact_no2']);
  $notes = trim($_POST['notes']);
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



  if (!$error) {
    $sql = "UPDATE `main_words` SET `word_name` = :wname, `category_word` = :cname, `type_name` = :tname, `pronunciation` = :pronunciation, `notes` = :notes, `contact_no1` = :contact1, `contact_no2` = :contact2, `email_address` = :email, `word_pic` = :pic  "
            . "WHERE word_id = :cid ";

    try {
      $check_ = $DB->prepare($sql);
	  

      // bind the values
      $check_->bindValue(":wname", $word_name);
      $check_->bindValue(":cname", $category_word);
      $check_->bindValue(":tname", $type_name);
	  $check_->bindValue(":pronunciation", $pronunciation);
      $check_->bindValue(":notes", $notes);
      $check_->bindValue(":contact1", $contact_no1);
      $check_->bindValue(":contact2", $contact_no2);
      $check_->bindValue(":email", $email_id);
      $check_->bindValue(":pic", $filename);
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
<?php
/* 
 * @author BHNS
 */
require_once './_config.php';
include './_header.php';
try {
   $sql = "SELECT * FROM main_words WHERE 1 AND word_id = :cid";
   $check_ = $DB->prepare($sql);
   $check_->bindValue(":cid", intval($_GET["cid"]));
   
   $check_->execute();
   $results = $check_->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>

<!-- Panel -->
<section class="panel color2-alt" id="view_word">

    <div class="panel panel-primary">
      <div class="intro color2">
        <h3 class="panel-title"><?php echo ($_GET["m"] == "update") ? "Edit" : "Add"; ?> New Word</h3>
		
		  <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="_del_word.php">
          <input type="hidden" name="mode" value="<?php echo ($_GET["m"] == "update") ? "update_old" : "add_new"; ?>" >
          <input type="hidden" name="old_pic" value="<?php echo $results[0]["word_pic"] ?>" >
          <input type="hidden" name="cid" value="<?php echo intval($results[0]["word_id"]); ?>" >
          <input type="hidden" name="pagenum" value="<?php echo $_GET["pagenum"]; ?>" >
          <fieldset>
            <div class="field half">
              <label for="word_name"><span class="required">*</span> Word:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["word_name"] ?>" placeholder="First Name" id="word_name" class="color2" name="word_name"><span id="word_name_err" class="error"></span>
              </div>
            </div>
            
            <div class="field half">
              <label for="category_word">Category:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["category_word"] ?>" placeholder="Category" id="category_word" class="color2" name="category_word">
              </div>
            </div>
			
			        <div class="field half">
              <label for="pronunciation">Pronunciation:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["pronunciation"] ?>" placeholder="Speaking" id="pronunciation" class="color2" name="pronunciation">
              </div>
            </div>
			
			
            <div class="field half">
              <label for="type_name"><span class="required">*</span>Empty</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["type_name"] ?>" placeholder="Empty" id="type_name" class="color2" name="type_name"><span id="type_name_err" class="error"></span>
              </div>
            </div>
            
        
            
            <div class="field half">
              <label for="contact_no1"><span class="required">*</span>Empty 1:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["contact_no1"] ?>" placeholder="Empty" id="contact_no1" class="color2" name="contact_no1"><span id="contact_no1_err" class="error"></span>
               <!-- <span class="help-block">Maximum of 10 digits only and only numbers.</span>-->
              </div>
            </div>
            
            <div class="field half">
              <label for="contact_no2">Empty 2:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["contact_no2"] ?>" placeholder="Empty" id="contact_no2" class="color2" name="contact_no2"><span id="contact_no2_err" class="error"></span>
                <!--<span class="help-block">Maximum of 10 digits only and only numbers.</span>-->
              </div>
            </div>
</div>          
           <div class="class=inner columns divided">
		   
		       <?php if ($_GET["m"] == "update") { ?>
            <div class="field half">
              <div class="span-3-10">
                <?php $pic = ($results[0]["word_pic"] <> "" ) ? $results[0]["word_pic"] : "no_pic.png" ?>
                <a href="word_pics/<?php echo $pic ?>" target="_blank"><img src="word_pics/<?php echo $pic ?>" alt="" width="100" height="100" class="thumbnail" ></a>
              </div>
            </div>
            <?php 
            }
            ?>
		   <div class="span-3-10">
            <div>
              <label for="word_pic">Picture:</label>
              <div class="span-3-10">
                <input type="file"  id="word_pic" class="form-control file" name="word_pic"><span id="word_pic_err" class="error"></span>
                <span class="help-block">Must me jpg, jpeg, png, gif, bmp image only.</span>
              </div>
            </div>
			</div>
            
        
            
            
            <div class="fields">
            <div class="field">
              <label for="notes">Notes :</label>
              <div class="span-3-10">
                <textarea id="notes" name="notes" rows="3" class="color2"><?php echo $results[0]["notes"] ?></textarea>
              </div>
            </div>
            
            <div class="field half">

			      <div class="span-3-5">
              <label for="email_id"><span class="required">*</span>update by user :</label>
              <div class="span-3-5">
                <input type="text" value="<?php echo $results[0]["email_address"] ?>" placeholder="User or email" id="email_id" class="color3" name="email_id"><span id="email_id_err" class="error"></span>
              </div>
            </div>
			<div class="span-3-10">
			   <ul class="actions">
			   
											<li> <button class="small primary color4" type="submit">Save</button> </li>
											<li><a href="index.php" class="button small primary color4">Home</a></li>
										</ul>
										   </div>	

		

      </div>
	  
	 
      </div>
	  


	  
    </div>
	
	
				
						<div class="intro color4">
										<ul class="contact-icons color1">
											<li class="icon fa-twitter"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-facebook"><a href="#">facebook.com/untitled</a></li>
											<li class="icon fa-snapchat-ghost"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-instagram"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-medium"><a href="#">medium.com/untitled</a></li>
										</ul>
									</div>
		 <?php		 $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt =  $sql."\n"."\n";
fwrite($myfile, $txt);
fclose($myfile); ?><br> 
	
  </div>
 </section> 
<script type="text/javascript">
$(document).ready(function() {
	
	// the fade out effect on hover
	$('.error').hover(function() {
		$(this).fadeOut(200);  
	});
	
	
	$("#contact_form").submit(function() {
		$('.error').fadeOut(200);  
		if(!validateForm()) {
            // go to the top of form first
            $(window).scrollTop($("#contact_form").offset().top);
			return false;
		}     
		return true;
    });

});

function validateForm() {
	 var errCnt = 0;
	 
	 var word_name = $.trim( $("#word_name").val());
     var type_name = $.trim( $("#type_name").val());
	 var email_id = $.trim( $("#email_id").val());
	 var contact_no1 = $.trim( $("#contact_no1").val());
	 var contact_no2 = $.trim( $("#contact_no2").val());
     
	 var word_pic =  $.trim( $("#word_pic").val());

	// validate name
	if (word_name == "" ) {
		$("#word_name_err").html("Enter your first name.");
		$('#word_name_err').fadeIn("fast"); 
		errCnt++;
	}  else if (word_name.length <= 2 ) {
		$("#word_name_err").html("Enter atleast 3 letter.");
		$('#word_name_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (type_name == "" ) {
		$("#type_name_err").html("Enter your last name.");
		$('#type_name_err').fadeIn("fast"); 
		errCnt++;
	}  else if (type_name.length <= 2 ) {
		$("#type_name_err").html("Enter atleast 3 letter.");
		$('#type_name_err').fadeIn("fast"); 
		errCnt++;
	}

    
    if (!isValidEmail(email_id)) {
		$("#email_id_err").html("Enter valid email.");
		$('#email_id_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (contact_no1 == "" ) {
		$("#contact_no1_err").html("Enter first contact number.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	}  else if (contact_no1.length <= 9 || contact_no1.length > 10 ) {
		$("#contact_no1_err").html("Enter 10 digits only.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	} else if ( !$.isNumeric(contact_no1) ) {
		$("#contact_no1_err").html("Must be digits only.");
		$('#contact_no1_err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (contact_no2.length > 0) {
      if (contact_no2.length <= 9 || contact_no2.length > 10 ) {
		$("#contact_no2_err").html("Enter 10 digits only.");
		$('#contact_no2_err').fadeIn("fast"); 
		errCnt++;
	} else if ( !$.isNumeric(contact_no2) ) {
		$("#contact_no2_err").html("Must be digits only.");
		$('#contact_no2_err').fadeIn("fast"); 
		errCnt++;
	}
    }
    
    
    if (word_pic.length > 0) {
        var exts = ['jpg','jpeg','png','gif', 'bmp'];
		var get_ext = word_pic.split('.');
		get_ext = get_ext.reverse();
        
       
        if ($.inArray ( get_ext[0].toLowerCase(), exts ) <= -1 ){
          $("#word_pic_err").html("Must me jpg, jpeg, png, gif, bmp image only..");
          $('#word_pic_err').fadeIn("fast"); 
        }
       
    }
    
	if(errCnt > 0) return false; else return true;
}

function isValidEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
</script>
<?php
include './_footer.php';
?>
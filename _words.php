<?php
/* 
 * @author BHNS
 
				  <?php echo $res["word_name"]; ?>
				  <?php echo $res["category_word"]; ?>
				  <?php echo $res["type_name"]; ?>
				  <?php echo $res["pronunciation"]; ?>
				  <?php echo $res["notes"]; ?>
				  <?php echo $res["email_address"]; ?>
				  <?php echo $res["word_id"]; ?>
				  <?php echo $_GET["pagenum"]; ?>
				  <?php echo $_GET["keyword"]; ?>
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
<section class="panel color1-alt" id="view_word">

    <div class="panel panel-primary">
      <div class="intro color1">
       						
			<div class="span-2-25">		
			<form action="_search.php" method="get" >
       
          <span class="pull-left">  
		 
		  <!--Botoes pesquisar e adiconar-->
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="Search by word name" id="" class="form-control" name="keyword" style="height: 41px;">
             <button class="button small">Search</button><a href="_edit_word.php" class="button small">Add New Word</a>
		   </label>
            </span>
        </div>
            <div class="field half">
              <label for="word_name"><span class="required">*</span> Word:</label>
              <div class="span-3-10">
                <input type="text" readonly="" value="<?php echo $results[0]["word_name"] ?>" placeholder="First Name" id="word_name" class="color2" name="word_name"><span id="word_name_err" class="error"></span>
              </div>
            </div>
            
            <div class="field half">
              <label for="category_word">Category:</label>
              <div class="span-3-10">
                <input type="text" readonly="" value="<?php echo $results[0]["category_word"] ?>" placeholder="Category" id="category_word" class="color2" name="category_word">
              </div>
            </div>
		 <div class="field half">
              <label for="pronunciation">Pronunciation:</label>
              <div class="span-3-10">
                <input type="text" readonly="" value="<?php echo $results[0]["pronunciation"] ?>" placeholder="Speaking" id="pronunciation" class="color2" name="pronunciation">
              </div>
            </div>	
            
            <div class="field half">
              <label for="type_name"><span class="required">*</span>Empty</label>
              <div class="span-3-10">
                <input type="text" readonly="" value="<?php echo $results[0]["type_name"] ?>" placeholder="Empty" id="type_name" class="color2" name="type_name"><span id="type_name_err" class="error"></span>
              </div>
            </div>
            
			
        
            
            <div class="field half">
              <label for="color_"><span class="required">*</span>Empty 1:</label>
              <div class="span-3-10">
                <input type="text" readonly=""  value="<?php echo $results[0]["color_"] ?>" placeholder="Empty" id="color_" class="color2" name="color_"><span id="color__err" class="error"></span>
               <!-- <span class="help-block">Maximum of 10 digits only and only numbers.</span>-->
              </div>
            </div>
            
            <div class="field half">
              <label for="frequen_">Empty 2:</label>
              <div class="span-3-10">
                <input type="text" readonly="" value="<?php echo $results[0]["frequen_"] ?>" placeholder="Empty" id="frequen_" class="color2" name="frequen_"><span id="frequen__err" class="error"></span>
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
                <textarea id="notes" readonly="" name="notes" rows="3" class="color2"><?php echo $results[0]["notes"] ?></textarea>
              </div>
            </div>
            
            <div class="field half">

			      <div class="span-3-5">
              <label for="email_id"><span class="required">*</span>update by user :</label>
              <div class="span-3-5">
                <input type="text" readonly="" value="<?php echo $results[0]["email_address"] ?>" placeholder="User or email" id="email_id" class="color3" name="email_id"><span id="email_id_err" class="error"></span>
              </div>
            </div>
			<div class="field half">
											<ul class="actions">
											
											    <li><input type="submit" value="Save" class="button small primary color1 disabled" /></li>
												<!--<li><input type="submit" value="Save" class="button primary" /></li>-->
												<li><a href="_search.php" class="button small primary color2">Back</a></li>	
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
	
	
  </div>
 </section> 
<?php
include './_footer.php';
?>
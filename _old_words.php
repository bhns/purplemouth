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
	

 var pronunciation = $.trim( $("#pronunciation").val());
	
				  	
	    if (pronunciation == "" ) {
		$("#pronunciation_err").html("Enter your last name.");
		$('#pronunciation_err').fadeIn("fast"); 
		errCnt++;
	}  else if (pronunciation.length <= 2 ) {
		$("#pronunciation_err").html("Enter atleast 3 letter.");
		$('#pronunciation_err').fadeIn("fast"); 
		errCnt++;
	}
				  
				  
				  
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
							<section class="panel color4-alt" id="view_word">
							
			
								<div class="intro color4">
								
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
								<label for="name">Word</label>
											     <input type="text" readonly="" placeholder="Word" value="<?php echo $results[0]["word_name"] ?>" id="word_name" class="form-control" name="word_name"><span id="word_name_err" class="error"></span>
												<label for="email">Category</label>
												<input type="text" readonly="" value="<?php echo $results[0]["category_word"] ?>" placeholder="Category" id="category_word" class="form-control" name="category_word">
                                               	<label for="name">Pronunciation</label>
											     <input type="text" readonly="" placeholder="Pronunciation" value="<?php echo $results[0]["pronunciation"] ?>" id="word_name" class="form-control" name="word_name"><span id="word_name_err" class="error"></span>
												<label for="email">Translate</label>
												<input type="text" readonly="" value="<?php echo $results[0]["type_name"] ?>" placeholder="Translate" id="category_word" class="form-control" name="category_word">     
                            	</div>
								<div class="inner columns divided">
									<div class="span-3-25">
										<form method="post" action="#">
											<div class="fields">
											<div class="field">
												<label for="message">Notes</label>
													<textarea id="notes" readonly="" name="notes" rows="4" ><?php echo $results[0]["notes"] ?></textarea>
            
												</div>

												<div class="field half">
													<label for="name">User</label>
											     <input type="text" readonly="" placeholder="User" value="<?php echo $results[0]["email_address"] ?>" id="word_name" class="form-control" name="word_name"><span id="word_name_err" class="error"></span>
         	                                    </div>
			
												
											</div>
											
											<div class="field half">
											<ul class="actions">
											
											    <li><input type="submit" value="Save" class="button small primary color1 disabled" /></li>
												<!--<li><input type="submit" value="Save" class="button primary" /></li>-->
												<li><a href="index.php" class="button small primary color2">Back</a></li>	
											</ul>
											</div>
											
										</form>
									</div>
									<div class="span-1-5">
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
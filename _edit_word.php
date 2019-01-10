<?php
/* 
 * You are free for make it better @author everyone that love shared
 
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
		
		  <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="_main_.php">
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
			
									<div class="field third">
													<label for="demo-category">Language</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
														    <option value="1">English</option>
                                                            <option value="1">Русский</option>
                                                            <option value="1">Español</option>
                                                            <option value="1">Portuguese</option>
                                                            <option value="1">日本語</option>
                                                            <option value="1">한국어</option>
                                                            <option value="1">Deutsch</option>
                                                            <option value="1">Italiano</option>
                                                            <option value="1">Global</option>
                                                            <option value="1">English</option>
                                                            <option value="1">Español</option>
                                                            <option value="1">Esperanto</option>
                                                            <option value="1">Français</option>
                                                            <option value="1">Ido</option>
                                                            <option value="1">Interlingua</option>
                                                            <option value="1">Interlingue</option>
                                                            <option value="1">LinguaFrancaNova</option>
                                                            <option value="1">Avañe'ẽ</option>
                                                            <option value="1">Aymararu</option>
                                                            <option value="1">English</option>
                                                            <option value="1">Español</option>
                                                            <option value="1">Français</option>
                                                            <option value="1">Kreyòlayisyen</option>
                                                            <option value="1">Nederlands</option>
                                                            <option value="1">Nāhuatl</option>
                                                            <option value="1">Patois</option>
                                                            <option value="1">RunaSimi</option>
                                                            <option value="1">Tsetsêhestâhese</option>
                                                            <option value="1">ייִדיש</option>
                                                            <option value="1">Europa</option>
                                                            <option value="1">Башҡортса</option>
                                                            <option value="1">Беларуская</option>
                                                            <option value="1">Беларуская(тарашкевіца)‎</option>
                                                            <option value="1">Български</option>
                                                            <option value="1">Кырыкмары</option>
                                                            <option value="1">Нохчийн</option>
                                                            <option value="1">Олыкмарий</option>
                                                            <option value="1">Русиньскый</option>
                                                            <option value="1">Русский</option>
                                                            <option value="1">Сахатыла</option>
                                                            <option value="1">Српски/srpski</option>
                                                            <option value="1">Татарча/tatarça</option>
                                                            <option value="1">Українська</option>
                                                            <option value="1">Хальмг</option>
                                                            <option value="1">Қазақша</option>
                                                            <option value="1">Ελληνικά</option>
                                                            <option value="1">Alemannisch</option>
                                                            <option value="1">Aragonés</option>
                                                            <option value="1">Armãneashti</option>
                                                            <option value="1">Asturianu</option>
                                                            <option value="1">Azərbaycanca</option>
                                                            <option value="1">Bosanski</option>
                                                            <option value="1">Brezhoneg</option>
                                                            <option value="1">Català</option>
                                                            <option value="1">Corsu</option>
                                                            <option value="1">Cymraeg</option>
                                                            <option value="1">Dansk</option>
                                                            <option value="1">Deutsch</option>
                                                            <option value="1">Eesti</option>
                                                            <option value="1">Emiliànerumagnòl</option>
                                                            <option value="1">English</option>
                                                            <option value="1">Español</option>
                                                            <option value="1">Estremeñu</option>
                                                            <option value="1">Euskara</option>
                                                            <option value="1">Français</option>
                                                            <option value="1">Furlan</option>
                                                            <option value="1">Galego</option>
                                                            <option value="1">Gàidhlig</option>
                                                            <option value="1">Hrvatski</option>
                                                            <option value="1">Italiano</option>
                                                            <option value="1">Kernowek</option>
                                                            <option value="1">Latina</option>
                                                            <option value="1">Latviešu</option>
                                                            <option value="1">Lietuvių</option>
                                                            <option value="1">Limburgs</option>
                                                            <option value="1">Lumbaart</option>
                                                            <option value="1">Lëtzebuergesch</option>
                                                            <option value="1">Magyar</option>
                                                            <option value="1">Nederlands</option>
                                                            <option value="1">Nedersaksies</option>
                                                            <option value="1">Nordfriisk</option>
                                                            <option value="1">Norsk</option>
                                                            <option value="1">Norsknynorsk</option>
                                                            <option value="1">Occitan</option>
                                                            <option value="1">Picard</option>
                                                            <option value="1">Polski</option>
                                                            <option value="1">Pälzisch</option>
                                                            <option value="1">Romani</option>
                                                            <option value="1">Română</option>
                                                            <option value="1">Sardu</option>
                                                            <option value="1">Scots</option>
                                                            <option value="1">Shqip</option>
                                                            <option value="1">Sicilianu</option>
                                                            <option value="1">Slovenčina</option>
                                                            <option value="1">Slovenščina</option>
                                                            <option value="1">Srpskohrvatski/српскохрватс</option>
                                                            <option value="1">Suomi</option>
                                                            <option value="1">Svenska</option>
                                                            <option value="1">Taqbaylit</option>
                                                            <option value="1">Türkçe</option>
                                                            <option value="1">Vepsänkel’</option>
                                                            <option value="1">Vèneto</option>
                                                            <option value="1">Walon</option>
                                                            <option value="1">West-Vlams</option>
                                                            <option value="1">Zazaki</option>
                                                            <option value="1">Ænglisc</option>
                                                            <option value="1">Íslenska</option>
                                                            <option value="1">Čeština</option>
                                                            <option value="1">Žemaitėška</option>
                                                            <option value="1">ייִדיש</option>
                                                            <option value="1">Հայերեն</option>
                                                            <option value="1">მარგალური</option>
                                                            <option value="1">ქართული</option>
                                                            <option value="1">MédioOriente</option>
                                                            <option value="1">اردو</option>
                                                            <option value="1">العربية</option>
                                                            <option value="1">تۆرکجه</option>
                                                            <option value="1">فارسی</option>
                                                            <option value="1">مازِرونی</option>
                                                            <option value="1">مصرى</option>
                                                            <option value="1">پنجابی</option>
                                                            <option value="1">کوردی</option>
                                                            <option value="1">گیلکی</option>
                                                            <option value="1">Русский</option>
                                                            <option value="1">Azərbaycanca</option>
                                                            <option value="1">English</option>
                                                            <option value="1">Türkçe</option>
                                                            <option value="1">ייִדיש</option>
                                                            <option value="1">עברית</option>
                                                            <option value="1">ܐܪܡܝܐ</option>
                                                            <option value="1">മലയാളം</option>
                                                            <option value="1">Հայերեն</option>
                                                            <option value="1">África</option>
                                                            <option value="1">አማርኛ</option>
                                                            <option value="1">ChiShona</option>
                                                            <option value="1">English</option>
                                                            <option value="1">Español</option>
                                                            <option value="1">IsiXhosa</option>
                                                            <option value="1">IsiZulu</option>
                                                            <option value="1">Kabɩyɛ</option>
                                                            <option value="1">Kiswahili</option>
                                                            <option value="1">Lingála</option>
                                                            <option value="1">Malagasy</option>
                                                            <option value="1">Soomaaliga</option>
                                                            <option value="1">Taqbaylit</option>
                                                            <option value="1">Wolof</option>
                                                            <option value="1">Ásia</option>
                                                            <option value="1">اردو</option>
                                                            <option value="1">تۆرکجه</option>
                                                            <option value="1">فارسی</option>
                                                            <option value="1">مازِرونی</option>
                                                            <option value="1">پنجابی</option>
                                                            <option value="1">گیلکی</option>
                                                            <option value="1">中文</option>
                                                            <option value="1">吴语</option>
                                                            <option value="1">日本語</option>
                                                            <option value="1">粵語</option>
                                                            <option value="1">贛語</option>
                                                            <option value="1">한국어</option>
                                                            <option value="1">Кыргызча</option>
                                                            <option value="1">Русский</option>
                                                            <option value="1">Сахатыла</option>
                                                            <option value="1">Тоҷикӣ</option>
                                                            <option value="1">Қазақша</option>
                                                            <option value="1">Acèh</option>
                                                            <option value="1">BahasaBanjar</option>
                                                            <option value="1">BahasaIndonesia</option>
                                                            <option value="1">BahasaMelayu</option>
                                                            <option value="1">BasaJawa</option>
                                                            <option value="1">BasaSunda</option>
                                                            <option value="1">BasoMinangkabau</option>
                                                            <option value="1">Bân-lâm-gú</option>
                                                            <option value="1">English</option>
                                                            <option value="1">FijiHindi</option>
                                                            <option value="1">客家語/Hak-kâ-ngî</option>
                                                            <option value="1">Ilokano</option>
                                                            <option value="1">Mìng-dĕ̤ng-ngṳ̄</option>
                                                            <option value="1">Oʻzbekcha/ўзбекча</option>
                                                            <option value="1">Tagalog</option>
                                                            <option value="1">TiếngViệt</option>
                                                            <option value="1">Winaray</option>
                                                            <option value="1">Zazaki</option>
                                                            <option value="1">नेपालभाषा</option>
                                                            <option value="1">नेपाली</option>
                                                            <option value="1">भोजपुरी</option>
                                                            <option value="1">हिन्दी</option>
                                                            <option value="1">অসমীয়া</option>
                                                            <option value="1">বাংলা</option>
                                                            <option value="1">ਪੰਜਾਬੀ</option>
                                                            <option value="1">ଓଡ଼ିଆ</option>
                                                            <option value="1">தமிழ்</option>
                                                            <option value="1">తెలుగు</option>
                                                            <option value="1">ಕನ್ನಡ</option>
                                                            <option value="1">മലയാളം</option>
                                                            <option value="1">བོད་ཡིག</option>
                                                            <option value="1">ไทย</option>
                                                            <option value="1">ລາວ</option>
                                                            <option value="1">ᨅᨔᨕᨘᨁᨗ</option>
                                                            <option value="1">Pacífico</option>
                                                            <option value="1">Acèh</option>
                                                            <option value="1">BasaJawa</option>
                                                            <option value="1">English</option>
                                                            <option value="1">Español</option>
                                                            <option value="1">FijiHindi</option>
                                                            <option value="1">Norfuk/Pitkern</option>
														</select>
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
              <label for="color_"><span class="required">*</span>Empty 1:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["color_"] ?>" placeholder="Empty" id="color_" class="color2" name="color_"><span id="color__err" class="error"></span>
               <!-- <span class="help-block">Maximum of 10 digits only and only numbers.</span>-->
              </div>
            </div>
            
            <div class="field half">
              <label for="frequen_">Empty 2:</label>
              <div class="span-3-10">
                <input type="text" value="<?php echo $results[0]["frequen_"] ?>" placeholder="Empty" id="frequen_" class="color2" name="frequen_"><span id="frequen__err" class="error"></span>
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
						
						<div class="field third">
													<label for="demo-category">Language</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
															<option value="1">Portugues</option>
															<option value="1">Shipping</option>
															<option value="1">Administration</option>
															<option value="1">Human Resources</option>
														</select>
													</div>
												</div>
						<div class="field third">
													<label for="demo-category">Primary Emotion</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
															<option value="1">Primary Emotion</option>
															<option value="1">Shipping</option>
															<option value="1">Administration</option>
															<option value="1">Human Resources</option>
														</select>
													</div>
												</div>	
<div class="field third">
	<label for="demo-category">Secondary Emotion</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
															<option value="1">Manufacturing</option>
															<option value="1">Shipping</option>
															<option value="1">Administration</option>
															<option value="1">Human Resources</option>
														</select>
													</div>
												</div>
               <div class="field third">
	<label for="demo-category">Color</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
															<option value="1">Manufacturing</option>
															<option value="1">Shipping</option>
															<option value="1">Administration</option>
															<option value="1">Human Resources</option>
														</select>
													</div>
												</div>			
												
										<!--<ul class="contact-icons color1">
											<li class="icon fa-twitter"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-facebook"><a href="#">facebook.com/untitled</a></li>
											<li class="icon fa-snapchat-ghost"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-instagram"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-medium"><a href="#">medium.com/untitled</a></li>
										</ul>-->
									</div>
	
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
	 var color_ = $.trim( $("#color_").val());
	 var frequen_ = $.trim( $("#frequen_").val());
     
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
    
    if (color_ == "" ) {
		$("#color__err").html("Enter first contact number.");
		$('#color__err').fadeIn("fast"); 
		errCnt++;
	}  else if (color_.length <= 9 || color_.length > 10 ) {
		$("#color__err").html("Enter 10 digits only.");
		$('#color__err').fadeIn("fast"); 
		errCnt++;
	} else if ( !$.isNumeric(color_) ) {
		$("#color__err").html("Must be digits only.");
		$('#color__err').fadeIn("fast"); 
		errCnt++;
	}
    
    if (frequen_.length > 0) {
      if (frequen_.length <= 9 || frequen_.length > 10 ) {
		$("#frequen__err").html("Enter 10 digits only.");
		$('#frequen__err').fadeIn("fast"); 
		errCnt++;
	} else if ( !$.isNumeric(frequen_) ) {
		$("#frequen__err").html("Must be digits only.");
		$('#frequen__err').fadeIn("fast"); 
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
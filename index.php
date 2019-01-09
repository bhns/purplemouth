<?php
/*
 * @author BHNS
 */
require_once './_config.php';
include './_header.php';
/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] :2;


try {
  $keyword = trim($_GET["keyword"]);
  if ($keyword <> "" ) {
    $sql = "SELECT * FROM main_words WHERE 1 AND "
            . " (word_name LIKE :keyword) ORDER BY word_name ";
    $check_ = $DB->prepare($sql);

    $check_->bindValue(":keyword", $keyword."%");

  } else {
    $sql = "SELECT * FROM main_words WHERE 1 ORDER BY word_name ";
    $check_ = $DB->prepare($sql);
  }

  $check_->execute();
  $total_count = count($check_->fetchAll());

  $last = ceil($total_count / $page_limit);

  if ($pagenum < 1) {
    $pagenum = 1;
  } elseif ($pagenum > $last) {
    $pagenum = $last;
  }

  $lower_limit = ($pagenum - 1) * $page_limit;
  $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;


  $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";

  $check_ = $DB->prepare($sql2);

  if ($keyword <> "" ) {
    $check_->bindValue(":keyword", $keyword."%");
   }

  $check_->execute();
  $results = $check_->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
/*******PAGINATION CODE ENDS*****************/
?>




<!-- Panel -->
<section class="panel color4-alt" id="view_word">

    <div class="panel panel-primary">
      <div class="intro color4">
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
			<br>
	  <a href="index.php" class="button small primary color4">home</a><br>
			    <?php if (count($results) > 0) { ?>
				<h4>Purple Mouth</h4>
																		<?php if ($ERROR_MSG <> "") { ?>
    <div id="wrapper<?php echo $ERROR_TYPE ?>">
     <!-- <button data-dismiss="alert" class="close" type="button">×</button>-->
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>

		<div class="field half">
			<form action="_search.php" method="get" >

          <span class="pull-left">
		  <!--Botoes pesquisar e adiconar-->
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="Search by word name" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>
            <button class="button small">Search</button>
			<a href="_edit_word.php" class="button small">Add New Word</a><br><br>
			<p>Total Records : <?php echo $total_count; ?></p><br>   
			<div class="copyright">&copy;lebestation</div>
			<a href="http://bhns.com.br">BHNS</a>
			<!-- <?php echo $last_consult_sql; ?><br> 
			 <?php echo $sql ; ?><br> -->
			 


 	    </div>
		</div>


		 <div class="class=inner columns divided">

			<div class="span-3-25"><br>   <br>   
				<h2 class="major">Purple Mouth</h2><br>   
				<p>This is a project OpenSource for help you improve your grammar play with the words one way very easy. </p>
				<p>Total Words Records : <?php echo $total_count; ?> Can you help with the project try record a word.</p><br>   
				<a href="_edit_word.php" class="button small">Add New Word</a><br>  
				<p>A Mix of languagens interation with arduino for make it more funny and helpfull.</p>			 
				<p>Try to learn one class.</p><a href="#" class="button small">Class</a><br>   
							
			<!--<table  class="alt">
												<thead>
													<tr>
													   <th>Praticar</th>
				                                      <th>Category</th>
                                                      <th>Translate</th>
				                                      <th>Picture</th>
													</tr>
												</thead>
												<tbody>

                <tr>
				  <td><h4> <?php echo $res["word_name"]; ?></h4></td>
				  <td><?php echo $res["category_word"]; ?></td>
                  <td><?php echo $res["type_name"]; ?></td>
              <?php echo $res["email_address"]; ?></td>
				  <td>
                <?php $pic = ($res["word_pic"] <> "" ) ? $res["word_pic"] : "no_pic.png" ?>
                    <a href="word_pics/<?php echo $pic ?>" target="_blank"><img src="word_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a> </td>

                </tr>
				 <tr>
				 <td><a href="_words.php?cid=<?php echo $res["word_id"]; ?>" class="button small">View</a></td>
				  <td><a href="_edit_word.php?m=update&cid=<?php echo $res["word_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" class="button small">Edit</a></td>
				  <td><a href="_main_.php?mode=delete&cid=<?php echo $res["word_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')" class="button small">Delete</a> </td>
				  </tr>

												</tbody>
												<tfoot>


													<tr>
														<td colspan="2"></td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>-->
	                                </div>
									
						




			</div>
			
						
						
						
						<div class="intro color4">
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
									

    </div>
   </form>
</section>

          <?php } else { ?>

		   <div class="span-2-75">
			<p>	  No words found</p>
          <span class="pull-left">

		  <!--Botoes pesquisar e adiconar-->
		  <form action="_search.php" method="get" >
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="Search by word name" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>        
			<button class="button small">Search</button>
			<a href="_edit_word.php" class="button small">Add New Word</a>
			<a href="index.php" class="button small primary color4">Home</a>
			 </form>
									
        </div>

<?php } ?>






      <?php
      include './_footer.php';
      ?>
<?php
    /* 
 * You are free for make it better @author everyone that love shared
 
 */
require_once './_config.php';
include './_header.php';
error_reporting(E_ERROR);



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


   <!--Botoes pesquisar e adiconar-->
		    <form action="index.php" method="post">
              <div class="field third"><br><br>
			  <label for="demo-category"><?php echo $text[$lang]['lingua']; if( isset( $_COOKIE["language"] ) ) {  echo $text[$lang]['lingua_name']; } else { echo "<em> not set</em>"; } ?></label>        
			 <div class="select-wrapper">
			<select name="lang" id="lang">
			  <option value=""><?php echo $text[$lang]['lingua_name']?></option>
              <option value="en"<?php if( $_COOKIE["language"] == "English" ) { echo "selected"; } ?>>English</option>
              <option value="ru"<?php if( $_COOKIE["language"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
              <option value="fr"<?php if( $_COOKIE["language"] == "French" ) { echo "selected"; } ?>>Français</option>
              <option value="pt"<?php if( $_COOKIE["language"] == "Portuguese" ) { echo "selected"; } ?>>Portuguese</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Español" ) { echo "selected"; } ?>>Español</option>
              <option value="en"<?php if( $_COOKIE["language"] == "日本語" ) { echo "selected"; } ?>>日本語</option>
              <option value="en"<?php if( $_COOKIE["language"] == "한국어" ) { echo "selected"; } ?>>한국어</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Deutsch" ) { echo "selected"; } ?>>Deutsch</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Italiano" ) { echo "selected"; } ?>>Italiano</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Esperanto" ) { echo "selected"; } ?>>Esperanto</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Ido" ) { echo "selected"; } ?>>Ido</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Interlingua" ) { echo "selected"; } ?>>Interlingua</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Interlingue" ) { echo "selected"; } ?>>Interlingue</option>
              <option value="en"<?php if( $_COOKIE["language"] == "LinguaFrancaNova" ) { echo "selected"; } ?>>LinguaFrancaNova</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Avañe'ẽ" ) { echo "selected"; } ?>>Avañe'ẽ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Aymararu" ) { echo "selected"; } ?>>Aymararu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Français" ) { echo "selected"; } ?>>Français</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Kreyòlayisyen" ) { echo "selected"; } ?>>Kreyòlayisyen</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Nederlands" ) { echo "selected"; } ?>>Nederlands</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Nāhuatl" ) { echo "selected"; } ?>>Nāhuatl</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Patois" ) { echo "selected"; } ?>>Patois</option>
              <option value="en"<?php if( $_COOKIE["language"] == "RunaSimi" ) { echo "selected"; } ?>>RunaSimi</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Tsetsêhestâhese" ) { echo "selected"; } ?>>Tsetsêhestâhese</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ייִדיש" ) { echo "selected"; } ?>>ייִדיש</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Europa" ) { echo "selected"; } ?>>Europa</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Башҡортса" ) { echo "selected"; } ?>>Башҡортса</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Беларуская" ) { echo "selected"; } ?>>Беларуская</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Беларуская(тарашкевіца)‎" ) { echo "selected"; } ?>>Беларуская(тарашкевіца)‎</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Български" ) { echo "selected"; } ?>>Български</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Кырыкмары" ) { echo "selected"; } ?>>Кырыкмары</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Нохчийн" ) { echo "selected"; } ?>>Нохчийн</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Олыкмарий" ) { echo "selected"; } ?>>Олыкмарий</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Русиньскый" ) { echo "selected"; } ?>>Русиньскый</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Сахатыла" ) { echo "selected"; } ?>>Сахатыла</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Српски/srpski" ) { echo "selected"; } ?>>Српски/srpski</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Татарча/tatarça" ) { echo "selected"; } ?>>Татарча/tatarça</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Українська" ) { echo "selected"; } ?>>Українська</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Хальмг" ) { echo "selected"; } ?>>Хальмг</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Қазақша" ) { echo "selected"; } ?>>Қазақша</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Ελληνικά" ) { echo "selected"; } ?>>Ελληνικά</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Alemannisch" ) { echo "selected"; } ?>>Alemannisch</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Aragonés" ) { echo "selected"; } ?>>Aragonés</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Armãneashti" ) { echo "selected"; } ?>>Armãneashti</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Asturianu" ) { echo "selected"; } ?>>Asturianu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Azərbaycanca" ) { echo "selected"; } ?>>Azərbaycanca</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Bosanski" ) { echo "selected"; } ?>>Bosanski</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Brezhoneg" ) { echo "selected"; } ?>>Brezhoneg</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Català" ) { echo "selected"; } ?>>Català</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Corsu" ) { echo "selected"; } ?>>Corsu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Cymraeg" ) { echo "selected"; } ?>>Cymraeg</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Dansk" ) { echo "selected"; } ?>>Dansk</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Deutsch" ) { echo "selected"; } ?>>Deutsch</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Eesti" ) { echo "selected"; } ?>>Eesti</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Emiliànerumagnòl" ) { echo "selected"; } ?>>Emiliànerumagnòl</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Español" ) { echo "selected"; } ?>>Español</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Estremeñu" ) { echo "selected"; } ?>>Estremeñu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Euskara" ) { echo "selected"; } ?>>Euskara</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Français" ) { echo "selected"; } ?>>Français</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Furlan" ) { echo "selected"; } ?>>Furlan</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Galego" ) { echo "selected"; } ?>>Galego</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Gàidhlig" ) { echo "selected"; } ?>>Gàidhlig</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Hrvatski" ) { echo "selected"; } ?>>Hrvatski</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Italiano" ) { echo "selected"; } ?>>Italiano</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Kernowek" ) { echo "selected"; } ?>>Kernowek</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Latina" ) { echo "selected"; } ?>>Latina</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Latviešu" ) { echo "selected"; } ?>>Latviešu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Lietuvių" ) { echo "selected"; } ?>>Lietuvių</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Limburgs" ) { echo "selected"; } ?>>Limburgs</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Lumbaart" ) { echo "selected"; } ?>>Lumbaart</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Lëtzebuergesch" ) { echo "selected"; } ?>>Lëtzebuergesch</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Magyar" ) { echo "selected"; } ?>>Magyar</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Nederlands" ) { echo "selected"; } ?>>Nederlands</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Nedersaksies" ) { echo "selected"; } ?>>Nedersaksies</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Nordfriisk" ) { echo "selected"; } ?>>Nordfriisk</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Norsk" ) { echo "selected"; } ?>>Norsk</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Norsknynorsk" ) { echo "selected"; } ?>>Norsknynorsk</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Occitan" ) { echo "selected"; } ?>>Occitan</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Picard" ) { echo "selected"; } ?>>Picard</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Polski" ) { echo "selected"; } ?>>Polski</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Pälzisch" ) { echo "selected"; } ?>>Pälzisch</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Romani" ) { echo "selected"; } ?>>Romani</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Română" ) { echo "selected"; } ?>>Română</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Sardu" ) { echo "selected"; } ?>>Sardu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Scots" ) { echo "selected"; } ?>>Scots</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Shqip" ) { echo "selected"; } ?>>Shqip</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Sicilianu" ) { echo "selected"; } ?>>Sicilianu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Slovenčina" ) { echo "selected"; } ?>>Slovenčina</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Slovenščina" ) { echo "selected"; } ?>>Slovenščina</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Srpskohrvatski/српскохрватс" ) { echo "selected"; } ?>>Srpskohrvatski/српскохрватс</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Suomi" ) { echo "selected"; } ?>>Suomi</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Svenska" ) { echo "selected"; } ?>>Svenska</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Taqbaylit" ) { echo "selected"; } ?>>Taqbaylit</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Türkçe" ) { echo "selected"; } ?>>Türkçe</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Vepsänkel’" ) { echo "selected"; } ?>>Vepsänkel’</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Vèneto" ) { echo "selected"; } ?>>Vèneto</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Walon" ) { echo "selected"; } ?>>Walon</option>
              <option value="en"<?php if( $_COOKIE["language"] == "West-Vlams" ) { echo "selected"; } ?>>West-Vlams</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Zazaki" ) { echo "selected"; } ?>>Zazaki</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Ænglisc" ) { echo "selected"; } ?>>Ænglisc</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Íslenska" ) { echo "selected"; } ?>>Íslenska</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Čeština" ) { echo "selected"; } ?>>Čeština</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Žemaitėška" ) { echo "selected"; } ?>>Žemaitėška</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ייִדיש" ) { echo "selected"; } ?>>ייִדיש</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Հայերեն" ) { echo "selected"; } ?>>Հայերեն</option>
              <option value="en"<?php if( $_COOKIE["language"] == "მარგალური" ) { echo "selected"; } ?>>მარგალური</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ქართული" ) { echo "selected"; } ?>>ქართული</option>
              <option value="en"<?php if( $_COOKIE["language"] == "MédioOriente" ) { echo "selected"; } ?>>MédioOriente</option>
              <option value="en"<?php if( $_COOKIE["language"] == "اردو" ) { echo "selected"; } ?>>اردو</option>
              <option value="en"<?php if( $_COOKIE["language"] == "العربية" ) { echo "selected"; } ?>>العربية</option>
              <option value="en"<?php if( $_COOKIE["language"] == "تۆرکجه" ) { echo "selected"; } ?>>تۆرکجه</option>
              <option value="en"<?php if( $_COOKIE["language"] == "فارسی" ) { echo "selected"; } ?>>فارسی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "مازِرونی" ) { echo "selected"; } ?>>مازِرونی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "مصرى" ) { echo "selected"; } ?>>مصرى</option>
              <option value="en"<?php if( $_COOKIE["language"] == "پنجابی" ) { echo "selected"; } ?>>پنجابی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "کوردی" ) { echo "selected"; } ?>>کوردی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "گیلکی" ) { echo "selected"; } ?>>گیلکی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Azərbaycanca" ) { echo "selected"; } ?>>Azərbaycanca</option>
              <option value="en"<?php if( $_COOKIE["language"] == "English" ) { echo "selected"; } ?>>English</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Türkçe" ) { echo "selected"; } ?>>Türkçe</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ייִדיש" ) { echo "selected"; } ?>>ייִדיש</option>
              <option value="en"<?php if( $_COOKIE["language"] == "עברית" ) { echo "selected"; } ?>>עברית</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ܐܪܡܝܐ" ) { echo "selected"; } ?>>ܐܪܡܝܐ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "മലയാളം" ) { echo "selected"; } ?>>മലയാളം</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Հայերեն" ) { echo "selected"; } ?>>Հայերեն</option>
              <option value="en"<?php if( $_COOKIE["language"] == "África" ) { echo "selected"; } ?>>África</option>
              <option value="en"<?php if( $_COOKIE["language"] == "አማርኛ" ) { echo "selected"; } ?>>አማርኛ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ChiShona" ) { echo "selected"; } ?>>ChiShona</option>
              <option value="en"<?php if( $_COOKIE["language"] == "English" ) { echo "selected"; } ?>>English</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Español" ) { echo "selected"; } ?>>Español</option>
              <option value="en"<?php if( $_COOKIE["language"] == "IsiXhosa" ) { echo "selected"; } ?>>IsiXhosa</option>
              <option value="en"<?php if( $_COOKIE["language"] == "IsiZulu" ) { echo "selected"; } ?>>IsiZulu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Kabɩyɛ" ) { echo "selected"; } ?>>Kabɩyɛ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Kiswahili" ) { echo "selected"; } ?>>Kiswahili</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Lingála" ) { echo "selected"; } ?>>Lingála</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Malagasy" ) { echo "selected"; } ?>>Malagasy</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Soomaaliga" ) { echo "selected"; } ?>>Soomaaliga</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Taqbaylit" ) { echo "selected"; } ?>>Taqbaylit</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Wolof" ) { echo "selected"; } ?>>Wolof</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Ásia" ) { echo "selected"; } ?>>Ásia</option>
              <option value="en"<?php if( $_COOKIE["language"] == "اردو" ) { echo "selected"; } ?>>اردو</option>
              <option value="en"<?php if( $_COOKIE["language"] == "تۆرکجه" ) { echo "selected"; } ?>>تۆرکجه</option>
              <option value="en"<?php if( $_COOKIE["language"] == "فارسی" ) { echo "selected"; } ?>>فارسی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "مازِرونی" ) { echo "selected"; } ?>>مازِرونی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "پنجابی" ) { echo "selected"; } ?>>پنجابی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "گیلکی" ) { echo "selected"; } ?>>گیلکی</option>
              <option value="en"<?php if( $_COOKIE["language"] == "中文" ) { echo "selected"; } ?>>中文</option>
              <option value="en"<?php if( $_COOKIE["language"] == "吴语" ) { echo "selected"; } ?>>吴语</option>
              <option value="en"<?php if( $_COOKIE["language"] == "日本語" ) { echo "selected"; } ?>>日本語</option>
              <option value="en"<?php if( $_COOKIE["language"] == "粵語" ) { echo "selected"; } ?>>粵語</option>
              <option value="en"<?php if( $_COOKIE["language"] == "贛語" ) { echo "selected"; } ?>>贛語</option>
              <option value="en"<?php if( $_COOKIE["language"] == "한국어" ) { echo "selected"; } ?>>한국어</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Кыргызча" ) { echo "selected"; } ?>>Кыргызча</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Сахатыла" ) { echo "selected"; } ?>>Сахатыла</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Тоҷикӣ" ) { echo "selected"; } ?>>Тоҷикӣ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Қазақша" ) { echo "selected"; } ?>>Қазақша</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Acèh" ) { echo "selected"; } ?>>Acèh</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BahasaBanjar" ) { echo "selected"; } ?>>BahasaBanjar</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BahasaIndonesia" ) { echo "selected"; } ?>>BahasaIndonesia</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BahasaMelayu" ) { echo "selected"; } ?>>BahasaMelayu</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BasaJawa" ) { echo "selected"; } ?>>BasaJawa</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BasaSunda" ) { echo "selected"; } ?>>BasaSunda</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BasoMinangkabau" ) { echo "selected"; } ?>>BasoMinangkabau</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Bân-lâm-gú" ) { echo "selected"; } ?>>Bân-lâm-gú</option>
              <option value="en"<?php if( $_COOKIE["language"] == "English" ) { echo "selected"; } ?>>English</option>
              <option value="en"<?php if( $_COOKIE["language"] == "FijiHindi" ) { echo "selected"; } ?>>FijiHindi</option>
              <option value="en"<?php if( $_COOKIE["language"] == "客家語/Hak-kâ-ngî" ) { echo "selected"; } ?>>客家語/Hak-kâ-ngî</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Ilokano" ) { echo "selected"; } ?>>Ilokano</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Mìng-dĕ̤ng-ngṳ̄" ) { echo "selected"; } ?>>Mìng-dĕ̤ng-ngṳ̄</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Oʻzbekcha/ўзбекча" ) { echo "selected"; } ?>>Oʻzbekcha/ўзбекча</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Tagalog" ) { echo "selected"; } ?>>Tagalog</option>
              <option value="en"<?php if( $_COOKIE["language"] == "TiếngViệt" ) { echo "selected"; } ?>>TiếngViệt</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Winaray" ) { echo "selected"; } ?>>Winaray</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Zazaki" ) { echo "selected"; } ?>>Zazaki</option>
              <option value="en"<?php if( $_COOKIE["language"] == "नेपालभाषा" ) { echo "selected"; } ?>>नेपालभाषा</option>
              <option value="en"<?php if( $_COOKIE["language"] == "नेपाली" ) { echo "selected"; } ?>>नेपाली</option>
              <option value="en"<?php if( $_COOKIE["language"] == "भोजपुरी" ) { echo "selected"; } ?>>भोजपुरी</option>
              <option value="en"<?php if( $_COOKIE["language"] == "हिन्दी" ) { echo "selected"; } ?>>हिन्दी</option>
              <option value="en"<?php if( $_COOKIE["language"] == "অসমীয়া" ) { echo "selected"; } ?>>অসমীয়া</option>
              <option value="en"<?php if( $_COOKIE["language"] == "বাংলা" ) { echo "selected"; } ?>>বাংলা</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ਪੰਜਾਬੀ" ) { echo "selected"; } ?>>ਪੰਜਾਬੀ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ଓଡ଼ିଆ" ) { echo "selected"; } ?>>ଓଡ଼ିଆ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "தமிழ்" ) { echo "selected"; } ?>>தமிழ்</option>
              <option value="en"<?php if( $_COOKIE["language"] == "తెలుగు" ) { echo "selected"; } ?>>తెలుగు</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ಕನ್ನಡ" ) { echo "selected"; } ?>>ಕನ್ನಡ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "മലയാളം" ) { echo "selected"; } ?>>മലയാളം</option>
              <option value="en"<?php if( $_COOKIE["language"] == "བོད་ཡིག" ) { echo "selected"; } ?>>བོད་ཡིག</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ไทย" ) { echo "selected"; } ?>>ไทย</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ລາວ" ) { echo "selected"; } ?>>ລາວ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "ᨅᨔᨕᨘᨁᨗ" ) { echo "selected"; } ?>>ᨅᨔᨕᨘᨁᨗ</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Pacífico" ) { echo "selected"; } ?>>Pacífico</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Acèh" ) { echo "selected"; } ?>>Acèh</option>
              <option value="en"<?php if( $_COOKIE["language"] == "BasaJawa" ) { echo "selected"; } ?>>BasaJawa</option>
              <option value="en"<?php if( $_COOKIE["language"] == "English" ) { echo "selected"; } ?>>English</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Español" ) { echo "selected"; } ?>>Español</option>
              <option value="en"<?php if( $_COOKIE["language"] == "FijiHindi" ) { echo "selected"; } ?>>FijiHindi</option>
              <option value="en"<?php if( $_COOKIE["language"] == "Norfuk/Pitkern" ) { echo "selected"; } ?>>Norfuk/Pitkern</option>
              </select>	<button class="button small"><?php echo $text[$lang]['selectlang']; ?></button>
		
			</div>
			
			</div>
            <!--ALguma coisa-->
			 </form>
									
        </div>
			<br>
			
			
			
	  <a href="index.php" class="button small primary color4"><?php echo $text[$lang]['bt_home']; ?></a><br>
			    <?php if (count($results) > 0) { ?>
				<h4><?php echo $text[$lang]['title_home']; ?></h4>
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
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="<?php echo $text[$lang]['lb_tips']; ?>" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>
            <button class="button small"><?php echo $text[$lang]['bt_search']; ?></button>
			<a href="_edit_word.php" class="button small"><?php echo $text[$lang]['bt_add_new_word']; ?></a><br>
			<p><?php echo $text[$lang]['lb_records']; ?> : <?php echo $total_count; ?></p>  
			<div class="copyright">&copy;lebestation</div>
			<a href="http://bhns.com.br">BHNS</a>
			<!-- <?php echo $last_consult_sql; ?><br> 
			 <?php echo $sql ; ?><br> -->
            </form>

 	    </div>
		</div>


		 <div class="class=inner columns divided">

			<div class="span-3-25">
				<h2 class="major"><?php echo $text[$lang]['title_home']; ?></h2>
                <p><?php echo $text[$lang]['text_home']; ?></p>				
				<p><?php echo $text[$lang]['text_home_2']; ?></p>
				<p><?php echo $text[$lang]['lb_records']; ?> : <?php echo $total_count; ?> <?php echo $text[$lang]['text_home_3']; ?> 
				<a href="_edit_word.php" title="Binha" alt="Binha" class="button small"><?php echo $text[$lang]['bt_add_new_word']; ?></a></p><br>		 
				<p><?php echo $text[$lang]['text_home_4']; ?></p>
				<br>   
					
			
			
			
			
			
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
						<p><?php echo $text[$lang]['text_home_5']; ?></p>
						<div class="field third">
            <!--Botoes pesquisar e adiconar-->
		    <form action="_classes.php" method="post">
            <div class="field third">
		    <label for="demo-category"><?php echo $text[$lang]['lingua']; if( isset( $_COOKIE["classes"] ) ) { echo $text[$lang_]['lingua_name']; } else { echo "<em> not set</em>"; } ?></label>
            <div class="select-wrapper">
			<select name="lang_" id="lang_">
			<option value=""><?php echo $text[$lang_]['lingua_name']?></option>
            <option value="en"<?php if( $_COOKIE["classes"] == "English" ) { echo "selected"; } ?>>English</option>
            <option value="ru"<?php if( $_COOKIE["classes"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
            <option value="fr"<?php if( $_COOKIE["classes"] == "French" ) { echo "selected"; } ?>>Français</option>
            <option value="pt"<?php if( $_COOKIE["classes"] == "Portuguese" ) { echo "selected"; } ?>>Portuguese</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Español" ) { echo "selected"; } ?>>Español</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "日本語" ) { echo "selected"; } ?>>日本語</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "한국어" ) { echo "selected"; } ?>>한국어</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Deutsch" ) { echo "selected"; } ?>>Deutsch</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Italiano" ) { echo "selected"; } ?>>Italiano</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Esperanto" ) { echo "selected"; } ?>>Esperanto</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Ido" ) { echo "selected"; } ?>>Ido</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Interlingua" ) { echo "selected"; } ?>>Interlingua</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Interlingue" ) { echo "selected"; } ?>>Interlingue</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "LinguaFrancaNova" ) { echo "selected"; } ?>>LinguaFrancaNova</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Avañe'ẽ" ) { echo "selected"; } ?>>Avañe'ẽ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Aymararu" ) { echo "selected"; } ?>>Aymararu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Français" ) { echo "selected"; } ?>>Français</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Kreyòlayisyen" ) { echo "selected"; } ?>>Kreyòlayisyen</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Nederlands" ) { echo "selected"; } ?>>Nederlands</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Nāhuatl" ) { echo "selected"; } ?>>Nāhuatl</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Patois" ) { echo "selected"; } ?>>Patois</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "RunaSimi" ) { echo "selected"; } ?>>RunaSimi</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Tsetsêhestâhese" ) { echo "selected"; } ?>>Tsetsêhestâhese</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ייִדיש" ) { echo "selected"; } ?>>ייִדיש</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Europa" ) { echo "selected"; } ?>>Europa</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Башҡортса" ) { echo "selected"; } ?>>Башҡортса</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Беларуская" ) { echo "selected"; } ?>>Беларуская</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Беларуская(тарашкевіца)‎" ) { echo "selected"; } ?>>Беларуская(тарашкевіца)‎</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Български" ) { echo "selected"; } ?>>Български</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Кырыкмары" ) { echo "selected"; } ?>>Кырыкмары</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Нохчийн" ) { echo "selected"; } ?>>Нохчийн</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Олыкмарий" ) { echo "selected"; } ?>>Олыкмарий</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Русиньскый" ) { echo "selected"; } ?>>Русиньскый</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Сахатыла" ) { echo "selected"; } ?>>Сахатыла</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Српски/srpski" ) { echo "selected"; } ?>>Српски/srpski</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Татарча/tatarça" ) { echo "selected"; } ?>>Татарча/tatarça</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Українська" ) { echo "selected"; } ?>>Українська</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Хальмг" ) { echo "selected"; } ?>>Хальмг</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Қазақша" ) { echo "selected"; } ?>>Қазақша</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Ελληνικά" ) { echo "selected"; } ?>>Ελληνικά</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Alemannisch" ) { echo "selected"; } ?>>Alemannisch</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Aragonés" ) { echo "selected"; } ?>>Aragonés</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Armãneashti" ) { echo "selected"; } ?>>Armãneashti</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Asturianu" ) { echo "selected"; } ?>>Asturianu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Azərbaycanca" ) { echo "selected"; } ?>>Azərbaycanca</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Bosanski" ) { echo "selected"; } ?>>Bosanski</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Brezhoneg" ) { echo "selected"; } ?>>Brezhoneg</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Català" ) { echo "selected"; } ?>>Català</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Corsu" ) { echo "selected"; } ?>>Corsu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Cymraeg" ) { echo "selected"; } ?>>Cymraeg</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Dansk" ) { echo "selected"; } ?>>Dansk</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Deutsch" ) { echo "selected"; } ?>>Deutsch</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Eesti" ) { echo "selected"; } ?>>Eesti</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Emiliànerumagnòl" ) { echo "selected"; } ?>>Emiliànerumagnòl</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Español" ) { echo "selected"; } ?>>Español</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Estremeñu" ) { echo "selected"; } ?>>Estremeñu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Euskara" ) { echo "selected"; } ?>>Euskara</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Français" ) { echo "selected"; } ?>>Français</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Furlan" ) { echo "selected"; } ?>>Furlan</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Galego" ) { echo "selected"; } ?>>Galego</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Gàidhlig" ) { echo "selected"; } ?>>Gàidhlig</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Hrvatski" ) { echo "selected"; } ?>>Hrvatski</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Italiano" ) { echo "selected"; } ?>>Italiano</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Kernowek" ) { echo "selected"; } ?>>Kernowek</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Latina" ) { echo "selected"; } ?>>Latina</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Latviešu" ) { echo "selected"; } ?>>Latviešu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Lietuvių" ) { echo "selected"; } ?>>Lietuvių</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Limburgs" ) { echo "selected"; } ?>>Limburgs</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Lumbaart" ) { echo "selected"; } ?>>Lumbaart</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Lëtzebuergesch" ) { echo "selected"; } ?>>Lëtzebuergesch</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Magyar" ) { echo "selected"; } ?>>Magyar</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Nederlands" ) { echo "selected"; } ?>>Nederlands</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Nedersaksies" ) { echo "selected"; } ?>>Nedersaksies</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Nordfriisk" ) { echo "selected"; } ?>>Nordfriisk</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Norsk" ) { echo "selected"; } ?>>Norsk</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Norsknynorsk" ) { echo "selected"; } ?>>Norsknynorsk</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Occitan" ) { echo "selected"; } ?>>Occitan</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Picard" ) { echo "selected"; } ?>>Picard</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Polski" ) { echo "selected"; } ?>>Polski</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Pälzisch" ) { echo "selected"; } ?>>Pälzisch</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Romani" ) { echo "selected"; } ?>>Romani</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Română" ) { echo "selected"; } ?>>Română</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Sardu" ) { echo "selected"; } ?>>Sardu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Scots" ) { echo "selected"; } ?>>Scots</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Shqip" ) { echo "selected"; } ?>>Shqip</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Sicilianu" ) { echo "selected"; } ?>>Sicilianu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Slovenčina" ) { echo "selected"; } ?>>Slovenčina</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Slovenščina" ) { echo "selected"; } ?>>Slovenščina</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Srpskohrvatski/српскохрватс" ) { echo "selected"; } ?>>Srpskohrvatski/српскохрватс</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Suomi" ) { echo "selected"; } ?>>Suomi</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Svenska" ) { echo "selected"; } ?>>Svenska</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Taqbaylit" ) { echo "selected"; } ?>>Taqbaylit</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Türkçe" ) { echo "selected"; } ?>>Türkçe</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Vepsänkel’" ) { echo "selected"; } ?>>Vepsänkel’</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Vèneto" ) { echo "selected"; } ?>>Vèneto</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Walon" ) { echo "selected"; } ?>>Walon</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "West-Vlams" ) { echo "selected"; } ?>>West-Vlams</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Zazaki" ) { echo "selected"; } ?>>Zazaki</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Ænglisc" ) { echo "selected"; } ?>>Ænglisc</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Íslenska" ) { echo "selected"; } ?>>Íslenska</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Čeština" ) { echo "selected"; } ?>>Čeština</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Žemaitėška" ) { echo "selected"; } ?>>Žemaitėška</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ייִדיש" ) { echo "selected"; } ?>>ייִדיש</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Հայերեն" ) { echo "selected"; } ?>>Հայերեն</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "მარგალური" ) { echo "selected"; } ?>>მარგალური</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ქართული" ) { echo "selected"; } ?>>ქართული</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "MédioOriente" ) { echo "selected"; } ?>>MédioOriente</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "اردو" ) { echo "selected"; } ?>>اردو</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "العربية" ) { echo "selected"; } ?>>العربية</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "تۆرکجه" ) { echo "selected"; } ?>>تۆرکجه</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "فارسی" ) { echo "selected"; } ?>>فارسی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "مازِرونی" ) { echo "selected"; } ?>>مازِرونی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "مصرى" ) { echo "selected"; } ?>>مصرى</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "پنجابی" ) { echo "selected"; } ?>>پنجابی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "کوردی" ) { echo "selected"; } ?>>کوردی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "گیلکی" ) { echo "selected"; } ?>>گیلکی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Azərbaycanca" ) { echo "selected"; } ?>>Azərbaycanca</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "English" ) { echo "selected"; } ?>>English</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Türkçe" ) { echo "selected"; } ?>>Türkçe</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ייִדיש" ) { echo "selected"; } ?>>ייִדיש</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "עברית" ) { echo "selected"; } ?>>עברית</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ܐܪܡܝܐ" ) { echo "selected"; } ?>>ܐܪܡܝܐ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "മലയാളം" ) { echo "selected"; } ?>>മലയാളം</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Հայերեն" ) { echo "selected"; } ?>>Հայերեն</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "África" ) { echo "selected"; } ?>>África</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "አማርኛ" ) { echo "selected"; } ?>>አማርኛ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ChiShona" ) { echo "selected"; } ?>>ChiShona</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "English" ) { echo "selected"; } ?>>English</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Español" ) { echo "selected"; } ?>>Español</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "IsiXhosa" ) { echo "selected"; } ?>>IsiXhosa</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "IsiZulu" ) { echo "selected"; } ?>>IsiZulu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Kabɩyɛ" ) { echo "selected"; } ?>>Kabɩyɛ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Kiswahili" ) { echo "selected"; } ?>>Kiswahili</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Lingála" ) { echo "selected"; } ?>>Lingála</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Malagasy" ) { echo "selected"; } ?>>Malagasy</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Soomaaliga" ) { echo "selected"; } ?>>Soomaaliga</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Taqbaylit" ) { echo "selected"; } ?>>Taqbaylit</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Wolof" ) { echo "selected"; } ?>>Wolof</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Ásia" ) { echo "selected"; } ?>>Ásia</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "اردو" ) { echo "selected"; } ?>>اردو</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "تۆرکجه" ) { echo "selected"; } ?>>تۆرکجه</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "فارسی" ) { echo "selected"; } ?>>فارسی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "مازِرونی" ) { echo "selected"; } ?>>مازِرونی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "پنجابی" ) { echo "selected"; } ?>>پنجابی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "گیلکی" ) { echo "selected"; } ?>>گیلکی</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "中文" ) { echo "selected"; } ?>>中文</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "吴语" ) { echo "selected"; } ?>>吴语</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "日本語" ) { echo "selected"; } ?>>日本語</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "粵語" ) { echo "selected"; } ?>>粵語</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "贛語" ) { echo "selected"; } ?>>贛語</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "한국어" ) { echo "selected"; } ?>>한국어</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Кыргызча" ) { echo "selected"; } ?>>Кыргызча</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Русский" ) { echo "selected"; } ?>>Русский</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Сахатыла" ) { echo "selected"; } ?>>Сахатыла</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Тоҷикӣ" ) { echo "selected"; } ?>>Тоҷикӣ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Қазақша" ) { echo "selected"; } ?>>Қазақша</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Acèh" ) { echo "selected"; } ?>>Acèh</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BahasaBanjar" ) { echo "selected"; } ?>>BahasaBanjar</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BahasaIndonesia" ) { echo "selected"; } ?>>BahasaIndonesia</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BahasaMelayu" ) { echo "selected"; } ?>>BahasaMelayu</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BasaJawa" ) { echo "selected"; } ?>>BasaJawa</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BasaSunda" ) { echo "selected"; } ?>>BasaSunda</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BasoMinangkabau" ) { echo "selected"; } ?>>BasoMinangkabau</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Bân-lâm-gú" ) { echo "selected"; } ?>>Bân-lâm-gú</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "English" ) { echo "selected"; } ?>>English</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "FijiHindi" ) { echo "selected"; } ?>>FijiHindi</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "客家語/Hak-kâ-ngî" ) { echo "selected"; } ?>>客家語/Hak-kâ-ngî</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Ilokano" ) { echo "selected"; } ?>>Ilokano</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Mìng-dĕ̤ng-ngṳ̄" ) { echo "selected"; } ?>>Mìng-dĕ̤ng-ngṳ̄</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Oʻzbekcha/ўзбекча" ) { echo "selected"; } ?>>Oʻzbekcha/ўзбекча</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Tagalog" ) { echo "selected"; } ?>>Tagalog</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "TiếngViệt" ) { echo "selected"; } ?>>TiếngViệt</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Winaray" ) { echo "selected"; } ?>>Winaray</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Zazaki" ) { echo "selected"; } ?>>Zazaki</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "नेपालभाषा" ) { echo "selected"; } ?>>नेपालभाषा</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "नेपाली" ) { echo "selected"; } ?>>नेपाली</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "भोजपुरी" ) { echo "selected"; } ?>>भोजपुरी</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "हिन्दी" ) { echo "selected"; } ?>>हिन्दी</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "অসমীয়া" ) { echo "selected"; } ?>>অসমীয়া</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "বাংলা" ) { echo "selected"; } ?>>বাংলা</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ਪੰਜਾਬੀ" ) { echo "selected"; } ?>>ਪੰਜਾਬੀ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ଓଡ଼ିଆ" ) { echo "selected"; } ?>>ଓଡ଼ିଆ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "தமிழ்" ) { echo "selected"; } ?>>தமிழ்</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "తెలుగు" ) { echo "selected"; } ?>>తెలుగు</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ಕನ್ನಡ" ) { echo "selected"; } ?>>ಕನ್ನಡ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "മലയാളം" ) { echo "selected"; } ?>>മലയാളം</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "བོད་ཡིག" ) { echo "selected"; } ?>>བོད་ཡིག</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ไทย" ) { echo "selected"; } ?>>ไทย</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ລາວ" ) { echo "selected"; } ?>>ລາວ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "ᨅᨔᨕᨘᨁᨗ" ) { echo "selected"; } ?>>ᨅᨔᨕᨘᨁᨗ</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Pacífico" ) { echo "selected"; } ?>>Pacífico</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Acèh" ) { echo "selected"; } ?>>Acèh</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "BasaJawa" ) { echo "selected"; } ?>>BasaJawa</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "English" ) { echo "selected"; } ?>>English</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Español" ) { echo "selected"; } ?>>Español</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "FijiHindi" ) { echo "selected"; } ?>>FijiHindi</option>
            <option value="en"<?php if( $_COOKIE["classes"] == "Norfuk/Pitkern" ) { echo "selected"; } ?>>Norfuk/Pitkern</option>
            </select>	<button class="button small"><?php echo $text[$lang]['bt_class']; ?></button>
            </div>
	
			</div>
            <!--ALguma coisa-->
			 </form>
									
        </div>
						       <div class="span-1-5">
										<ul class="icons">
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
											<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
										</ul>
									</div>
									<p><?php echo $text[$lang]['filename'] . $_SERVER['PHP_SELF']; ?></p>
									</div>
									

    </div>
  
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
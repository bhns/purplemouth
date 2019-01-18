# purplemouth


Demo: http://bhns.com.br/purple/index.php



1. copy for you hosting
2. dump backup sql for your database... 


Referencias usadas...

Cookies 

/*****************Cookie Languagem outros******************************************************/
//https://stackoverflow.com/questions/7791126/how-to-create-a-simple-php-cookie-language-toggle
//*********************************************************************************************

PHP + Mysql

/*****************PHP MYSQL******************************************************/
//https://www.thesoftwareguy.in/
//*********************************************************************************************

Json + Mysql

/******************GpsTracker*******************************************************/
//https://www.websmithing.com/gps-tracker/
//*********************************************************************************************

SASS + CSS

/******************Designer*******************************************************/
//https://html5up.net/
//*********************************************************************************************

6784 = 9433  2649   info@northek
I am going to work in translation for this Portuguese is my mothertangon and main but like english and last time coming study French and Russian. You are free for comment and help this if you want, with the Code, Translate...




How to make a translation by menu and options... you need make a copy the sample code start in
 " 'en' => array( " on file named ./languages.php   "en" ID you language you need change it in on your combo language for make the seletion right option on file ./index.php
 <option value="en"<?php if( $_COOKIE["language"] == "English" ) { echo "selected"; } ?>>English</option>
 
 
      'en' => array(
            'selectlang' => 'Select Language',  
            'lingua' => 'Language: ',
			'lingua_name' => 'english',
			), End line for copy for make the translate.



Sample how to make it for my language Portuguese make changes only on files ./languages.php and ./index.php.

 <option value="pt"<?php if( $_COOKIE["language"] == "Portugues" ) { echo "selecionado"; } ?>>Portugues</option>
 
 
      'pt' => array(
            'selectlang' => 'Selecionar idioma',  
            'lingua' => 'idioma: ',
			'lingua_name' => 'Portuges',
			), End line for copy for make the translate.

But there many itens and you need coffe and atention just. sample full translate.


    
	      /* 
 * If you want need to translation it for your language you need to copy it over there
 
 */
	  'en' => array(
            'selectlang' => 'Select Language',
            'lingua' => 'Language: ',
			'lingua_name' => 'english',
            'filename' => 'You are in this location: ',
			'name_purple_mouth' => 'Purple Mouth',
			'title_home' => 'Purple Mouth',
			'text_home' => 'Hello Welcome to the Purple Mouth',
			'lb_tips' => 'Search by word name',
			'bt_home' => 'Home',
            'bt_add' => 'add',
			'bt_view' => 'view',
			'bt_edit' => 'edit',
			'bt_copy' => 'copy',
			'bt_delete' => 'delete',
			'bt_save' => 'save',
			'bt_choose_file' => 'choose file',
			'bt_search' => 'search',
			'bt_add_new_word' => 'add new word',
			'bt_input' => 'Empty',
			'lb_word' => 'Word',
			'lb_new_word' => 'New Word',
			'lb_category' => 'Category',
			'lb_translate' => 'Translate',
			'lb_picture' => 'Picture',
			'lb_language' => 'Language',
			'lb_pronunciation' => 'Pronunciation',
			'lb_empty_' => 'Empty',
			'lb_empty_1' => 'Empty 1',
			'lb_empty_2' => 'Empty 2',
			'lb_picture_ed' => 'Picture: ',
			'lb_notes' => 'Notes ',
			'lb_user' => 'User',
			'lb_frenq' => 'Frequencie',
			'lb_color' => 'Color',
			'lb_records' => 'Total Records: ',
			'lb_primary_emotion' => 'Primary Emotion',
			'lb_secondary_emotion' => 'Secondary Emotion',
			'lb_tertianry_emotion' => 'Tertiary Emotion',
			'lb_primary_emotion_1' => 'Love',
			'lb_primary_emotion_2' => 'Joy',
			'lb_primary_emotion_3' => 'Surprise',
			'lb_primary_emotion_4' => 'Anger',
			'lb_primary_emotion_5' => 'Sadness',
			'lb_primary_emotion_6' => 'Fear',
			'lb_secondary_emotion_1_1' => 'Affection',
			'lb_secondary_emotion_1_2' => 'Lust',
			'lb_secondary_emotion_1_2' => 'Longing',
			'lb_secondary_emotion_2_1' => 'Cheerfulness',
			'lb_secondary_emotion_2_2' => 'Zest',
			'lb_secondary_emotion_2_3' => 'Contentment',
			'lb_secondary_emotion_2_4' => 'Pride',
			'lb_secondary_emotion_2_5' => 'Optimism',
			'lb_secondary_emotion_2_6' => 'Enthrallment',
			'lb_secondary_emotion_2_7' => 'Relief',
			'lb_secondary_emotion_3_1' => 'Surprise',
			'lb_secondary_emotion_4_1' => 'Irritation',
			'lb_secondary_emotion_4_2' => 'Exasperation',
			'lb_secondary_emotion_4_3' => 'Rage',
			'lb_secondary_emotion_4_4' => 'Disgust',
			'lb_secondary_emotion_4_5' => 'Envy',
			'lb_secondary_emotion_4_6' => 'Torment',
			'lb_secondary_emotion_5_1' => 'Suffering',
			'lb_secondary_emotion_5_2' => 'Sadness',
			'lb_secondary_emotion_5_3' => 'Disappointment',
			'lb_secondary_emotion_5_4' => 'Shame',
			'lb_secondary_emotion_5_5' => 'Neglect',
			'lb_secondary_emotion_5_6' => 'Sympathy',
			'lb_secondary_emotion_6_1' => 'Horror',
			'lb_secondary_emotion_6_2' => 'Nervousness',
			'lb_tertianry_emotion_1_1_1' => 'Adoration',
			'lb_tertianry_emotion_1_1_2' => 'Affection',
			'lb_tertianry_emotion_1_1_3' => 'Love',
			'lb_tertianry_emotion_1_1_4' => 'Fondness',
			'lb_tertianry_emotion_1_1_5' => 'Liking',
			'lb_tertianry_emotion_1_1_6' => 'Attraction',
			'lb_tertianry_emotion_1_1_7' => 'Caring',
			'lb_tertianry_emotion_1_1_8' => 'Tendemess',
			'lb_tertianry_emotion_1_1_9' => 'Compassion',
			'lb_tertianry_emotion_1_1_10' => 'Sentimentality',
			'lb_tertianry_emotion_1_2_1' => 'Arousal',
			'lb_tertianry_emotion_1_2_2' => 'Desire',
			'lb_tertianry_emotion_1_2_3' => 'Lust',
			'lb_tertianry_emotion_1_2_4' => 'Passion',
			'lb_tertianry_emotion_1_2_5' => 'Infatuation',
			'lb_tertianry_emotion_1_3_1' => 'Longing',
			'lb_tertianry_emotion_2_1_1' => 'Amusement',
			'lb_tertianry_emotion_2_1_2' => 'Bliss',
			'lb_tertianry_emotion_2_1_3' => 'Cheerfulness',
			'lb_tertianry_emotion_2_1_4' => 'Gaiety',
			'lb_tertianry_emotion_2_1_5' => 'Glee',
			'lb_tertianry_emotion_2_1_6' => 'Jollines',
			'lb_tertianry_emotion_2_1_7' => 'Joviality',
			'lb_tertianry_emotion_2_1_8' => 'Joy',
			'lb_tertianry_emotion_2_1_9' => 'Delight',
			'lb_tertianry_emotion_2_1_10' => 'Enjoyment',
			'lb_tertianry_emotion_2_1_11' => 'Gladness',
			'lb_tertianry_emotion_2_1_12' => 'Happiness',
			'lb_tertianry_emotion_2_1_13' => 'Jubilation',
			'lb_tertianry_emotion_2_1_14' => 'Elation',
			'lb_tertianry_emotion_2_1_15' => 'Satisfaction',
			'lb_tertianry_emotion_2_1_16' => 'Ecstasy',
			'lb_tertianry_emotion_2_1_17' => 'Euphoria',
			'lb_tertianry_emotion_2_2_1' => 'Enthusiasm',
			'lb_tertianry_emotion_2_2_2' => 'Zeal',
			'lb_tertianry_emotion_2_2_3' => 'Zest',
			'lb_tertianry_emotion_2_2_4' => 'Excitement',
			'lb_tertianry_emotion_2_2_5' => 'Thrill',
			'lb_tertianry_emotion_2_2_6' => 'Exhilaration',
			'lb_tertianry_emotion_2_3_1' => 'Contentment',
			'lb_tertianry_emotion_2_3_2' => 'Pleasure',
			'lb_tertianry_emotion_2_4_1' => 'Pride',
			'lb_tertianry_emotion_2_4_2' => 'Triumph',
			'lb_tertianry_emotion_2_5_1' => 'Eagemess',
			'lb_tertianry_emotion_2_5_2' => 'Hope',
			'lb_tertianry_emotion_2_5_3' => 'Optimism',
			'lb_tertianry_emotion_2_6_1' => 'Enthrallment',
			'lb_tertianry_emotion_2_6_2' => 'Rapture',
			'lb_tertianry_emotion_2_7_1' => 'Relief',
			'lb_tertianry_emotion_2_8_1' => 'Amazement',
			'lb_tertianry_emotion_2_8_2' => 'Surprise',
			'lb_tertianry_emotion_2_8_3' => 'Astonishment'
          ),
		      /* 
 * The over there is arrivid up this Phrase you need make the copy ), if you wish translate...here is all the content of the project looking for down another languages.
 
 */	  
		'pt' => array(
            'selectlang' => 'Trocar idioma',
            'lingua' => 'idioma: ',
			'lingua_name' => 'Portuguese',
            'filename' => 'Voçê esta em : ',
			'name_purple_mouth' => 'Boca Rocha',
			'title_home' => 'Purple Mouth',
			'text_home' => 'Seja Bem vindo ao Boca Rocha',
			'lb_tips' => 'Pesquise por palvaras',
			'bt_home' => 'Inicio',
            'bt_add' => 'acre+',
			'bt_view' => 'vizua.',
			'bt_edit' => 'edit.',
			'bt_copy' => 'Copiar',
			'bt_delete' => 'Apagar',
			'bt_save' => 'Salvar',
			'bt_choose_file' => 'Escolha um arquivo',
			'bt_search' => 'Procurar',
			'bt_add_new_word' => '+Palavra',
			'bt_input' => 'Vazio',
			'lb_word' => 'Palavra',
			'lb_new_word' => 'Palavra',
			'lb_category' => 'Categoria',
			'lb_translate' => 'Tradução',
			'lb_picture' => 'Imagen',
			'lb_language' => 'Idioma',
			'lb_pronunciation' => 'Pronuncia',
			'lb_empty_' => 'Vazio',
			'lb_empty_1' => 'Vazio 1',
			'lb_empty_2' => 'Vazio 2',
			'lb_picture_ed' => 'imagen: ',
			'lb_notes' => 'Observações ',
			'lb_user' => 'Usuario',
			'lb_frenq' => 'Frequencia',
			'lb_color' => 'Cor',
			'lb_records' => 'Total Registros: ',
			'lb_primary_emotion' => 'Emoção Primaria',
			'lb_secondary_emotion' => 'Emoção Secundaria',
			'lb_tertianry_emotion' => 'Terceiras emoçôes',
			'lb_primary_emotion_1' => 'Amor',
			
			
		I'm still working it ......
		
		
			
			
  
<?php

/* 
 * You are free for make it better @author everyone that love shared
 
 */
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
session_start();

/*****************Cookie Languagem outros******************************************************/
//https://stackoverflow.com/questions/7791126/how-to-create-a-simple-php-cookie-language-toggle
//*********************************************************************************************
    $lang = "en";

    if( isset( $_COOKIE["language"] ) ) { 
       $lang = $_COOKIE["language"]; 
    }

    if( isset( $_POST["lang"] ) ) {
       $lang = $_POST["lang"];
       $refresh = $_SERVER['PHP_SELF'];
       header( "Location: $refresh");
	   setcookie ( 'language', $lang, time() + 60*60*24*30, '/','localhost');
	   
    }
	
	$lang_ = "en";
	if( isset( $_COOKIE["classes"] ) ) { 
       $lang_ = $_COOKIE["classes"]; 
    }

    if( isset( $_POST["lang_"] ) ) {
       $lang_ = $_POST["lang_"];
       $refresh = $_SERVER['PHP_SELF'];
       header( "Location: $refresh");
	   setcookie ( 'classes', $lang_, time() + 60*60*24*30, '/','localhost');
	   
    }
	
include './languages.php';

/*****************Fim Cookies*****************/


define('DB_DRIVER', 'mysql');
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'word_book');


define('ME_Polyglot', 'Word Book');
$dboptions = array(
              PDO::ATTR_PERSISTENT => FALSE, 
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

try {
  $DB = new PDO(DB_DRIVER.':host='.DB_SERVER.';dbname='.DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD , $dboptions);  
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

//get error/success messages
if ($_SESSION["errorType"] != "" && $_SESSION["errorMsg"] != "" ) {
    $ERROR_TYPE = $_SESSION["errorType"];
    $ERROR_MSG = $_SESSION["errorMsg"];
    $_SESSION["errorType"] = "";
    $_SESSION["errorMsg"] = "";
	
	
}


/*
const DB_MYSQL = 0;
const DB_POSTGRESQL = 1;
const DB_SQLITE3 = 2;

// ======== Start of user-configurable variables =======================
// --- set this to use YOUR database type: ------
$dbType = DB_MYSQL;

// if your database is DB_SQLITE3, you need to set the path to your database file:
$pathToSQLite = 'sqlite\gpstracker.sqlite';

// ======== End of user-configurable variables =======================

$dbuser = 'root';
$dbpass = '';

$params = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

switch ($dbType) {
    case DB_MYSQL:
        $DB = new PDO('mysql:host=localhost;dbname=word_book;charset=utf8', $dbuser, $dbpass, $params);
        $sqlFunctionCallMethod = 'CALL ';
        break;
    case DB_POSTGRESQL:
        $DB = new PDO('pgsql:host=localhost;dbname=word_book', $dbuser, $dbpass, $params);
        $sqlFunctionCallMethod = 'select ';
        break;
    case DB_SQLITE3:
        $DB = new PDO('sqlite:'.$pathToSQLite, $dbuser, $dbpass, $params);
        $sqlFunctionCallMethod = 'select ';
        break;*/
?>


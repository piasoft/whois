<?php session_start();

ini_set('display_errors', 0);

ini_set('display_startup_errors', 0);

ini_set('memory_limit', '1024M');

ini_set('max_input_time','1024M');

setlocale(LC_TIME, 'tr_TR');

date_default_timezone_set('Europe/Istanbul');

define('MYSQL_HOST',	'DB_SERVER');

define('MYSQL_DB',	'DB_ADI');

define('MYSQL_USER',	'DB_KULLANICI_ADI');

define('MYSQL_PASS',	'DB_KULLANICI_SIFRE');

define('SITE_URL',	'SITE_ADRESI');

require('class.php');


if(isset($_COOKIE['admin_id'])) { 
	$uniqid = $pia->control($_COOKIE['admin_id'],'text'); 
	$admin = $pia->get_row("SELECT * FROM users WHERE uniqid=$uniqid"); 
}


$who = $pia->get_browser();

$who_agent = $pia->control($who['user_agent'], 'text');
$who_browser = $pia->control($who['browser'], 'text');
$who_platform = $pia->control($who['platform'], 'text'); 
$who_ip = $pia->control($pia->get_ip(), 'text'); 

?>
<?php

$url = ltrim($_SERVER['REQUEST_URI'],'/');
$url = strlen($url) > 0 ? $url : 'home';
$url = $pia->seo($url.session_id());


$cache_filename = "cache/$url.html";
$cache_time = 18000;

if (file_exists($cache_filename) && time() - $cache_time < filemtime($cache_filename)) {
    readfile($cache_filename);
    exit;
}

ob_implicit_flush(0);
ob_start();


?>
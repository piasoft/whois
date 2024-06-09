<?php
// Cache the contents to a cache file
$cached = fopen($cache_filename, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);
ob_end_flush(); // Send the output to the browser


function minifier($buffer){
    $search = array( '/\>[^\S ]+/s',  '/[^\S ]+\</s', '/(\s)+/s',   '/<!--(.|\s)*?-->/'   );
    $replace = array( '>', '<', '\\1', '' );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}


file_put_contents($cache_filename, minifier(file_get_contents($cache_filename)));




?>
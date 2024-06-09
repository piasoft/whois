<?php

class PIA {

	static $pdo = null;

	static $charset = 'UTF8';

	static $last_stmt = null;


	public static function instance(){

		return 

		self::$pdo == null ?

		self::init() :

		self::$pdo;

	}

	public static function init(){

		self::$pdo = new PDO('mysql:host=' . MYSQL_HOST .';dbname=' . MYSQL_DB,	MYSQL_USER,	MYSQL_PASS	);

		self::$pdo->exec('SET NAMES `' . self::$charset . '`');

		self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		return self::$pdo;

	}

	public static function query($query, $bindings = null){

		if(is_null($bindings)){

			if(!self::$last_stmt = self::instance()->query($query))

			return false;

		}else{

			self::$last_stmt = self::prepare($query);

			if(!self::$last_stmt->execute($bindings))

			return false;

		}

		return self::$last_stmt;

	}

	public static function get_var($query, $bindings = null){

		if(!$stmt = self::query($query, $bindings))

		return false;

		

		return $stmt->fetchColumn();

	}

	public static function get_row($query, $bindings = null){

		if(!$stmt = self::query($query, $bindings))

		return false;

		return $stmt->fetch();

	}

	public static function get($query, $bindings = null){

		if(!$stmt = self::query($query, $bindings))

			return false;



		$result = array();

		foreach($stmt as $row)

			$result[] = $row;



		return $result;

	}



	public static function exec($query, $bindings = null){

		if(!$stmt = self::query($query, $bindings))

		return false;

		return $stmt->rowCount();

	}



	public static function insert($query, $bindings = null){

		if(!$stmt = self::query($query, $bindings))

		return false;

		

		return self::$pdo->lastInsertId();

	}



	public static function getLastError(){

		$error_info = self::$last_stmt->errorInfo();



		if($error_info[0] == 00000)

			return false;



		return $error_info;

	}



	public static function __callStatic($name, $arguments){

		return call_user_func_array(

			array(self::instance(), $name),

			$arguments

		);

	}



	public static function get_canonical(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        return SITE_URL.$url;
	}

	public static function share_facebook(){
        return 'https://www.facebook.com/sharer.php?u='.self::get_canonical();
	}
	public static function share_twitter($text=null){
        return 'https://twitter.com/intent/tweet?original_referer='.self::get_canonical().'.&url='.self::get_canonical().'&text='.$text;
	}
	public static function share_linkedin(){
        return 'https://www.linkedin.com/sharing/share-offsite/?url='.self::get_canonical();
	}
	public static function share_pinterest($description=null){
        return 'https://pinterest.com/pin/create/button/?url='.self::get_canonical().'&description'.$description;
	}
	public static function share_whatsapp(){
        return 'whatsapp://send?text='.self::get_canonical();
	}
	public static function share_mailto($title, $description){
        return 'mailto:?subject='.$title.'&body='.$description.' \n<br/>\r'.self::get_canonical();
	}



public static function get_browser(){

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = $platform = $version = NULL;

    if (preg_match('/linux/i', $user_agent)) { 
    	$platform = 'Linux'; }
    elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {
        $platform = 'Mac';
    } elseif (preg_match('/windows|win32/i', $user_agent)) {
        $platform = 'Windows';
    }
   
    if(preg_match('/MSIE/i',$user_agent) && !preg_match('/Opera/i',$user_agent)){
        $browser = 'Internet Explorer';
        $ub = "MSIE";
    }elseif(preg_match('/Firefox/i',$user_agent)){
        $browser = 'Mozilla Firefox';
        $ub = "Firefox";
    }elseif(preg_match('/Chrome/i',$user_agent)){
        $browser = 'Google Chrome';
        $ub = "Chrome";
    }elseif(preg_match('/Safari/i',$user_agent)){
        $browser = 'Apple Safari';
        $ub = "Safari";
    }elseif(preg_match('/Opera/i',$user_agent)){
        $browser = 'Opera';
        $ub = "Opera";
    }elseif(preg_match('/Netscape/i',$user_agent)){
        $browser = 'Netscape';
        $ub = "Netscape";
    }
   
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';

    if (!preg_match_all($pattern, $user_agent, $matches)) {
        // we have no matching number just continue
    }
   
    $i = count($matches['browser']);
    if ($i != 1) {

        $version = (strripos($user_agent,"Version") < strripos($user_agent,$ub)) ? $matches['version'][0] : $matches['version'][1];

    }else {

        $version= $matches['version'][0];

    }
   
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'user_agent' => $user_agent,
        'browser'      => $browser,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}






	public static function nirvana($str){ return md5(md5(md5(trim($str)))); }

	public static function control($value, $type, $cleaner=false) {

		$value = addslashes(trim($value));

		switch ($type) {

			case "text":

			$value = ($value != "") ? "'" . $value . "'" : "NULL";

			break;    

			case "long":

			case "int":

				$value = ($value != "") ? intval($value) : "NULL";

			break;

			case "double":

				$value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";

			break;

			case "date":

				$value = ($value != "") ? "'" . $value . "'" : "NULL";

			break;

		}

		return $cleaner==true ? strip_tags($value) : $value;

	}



	public static function alertify($status, $description, $url='', $time=''){

		$alertify['status'] = $status;

		$alertify['description'] = $description;

		if(!empty($url)){ $alertify['url'] = $url; }

		if(!empty($time)){ $alertify['time'] = $time; }



		echo json_encode($alertify);

	}


	public static function seo($title){

		$TR=array('ç','Ç','ı','İ','ş','Ş','ğ','Ğ','ö','Ö','ü','Ü',',','é');

		$EN=array('c','c','i','i','s','s','g','g','o','o','u','u','','e');

		$title= str_replace($TR,$EN,$title);

		$title=mb_strtolower($title,'UTF-8');

		$title=preg_replace('#[^-a-zA-Z0-9_, ]#','',$title);

		$title=trim($title);

		$title= preg_replace('#[-_ ]+#','-',$title);

		return $title;

	}



	public static  function get_ip(){

		if (!empty($_SERVER['HTTP_CLIENT_IP'])){

		  	return $_SERVER['HTTP_CLIENT_IP'];

		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

		  	return $_SERVER['HTTP_X_FORWARDED_FOR'];

		}else{  

			return $_SERVER['REMOTE_ADDR']; 

		}

	}


	public static function base_url($url=null){

		
	    return ($url==null)? SITE_URL : SITE_URL.$url;


	}
	


	

	public static function redirect($url=null){

		$return = ($url==null)? 'location.reload()' : 'window.location.href="'.self::base_url($url).'"'; 

		echo "<script>setTimeout(function(){ $return; },1000);</script>";

	}



	public static function admin_redirect($url=null){

		$return = ($url==null)? 'location.reload()' : 'window.location.href="'.self::base_url('admin/'.$url).'"'; 

		echo "<script>setTimeout(function(){ $return; },1000);</script>";

	}


public static function getvarname ( $vdef ){
$parts = explode('.',$vdef);
$var = '';

foreach($parts as $mn)
	if ($mn == '') $var = $var.'[]';
	else $var = $var.'["'.$mn.'"]';

return $var;
}


	public static function get_parser($rawdata){

		@require('whois.parser.php');
		
		$result = null;
		$disok = true;

		$result['status'] = 'no';

		foreach($rawdata as $key => $val){

			$val = trim($val);

			if (!empty($val)){

				if (($val[0]=='%' || $val[0]=='#') && $disok){
					$result['disclaimer'][] = trim(substr($val,1));
					$disok = true;
					continue;
				}

				$disok = false;
				reset($items);

				foreach($items as $match => $field){


						$pos = strpos($val, $match);
					
						if ($pos !== false){



							if ($field != ''){

								$var = '$result'.self::getvarname($field);
								$item = trim(substr($val,$pos+strlen($match)));

								if ($item!=''){ 
									$result['status'] = 'yes';
									eval($var.'="'.str_replace('"','\"',$item).'";'); 
								}

								


							}
						}

				}

			}
		}


		$result['whois'] = $rawdata;

		return $result;

	}

	


		public static function get_suggests($domain, $spin){


			$new_list = null;

			$api_key = self::settings('godaddy_api_key');
			$api_secret_key = self::settings('godaddy_secret_key');

			$sources[] = 'CC_TLD';
			$sources[] = 'cctld';
			
			$sources[] = $spin==true ? 'KEYWORD_SPIN,keywordspin' : 'EXTENSION,extension';
			
			$sources = implode(',', $sources);

			

			$url = "https://api.godaddy.com/v1/domains/suggest";

			$param['query'] = $domain;
			$param['country'] = 'TR';
			$param['sources'] = $sources;
			$param['limit'] = self::settings('godaddy_limit');
			$param['waitMs'] = '1000';


			$query = http_build_query($param);

		    $url = "https://api.godaddy.com/v1/domains/suggest?$query";


		    $ch = curl_init();
		    $timeout=60;

		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);  
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); 
		   
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    	 "Authorization: sso-key $api_key:$api_secret_key",
			    "Content-Type: application/json",
			    "Accept: application/json"

		    ));
		    $result = curl_exec($ch);

		    curl_close($ch);

		    $list = json_decode($result, true);

		    foreach($list as $item){

		    	$domain = explode('.', $item['domain']);

		    	$dom = array_shift($domain);

		    	$tld = implode('.',$domain);

		    	$new_list[] = array('domain' => $dom, 'tld' => $tld, 'html' => $dom.'.<strong>'.$tld.'</strong>');

		    }


		   return $new_list;
		}

		public static function get_extension_suggests($domain){

			return self::get_suggests($domain, false);

		}
		public static function get_spin_suggests($domain){

			return self::get_suggests($domain, true);

		}


	public static function get_whois($domain){

		$timeout = 1000;
	
		$tld_array = explode('.', $domain);

		$tlds_row = null;

		for ($i = 0; $i < count($tld_array) ; $i++){

			array_shift($tld_array);
			$tld = self::control(implode('.', $tld_array),'text');

			$tlds_row = self::get_row("SELECT * FROM tlds WHERE tld=$tld");
			
			if(isset($tlds_row->id)){ break; }
			

		}



		if(isset($tlds_row->id)){	


			$stream = @fsockopen($tlds_row->server, $tlds_row->port, $errno, $errstr, 2000);
			
			if($stream > 0) {
			

					stream_set_timeout($stream,1000);
					stream_set_blocking($stream,0);
					
					fputs($stream, $domain."\r\n");
					
					$raw = '';
					$start = time();
					$null = NULL;
					$stream_array = array($stream);

					while (!feof($stream)){

						if (stream_select($stream_array, $null, $null, 1000)){
							$raw .= fgets($stream, 1024);
						}

						if (time()-$start > 1000){
							echo 'error : Timeout reading from '.$tlds_row->server;
							return false;
						}

					}



					$search = array ('<BR>', '<P>', '</TITLE>','</H1>', '</H2>', '</H3>','<br>', '<p>', '</title>','</h1>', '</h2>', '</h3>'  );
					
					$output = str_replace($search,"\n",$raw);
					$output = explode("\n",$output);



					$result = self::get_parser($output);


                    if (function_exists('checkdnsrr') && checkdnsrr($domain, 'NS')){

               			$ns = null;
						$ns_list = @dns_get_record($domain,DNS_NS);
						foreach($ns_list as $ns_item){ 
							$result['ns'][] =  $ns_item['target']; 
						}

						array_reverse($result['ns']);

            		}
				
					

			}else{
				$result['status'] = 'error';
			}


		}else{
			$result['status'] = 'error'; 

		}


	
		return $result;



	}

	public static function get_ssl($domain){


	    $errno = 0;
	    $errstr = null;
	    
	    $timeout = 30;


    	$ssl_info = stream_context_create(array("ssl" => array( "capture_peer_cert" => TRUE)));

    	$stream = stream_socket_client("ssl://" . $domain . ":443",  $errno,  $errstr,  $timeout, STREAM_CLIENT_CONNECT,  $ssl_info);

	    if ($stream) {
	        $cert_resource = stream_context_get_params($stream);
	        $certificate = $cert_resource['options']['ssl']['peer_certificate'];
	        $certinfo = openssl_x509_parse($certificate);
	        fclose($stream);
	        return $certinfo;
	    }
	}

	public static function get_domain($domain){



		if(filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)){
		 

			$domain = parse_url((strpos($domain, '://') === FALSE ? 'http://' : '') . trim($domain), PHP_URL_HOST);

			$domain = strip_tags($domain);

			$domain = str_replace(['"', "'", '\\'], '', $domain);

			$domain = trim($domain,'.');

			return $domain;

		  
		}
		
		
	}

	public static function settings($name){

		return self::get_var("SELECT settings_value FROM settings WHERE settings_name='$name'");

	}

	

	public static function time_tr($adddate, $pattern='time, day month year'){

		$months = array('Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');

		

		$time =  date('H:i',  strtotime($adddate));

		$day = date('j ', strtotime($adddate)); 

		$month = $months[date('m',  strtotime($adddate)) - 1];

		$month = strlen($month)==1? "0$month" : $month;

		
		$year = date('Y',  strtotime($adddate));

		



		return str_replace(array('time', 'day', 'month', 'year'), array($time, $day, $month, $year), $pattern);



	}






	public static function key($length = 7){



	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	    $charactersLength = strlen($characters);

	    $randomString = '';

	    for ($i = 0; $i < $length; $i++) {

	        $randomString .= $characters[rand(0, $charactersLength - 1)];

	    }

	    return $randomString;



	}





	public static function file_upload($file, $name, $target){

		$return = null; 

		if(isset($file)){

			$name =  self::seo($name);
			$exists = explode('.', $file['name']);
			$exists = '.'.end($exists);
			$avaible = array('.jpg', '.jpeg', '.png', '.bmp', '.gif', '.svg', '.ico', '.webp' );

			if(in_array($exists, $avaible)){ 

				$new_name = $name.$exists;	
				$to_location = $target.'/'.$new_name;
				$return = move_uploaded_file($file['tmp_name'], $to_location) ? $new_name : null;

			}

		}



		return self::control($return,'text');



	}

	
		public static function action($table, $id){
		return '<a href="'.$table.'.php?edit='.$id.'">Düzenle</a><a onclick="_delete(\''.$table.'\', '.$id.');" >Sil</a>';
	}




}



$pia = new PIA;



?>
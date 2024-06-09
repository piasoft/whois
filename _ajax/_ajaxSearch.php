<?php 
	require('../_class/config.php'); 


	if(isset($_POST['frm']) and isset($_POST['domain'])){ 

 	
		$frm = trim($pia->control($_POST['frm'],'text', true),"'");
		$domain = trim($pia->control($_POST['domain'],'text', true),"'");


		if($frm=='whois'){ $frm='whois'; }
		if($frm=='dns'){ $frm='dns'; }
		if($frm=='ssl'){ $frm='ssl'; }

		$domain = $pia->get_domain($domain);

		if(empty($domain)){
			exit('<div class="result error"><i class="fal fa-times"></i> <span>Please enter valid domain name.</span></div>');
		}

		echo '<script>window.location.href="'.$frm.'/'.$domain.'";</script>';
		

	} 
?>
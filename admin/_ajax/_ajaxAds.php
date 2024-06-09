<?php 
	require('../../_class/config.php'); require('../session.php');
	if(isset($_POST['frm']) and $_POST['frm']=='frmAds'){




		$data['home_header'] = $pia->control($_POST['home_header'], 'text'); 
		$data['home_footer'] = $pia->control($_POST['home_footer'], 'text'); 

	


		$data['whois_header'] = $pia->control($_POST['whois_header'], 'text'); 
		$data['whois_sidebar_1'] = $pia->control($_POST['whois_sidebar_1'], 'text'); 
		$data['whois_sidebar_2'] = $pia->control($_POST['whois_sidebar_2'], 'text'); 
		$data['whois_footer'] = $pia->control($_POST['whois_footer'], 'text'); 


		$data['dns_header'] = $pia->control($_POST['dns_header'], 'text'); 
		$data['dns_sidebar_1'] = $pia->control($_POST['dns_sidebar_1'], 'text'); 
		$data['dns_sidebar_2'] = $pia->control($_POST['dns_sidebar_2'], 'text'); 
		$data['dns_footer'] = $pia->control($_POST['dns_footer'], 'text'); 

		$data['ssl_header'] = $pia->control($_POST['ssl_header'], 'text'); 
		$data['ssl_sidebar_1'] = $pia->control($_POST['ssl_sidebar_1'], 'text'); 
		$data['ssl_sidebar_2'] = $pia->control($_POST['ssl_sidebar_2'], 'text'); 
		$data['ssl_footer'] = $pia->control($_POST['ssl_footer'], 'text'); 




	

		foreach($data as $key => $item){

			$pia->exec("UPDATE settings SET settings_value=$item WHERE settings_name='$key'");

		}


		
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 



	} 



?>
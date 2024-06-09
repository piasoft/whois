<?php 
	require('../../_class/config.php'); require('../session.php');
	if(isset($_POST['frm']) and $_POST['frm']=='frmSettings'){


		$data['site_title'] = $pia->control($_POST['site_title'], 'text'); 
		$data['site_description'] = $pia->control($_POST['site_description'], 'text'); 
		$data['copyright'] = $pia->control($_POST['copyright'], 'text'); 
		

		$data['contact_phone'] = $pia->control($_POST['contact_phone'], 'text'); 
		$data['contact_whatsapp'] = $pia->control($_POST['contact_whatsapp'], 'text'); 
		$data['contact_email'] = $pia->control($_POST['contact_email'], 'text'); 
		$data['contact_address'] = $pia->control($_POST['contact_address'], 'text');

		$data['contact_meta_title'] = $pia->control($_POST['contact_meta_title'], 'text'); 
		$data['contact_meta_description'] = $pia->control($_POST['contact_meta_description'], 'text'); 

		$data['contact_form_title'] = $pia->control($_POST['contact_form_title'], 'text'); 
		$data['contact_form_description'] = $pia->control($_POST['contact_form_description'], 'text'); 


		$data['facebook'] = $pia->control($_POST['facebook'], 'text'); 
		$data['twitter'] = $pia->control($_POST['twitter'], 'text'); 
		$data['instagram'] = $pia->control($_POST['instagram'], 'text'); 
		$data['youtube'] = $pia->control($_POST['youtube'], 'text'); 
		$data['linkedin'] = $pia->control($_POST['linkedin'], 'text'); 


		$data['head'] = $pia->control($_POST['head'], 'text'); 
		$data['body'] = $pia->control($_POST['body'], 'text'); 
		$data['footer'] = $pia->control($_POST['footer'], 'text'); 

		$data['whois_article'] = $pia->control($_POST['whois_article'], 'text'); 
		$data['dns_article'] = $pia->control($_POST['dns_article'], 'text'); 
		$data['ssl_article'] = $pia->control($_POST['ssl_article'], 'text'); 

		$data['whois_noindex'] = isset($_POST['whois_noindex']) ? 1 : 0; 
		$data['dns_noindex'] = isset($_POST['dns_noindex']) ? 1 : 0; 
		$data['ssl_noindex'] = isset($_POST['ssl_noindex']) ? 1 : 0; 
		$data['whois_recently_status'] = isset($_POST['whois_recently_status']) ? 1 : 0; 
		$data['dns_recently_status'] = isset($_POST['dns_recently_status']) ? 1 : 0; 
		$data['ssl_recently_status'] = isset($_POST['ssl_recently_status']) ? 1 : 0; 
		$data['godaddy_status'] = isset($_POST['godaddy_status']) ? 1 : 0; 

		$data['home_title'] = $pia->control($_POST['home_title'], 'text'); 
		$data['home_description'] = $pia->control($_POST['home_description'], 'text'); 
		$data['home_switch_form'] = $pia->control($_POST['home_switch_form'], 'int'); 
		
		
		$data['whois_meta_title'] = $pia->control($_POST['whois_meta_title'], 'text'); 
		$data['whois_meta_description'] = $pia->control($_POST['whois_meta_description'], 'text'); 
		$data['whois_lookup_title'] = $pia->control($_POST['whois_lookup_title'], 'text'); 
		$data['whois_lookup_description'] = $pia->control($_POST['whois_lookup_description'], 'text');
		$data['whois_form_title'] = $pia->control($_POST['whois_form_title'], 'text'); 
		$data['whois_form_subtitle'] = $pia->control($_POST['whois_form_subtitle'], 'text'); 
		$data['whois_form_input'] = $pia->control($_POST['whois_form_input'], 'text'); 
		$data['whois_form_button'] = $pia->control($_POST['whois_form_button'], 'text'); 
		$data['whois_recently_title'] = $pia->control($_POST['whois_recently_title'], 'text'); 
		$data['whois_recently_count'] = $pia->control($_POST['whois_recently_count'], 'text'); 



		$data['dns_meta_title'] = $pia->control($_POST['dns_meta_title'], 'text'); 
		$data['dns_meta_description'] = $pia->control($_POST['dns_meta_description'], 'text');
		$data['dns_lookup_title'] = $pia->control($_POST['dns_lookup_title'], 'text'); 
		$data['dns_lookup_description'] = $pia->control($_POST['dns_lookup_description'], 'text');
		$data['dns_form_title'] = $pia->control($_POST['dns_form_title'], 'text'); 
		$data['dns_form_subtitle'] = $pia->control($_POST['dns_form_subtitle'], 'text'); 
		$data['dns_form_input'] = $pia->control($_POST['dns_form_input'], 'text'); 
		$data['dns_form_button'] = $pia->control($_POST['dns_form_button'], 'text'); 
		$data['dns_recently_title'] = $pia->control($_POST['dns_recently_title'], 'text'); 
		$data['dns_recently_count'] = $pia->control($_POST['dns_recently_count'], 'text'); 


		$data['ssl_meta_title'] = $pia->control($_POST['ssl_meta_title'], 'text'); 
		$data['ssl_meta_description'] = $pia->control($_POST['ssl_meta_description'], 'text');
		$data['ssl_checker_title'] = $pia->control($_POST['ssl_checker_title'], 'text'); 
		$data['ssl_checker_description'] = $pia->control($_POST['ssl_checker_description'], 'text');
		$data['ssl_form_title'] = $pia->control($_POST['ssl_form_title'], 'text'); 
		$data['ssl_form_subtitle'] = $pia->control($_POST['ssl_form_subtitle'], 'text'); 
		$data['ssl_form_input'] = $pia->control($_POST['ssl_form_input'], 'text'); 
		$data['ssl_form_button'] = $pia->control($_POST['ssl_form_button'], 'text'); 

		$data['ssl_recently_title'] = $pia->control($_POST['ssl_recently_title'], 'text'); 
		$data['ssl_recently_count'] = $pia->control($_POST['ssl_recently_count'], 'text'); 



		$data['not_found_title'] = $pia->control($_POST['not_found_title'], 'text'); 
		$data['not_found_description'] = $pia->control($_POST['not_found_description'], 'text'); 

		$data['godaddy_api_key'] = $pia->control($_POST['godaddy_api_key'], 'text'); 
		$data['godaddy_secret_key'] = $pia->control($_POST['godaddy_secret_key'], 'text'); 
		$data['godaddy_limit'] = $pia->control($_POST['godaddy_limit'], 'int'); 


		$data['blocked_domains_text'] = $pia->control($_POST['blocked_domains_text'], 'text'); 
		$data['blocked_domains_list'] = $pia->control($_POST['blocked_domains_list'], 'text'); 

		$data['maintenance_title'] = $pia->control($_POST['maintenance_title'], 'text'); 
		$data['maintenance_description'] = $pia->control($_POST['maintenance_description'], 'text'); 
		$data['maintenance_status'] = isset($_POST['maintenance_status']) ? 1 : 0; 



		if(isset($_POST['robots'])){

			$robots = trim(strip_tags($_POST['robots']));
			file_put_contents('../../robots.txt', $_POST['robots']);
		}




		if(isset($_FILES['logo']['name'])){
			$logo = $pia->file_upload($_FILES['logo'], 'logo', '../../uploads');
			$pia->exec("UPDATE settings SET settings_value=$logo WHERE settings_name='logo'");
		}

		if(isset($_FILES['favicon']['name'])){
			$favicon = $pia->file_upload($_FILES['favicon'], 'favicon', '../../uploads');
			$pia->exec("UPDATE settings SET settings_value=$favicon WHERE settings_name='favicon'");
		}



		foreach($data as $key => $item){

			$pia->exec("UPDATE settings SET settings_value=$item WHERE settings_name='$key'");

		}


		$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!');     

          
	} 



?>
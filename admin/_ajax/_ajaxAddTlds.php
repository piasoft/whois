<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmAddTlds'){

		$tld = $pia->control($_POST['tld'], 'text');
		$server = $pia->control($_POST['server'], 'text');
		$port = $pia->control($_POST['port'], 'int');
		
		echo '<div class="alert alert-success">İşlem başarıyla gerçekleştirildi!</div>';
		if($pia->insert("INSERT INTO tlds(tld, server, port) VALUES($tld, $server, $port)")){
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 
			
		}else{ 


			$pia->alertify('error', 'İşlem sırasında hata oluştu!'); 



		}
		

	} 

?>
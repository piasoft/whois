<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmAddBlocked'){


		$domain = $pia->control($_POST['domain'], 'text');
		


		if($pia->insert("INSERT INTO blocked(domain) VALUES($domain)")){
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 
			
		}else{ 


			$pia->alertify('error', 'İşlem sırasında hata oluştu!'); 
		}


		

	} 

?>
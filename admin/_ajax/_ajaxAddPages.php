<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmAddPages'){

		$title = $pia->control($_POST['title'], 'text');
		$short = $pia->control($_POST['short'], 'text');
		$description = $pia->control($_POST['description'], 'text');
		$status = $pia->control($_POST['status'], 'int');
		$link = $pia->control($pia->seo($_POST['title']), 'text');

		
		if($pia->insert("INSERT INTO pages(title, description, status, link) VALUES($title,  $description, $status, $link)")){
				$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 
			
		}else{ 


			$pia->alertify('error', 'İşlem sırasında hata oluştu!'); 



		}
	} 

?>
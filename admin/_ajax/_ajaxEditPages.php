<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmEditPages'){

		$edit_id = $pia->control($_POST['edit_id'], 'int');
		$title = $pia->control($_POST['title'], 'text');
		$description = $pia->control($_POST['description'], 'text');
		$status = $pia->control($_POST['status'], 'int');
		$link = $pia->control($pia->seo($_POST['title']), 'text');

		$pia->exec("UPDATE pages SET title=$title, description=$description, status=$status, link=$link WHERE id=$edit_id");
		
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 

	} 

?>
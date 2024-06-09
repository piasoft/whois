<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmMessages'){


		$edit_id = $pia->control($_POST['edit_id'], 'int'); 
		$status = $pia->control($_POST['status'], 'int'); 

	
	
		$pia->exec("UPDATE messages SET status=$status WHERE id=$edit_id");

		

		$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!');  
	} 

?>
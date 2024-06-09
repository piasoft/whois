<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmEditBlocked'){


		$edit_id = $pia->control($_POST['edit_id'], 'int'); 

		
		$domain = $pia->control($_POST['domain'], 'text');

	
		$pia->exec("UPDATE blocked SET domain=$domain WHERE id=$edit_id");

		
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 

	} 

?>
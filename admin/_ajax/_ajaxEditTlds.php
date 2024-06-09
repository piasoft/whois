<?php 
	require('../../_class/config.php'); 
	if(isset($_POST['frm']) and $_POST['frm']=='frmEditTlds'){

		$edit_id = $pia->control($_POST['edit_id'], 'int');
		$tld = $pia->control($_POST['tld'], 'text');
		$server = $pia->control($_POST['server'], 'text');
		$port = $pia->control($_POST['port'], 'text');
		

		$pia->exec("UPDATE tlds SET tld=$tld, server=$server, port=$port WHERE id=$edit_id");
		
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 

	} 

?>
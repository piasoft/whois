<?php 
	require('../../_class/config.php'); 


	$users_row = $pia->get_row("SELECT * FROM users");
  	if(isset($users_row->id)){ exit('<script>location.reload();</script>'); }


	if(isset($_POST['frm']) and $_POST['frm'] == 'frmCreateAccount'){

		
		$uniqid = $pia->control(uniqid(),'text');
		$fullname = $pia->control($_POST['fullname'],'text');
		$email = $pia->control($_POST['email'],'text');
		$password = $pia->control($pia->nirvana($_POST['password']),'text');		


		if($pia->insert("INSERT INTO users(fullname, email, password, uniqid) VALUES($fullname, $email, $password, $uniqid)")){ 
			
			$pia->alertify('success', 'İşlem başarıyla gerçekleştirildi!'); 
			
		}else{ 


			$pia->alertify('error', 'İşlem sırasında hata oluştu!'); 

			
		}	
			
		
		
		
	} 
?>
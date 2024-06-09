<?php 
	require('../../_class/config.php');
	if(isset($_POST['frm']) and $_POST['frm'] == 'frmLogin'){
		$email = $pia->control($_POST['email'],'text');
		$password = $pia->control($pia->nirvana($_POST['password']),'text');
		$users_row = $pia->get_row("SELECT * FROM users WHERE email=$email and password=$password");
		if(isset($users_row->id)){
			
			setcookie('admin_id', $users_row->uniqid, time() + (60*60*24*30), '/');

			$pia->alertify('success', 'Başarıyla giriş yaptınız!');  

				
		}else{

			$pia->alertify('error', 'Kullanıcı adı veya şifre yanlış girdiniz!', 'none');  


		}
	} 
?>
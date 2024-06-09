<?php 
	require('../../_class/config.php'); require('../session.php');
		if(isset($_POST['frm']) and $_POST['frm']=='cache'){


		$list = glob('../../cache/*.html');
		foreach($list as $item){ unlink($item); }




	} 



?>
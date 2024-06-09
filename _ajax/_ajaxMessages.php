<?php 
	require('../_class/config.php');
	if(isset($_POST['frm']) and $_POST['frm']=='frmMessages'){

		$fullname = $pia->control($_POST['fullname'], 'text', true); 
		$phone = $pia->control($_POST['phone'], 'text', true); 
		$email = $pia->control($_POST['email'], 'text', true); 
		$description = $pia->control($_POST['description'], 'text', true);


        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
            echo json_encode(array('status' => 'captcha', 'html' => 'Lütfen güvenlik kodunu doğrulayınız.'));
            exit();
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcwxEQbAAAAAA_35SvTAID0PojA0ohdV_rnb4Lt&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==true){

                if($pia->insert("INSERT INTO messages(fullname, phone, email, description) VALUES($fullname, $phone,  $email, $description)")){

                    $pia->mail_messages($_POST['fullname'], $_POST['phone'], $_POST['email'], $_POST['description']);


                    echo json_encode(
                        array(
                            'status' => 'success',
                            'html' => '<div class="success"><i class="fal fa-check"></i><h1>Teşekkürler!</h1><p>Mesajınız bize ulaştı, en kısa sürede geri dönüş yapacağız!</p></div>'
                        )
                    );


                }else{


                    echo json_encode(
                        array(
                            'status' => 'spammer',
                            'html' => '<div class="error"><i class="fal fa-times"></i><h1>Hata!</h1><p>İşlem sırasında hata oluştu!</p></div>'
                        )
                    );


                }

        }else{


            echo json_encode(
                array(
                    'status' => 'spammer',
                    'html' => '<div class="error"><i class="fal fa-times"></i><h1>Dikkat!</h1><p>Güvenlik nedeniyle başvurunuz reddedildi!</p> </div>'
                )
            );
        }
	} 
?>
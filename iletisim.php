<!DOCTYPE html>
<html lang="en">
	<head>
	  	<?php 
	  		$meta_title = $pia->settings('contact_meta_title');
            $meta_description = $pia->settings('contact_meta_description');
	  		require('_inc/head.php'); 

  		?>

  		
	  	
	</head>
	<body>

		<?php require('_inc/header.php'); ?>
		
		<div class="container">


		<style>



                  .contacts{ position: relative; display: flex;align-items: center;justify-content: center;padding:100px 0px; background: #FFF;margin:50px 0px; border-radius: 4px;box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 3px;   }

                  .contacts .left{ padding-left:100px; }
                  .contacts .left h1{ margin-bottom: 10px; }
                  .contacts .left p{ margin-bottom: 35px; }


                  .contacts .right { background: #2F3B59;  width: 340px; padding:60px; border-radius: 25px 0 0 25px; margin-left:auto; color:#FFF; }

                  .contacts .right h2{ margin-bottom: 15px; color:#FFFFFF; }
                  .contacts .right .item{ display: flex;align-items: center;justify-content: start;margin-top: 30px; }
                  .contacts .right .item i{  margin-right: 15px; }
                  .contacts .right .item span{ font-size: 14px;  }


            </style>

		

			<div class="contacts">
                        <form class="left" method="post" action="_ajax/_ajaxMessages.php" onsubmit="return false;"> 
                              <h1><?=$pia->settings('contact_form_title');?></h1>
                              <p><?=$pia->settings('contact_form_description');?></p>
                              
                              <div class="form-group">
                                  <input type="text" name="fullname" class="form-control" placeholder="Ad soyad" required="">
                              </div>
                              <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Telefon" required="">
                              </div>
                              <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail" required="">
                              </div>
                              <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Mesajınız"></textarea>
                              </div>
                            
                              <button type="submit" class="btn-primary">Gönder</button>
                              <input type="hidden" name="frm" value="frmMessages">
                        </form>

                        <div class="right">
                        	<h2>İletişim Bilgileri</h2>
                              <div class="item">
                                    <i class="fa fa-mobile-alt"></i>
                                    <span><?=$pia->settings('contact_phone');?></span>
                              </div>
                              <div class="item">
                                    <i class="fa fa-envelope"></i>
                                    <span><?=$pia->settings('contact_email');?></span>
                              </div>
                              <div class="item">
                                    <i class="fa fa-map-marker"></i>
                                     <span><?=$pia->settings('contact_address');?></span>
                              </div>
                        </div>
                  </div>


			
		</div>
		<?php require('_inc/footer.php'); ?>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
   		<?php 
   			$meta_title = $pia->settings('maintenance_title');
   			require('_inc/head.php');
		?>
		<meta name="robots" content="noindex, nofollow" />
  	</head>
	<body>
		<div class="wrapper">
			<i class="fal fa-tools"></i>
			<h1><?=$pia->settings('maintenance_title');?></h1>
			<p><?=$pia->settings('maintenance_description');?></p>

			<div class="actions">

                        <?php if($pia->settings('facebook')){ ?>

                        	<a href="<?=$pia->settings('facebook');?>" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>

                        <?php } ?>

                        <?php if($pia->settings('twitter')){ ?>

                        	<a href="<?=$pia->settings('twitter');?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>

                        <?php } ?>

                        <?php if($pia->settings('instagram')){ ?>

                        	<a href="<?=$pia->settings('instagram');?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>

                        <?php } ?>

                        <?php if($pia->settings('youtube')){ ?>

                        	<a href="<?=$pia->settings('youtube');?>" title="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>

                        <?php } ?>

                        <?php if($pia->settings('linkedin')){ ?>

                        	<a href="<?=$pia->settings('linkedin');?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>

                        <?php } ?>

                  </div>
		</div>
	</body>
</html>
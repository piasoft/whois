<!DOCTYPE html>
<html lang="en">
	<head>
   		<?php 
   			$meta_title = $pia->settings('not_found_title');
   			require('_inc/head.php');
		?>
		<meta name="robots" content="noindex, nofollow" />
   		
  	</head>
	<body>
		<div class="wrapper">
			<i class="fal fa-frown"></i>
			<h1><?=$pia->settings('not_found_title');?></h1>
			<p><?=$pia->settings('not_found_description');?></p>
			
			<form class="looking">
                <input type="text" name="domain" class="form-control" placeholder="<?=$pia->settings('whois_form_input');?>" required />
                <button type="submit" class="btn-primary" ><?=$pia->settings('whois_form_button');?></button>
                <input type="hidden" name="frm" value="whois" />
            </form>

            <div class="actions">
				<a href="/"><small>Back to homepage</small></a>
			</div>
		</div>



		<script src="js/jquery.min.js"></script>
		<script src="js/app.min.js"></script>
	</body>
</html>
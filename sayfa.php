<!DOCTYPE html>
<html lang="tr">
	<head>
	  	<?php require('_inc/head.php'); ?>
	 
	</head>
	<body>

		
			<?php require('_inc/header.php'); ?>
			
			<div class="hero">
				<h1><?=$pages_row->title;?></h1>
				<ul class="breadcrumb">
					<li><a href="<?=$pia->base_url();?>">Anasayfa</a></li>
					<li><a href="<?=$pia->base_url($pages_row->link);?>"><?=$pages_row->title;?></a></li>
				</ul>
			</div>

		<div class="container">

			<article class="section"><?=$pages_row->description;?></article>
		</div>
		<?php require('_inc/footer.php'); ?>
	</body>
</html>
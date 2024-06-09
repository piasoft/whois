<?php if($sidebar_top_ad){ ?><div class="ad"><?=$sidebar_top_ad;?></div><?php } ?>


<?php if(isset($domain_status) and $pia->settings('godaddy_status')){ ?>

    
        <div class="widget">
                <div class="heading">Alternatif Alan Adları</div>

                <?php $suggests_list = $pia->get_extension_suggests($domain); foreach($suggests_list as $suggests_item){    ?>
                
                        <div class="item">
                                <i class="fal fa-check"></i>
                                <?=$suggests_item['html'];?>
                        </div>

                <?php } ?>

                <?php $suggests_list = $pia->get_spin_suggests($domain); foreach($suggests_list as $suggests_item){    ?>
                
                        <div class="item">
                                <i class="fal fa-check"></i>
                                <?=$suggests_item['html'];?>
                        </div>

                <?php } ?>
        </div>
              

<?php } ?>



<?php if(isset($sidebar_count) and $sidebar_count>0){ ?>

<div class="widget">
	<div class="heading"><?=$sidebar_title;?></div>

		<?php $list = $pia->query("SELECT * FROM records WHERE $sidebar_sql ORDER BY adddate DESC LIMIT 0, $sidebar_count");  foreach($list as $item){ ?>
			<div class="item"><a href="<?=$sidebar_prefix.$item->domain;?>" title="<?=$item->domain;?>"><img src="https://www.google.com/s2/favicons?domain=<?=$item->domain;?>" alt="<?=$item->domain;?>" /> <?=$item->domain;?></a></div>
		<?php } ?>
</div>
<?php } ?>

<?php if($sidebar_bottom_ad){ ?><div class="ad"><?=$sidebar_bottom_ad;?></div><?php } ?>
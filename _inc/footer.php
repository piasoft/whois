<?php if($footer_ad){ ?><div class="footer-ad ad" ><div class="container"><?=$footer_ad;?> </div></div><?php } ?>


<div class="footer">

    <div class="container">
	        <div class="logo"><img src="uploads/<?=$pia->settings('logo');?>" alt="<?=$pia->settings('site_title');?>" /></div>
            <ul class="links">
                <?php $list = $pia->query("SELECT * FROM pages WHERE status=1 ORDER BY title ASC"); foreach($list as $item){ ?>
                    <li><a href="<?=$item->link;?>" title="<?=$item->title;?>"><?=$item->title;?></a></li>
                <?php } ?>
            </ul>
            <div class="copyright">
                <?=$pia->settings('copyright');?>
            </div>
        
    </div>
</div>





<script src="js/jquery.min.js"></script>
<script src="js/app.min.js"></script>


<?=$pia->settings('footer');?>
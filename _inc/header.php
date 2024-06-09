<?=$pia->settings('body');?>

<header class="header">

      <div class="container">

    	       <a href="<?=$pia->base_url();?>" class="logo"><img src="uploads/<?=$pia->settings('logo');?>" alt="<?=$pia->settings('site_title');?>" /></a>

            <div class="right">

                        <?php if($pia->settings('facebook')){ ?><a href="<?=$pia->settings('facebook');?>" aria-label="Facebook" target="_blank"><i class="fab fa-facebook"></i></a><?php } ?>

                        <?php if($pia->settings('twitter')){ ?><a href="<?=$pia->settings('twitter');?>" aria-label="Twitter" target="_blank"><i class="fab fa-twitter"></i></a><?php } ?>

                        <?php if($pia->settings('instagram')){ ?><a href="<?=$pia->settings('instagram');?>" aria-label="Instagram" target="_blank"><i class="fab fa-instagram"></i></a><?php } ?>

                        <?php if($pia->settings('youtube')){ ?><a href="<?=$pia->settings('youtube');?>" aria-label="YouTube" target="_blank"><i class="fab fa-youtube"></i></a><?php } ?>

                        <?php if($pia->settings('linkedin')){ ?><a href="<?=$pia->settings('linkedin');?>" aria-label="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a><?php } ?>

                        <a href="whois" aria-label="Whois Sorgulama">Whois Sorgulama</a>

                        <a href="dns" aria-label="DNS Sorgulama">DNS Sorgulama</a>

                        <a href="ssl" aria-label="SSL Sorgulama">SSL Sorgulama</a>

                        <a href="iletisim" aria-label="İletişim">İletişim</a>

                        <a href="#" class="menu-toggle" title="Menü" aria-label="Menü"><i class="fal fa-bars"></i></a>

            </div>

      </div>


</header>

<div class="menu">
    
      <ul class="nav">

            <li><a href="whois" title="Whois Sorgulama">Whois Sorgulama</a></li>

            <li><a href="dns" title="DNS Sorgulama">DNS Sorgulama</a></li>

            <li><a href="ssl" title="SSL Sorgulama">SSL Sorgulama</a></li>

            <li class="seperator"><a href="iletisim" title="İletişim">İletişim</a></li>



            <?php $list = $pia->query("SELECT * FROM pages WHERE status=1 ORDER BY title ASC"); foreach($list as $item){ ?>
                    <li><a href="/<?=$item->link;?>" title="<?=$item->title;?>"><?=$item->title;?></a></li>
            <?php } ?>

            <li>
                  <ul class="socials">
                        <?php if($pia->settings('facebook')){ ?><li><a href="<?=$pia->settings('facebook');?>" title="Facebook" target="_blank"><i class="fab fa-facebook"></i></a></li><?php } ?>
                        <?php if($pia->settings('twitter')){ ?><li><a href="<?=$pia->settings('twitter');?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li><?php } ?>
                        <?php if($pia->settings('instagram')){ ?><li><a href="<?=$pia->settings('instagram');?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a></li><?php } ?>
                        <?php if($pia->settings('youtube')){ ?><li><a href="<?=$pia->settings('youtube');?>" title="YouTube" target="_blank"><i class="fab fa-youtube"></i></a></li><?php } ?>
                        <?php if($pia->settings('linkedin')){ ?><li><a href="<?=$pia->settings('linkedin');?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a></li><?php } ?>
                  </ul>
            </li>
      </ul>

</div>

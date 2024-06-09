<!DOCTYPE html>
<html lang="en">
	<head>

                <?php 
                    
                        $meta_title = isset($domain) ? $pia->settings('whois_lookup_title') : $pia->settings('whois_meta_title') ;
                        $meta_description = isset($domain) ? $pia->settings('whois_lookup_description') : $pia->settings('whois_meta_description') ;

                        require('_inc/head.php'); 

                        $sidebar_top_ad = $pia->settings('whois_sidebar_1');
                        $sidebar_bottom_ad = $pia->settings('whois_sidebar_2');
                        $header_ad = $pia->settings('whois_header');
                        $footer_ad = $pia->settings('whois_footer');


                        if($pia->settings('whois_noindex')){ echo '<meta name="robots" content="noindex,nofollow" />'; }

                        if($pia->settings('whois_recently_status')){
                                
                                $sidebar_title = $pia->settings('whois_recently_title');
                                $sidebar_count = $pia->settings('whois_recently_count');
                                $sidebar_sql = 'status=0';
                                $sidebar_prefix = 'whois/';
                        }



                ?>

           
	</head>

	<body>

              

                <?php require('_inc/header.php'); ?>
            

                        <?php if($header_ad){ ?><div class="header-ad ad"><?=$header_ad;?></div><?php } ?>

               

                          <div class="search">

                                <h1><?=$pia->settings('whois_form_title');?></h1>
                                <p><?=$pia->settings('whois_form_subtitle');?></p>
                                <form class="looking">
                                        <input type="text" name="domain" class="form-control"placeholder="<?=$pia->settings('whois_form_input');?>" value="<?=@$domain;?>" required />
                                        <button type="submit" class="btn-primary" ><?=$pia->settings('whois_form_button');?></button>
                                        <input type="hidden" name="frm" value="whois" />
                                </form>
                                                     
                                <?php 
                                        if(isset($blocked_row->id)){

                                                echo '<div class="result error"><i class="fal fa-times"></i> <span>Bu alan adı engellendi.</span></div>';
                                                
                                        }elseif(isset($domain) and $domain_status=='yes'){

                                               
                                                /*$created = $result['domain']['created'];
                                                $changed = $result['domain']['changed'];*/
                                                $expired = $result['domain']['expired'];


                                                $today = new DateTime(date('Y-m-d'));
                                                $tomorrow = new DateTime($expired);
                                                $interval = $today->diff($tomorrow);

                                                $timeago = null;
                                                if($interval->y > 0){  $timeago[] = $interval->y.' yıl'; }
                                                if($interval->m > 0){  $timeago[] = $interval->m.' ay'; }
                                                if($interval->d > 0){  $timeago[] = $interval->d.' gün'; }
                                                $timeago = implode(', ',$timeago);

                                                echo ' <div class="result error">
                                                        <i class="fal fa-times"></i> 
                                                        <span>'.$domain.' <u> kullanılıyor</u>. Alan adı '.$timeago.' sonra kaydedilebilir </span>
                                                </div>';
                                      
                                                  
                                        }elseif(isset($domain) and $domain_status=='no'){
                                                echo '<div class="result success"><i class="fal fa-check"></i> <span>'.$domain.' kullanılabilir.</span></div>';

                                        }
                                               
                                ?>


                        </div>



                        <div class="container">

                                <?php  if(isset($domain) and $domain_status=='yes'){   ?>

                                                           
                                                

                                        <div class="row">

                                                <div class="col-md-9 col-xs-12">

                                              
                                                
                                             
                                                       
                                                        <div class="widget">
                                                                <div class="heading">Domain Bilgileri</div>
                                                                <div class="item">
                                                                        <div class="left">Domain:</div>
                                                                        <div class="right"><?=$domain;?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Kayıt Tarihi:</div>
                                                                        <div class="right"><?=$result['domain']['created'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Bitiş Tarihi:</div>
                                                                        <div class="right"><?=$result['domain']['expired'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Güncelleme Tarihi:</div>
                                                                        <div class="right"><?=$result['domain']['changed'];?></div>
                                                                </div>
                                                               
                                                                <div class="item">
                                                                        <div class="left">Durum:</div>
                                                                        <div class="right"><?=implode($result['domain']['domain_status'],'<br/>');?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">NS:</div>
                                                                        <div class="right"><?=$result['domain']['ns']; ?> </div>
                                                                </div>
                                                        </div>

                                                         <?php if(isset($result['registrar'])){ ?>


                                                                <div class="widget">
                                                                        <div class="heading"><span class="df-ico-domain"></span>Kayıt Firması</div>
                                                                        <div class="item">
                                                                                <div class="left">Firma adı:</div>
                                                                                <div class="right"><?=$result['registrar']['name'];?></div>
                                                                        </div> 
                                                                        <div class="item">
                                                                                <div class="left">Iana:</div>
                                                                                <div class="right"><?=$result['registrar']['iana'];?></div>
                                                                        </div> 
                                                                        <div class="item">
                                                                                <div class="left">Telefon:</div>
                                                                                <div class="right"><?=$result['registrar']['phone'];?></div>
                                                                        </div>
                                                                        <div class="item">
                                                                                <div class="left">E-mail:</div>
                                                                                <div class="right"><?=$result['registrar']['email'];?></div>
                                                                        </div>
                                                                </div>

                                                        <?php } ?>

                                                        <?php if(isset($result['owner'])){ ?>
                                                      
                                             


                                                        <div class="widget">
                                                                <div class="df-heading"><span class="df-ico-regcon"></span>Kayıtçı İletişim Bilgileri</div>
                                                                <div class="item">
                                                                        <div class="left">Adı:</div>
                                                                        <div class="right"><?=$result['owner']['name'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Organizasyon:</div>
                                                                        <div class="right"><?=$result['owner']['organization'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Sokak:</div>
                                                                        <div class="right"><?=$result['owner']['address']['street'][0];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Şehir:</div>
                                                                        <div class="right"><?=$result['owner']['address']['city'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Bölge:</div>
                                                                        <div class="right"><?=$result['owner']['address']['state'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Posta Kodu:</div>
                                                                        <div class="right"><?=$result['owner']['address']['pcode'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Ülke:</div>
                                                                        <div class="right"><?=$result['owner']['address']['country'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Telefon:</div>
                                                                        <div class="right"><?=$result['owner']['phone'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">E-mail:</div>
                                                                        <div class="right"><?=$result['owner']['email'];?></div>
                                                                </div>
                                                        </div>

                                                        <?php } ?>



                                                        <?php if(isset($result['admin'])){ ?>
                                                        
                                                        <div class="widget">
                                                                <div class="heading">Yönetici Bilgileri</div>
                                                                <div class="item">
                                                                        <div class="left">Adı:</div>
                                                                        <div class="right"><?=$result['admin']['name'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Organizasyon:</div>
                                                                        <div class="right"><?=$result['admin']['organization'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Sokak:</div>
                                                                        <div class="right"><?=$result['admin']['address']['street'][0];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Şehir:</div>
                                                                        <div class="right"><?=$result['admin']['address']['city'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Bölge:</div>
                                                                        <div class="right"><?=$result['admin']['address']['state'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Posta Kodu:</div>
                                                                        <div class="right"><?=$result['admin']['address']['pcode'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Ülke:</div>
                                                                        <div class="right"><?=$result['admin']['address']['country'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Telefon:</div>
                                                                        <div class="right"><?=$result['admin']['phone'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">E-mail:</div>
                                                                        <div class="right"><?=$result['admin']['email'];?></div>
                                                                </div>
                                                        </div>
                                                        
                                                        <?php } ?>




                                                        <?php if(isset($result['tech'])){ ?>
                                                        
                                                        <div class="widget">
                                                                <div class="heading"><span class="df-ico-tekcon"></span>Teknik İletişim Bilgileri</div>
                                                                <div class="item">
                                                                        <div class="left">Adı:</div>
                                                                        <div class="right"><?=$result['tech']['name'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Organizasyon:</div>
                                                                        <div class="right"><?=$result['tech']['organization'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Adres:</div>
                                                                        <div class="right"><?=$result['tech']['address']['street'][0];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Şehir:</div>
                                                                        <div class="right"><?=$result['tech']['address']['city'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Bölge:</div>
                                                                        <div class="right"><?=$result['tech']['address']['state'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Posta Kodu:</div>
                                                                        <div class="right"><?=$result['tech']['address']['pcode'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Ülke:</div>
                                                                        <div class="right"><?=$result['tech']['address']['country'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">Telefon:</div>
                                                                        <div class="right"><?=$result['tech']['phone'];?></div>
                                                                </div>
                                                                <div class="item">
                                                                        <div class="left">E-mail:</div>
                                                                        <div class="right"><?=$result['tech']['email'];?></div>
                                                                </div>
                                                        </div>
                                                        
                                                        <?php } ?>

                                                        <div class="widget">
                                                                <div class="heading">Raw Whois Data</div>
                                                                <div class="item"><?=implode($result['whois'], '<br/>');?></div>
                                                        </div>

                                                

            

                                        </div>
                                        <div class="col-md-3 col-xs-12">
                                                <?php require('_inc/sidebar.php'); ?>

                                        </div>

                                </div>

                        <?php }elseif($pia->settings('whois_article')){ ?>
                                <article class="section"><?=$pia->settings('whois_article');?></article>
                        <?php } ?>
                                               
                                    
                        </div>

		<?php require('_inc/footer.php'); ?>

                

               
	</body>

</html>
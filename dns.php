<!DOCTYPE html>
<html lang="en">
        <head>
        <?php 


                $meta_title = isset($domain) ? $pia->settings('dns_lookup_title') : $pia->settings('dns_meta_title') ;
                $meta_description = isset($domain) ? $pia->settings('dns_lookup_description') : $pia->settings('dns_meta_description') ;

                require('_inc/head.php'); 
                
                $sidebar_top_ad = $pia->settings('dns_sidebar_1');
                $sidebar_bottom_ad = $pia->settings('dns_sidebar_2');
                $header_ad = $pia->settings('dns_header');
                $footer_ad = $pia->settings('dns_footer');

                if($pia->settings('dns_noindex')){  echo '<meta name="robots" content="noindex,nofollow" />';  }

                if($pia->settings('dns_recently_status')){
                                
                        $sidebar_title = $pia->settings('dns_recently_title');
                        $sidebar_count = $pia->settings('dns_recently_count');
                        $sidebar_sql = 'status=1';
                        $sidebar_prefix = 'dns/';
                }



        ?>
           
       

         
        </head>
        <body>
        
       
                 <?php require('_inc/header.php'); ?>
                
                <?php if($header_ad){ ?><div class="header-ad ad"><?=$header_ad;?></div><?php } ?>

              

         
                <div class="search">
                                <h1><?=$pia->settings('dns_form_title');?></h1>
                                 <p><?=$pia->settings('dns_form_subtitle');?></p>
                               
                                <form class="looking">
                                        <input type="text" name="domain" class="form-control" placeholder="<?=$pia->settings('dns_form_input');?>"  value="<?=@$domain;?>" required />
                                        <button type="submit" class="btn btn-primary" ><?=$pia->settings('dns_form_button');?></button>
                                        <input type="hidden" name="frm" value="dns" />
                                </form>
                </div>

                <div class="container">


                        <?php if(isset($domain) and $dns_status=='yes'){  ?>


                                <div class="row ">

                                        <div class="col-md-9 col-xs-12">
                                             
                                                <div class="widget">
                                                        <div class="heading"><?=$domain;?></div>
                                                       
                                                        <?php if(!empty($dns_a)){ ?>

                                                                <div class="item">
                                                            
                                                                        <div class="left">A</div>
                                                                        <div class="right">
                                                            
                                                                                    
                                                                                <?php foreach($dns_a as $value) { ?>
                                                                                        <div><?=$value['ip'];?></div>
                                                                                <?php }?>
                                                                            
                                                                               
                                                                        </div>
                                                            
                                                                </div>
                                                        <?php } ?> 
                                                
                                                        <?php if(!empty($dns_aaaa)){ ?> 

                                                                <div class="item ">
                                                        
                                                                        <div class="left">AAAA</div>
                                                                        <div class="right">
                                                                               
                                                                                <?php foreach($dns_aaaa as $value) { ?>
                                                                                        <div><?=$value['ipv6'];?></div>
                                                                                <?php } ?>
                                                                
                                                                        </div>
                                                        
                                                                </div>

                                                        <?php } ?>
                                                
                                                        <?php if(!empty($dns_ns)){ ?> 

                                                                <div class="item">
                                                        
                                                                        <div class="left">NS</div>
                                                                        <div class="right">
                                                        
                                                                                
                                                                                <?php foreach($dns_ns as $value){ ?>

                                                                                        <div><?=$value['target'];?> ( <?=gethostbyname($value['target']);?> )</div>
                                                                                
                                                                                <?php } ?>
                                                
                                                                                
                                                                        </div>
                                                        
                                                                </div>
                                                        <?php } ?>


                                                        <?php if(!empty($dns_mx)){ ?> 

                                                                <div class="item">
                                                        
                                                                        <div class="left">MX</div>
                                                                        <div class="right">
                                                        
                                                                                <?php foreach($dns_mx as $value){ ?>
                                                                                        <div>[<?=$value['pri'];?>] <?=$value['target'];?> ( <?=gethostbyname($value['target']);?> )</div>
                                                                                <?php } ?>
                                                                
                                                                        </div>
                                                        
                                                                </div>

                                                        <?php } ?> 


                                                        <?php if(!empty($dns_soa)){ ?> 


                                                                <div class="item">
                                                            
                                                                        <div class="left">SOA</div>
                                                                        <div class="right">
                                                            
                                                                                <div>Email : <?=$dns_soa_email?></div>
                                                                                <div>Serial : <?=$dns_soa_serial?></div>
                                                                                <div>Refresh : <?=$dns_soa_refresh?></div>
                                                                                <div>Retry : <?=$dns_soa_retry?></div>
                                                                                <div>Expire : <?=$dns_soa_expire?></div>
                                                                                <div>Minimum TTL : <?=$dns_soa_minimum_ttl?></div>
                                                                    
                                                                        </div>
                                                                </div>

                                                        <?php } ?> 


                                                        <?php if(!empty($dns_txt)){ ?> 
                                                                <div class="item ">
                                                            
                                                                        <div class="left">TXT</div>
                                                                        <div class="right">
                                                            

                                                                                <?php foreach($dns_txt as $value){ ?>
                                                                                        <div><?=wordwrap($value['txt'], 80, "<br/>\n", true);?></div>
                                                                                <?php  }  ?>
                                                            
                                                                              
                                                                        </div>
                                                            
                                                                </div>
                                                          <?php } ?>
                                                </div>
                                       
                                        
                                        
                                       
                                </div>
                                <div class="col-md-3"> <?php require('_inc/sidebar.php'); ?></div>
                        </div>
                        <?php }elseif($pia->settings('dns_article')){ ?>
                                <article class="section"><?=$pia->settings('dns_article');?></article>
                        <?php } ?>
                </div>

                <?php require('_inc/footer.php'); ?>
        </body>
</html>
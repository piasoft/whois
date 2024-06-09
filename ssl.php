<!DOCTYPE html>
<html lang="en">
        <head>
                <?php   

                        $meta_title = isset($domain) ? $pia->settings('ssl_checker_title') : $pia->settings('ssl_meta_title') ;
                        $meta_description = isset($domain) ? $pia->settings('ssl_checker_description') : $pia->settings('ssl_meta_description') ;

                        require('_inc/head.php');

                        $sidebar_top_ad = $pia->settings('ssl_sidebar_1');
                        $sidebar_bottom_ad = $pia->settings('ssl_sidebar_2');
                        $header_ad = $pia->settings('ssl_header');
                        $footer_ad = $pia->settings('ssl_footer');

                        if($pia->settings('ssl_noindex')){ echo '<meta name="robots" content="noindex,nofollow" />';  }


                        if($pia->settings('ssl_recently_status')){
                                
                                $sidebar_title = $pia->settings('ssl_recently_title');
                                $sidebar_count = $pia->settings('ssl_recently_count');
                                $sidebar_sql = 'status=2';
                                $sidebar_prefix = 'ssl/';
                                
                        }

                ?>
           
       
        </head>
        <body>

                        
                <?php require('_inc/header.php'); ?>
             

                <?php if($header_ad){ ?><div class="header-ad ad"><?=$header_ad;?></div><?php } ?>
                        
                 <div class="search">

                                <h1><?=$pia->settings('ssl_form_title');?></h1>
                                <p><?=$pia->settings('ssl_form_subtitle');?></p>
                       
                                <form class="looking">
                                        <input type="text" name="domain" class="form-control"  placeholder="<?=$pia->settings('ssl_form_input');?>" value="<?=@$domain;?>" required />
                                        <button type="submit" class="btn btn-primary" ><?=$pia->settings('ssl_form_button');?></button>
                                        <input type="hidden" name="frm" value="ssl" />
                                </form>

                                <?php 
                                        if(isset($blocked_row->id)){

                                                 echo '<div class="result error"><i class="fal fa-times"></i> <span>Alan adı engellendi.</span></div>';

                                        }elseif(isset($domain) and isset($ssl)){ 

                                                echo '<div class="result success"><i class="fal fa-check"></i> <span>'.$domain.' is protected by SSL Certificate.</span></div>';
                                        
                                        }elseif(isset($domain) and !isset($ssl)){ 

                                                echo '<div class="result error"><i class="fal fa-times"></i> <span>'.$domain.' is not protected by SSL Certificate.</span></div>';

                                        } 
                                ?>
                </div>

                <div class="container">


                        <?php if(isset($blocked_row->id)){ ?>

                                <div class="result error"><i class="fal fa-times"></i> <span class="center">The domain is blocked.</span></div>

                        <?php } ?>

                       
                        <?php if(isset($ssl)){ ?>

                                <div class="row">

                                        <div class="col-md-9 col-xs-12">
                                       
                                                <div class="widget">
                                                        <div class="heading">SSL Information</div>

                                                        <?php if($ssl['name']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Name</div>
                                                                        <div class="right"><?=$ssl['name'];?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['subject']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Subject</div>
                                                                        <div class="right">

                                                                                <?php if($ssl['subject']['C']){ ?>
                                                                                        <div><strong>CountryName : </strong><?=$ssl['subject']['C'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['subject']['ST']){ ?>
                                                                                        <div><strong>StateOrProvinceName : </strong><?=$ssl['subject']['ST'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['subject']['L']){ ?>
                                                                                        <div><strong>Locality : </strong><?=$ssl['subject']['L'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['subject']['O']){ ?>
                                                                                        <div><strong>Organization : </strong><?=$ssl['subject']['O'];?></div>
                                                                                <?php } ?>

                                                                                <?php if($ssl['subject']['OU']){ ?>
                                                                                        <div><strong>OrganizationalUnit : </strong><?=$ssl['subject']['OU'];?></div>
                                                                                <?php } ?>

                                                                                <?php if($ssl['subject']['CN']){ ?>
                                                                                        <div><strong>Common Name : </strong><?=$ssl['subject']['CN'];?></div>
                                                                                <?php } ?>

                                                                                <?php if($ssl['extensions']['subjectKeyIdentifier']){ ?>
                                                                                        <div><strong>Key Identifier : </strong><?=$ssl['extensions']['subjectKeyIdentifier'];?></div> 
                                                                                <?php } ?>
                                                                            
                                                                        </div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['issuer']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Issuer</div>
                                                                        <div class="right">
                                                                                <?php if($ssl['issuer']['C']){ ?>
                                                                                        <div><strong>CountryName : </strong><?=$ssl['issuer']['C'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['issuer']['ST']){ ?>
                                                                                        <div><strong>StateOrProvinceName : </strong><?=$ssl['issuer']['ST'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['issuer']['L']){ ?>
                                                                                        <div><strong>Locality : </strong><?=$ssl['issuer']['L'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['issuer']['O']){ ?>
                                                                                        <div><strong>Organization : </strong><?=$ssl['issuer']['O'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['issuer']['OU']){ ?>
                                                                                        <div><strong>OrganizationalUnit : </strong><?=$ssl['issuer']['OU'];?></div> 
                                                                                <?php } ?>

                                                                                <?php if($ssl['issuer']['CN']){ ?>
                                                                                        <div><strong>Common Name : </strong><?=$ssl['issuer']['CN'];?></div> 
                                                                                <?php } ?>
                                                                        </div>
                                                                </div>
                                                        <?php } ?>
                        

                                                        <?php if($ssl['validFrom_time_t']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Valid from</div>
                                                                        <div class="right"><?=date('M d Y, H:i:s', $ssl['validFrom_time_t']);?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['validTo_time_t']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Valid Upto</div>
                                                                        <div class="right"><?=date('M d Y, H:i:s', $ssl['validTo_time_t']);?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['serialNumber']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Serial Number</div>
                                                                        <div class="right"><?=$ssl['serialNumber'];?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['extensions']['subjectAltName']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Other domains</div>
                                                                        <div class="right">
                                                                                <?php $domains_list = explode(',', $ssl['extensions']['subjectAltName']); foreach($domains_list as $domains_item){ ?>
                                                                                        <div><?=$domains_item;?></div>
                                                                                <?php } ?>
                                                                        </div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['extensions']['authorityKeyIdentifier']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Authority Key Identifier</div>
                                                                        <div class="right"><?=$ssl['extensions']['authorityKeyIdentifier'];?></div>
                                                                </div>
                                                        <?php } ?>



                                                        <?php if($ssl['extensions']['keyUsage']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Key Usage</div>
                                                                        <div class="right"><?=$ssl['extensions']['keyUsage'];?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['extensions']['extendedKeyUsage']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Extended Key Usage</div>
                                                                        <div class="right"><?=$ssl['extensions']['extendedKeyUsage'];?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['extensions']['crlDistributionPoints']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Crl Distribution Points</div>
                                                                        <div class="right"><pre><?=$ssl['extensions']['crlDistributionPoints'];?></pre></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['extensions']['basicConstraints']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Basic Constraints</div>
                                                                        <div class="right"><?=$ssl['extensions']['basicConstraints'];?></div>
                                                                </div>
                                                        <?php } ?>

                                                        <?php if($ssl['extensions']['certificatePolicies']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Certificate Policies</div>
                                                                        <div class="right"><pre><?=$ssl['extensions']['certificatePolicies'];?></pre></div>
                                                                </div>
                                                        <?php } ?>


                                                        <?php if($ssl['extensions']['ct_precert_scts']){ ?>
                                                                <div class="item">
                                                                        <div class="left">Signature</div>
                                                                        <div class="right"><pre><?=$ssl['extensions']['ct_precert_scts'];?></pre></div>
                                                                </div>
                                                        <?php } ?>

                                                </div>

                                       
                                        </div>

                                        <div class="col-md-3 col-xs-12"><?php require('_inc/sidebar.php'); ?></div>

                                </div>

                        <?php  }elseif($pia->settings('ssl_article')){ ?>

                                <article class="section"><?=$pia->settings('ssl_article');?></article>

                        <?php } ?>
                </div>

                <?php require('_inc/footer.php'); ?>
        </body>
</html>

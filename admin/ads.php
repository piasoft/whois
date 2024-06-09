<?php require('../_class/config.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <?php require('_inc/head.php');  ?>
           


      </head>
      <body>
            <?php require('_inc/header.php'); ?>




                   <form class="container tab-content" method="post" action="_ajax/_ajaxAds.php"  autocomplete="off">

                                


                        <div class="tools">
                              <div class="left">REKLAM YÖNETİMİ</div>
                              <div class="right"><button type="submit" class="btn-success btn-sm" >Kaydet</button></div>
                        </div>



                  <div class="row">
                        <div class="col-md-3">
                              <ul class="navigation">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Anasayfa</a></li>
                                    <li><a href="#tab2" data-toggle="tab">WHOIS Sayfası</a></li>
                                    <li><a href="#tab3" data-toggle="tab">DNS Sayfası</a></li>
                                    <li><a href="#tab4" data-toggle="tab">SSL Sayfası</a></li>
                              </ul>
                        </div>
                        <div class="col-md-9 tab-content">


                                   
                                    <div class="widget tab-pane active" id="tab1">
                                         
                                                <div class="form-group">
                                                      <label>HEADER</label>
                                                      <textarea name="home_header" class="form-control"><?=$pia->settings('home_header');?></textarea>
                                                </div>
                                                <div class="form-group m0">
                                                      <label>FOOTER</label>
                                                      <textarea name="home_footer" class="form-control"><?=$pia->settings('home_footer');?></textarea>
                                                </div>
                                                      
                                               
                                    </div>
                                    <div  class="widget tab-pane" id="tab2">
                                         
                                   
                                          <div class="form-group">
                                                <label>Header</label>
                                                <textarea name="whois_header" class="form-control"><?=$pia->settings('whois_header');?></textarea>
                                          </div>
                                        
                                          <div class="form-group">
                                                <label>SIDEBAR ÜST</label>
                                                <textarea name="whois_sidebar_1" class="form-control"><?=$pia->settings('whois_sidebar_1');?></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>SIDEBAR ALT</label>
                                                <textarea name="whois_sidebar_2" class="form-control"><?=$pia->settings('whois_sidebar_2');?></textarea>
                                          </div>
                                          <div class="form-group m0">
                                                <label>FOOTER</label>
                                                <textarea name="whois_footer" class="form-control"><?=$pia->settings('whois_footer');?></textarea>
                                          </div>
                                             
                                    </div>
                                    <div class="widget tab-pane" id="tab3">
                                          <div class="form-group">
                                                <label>HEADER</label>
                                                <textarea name="dns_header" class="form-control"><?=$pia->settings('dns_header');?></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>SIDEBAR ÜST</label>
                                                <textarea name="dns_sidebar_1" class="form-control"><?=$pia->settings('dns_sidebar_1');?></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>SIDEBAR ALT</label>
                                                <textarea name="dns_sidebar_2" class="form-control"><?=$pia->settings('dns_sidebar_2');?></textarea>
                                          </div>
                                           <div class="form-group m0">
                                                <label>FOOTER</label>
                                                <textarea name="dns_footer" class="form-control"><?=$pia->settings('dns_footer');?></textarea>
                                          </div>
                                    </div>
                                    <div  class="tab-pane widget" id="tab4">
                                          <div class="form-group">
                                                <label>HEADER</label>
                                                <textarea name="ssl_header" class="form-control"><?=$pia->settings('ssl_header');?></textarea></label>
                                          </div>
                                          <div class="form-group">
                                                <label>SIDEBAR ÜST</label>
                                                <textarea name="ssl_sidebar_1" class="form-control"><?=$pia->settings('ssl_sidebar_1');?></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>SIDEBAR ALT</label>
                                                <textarea name="ssl_sidebar_2" class="form-control"><?=$pia->settings('ssl_sidebar_2');?></textarea>
                                          </div>
                                           <div class="form-group m0">
                                                <label>FOOTER</label>
                                                <textarea name="ssl_footer" class="form-control"><?=$pia->settings('ssl_footer');?></textarea>
                                          </div>
                                    </div>
                                 
                                
                                    <input type="hidden" name="frm" value="frmAds" />           

                        </div>
                  </div>
                   
                   </form>
            <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
            <script>autosize($('textarea'));</script>
      </body>
</html>
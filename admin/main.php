<?php require('../_class/config.php'); require('session.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <?php require('_inc/head.php'); ?>
      </head>
      <body>
            <?php require('_inc/header.php'); ?>

            <div class="container">
                  <?php 

                        $daily_whois = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=0 and DATE(adddate) = CURDATE()  ORDER BY adddate DESC");
                        $weekly_whois = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=0 and  DATE(adddate) >= DATE(NOW()) - INTERVAL 7 DAY ORDER BY adddate DESC");
                        $monthly_whois = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=0 and DATE(adddate) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)  ORDER BY adddate DESC");
                        $totaly_whois = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=0 ORDER BY adddate DESC");

                        $daily_dns = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=1 and DATE(adddate) = CURDATE()  ORDER BY adddate DESC");
                        $weekly_dns = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=1 and  DATE(adddate) >= DATE(NOW()) - INTERVAL 7 DAY ORDER BY adddate DESC");
                        $monthly_dns = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=1 and DATE(adddate) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)  ORDER BY adddate DESC");
                        $totaly_dns = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=1 ORDER BY adddate DESC");

                        $daily_ssl = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=2 and DATE(adddate) = CURDATE()  ORDER BY adddate DESC");
                        $weekly_ssl = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=2 and  DATE(adddate) >= DATE(NOW()) - INTERVAL 7 DAY ORDER BY adddate DESC");
                        $monthly_ssl = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=2 and DATE(adddate) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)  ORDER BY adddate DESC");
                        $totaly_ssl = $pia->get_var("SELECT COUNT(*) FROM records WHERE status=2 ORDER BY adddate DESC");
                        
                  ?>

                 
                
                  <div class="row">

                        <div class="col-md-3 col-xs-6">
                              <div class="box daily">
                                    <h6>Bugün</h6>
                                    <span>WHOIS : <?=$daily_whois;?></span>
                                    <span>DNS : <?=$daily_dns;?></span>
                                    <span class="last">SSL : <?=$daily_ssl;?></span>
                                  
                              </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                              <div class="box weekly">
                                   
                                    <h6>Son 7 gün</h6>
                                    <span>WHOIS : <?=$weekly_whois;?></span>
                                    <span>DNS : <?=$weekly_dns;?></span>
                                    <span class="last">SSL : <?=$weekly_ssl;?></span>
                             


                              </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                              <div class="box monthly">

                                    
                                    <h6>Son 30 gün</h6>
                                    <span>WHOIS : <?=$monthly_whois;?></span>
                                    <span>DNS : <?=$monthly_dns;?></span>
                                    <span class="last">SSL : <?=$monthly_ssl;?></span>
                              

                              </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                              <div class="box total">

                                    <h6>Tüm zamanlar</h6>
                                    <span>WHOIS : <?=$totaly_whois;?></span>
                                    <span>DNS : <?=$totaly_dns;?></span>
                                    <span class="last">SSL : <?=$totaly_ssl;?></span>
                              

                              </div>
                        </div>
                  </div>

                  <div class="tools">
                        <div class="left">Son Sorgular</div>
                        <div class="right"><a href="reports.php" class="btn-info btn-sm">Tüm Sorgular</a></div>
                  </div>
                 
                        <table class="table">
                              <thead>
                                    <tr>
                                          <th>Alan adı</th>
                                          <th>Modül</th>
                                          <th>Tarayıcı</th>
                                          <th>Platform</th>
                                          <th>IP</th>
                                          <th class="text-right">Tarih</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                          $list = $pia->query("SELECT * FROM records ORDER BY adddate DESC LIMIT 0,10"); 
                                          foreach($list as $item){ 

                                                if($item->status==0){
                                                      $status='WHOIS Sorgulama';
                                                }
                                                 if($item->status==1){
                                                      $status='DNS Sorgulama';
                                                }
                                                 if($item->status==2){
                                                      $status='SSL Sorgulama';
                                                }
                                    ?>
                                          <tr>
                                                <td><?=$item->domain;?></td>
                                                <td><?=$status;?></td>
                                                <td><?=$item->browser;?></td>
                                                <td><?=$item->platform;?></td>
                                                <td><?=$item->ip;?></td>
                                                <td><?=$pia->time_tr($item->adddate);?></td>
                                          </tr>
                                    <?php } ?>
                              </tbody>
                        </table>

            </div>
      </body>
</html>

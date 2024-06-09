<?php 
	require('../_class/config.php'); require('session.php');

    header('Content-Encoding: UTF-8');
    header('Content-Type: text/plain; charset=utf-8'); 
    header("Content-disposition: attachment; filename=export.xls");
    echo "\xEF\xBB\xBF";

    echo '<table border="1">
        <thead>
            <tr>
                  <th>Domain</th>
                  <th>Module</th>
                  <th>Browser</th>
                  <th>Platform</th>
                  <th>IP</th>
                  <th>Date</th>
            </tr>
        </thead>
        <tbody>';
    
        $list = $pia->query("SELECT * FROM records");  
    foreach($list as $item){ 

          if($item->status==0){
                  $status='WHOIS Lookup';
            }
             if($item->status==1){
                  $status='DNS Lookup';
            }
             if($item->status==2){
                  $status='SSL Checker';
            }

        

         echo '<tr>
              <td>'.$item->domain.'</td>
              <td>'.$status.'</td>
              <td>'.$item->browser.'</td>
              <td>'.$item->platform.'</td>
              <td>'.$item->ip.'</td>
              <td>'.$pia->time_tr($item->adddate).'</td>
        </tr>';
                              


    }
    echo '</tbody></table>';
 
?>
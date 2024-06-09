<?php 
	require('../../_class/config.php'); require('../session.php');
	$i=0;
	$array['list'] = array();
	

	if(isset($_GET['users'])){
	    	$list = $pia->query("SELECT * FROM users");  
	    	foreach($list as $item){ 

                                           
			$array['list'][$i] = array($item->fullname, $item->email, $pia->action('users',$item->id));
			$i++;
		}
	}



	if(isset($_GET['blocked'])){
    	$list = $pia->query("SELECT * FROM blocked");  
    	foreach($list as $item){ 

                             
			$array['list'][$i] = array($item->domain, $pia->action('blocked',$item->id));
			$i++;
		}
	}

	if(isset($_GET['pages'])){
    	$list = $pia->query("SELECT * FROM pages");  
    	foreach($list as $item){ 

    		$status = ($item->status==1) ?'<label class="label-success">Aktif</label>' : '<label class="label-warning">Pasif</label>';
                             
			$array['list'][$i] = array($item->title, $status, $pia->action('pages',$item->id));
			$i++;
		}
	}


	if(isset($_GET['reports'])){
    	$list = $pia->query("SELECT * FROM records");  
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

                             
			$array['list'][$i] = array($item->domain,$status,  $item->browser, $item->platform, $item->ip, $pia->time_tr($item->adddate));
			$i++;
		}
	}


	if(isset($_GET['messages'])){
		$list = $pia->query("SELECT * FROM messages");  
    	foreach($list as $item){ 
    		$status = $item->status==1?'<label class="abel-success">Readed</label>':'<label class="label-warning">Waiting</label>';
			$array['list'][$i] = array($item->fullname, $item->email, $item->phone, $status, $pia->action('messages',$item->id));
			$i++;
		}
	}	

	if(isset($_GET['tlds'])){
		$list = $pia->query("SELECT * FROM tlds");  
    	foreach($list as $item){ 

			$array['list'][$i] = array($item->tld, $item->server, $pia->action('tlds',$item->id));
			$i++;
		}
	}	



	echo json_encode($array);
?>
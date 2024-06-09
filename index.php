<?php

        require('_class/config.php');


        if($pia->settings('maintenance_status')){ require('bakim-modu.php'); exit(); }

        
        require('_inc/top_cache.php');


        $meta_title = $meta_description = $domain = null;

        $request_uri = @$_GET['page'];
  
        $header_ad = $pia->settings('header_ad');
        $footer_ad = $pia->settings('footer_ad');



        if($request_uri=='whois/'){
                header("HTTP/1.1 301 Moved Permanently");
                header('Location: /whois'  );
                exit();
        }
        if($request_uri=='dns/'){
                header("HTTP/1.1 301 Moved Permanently");
                header('Location: /dns'  );
                exit();
        }
          if($request_uri=='ssl/'){
                header("HTTP/1.1 301 Moved Permanently");
                header('Location: /ssl'  );
                exit();
        }



        if(isset($request_uri)){



                $link = $pia->control($request_uri,'text');

                $pages_row = $pia->get_row("SELECT * FROM pages WHERE link=$link and status=1");

                if(strstr($request_uri, 'whois/')){


                        $domain = str_replace('whois/', '', $request_uri);

                        if($pia->get_domain($domain)!=$domain){

                                header("HTTP/1.1 301 Moved Permanently");
                                header('Location: /whois/'.  $pia->get_domain($domain)  );
                                exit();
                        }


                        $blocked_domain = $pia->control($domain,'text');
                        $blocked_row = $pia->get_row("SELECT * FROM blocked WHERE domain=$blocked_domain");


                        if(!isset($blocked_row->id)){

                                $result = $pia->get_whois($domain);
                               

                                $domain_status = $result['status'];

                                if($domain_status=='yes'){

                                        
                                        $who_domain = $pia->control($domain,'text');
                                        $adddate = $pia->control(date('Y-m-d H:i:s'),'text');

                                        $whois_row = $pia->get_row("SELECT * FROM records WHERE domain=$who_domain and status=0");
                                        isset($whois_row->id) ? $pia->exec("UPDATE records SET adddate=$adddate WHERE domain=$who_domain and status=0") : $pia->insert("INSERT INTO records(domain, agent, browser, platform, ip, status) VALUES($who_domain, $who_agent, $who_browser, $who_platform, $who_ip, 0)");
                                }

                        }

                   
         

                        require('whois.php');

                }elseif(strstr($request_uri, 'dns/')){

                        $domain = str_replace('dns/', '', $request_uri);


                        if($pia->get_domain($domain)!=$domain){

                                header("HTTP/1.1 301 Moved Permanently");
                                header('Location: /dns/'.  $pia->get_domain($domain)  );
                                exit();
                        }

                        $blocked_domain = $pia->control($domain,'text');
                        $blocked_row = $pia->get_row("SELECT * FROM blocked WHERE domain=$blocked_domain");


                        if(!isset($blocked_row->id)){


                                $dns_status = (dns_get_record($domain, DNS_NS))  ? 'yes' : 'no';

                                if($dns_status=='yes'){


                                        
                                         $who_domain = $pia->control($domain,'text');
                                        $adddate = $pia->control(date('Y-m-d H:i:s'),'text');

                                        $whois_row = $pia->get_row("SELECT * FROM records WHERE domain=$who_domain and status=1");
                                        isset($whois_row->id) ? $pia->exec("UPDATE records SET adddate=$adddate WHERE domain=$who_domain and status=1") : $pia->insert("INSERT INTO records(domain, agent, browser, platform, ip, status) VALUES($who_domain, $who_agent, $who_browser, $who_platform, $who_ip, 1)");

                    
                                        $dns_a = dns_get_record($domain, DNS_A);
                                        $dns_a_ttl = $dns_a[0]['ttl'];
                                        
                                        $dns_ns = dns_get_record($domain, DNS_NS);
                                        $dns_ns_ttl = $dns_ns[0]['ttl'];
                                        
                                        $dns_mx = dns_get_record($domain, DNS_MX);
                                        $dns_mx_ttl = $dns_mx[0]['ttl'];
                                        
                                        $dns_soa = dns_get_record($domain, DNS_SOA);
                                        $dns_soa_ttl = $dns_soa[0]['ttl'];
                                        $dns_soa_email = explode(".", $dns_soa[0]['rname']);
                                        $dns_soa_email = $dns_soa_email[0].'@'.$dns_soa_email[1].'.'.$dns_soa_email[2];
                                        $dns_soa_serial = $dns_soa[0]['serial'];
                                        $dns_soa_refresh = $dns_soa[0]['refresh'];
                                        $dns_soa_retry = $dns_soa[0]['retry'];
                                        $dns_soa_expire = $dns_soa[0]['expire'];
                                        $dns_soa_minimum_ttl = $dns_soa[0]['minimum-ttl'];
                                        
                                        $dns_txt = dns_get_record($domain, DNS_TXT);
                                        $dns_txt_ttl = $dns_txt[0]['ttl'];
                                        
                                        $dns_aaaa = dns_get_record($domain, DNS_AAAA);
                                        $dns_aaaa_ttl = $dns_aaaa[0]['ttl'];
                        
                                }

                        }

                      

                        require('dns.php');

                }elseif(strstr($request_uri, 'ssl/')){

                        $domain = str_replace('ssl/', '', $request_uri);

                        if($pia->get_domain($domain)!=$domain){

                                header("HTTP/1.1 301 Moved Permanently");
                                header('Location: /ssl/'.  $pia->get_domain($domain)  );
                                exit();
                        }


                        $blocked_domain = $pia->control($domain,'text');
                        $blocked_row = $pia->get_row("SELECT * FROM blocked WHERE domain=$blocked_domain");


                        if(!isset($blocked_row->id)){



                                $ssl = $pia->get_ssl($domain);

                                if(isset($ssl)){

                                         $who_domain = $pia->control($domain,'text');
                                        $adddate = $pia->control(date('Y-m-d H:i:s'),'text');

                                        $whois_row = $pia->get_row("SELECT * FROM records WHERE domain=$who_domain and status=2");
                                        isset($whois_row->id) ? $pia->exec("UPDATE records SET adddate=$adddate WHERE domain=$who_domain and status=2") : $pia->insert("INSERT INTO records(domain, agent, browser, platform, ip, status) VALUES($who_domain, $who_agent, $who_browser, $who_platform, $who_ip, 2)");
                                }


                                $meta_title = $pia->settings('ssl_title');
                                $meta_description = $pia->settings('ssl_description');

                        }



                        require('ssl.php');

                }elseif(file_exists("$request_uri.php")){

                        require("$request_uri.php");

                }elseif(isset($pages_row->id)){

                        $meta_title = $pages_row->title.' - '.$pia->settings('site_title');
                        $meta_description = $pages_row->meta_description;
                        
                        require("page.php");

                }else{


                      header("HTTP/1.0 404 Not Found");
                      require('404.php');  
                      exit(); 
                
               
                }

        }else{     


                $home_switch_form = $pia->settings('home_switch_form');

                if($home_switch_form==0){

                        $home_form_title = $pia->settings('whois_form_title');
                        $home_form_subtitle = $pia->settings('whois_form_subtitle');
                        $home_form_input = $pia->settings('whois_form_input');
                        $home_form_button = $pia->settings('whois_form_button');
                        $home_form = 'whois';

                }

                if($home_switch_form==1){

                        $home_form_title = $pia->settings('dns_form_title');
                        $home_form_subtitle = $pia->settings('dns_form_subtitle');
                        $home_form_input = $pia->settings('dns_form_input');
                        $home_form_button = $pia->settings('dns_form_button');
                        $home_form = 'dns';

                }

                if($home_switch_form==2){

                        $home_form_title = $pia->settings('ssl_form_title');
                        $home_form_subtitle = $pia->settings('ssl_form_subtitle');
                        $home_form_input = $pia->settings('ssl_form_input');
                        $home_form_button = $pia->settings('ssl_form_button');
                        $home_form = 'ssl';

                }

                
                $header_ad = $pia->settings('home_header');
                $footer_ad = $pia->settings('home_footer');


                require('anasayfa.php');
        }


        require('_inc/bottom_cache.php');


?>
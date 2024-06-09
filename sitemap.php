<?php header('Content-type: text/xml');  


       echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';


            

            
                     $list = $pia->query("SELECT * FROM records WHERE status=0 ORDER BY id DESC");
                     foreach($list as $item){


                            echo '<url>
                                   <loc>'.$pia->base_url('whois/'.$item->domain).'</loc>
                                   <lastmod>'.date('Y-m-d', strtotime($item->adddate)).'</lastmod>
                                   <changefreq>daily</changefreq>
                                   <priority>0.8</priority>

                            </url>';

                     }


                     $list = $pia->query("SELECT * FROM records WHERE status=1 ORDER BY id DESC");
                     foreach($list as $item){


                            echo '<url>
                                   <loc>'.$pia->base_url('dns/'.$item->domain).'</loc>
                                   <lastmod>'.date('Y-m-d', strtotime($item->adddate)).'</lastmod>
                                   <changefreq>daily</changefreq>
                                   <priority>0.8</priority>

                            </url>';

                     }


                     $list = $pia->query("SELECT * FROM records WHERE status=2 ORDER BY id DESC");
                     foreach($list as $item){


                            echo '<url>
                                   <loc>'.$pia->base_url('ssl/'.$item->domain).'</loc>
                                   <lastmod>'.date('Y-m-d', strtotime($item->adddate)).'</lastmod>
                                   <changefreq>daily</changefreq>
                                   <priority>0.8</priority>

                            </url>';

                     }




       echo '</urlset>'; 

   
?>
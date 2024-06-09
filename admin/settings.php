<?php require('../_class/config.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <?php 
                  require('_inc/head.php'); 
                  $logo = file_exists('../uploads/'.$pia->settings('logo')) ? '../uploads/'.$pia->settings('logo') : '../uploads/upload.png';
                  $favicon = file_exists('../uploads/'.$pia->settings('favicon'))? '../uploads/'.$pia->settings('favicon') : '../uploads/upload.png';
            ?>
            <style>
                  .thumbnail{display: inline-block;min-width: 150px;margin-right: auto;}

                 
            </style>

      </head>
      <body>
            <?php require('_inc/header.php'); ?>



                  <form class="container" method="post" action="_ajax/_ajaxSettings.php"  autocomplete="off">


                        <div class="tools">
                              <div class="left">AYARLAR</div>
                              <div class="right"><button type="submit" class="btn-success btn-sm" >Kaydet</button></div>
                        </div>



                        <div class="row">
                              <div class="col-md-3">

                                    <ul class="navigation">
                                          <li class="active"><a href="#tab-site" data-toggle="tab">Genel Bilgiler</a></li>
                                          <li><a href="#tab-home" data-toggle="tab">Anasayfa </a></li>
                                          <li><a href="#tab-whois" data-toggle="tab">WHOIS Ayarları</a></li>
                                          <li><a href="#tab-dns" data-toggle="tab">DNS Ayarları </a></li>
                                          <li><a href="#tab-ssl" data-toggle="tab">SSL Ayarları</a></li>
                                          <li><a href="#tab-404" data-toggle="tab">404 Sayfası</a></li>
                                          <li><a href="#tab-contact" data-toggle="tab">İletişim</a></li>
                                          <li><a href="#tab-social" data-toggle="tab">Sosyal Ağlar</a></li>
                                          <li><a href="#tab-api" data-toggle="tab">GoDaddy API</a></li>
                                          <li><a href="#tab-maintenance" data-toggle="tab">Bakım Modu</a></li>
                                          <li><a href="#tab-custom" data-toggle="tab">Özel Kodlar</a></li>
                                          <li><a href="#tab-robots" data-toggle="tab">Robots.txt</a></li>
                                    </ul>
                                   
                              </div>
                              <div class="col-md-9 tab-content">

                                    <div class="widget tab-pane active" id="tab-site">

                                          <div class="heading">Genel Bilgiler</div>
                                          <div class="form-group">
                                                <label>Site adı</label>
                                                <input type="text" name="site_title" class="form-control" value="<?=$pia->settings('site_title');?>" placeholder="..." required />
                                          </div>
                                          <div class="form-group">
                                                <label>Açıklama</label>
                                                <textarea name="site_description" class="form-control" placeholder="..."  ><?=$pia->settings('site_description');?></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>LOGO/FAVICON</label>
                                                <div class="thumbnail" >
                                                      <img src="<?=$logo;?>" onclick="selector(this);"  />
                                                      <input type="file" name="logo" class="hidden"   />
                                                </div>
                                                <div class="thumbnail">
                                                      <img src="<?=$favicon;?>" onclick="selector(this);"  />
                                                      <input type="file" name="favicon" class="hidden"   />
                                                </div>
                                          </div>
                                          <div class="form-group m0">
                                                <label>Telif Hakları</label>
                                                <textarea name="copyright" class="form-control" placeholder="..."  ><?=$pia->settings('copyright');?></textarea>
                                          </div>

                                    </div>
                                    
                                   
                                    <div  class="widget tab-pane" id="tab-home">
                                          <div class="heading">Anasyfa</div>
                                          <div class="form-group">
                                                <label>META TITLE</label>
                                                <input type="text" name="home_title" class="form-control" value="<?=$pia->settings('home_title');?>" placeholder="Meta Title" required />
                                          </div>
                                          <div class="form-group">
                                                <label>META DESCRIPTION</label>
                                                <textarea name="home_description" class="form-control" placeholder="Meta Description"  ><?=$pia->settings('home_description');?></textarea>
                                          </div>
                                          <div class="form-group m0">
                                                <label>Varsayılan Modül</label>
                                                <select name="home_switch_form" class="form-control">
                                                      <option value="0" <?=$pia->settings('home_switch_form')==0?'selected':'';?>>WHOIS Lookup</option>
                                                      <option value="1" <?=$pia->settings('home_switch_form')==1?'selected':'';?>>DNS Lookup</option>
                                                      <option value="2" <?=$pia->settings('home_switch_form')==2?'selected':'';?>>SSL Checker</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div  class="tab-pane " id="tab-whois">
                                          <div class="widget">
                                                <div class="heading">WHOIS Sayfası</div>
                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="whois_meta_title" class="form-control" value="<?=$pia->settings('whois_meta_title');?>"  />
                                                </div>
                                                <div class="form-group m0">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="whois_meta_description" class="form-control"><?=$pia->settings('whois_meta_description');?></textarea>
                                                </div>
                                          </div>
                                          <div class="widget">
                                              
                                                <div class="heading">Sonuç Sayfası</div>
                                         
                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="whois_lookup_title" class="form-control" value="<?=$pia->settings('whois_lookup_title');?>"  />
                                                </div>
                                                <div class="form-group">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="whois_lookup_description" class="form-control"><?=$pia->settings('whois_lookup_description');?></textarea>
                                                </div>
                                                <div class="form-group m0">
                                                      <label><input type="checkbox" name="whois_noindex" <?=$pia->settings('whois_noindex')?'checked':'';?> /> WHOIS sonuçlarının indekslenmesini devre dışı bırak</label>
                                                </div>   
                                          </div>
                                          <div class="widget">
                                      
                                                <div class="heading">Arama Formu</div>
                                        
                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="whois_form_title" class="form-control" value="<?=$pia->settings('whois_form_title');?>" placeholder="..."  />
                                                </div>
                                                <div class="form-group">
                                                      <label>Kısa açıklama</label>
                                                      <textarea name="whois_form_subtitle" class="form-control"><?=$pia->settings('whois_form_subtitle');?></textarea>
                                                </div>
                                                <div class="form-group">
                                                      <label>INPUT Metni</label>
                                                      <input type="text" name="whois_form_input" class="form-control" value="<?=$pia->settings('whois_form_input');?>" placeholder="..."  /> 
                                                </div>
                                                <div class="form-group m0" >
                                                      <label>BUTTON Metni</label>
                                                      <input type="text" name="whois_form_button"  class="form-control" value="<?=$pia->settings('whois_form_button');?>" placeholder="..."  />
                                                </div>
                                          </div>

                                          <div class="widget">
                                                <div class="heading">Son Kayıtlar</div>

                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="whois_recently_title" class="form-control" value="<?=$pia->settings('whois_recently_title');?>"  />
                                                </div>
                                                <div class="form-group">
                                                      <label>Kayıt adeti</label>
                                                      <input type="text" name="whois_recently_count" class="form-control" value="<?=$pia->settings('whois_recently_count');?>"  />
                                                </div>
                                                <div class="form-group m0">
                                                      <label><input type="checkbox" name="whois_recently_status" <?=$pia->settings('whois_recently_status')?'checked':'';?> /> Aktif</label>
                                                </div>    
                                          </div>
                                          <div class="widget">
                                                <div class="heading">Seo Metni</div>
                                               <textarea name="whois_article" class="ckeditor"><?=$pia->settings('whois_article');?></textarea>
                                          </div>
                                          
                                    </div>
                                    <div class="tab-pane" id="tab-dns">

                                          <div class="widget" >
                                                <div class="heading">DNS Sayfası</div>
                                         
                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="dns_meta_title" class="form-control" value="<?=$pia->settings('dns_meta_title');?>"  />
                                                </div>
                                                <div class="form-group m0">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="dns_meta_description" class="form-control"><?=$pia->settings('dns_meta_description');?></textarea>
                                                </div>
                                          </div>
                                          
                                          <div class="widget" >
                                                <div class="heading">Sonuç Sayfası</div>
                                             
                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="dns_lookup_title" class="form-control" value="<?=$pia->settings('dns_lookup_title');?>" />
                                                </div>
                                                <div class="form-group">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="dns_lookup_description" class="form-control" ><?=$pia->settings('dns_lookup_description');?></textarea>
                                                </div>
                                                <div class="form-group m0">
                                                      <label><input type="checkbox" name="dns_noindex" <?=$pia->settings('dns_noindex')?'checked':'';?> /> DNS sonuçlarının indekslenmesini devre dışı bırak</label>
                                                </div>
                                          </div>
                                          <div class="widget">
                                                <div class="heading">Arama Formu</div>
                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="dns_form_title" class="form-control" value="<?=$pia->settings('dns_form_title');?>" placeholder="..."  />
                                                </div>
                                                <div class="form-group">
                                                      <label>Kısa Açıklama</label>
                                                      <textarea name="dns_form_subtitle" class="form-control"><?=$pia->settings('dns_form_subtitle');?></textarea>
                                                </div>
                                                <div class="form-group">
                                                      <label>INPUT Metni</label>
                                                      <input type="text" name="dns_form_input" class="form-control" value="<?=$pia->settings('dns_form_input');?>" placeholder="..."  /> 
                                                </div>
                                                <div class="form-group m0">
                                                      <label>BUTTON Metni</label>
                                                      <input type="text" name="dns_form_button"  class="form-control" value="<?=$pia->settings('dns_form_button');?>" placeholder="..."  />
                                                </div>
                                          </div>

                                          <div class="widget" >

                                                <div class="heading">Son Kayıtlar</div>

                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="dns_recently_title" class="form-control" value="<?=$pia->settings('dns_recently_title');?>"  />
                                                </div>
                                                <div class="form-group">
                                                      <label>Kayıt adeti</label>
                                                      <input type="text" name="dns_recently_count" class="form-control" value="<?=$pia->settings('dns_recently_count');?>"  />
                                                </div>
                                                <div class="form-group m0">
                                                      <label><input type="checkbox" name="dns_recently_status" <?=$pia->settings('dns_recently_status')?'checked':'';?> /> Aktif</label>
                                                </div>     
                                          </div>

                                          <div class="widget" >
                                                <div class="heading">Seo Metni</div>
                                                <textarea name="dns_article" class="ckeditor"><?=$pia->settings('dns_article');?></textarea>
                                          </div>
                                    </div>
                                    <div  class="tab-pane " id="tab-ssl">

                                          <div class="widget" >

                                                <div class="heading">SSL Sayfası</div>

                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="ssl_meta_title" class="form-control" value="<?=$pia->settings('ssl_meta_title');?>"  />
                                                </div>

                                                <div class="form-group m0">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="ssl_meta_description" class="form-control"><?=$pia->settings('ssl_meta_description');?></textarea>
                                                </div>

                                         </div>

                                          <div class="widget">
                                                
                                                <div class="heading">Sonuç Sayfası</div>
                                               
                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="ssl_checker_title" class="form-control" value="<?=$pia->settings('ssl_checker_title');?>" />
                                                </div>
                                                <div class="form-group">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="ssl_checker_description" class="form-control" ><?=$pia->settings('ssl_checker_description');?></textarea>
                                                </div>
                                                      
                                                <div class="form-group m0">
                                                      <label><input type="checkbox" name="ssl_noindex" <?=$pia->settings('ssl_noindex')?'checked':'';?> /> Disable indexing of SSL results</label>
                                                      
                                                </div> 
                                         </div>

                                          <div class="widget" >
                                                <div class="heading">Arama Formu</div>
                                       
                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="ssl_form_title" class="form-control" value="<?=$pia->settings('ssl_form_title');?>" placeholder="..."  />
                                                </div>
                                                <div class="form-group">
                                                      <label>Kısa Açıklama</label>
                                                      <textarea name="ssl_form_subtitle" class="form-control"><?=$pia->settings('ssl_form_subtitle');?></textarea>
                                                </div>
                                                <div class="form-group">
                                                      <label>INPUT Metni</label>
                                                      <input type="text" name="ssl_form_input" class="form-control" value="<?=$pia->settings('ssl_form_input');?>" placeholder="..."  /> 
                                                </div>
                                                <div class="form-group m0">
                                                      <label>BUTTON Metni</label>
                                                      <input type="text" name="ssl_form_button"  class="form-control" value="<?=$pia->settings('ssl_form_button');?>" placeholder="..."  />
                                                </div>
                                         </div>

                                          <div class="widget" >
                                                <div class="heading">Son Kayıtlar</div>
                                         
                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="ssl_recently_title" class="form-control" value="<?=$pia->settings('ssl_recently_title');?>"  />
                                                </div>
                                                <div class="form-group">
                                                      <label>Kayıt Adeti</label>
                                                      <input type="text" name="ssl_recently_count" class="form-control" value="<?=$pia->settings('ssl_recently_count');?>"  />
                                                </div>
                                                <div class="form-group m0">
                                                      <label><input type="checkbox" name="ssl_recently_status" <?=$pia->settings('ssl_recently_status')?'checked':'';?> /> Aktif</label>
                                                </div>
                                         </div>

                                          <div class="widget" >
                                                <div class="heading">SEO Metni</div>
                                                <textarea name="ssl_article" class="ckeditor"><?=$pia->settings('ssl_article');?></textarea>
                                          </div>

                                    </div>
                                    <div  class="widget tab-pane " id="tab-404">
                                          <div class="heading">404 Sayfası</div>
                                              
                                          <div class="form-group">
                                                <label>Başlık</label>
                                                <input type="text" name="not_found_title" class="form-control" value="<?=$pia->settings('not_found_title');?>"  />
                                          </div>
                                          <div class="form-group m0">
                                                <label>Açıklama</label>
                                                <textarea name="not_found_description" class="form-control"><?=$pia->settings('not_found_description');?></textarea>
                                          </div>

                                    </div>
                                  
                                    <div  class="tab-pane " id="tab-contact">
                                          <div class="widget">
                                                <div class="heading">İletişim Sayfası</div>
                                                <div class="form-group">
                                                      <label>META TITLE</label>
                                                      <input type="text" name="contact_meta_title" class="form-control" value="<?=$pia->settings('contact_meta_title');?>" placeholder="..." />
                                                </div>
                                                <div class="form-group m0">
                                                      <label>META DESCRIPTION</label>
                                                      <textarea name="contact_meta_description" class="form-control" placeholder="..."  ><?=$pia->settings('contact_meta_description');?></textarea>
                                                </div>
                                          </div>
                                          <div class="widget">
                                                <div class="heading">İletişim Formu</div>
                                                <div class="form-group">
                                                      <label>Başlık</label>
                                                      <input type="text" name="contact_form_title" class="form-control" value="<?=$pia->settings('contact_form_title');?>" placeholder="..." />
                                                </div>
                                                <div class="form-group m0">
                                                      <label>Kısa Açıklama</label>
                                                      <textarea name="contact_form_description" class="form-control" placeholder="..."  ><?=$pia->settings('contact_form_description');?></textarea>
                                                </div>
                                          </div>
                                          <div class="widget">
                                                <div class="heading">İletişim Bilgileri</div>

                                             
                                                <div class="form-group">
                                                      <label>Telefon</label>
                                                      <input type="text" name="contact_phone" class="form-control" value="<?=$pia->settings('contact_phone');?>" placeholder="..."  />
                                                </div>
                                                <div class="form-group">
                                                      <label>WhatsApp</label>
                                                      <input type="text" name="contact_whatsapp" class="form-control" value="<?=$pia->settings('contact_whatsapp');?>" placeholder="..."  />
                                                </div>
                                                <div class="form-group">
                                                      <label>E-mail</label>
                                                      <input type="email" name="contact_email" class="form-control" value="<?=$pia->settings('contact_email');?>" placeholder="..."  /> 
                                                </div>
                                                <div class="form-group m0">
                                                      <label>Address</label>
                                                      <input type="text" name="contact_address"  class="form-control" value="<?=$pia->settings('contact_address');?>" placeholder="..."  />
                                                </div>
                                          </div>
                                    </div>
                                    <div class="widget tab-pane " id="tab-social">
                                          <div class="heading">Sosyal Ağlar</div>
                                          <div class="form-group">
                                                <label>FACEBOOK</label>
                                                <input type="text" name="facebook" class="form-control" value="<?=$pia->settings('facebook');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>TWITTER</label>
                                                <input type="text" name="twitter" class="form-control" value="<?=$pia->settings('twitter');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>INSTAGRAM</label>
                                                <input type="text" name="instagram" class="form-control" value="<?=$pia->settings('instagram');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>YOUTUBE</label>
                                                <input type="text" name="youtube" class="form-control" value="<?=$pia->settings('youtube');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>LINKEDIN</label>
                                                <input type="text" name="linkedin" class="form-control" value="<?=$pia->settings('linkedin');?>" placeholder="..." />
                                          </div>
                                    </div>
                                   
                                    <div  class="widget tab-pane " id="tab-maintenance">
                                          <div class="heading">Bakım Modu</div>
                                            
                                                   
                                          <div class="form-group">
                                                <label>Başlık</label>
                                                <input type="text" name="maintenance_title" class="form-control" value="<?=$pia->settings('maintenance_title');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>Açıklama</label>
                                                <textarea class="form-control" name="maintenance_description"><?=$pia->settings('maintenance_description');?></textarea>
                                          </div>
                                          <div class="form-group m0">
                                                <label><input type="checkbox" name="maintenance_status" <?=$pia->settings('maintenance_status')?'checked':'';?> /> Aktif</label>
                                          </div>              
                                    </div>
                                   
                                    <div  class="widget tab-pane " id="tab-api">
                                         
                                          <div class="heading">GoDaddy API</div>
                                  
                                          <div class="form-group">
                                                <label>API KEY</label>
                                                <input type="text" name="godaddy_api_key" class="form-control" value="<?=$pia->settings('godaddy_api_key');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>API SECRET</label>
                                                <input type="text" name="godaddy_secret_key" class="form-control" value="<?=$pia->settings('godaddy_secret_key');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group">
                                                <label>LIMIT</label>
                                                <input type="text" name="godaddy_limit" class="form-control" value="<?=$pia->settings('godaddy_limit');?>" placeholder="..." />
                                          </div>
                                          <div class="form-group m0">
                                                <label><input type="checkbox" name="godaddy_status" <?=$pia->settings('godaddy_status')?'checked':'';?> /> Aktif</label>
                                          </div>
                                             
                                    </div>
                               

                                    <div  class="widget tab-pane " id="tab-robots">

                                          <div class="heading">Robots.txt</div>

                            
                                          <textarea class="form-control" name="robots" style="height:500px;"><?=file_get_contents('../robots.txt');?></textarea>
                                          
                                            
                                    </div>

                                    <div  class="widget tab-pane " id="tab-custom">

                                          <div class="heading">Özel Kodlar</div>

                            
                                          <div class="form-group">
                                                <label>&lt;head&gt;&lt;/head&gt;</label>
                                                <textarea class="form-control" name="head"><?=$pia->settings('head');?></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>&lt;body&gt;&lt;/body&gt;</label>
                                                <textarea class="form-control" name="body"><?=$pia->settings('body');?></textarea>
                                          </div>
                                          <div class="form-group m0">
                                                <label>&lt;footer&gt;&lt;/footer&gt;</label>
                                                <textarea class="form-control" name="footer"><?=$pia->settings('footer');?></textarea>
                                          </div>
                                                      
                                            
                                    </div>
                                   

                                   

                                    
                                  
                                   
                                   
                                    <input type="hidden" name="frm" value="frmSettings" />           
                          

                        </div>
                  </div>
           </form>
            <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
            <script>autosize($('textarea'));</script>
      </body>
</html>
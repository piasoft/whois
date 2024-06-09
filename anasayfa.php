<!DOCTYPE html>

<html lang="tr">

	<head>

            <?php 
                  $meta_title = $pia->settings('home_title');
                  $meta_description = $pia->settings('home_description');
                  require('_inc/head.php'); 
            ?>
	  
      
	</head>


	<body class="index">

            <?php require('_inc/header.php'); ?>
    
            
           

            <?php if($header_ad){ ?><div class="ad"><?=$header_ad;?></div> <?php } ?>

            <div class="search">
			<h1><?=$home_form_title;?></h1>
                  <p><?=$home_form_subtitle;?></p>
                  <form class="looking" autocomplete="off">
                        <input type="text" name="domain" class="form-control" placeholder="<?=$home_form_input;?>" value="<?=@$domain;?>" required />
                        <button type="submit" class="btn btn-primary" ><?=$home_form_button;?></button>
                        <input type="hidden" name="frm" value="<?=$home_form;?>" />
                  </form>
		</div>
            
        
     
           
            <div class="container">

                  <div class="section faq">

                        <div class="collapse open">

                              <h2 class="title">Alan Adı Whois Nedir? <i class="fal fa-angle-down"></i></h2>

                              <div class="content">

                                    <p>Domain Whois, bir alan adının sahibi, son kullanma tarihi, kayıt tarihi gibi bilgileri içeren alan adı kimliğidir. Kayıtlı bir alan adı için "domain sahibi kim?" sorusunun cevabı Whois sonucuyla ortaya çıkıyor. Alan adı Whois sorgusu gerçekleştirerek aşağıdaki gibi bilgilere hızlı bir şekilde ulaşabilirsiniz:</p>
                                    
                                     <ul>
                                           <li>Alan sahibi</li>
                                           <li>Alan adı kayıt tarihi</li>
                                           <li>Alan adı güncelleme tarihi</li>
                                           <li>Alan adı son kullanma tarihi</li>
                                    </ul>

                              </div>
                        </div>

                        <div class="collapse">

                              <h3 class="title">Whois nasıl çalışır? <i class="fal fa-angle-down"></i></h3>
                              <div class="content">

                                    <p>Whois'in çalışma yöntemi, alan adı uzantısına ilişkin verilerin, alan adı uzantısını yöneten Tescil şirketine veya resmi kayıt şirketlerinin barındırdığı bir Whois sunucusuna, yetkili IP adresleri ve veri tabanına güvenlik koşulları tahsis eden özel anlaşmalar aracılığıyla iletilmesini içerir.</p>
                              
                              </div>

                        </div>
                        <div class="collapse">

                              <h3 class="title">Özel Whois kaydı/bilgisi nedir?<i class="fal fa-angle-down"></i></h3>

                              <div class="content">

                               <p>Bazı alan adlarının Whois bilgileri gizlidir. Bu duruma domain Whois koruması adı verilmektedir. Whois koruması olan alan adlarının sahipleri veya mali ve teknik yöneticileriyle iletişime geçmek için Whois bilgilerinin gizliliğini korumaktan sorumlu proxy servisine bildirimde bulunmak gerekir.</p>

                                     <p>ICANN kurallarına göre Whois koruma hizmeti sağlayıcısının kendi kanalları üzerinden aldığı bildirimleri gizli Whois bilgileriyle alan adı sahibine iletmesi gerekiyor. Bu yükümlülük beyan esasına dayandığından, tüm Whois verilerinin doğru ve güncel olması öncelikli olarak gizli Whois sahibi alan adı sahibinin sorumluluğundadır.</p>
                              
                              </div>

                        </div>
                        <div class="collapse">

                              <h3 class="title">WHOIS verileri ne kadar doğrudur?i class="fal fa-angle-down"></i></h3>
                              <div class="content">

                                <p>ICANN, WHOIS veritabanının doğru bilgiler içermesini sağlamak için kurallar oluşturmuştur. Alan adı sahiplerinin bilgileri değişebileceği için Atak Domain gibi alan adı kuruluşları, alan adı sahiplerine WHOIS alan adı verilerinin incelenmesi ve güncellenmesi için yıllık e-postalar göndermektedir. ICANN kurallarına göre WHOIS bilgilerini güncellemeyi reddetmek veya yanlış bilgi vermek, alan adresinin askıya alınmasına veya iptal edilmesine neden olabilir.</p>

                                     <p>ICANN, kullanıcıların şikayette bulunmasına olanak tanır ve WHOIS alan adı arama verilerinin eksik veya yanlış olduğunu tespit etmeleri durumunda sorunların çözümünü kolaylaştırır. Şikayet olması durumunda alan adı kayıt kuruluşlarının WHOIS bilgilerini derhal düzeltmesi ve doğrulaması gerekir.</p>
                        
                              </div>


                        </div>
                        <div class="collapse">

                              <h3 class="title">WHOIS bilgilerimi nasıl güncellerim?<i class="fal fa-angle-down"></i></h3>

                              <div class="content">

                                          <p>WHOIS bilgileri genellikle alan adı kayıt kuruluşunuzun kontrol panelindeki "Alan Adı Yönetimi" veya "Alan Adı Ayarları" bölümünde bulunur. Oradan WHOIS bilgilerinizi güncelleyebilirsiniz. Alan adınızın WHOIS bilgilerini güncelleme işlemini birkaç basit adımda kolaylıkla tamamlayabilir, iletişim bilgilerinizin güncel kalmasını sağlayabilirsiniz. ICANN kurallarına uymak ve WHOIS yazışmalarını doğru e-posta adresine aldığınızdan emin olmak için WHOIS bilgilerinizi güncel tutmanız önemlidir.</p>
                              
                              </div>

                        </div>
                        <div class="collapse">

                              <h3 class="title">Domain Whois Gizliliği Neden Önemlidir?<i class="fal fa-angle-down"></i></h3>

                              <div class="content">
                                    
                                   <p>Alanınızın Whois gizliliğini iptal ederseniz, Whois sorgusu yapan herkes tüm Whois bilgilerinize erişebilir. Bu, genellikle spam olarak bilinen istenmeyen e-postaların alınmasına veya elde edilen alan bilgilerine dayalı olarak reklam e-postalarının hedeflenmesine neden olabilir.</p>
                              </div>
                        </div>
                        <div class="collapse">

                              <h3 class="title">Whois Sorgusunda Hangi Bilgiler Görüntülenir? <i class="fal fa-angle-down"></i></h3>

                              <div class="content">

                                 <p>Whois sorgusu yaptığınızda alan adı gizliliği etkin değilse Whois veritabanında bulunan bilgiler görüntülenebilir. Domain Whois gizliliği aktif ise hiçbir bilgi görünmeyecektir. Alan adı gizliliği etkin değilse ve Whois sorgusu gerçekleştirirseniz erişilebilir bilgiler genellikle şunları içerir:</p>
                                    
                                     <ul>
                                           <li>Alan sahibinin adı</li>
                                           <li>Alan sahibinin adresi</li>
                                           <li>Alan sahibinin e-posta adresi</li>
                                           <li>Alan sahibinin telefon numarası</li>
                                     </ul>
                              </div>
                        </div>
                        <div class="collapse">

                              <h3 class="title">Domain Whois Bilgilerini Gizlemeli miyim?<i class="fal fa-angle-down"></i></h3>

                              <div class="content">

                                   <p>Whois gizliliğini etkinleştirmek kişisel bir seçimdir, ancak kişisel bilgilerinizin açığa çıkmasını ve potansiyel olarak kötüye kullanılmasını önlemek önemle tavsiye edilir. Whois gizliliği etkinleştirilmediğinde tüm kişisel kimlik bilgileriniz sorgu yapan herkes tarafından görüntülenebilir.</p>
                              
                              </div>
                        </div>

                        <div class="collapse">

                              <h3 class="title">Whois Bilgileri ICANN Whois Veritabanında Saklanıyor mu?<i class="fal fa-angle-down"></i></h3>
                              <div class="content">

                                 <p>Genişletilebilir Hazırlama Protokolü (EPP) alan adı durum kodları olarak da adlandırılan bir alan adının durum kodları, kayıtlı bir alan adının durumunu gösterir. Her alanın bir veya daha fazla durum kodu olabilir.</p>

                                     <p>EPP kodunu kullanarak alan adı adresinizin durumunu kolaylıkla belirleyebilirsiniz. Daha fazla bilgi için ICANN EPP Kodu Açıklamalarına bakmanızı öneririz.</p>
                              
                              </div>

                        </div>

                  </div>
            </div>

                
	      <?php require('_inc/footer.php'); ?>
	</body>

</html>
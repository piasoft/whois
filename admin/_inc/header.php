<div class="header">

      <a href="main.php"  class="logo"><i class="far fa-home"></i> </a>
      

      <nav class="menu">

            <a href="reports.php">Sorgular</a>
            <a href="tlds.php">Uzantılar</a>
            <a href="pages.php">Sayfalar</a>
            <a href="messages.php">Mesajlar</a>
            <a href="blocked.php">Engellenenler</a>
            <a href="ads.php">Reklam Yönetimi</a>
            <a href="users.php">Kullanıcılar</a>
            <a href="settings.php">Ayarlar</a>
      
      </nav>

      <nav class="right">
            <a onClick="_cache();" target="_blank"><i class="fa fa-trash"></i> <span>Önbelleği temizle</span></a>
            <a href="<?=$pia->base_url();?>" target="_blank"><i class="fa fa-external-link"></i> <span>Siteye git</span></a>
            <a href="users.php?edit=<?=$admin->id;?>" class="profile"><i class="fa fa-user"></i> <span><?=$admin->fullname;?></span></a>
            <a href="logout.php" class="logout"><i class="fa fa-power-off"></i> <span>Çıkış yap</span></a>
            <a class="toggle"><i class="fa fa-bars"></i></a>
      </nav>
</div>

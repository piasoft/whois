<?php require('../_class/config.php'); if(isset($admin->id)){ echo '<script>window.location.href="main.php";</script>'; }  ?>
<!DOCTYPE html>
<html>
      <head>
           <?php require('_inc/head.php'); ?>
           <style>.logo {margin-bottom:30px;text-align: center;} .logo img {max-width: 50%;width:50%;}</style>
      </head>
      <body class="login">

        
                  <form class="form" action="_ajax/_ajaxLogin.php" method="post" autocomplete="off">
                          
                        <div class="logo"><img src="../uploads/<?=$pia->settings('logo');?>" /></div>
                        <div class="form-group">
                              <label>EMAIL</label>
                              <input type="email" name="email"  class="form-control"  required  />
                        </div>
                        <div class="form-group m0">
                              <label>PASSWORD</label>
                              <input type="password" name="password" class="form-control" required />
                        </div>
                        <div class="actions">
                              <button type="submit" class="btn-primary btn-block" >LOGIN</button>
                        </div>
                        <input type="hidden" name="frm" value="frmLogin" />
                  </form>
                  
                  <?php  require('_inc/footer.php'); ?>

         
          
      </body>
</html>

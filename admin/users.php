<?php require('../_class/config.php'); require('session.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <?php require('_inc/head.php');   ?>
      </head>
      <body>
            <?php require('_inc/header.php'); ?>
            <div class="container">


                        <div class="tools">
                              <div class="left">KULLANICILAR</div>
                              <div class="right"><a href="users.php?add" class="btn-success btn-sm">Yeni ekle</a></div>
                        </div>





                        <table id="users" class="table">
                              <thead>
                                    <div class="form-group">
                                          <th>Ad soyad</th>
                                          <th>Email</th>
                                          <th class="text-right"></th>
                                    </div>
                              </thead>
                              <tbody>
                                 
                              </tbody>
                        </table>
                  

           </div>

                  <?php if(isset($_GET['add'])){ ?>

                        <div class="modal active" tabindex="-1" role="dialog">

                                    <form class="widget normal" method="post" action="_ajax/_ajaxAddUsers.php" autocomplete="off">
                                          <div class="heading">
                                                <div class="left">Yeni ekle</div>
                                                <div class="right"><a href="users.php"><i class="fal fa-times"></i></a></div>
                                          </div>
                                                <div class="form-group">
                                                      <label>Ad soyad</label>
                                                      <input type="text" name="fullname" class="form-control" required />
                                                </div>
                                               
                                                <div class="form-group">
                                                      <label>E-mail</label>
                                                      <input type="email" name="email" class="form-control" required />
                                                </div>
                                         
                                                <div class="form-group">
                                                      <label>Şifre</label>
                                                      <input type="password" name="password" class="form-control"  required />
                                                </div> 
                                      
                                               
                                                <button type="submit" class="btn-primary">Kaydet</button>
                                                <a href="users.php" class="btn-danger">Vazgeç</a>
                                          <input type="hidden" name="frm" value="frmAddUsers" />
                                    </form>
                        </div>
                  <?php 
                        }elseif(isset($_GET['edit'])){ 

                        $edit_id = $pia->control($_GET['edit'],'int');
                        $edit_row = $pia->get_row("SELECT * FROM users WHERE id=$edit_id");
                  ?>

                        <div class="modal active" >
                                    <form class="widget normal" action="_ajax/_ajaxEditUsers.php" method="post"  autocomplete="off">
                                          <div class="heading">
                                                <div class="left">Düzenle</div>
                                                <div class="right"><a href="users.php"><i class="fal fa-times"></i></a></div>
                                          </div>
                                                
                                          <div class="form-group">
                                                <label>Ad soyad *</label>
                                                <input type="text" name="fullname" class="form-control" value="<?=$edit_row->fullname;?>" />
                                          </div>
                                         
                                          <div class="form-group">
                                                <label>E-mail * </label>
                                                <input type="email" name="email" class="form-control" value="<?=$edit_row->email;?>"  />
                                          </div>
                                 
                                          <div class="form-group">
                                                <label>Şifre </label>
                                                <input type="password" name="password" class="form-control"  />
                                          </div> 
                                  
                                          <button type="submit" class="btn-primary">Kaydet</button>
                                          <a href="users.php" class="btn-danger">Vazgeç</a>
                                          <input type="hidden" name="edit_id" value="<?=$edit_row->id;?>" />       
                                          <input type="hidden" name="frm" value="frmEditUsers" />    
                                    </form>
                        </div>
                  <?php } ?>


     </body>

</html>


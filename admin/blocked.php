<?php require('../_class/config.php'); require('session.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <?php require('_inc/head.php'); ?>
      </head>
      <body>
            <?php require('_inc/header.php'); ?>

            <div class="container">
              


                  <div class="tools">
                        <div class="left">ENGELLENENLER</div>
                        <div class="right"><a href="blocked.php?add" class="btn-success btn-sm">Yeni ekle</a></div>
                  </div>



                  <table id="blocked" class="table">
                        <thead>
                              <tr>
                                    <th>ALAN ADI</th>
                                    <th class="text-right"></th>
                              </tr>
                        </thead>
                        <tbody>
                        </tbody>
                  </table>
          

            </div>

            <?php if(isset($_GET['add'])){ ?>
                  <div class="modal active">
                              <form class="widget normal" method="post" action="_ajax/_ajaxAddBlocked.php"  autocomplete="off">
                                    <div class="heading">
                                          <div class="left">Yeni ekle</div>
                                          <div class="right"><a href="blocked.php"><i class="fal fa-times"></i></a></div>
                                    </div>
                                    <div class="form-group">
                                        
                                          <input type="text" name="domain" class="form-control" placeholder="domain.com"  required />
                                         
                                    </div>
                                    <button type="submit" class="btn-primary">Save</button>
                                    <a href="blocked.php" class="btn-danger">Cancel</a>
                                    <input type="hidden" name="frm" value="frmAddBlocked" />
                              </form>
                  </div>
            <?php 
                  }elseif(isset($_GET['edit'])){ 
                        $edit_id = $pia->control($_GET['edit'],'int');
                        $edit_row = $pia->get_row("SELECT * FROM blocked WHERE id=$edit_id");
            ?>

                  <div class="modal active">
                        <form class="widget normal" method="post" action="_ajax/_ajaxEditBlocked.php" autocomplete="off">
                               <div class="heading">
                                    <div class="left">Düzenle</div>
                                    <div class="right"><a href="blocked.php"><i class="fal fa-times"></i></a></div>
                              </div>
                              <div class="form-group">
                                    <input type="text" name="domain" class="form-control" value="<?=$edit_row->domain;?>" placeholder="domain.com"  required />
                              </div>
                              <button type="submit" class="btn-primary">Save</button>
                              <a href="blocked.php" class="btn-danger">Cancel</a>
                              <input type="hidden" name="edit_id" value="<?=$edit_row->id;?>" />
                              <input type="hidden" name="frm" value="frmEditBlocked" />
                        </form>
                  </div>
            <?php } ?>

      </body>
</html>

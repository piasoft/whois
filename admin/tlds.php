<?php require('../_class/config.php'); require('session.php');  ?>
<!DOCTYPE html>
<html>
      <head>
            <?php require('_inc/head.php'); ?>
      </head>
      <body>
            <?php require('_inc/header.php'); ?>
            <div class="container">
                  
                        <div class="tools">
                              <div class="left">Uzantılar</div>
                              <div class="right"><a href="tlds.php?add" class="btn-success btn-sm">Yeni ekle</a></div>
                        </div>
                        <table id="tlds" class="table">
                              <thead>
                                    <tr>
                                       
                                          <th>TLD</th>
                                          <th>SERVER</th>
                                          <th></th>
                                   </tr>
                              </thead>
                              <tbody>
                              </tbody>
                        </table>
            </div>

            <?php if(isset($_GET['add'])){ ?>
                  <div class="modal active">
                        <form class="widget normal" method="post" action="_ajax/_ajaxAddTlds.php"  autocomplete="off">
                              <div class="heading">
                                    <div class="left">Yeni ekle</div>
                                    <div class="right"><a href="tlds.php"><i class="fal fa-times"></i></a></div>
                              </div>
                                  
                              <div class="form-group">
                                    <label>TLDS</label>
                                    <input type="text" name="tld" class="form-control" placeholder="com"  required />
                              </div>
                              <div class="form-group">
                                    <label>SERVER</label>
                                    <input type="text" name="server" class="form-control"  placeholder="whois.nic.tr" required />
                              </div>
                              <div class="form-group">
                                    <label>PORT</label>
                                    <input type="number" name="port" class="form-control"  placeholder="43" required />
                              </div>
                                   

                              
                              <button type="submit" class="btn-primary">Kaydet</button>
                              <a href="tlds.php" class=" btn-danger">Sil</a>
                              <input type="hidden" name="frm" value="frmAddTlds" />
                        </form>
                  </div>
            <?php 
                  }elseif(isset($_GET['edit'])){ 
                        $edit_id = $pia->control($_GET['edit'],'int');
                        $edit_row = $pia->get_row("SELECT * FROM tlds WHERE id=$edit_id");
            ?>

                  <div class="modal active">
                        <form class="widget normal" method="post" action="_ajax/_ajaxEditTlds.php" autocomplete="off">
                               <div class="heading">
                                    <div class="left">Düzenle</div>
                                    <div class="right"><a href="tlds.php"><i class="fal fa-times"></i></a></div>
                              </div>
                            
                              <div class="form-group">
                                    <label>TLDS</label>
                                    <input type="text" name="tld" class="form-control" value="<?=$edit_row->tld;?>" placeholder="com"  required />
                              </div>
                              <div class="form-group">
                                    <label>SERVER</label>
                                    <input type="text" name="server" class="form-control" value="<?=$edit_row->server;?>" placeholder="whois.nic.tr" required />
                              </div>
                              <div class="form-group">
                                    <label>PORT</label>
                                    <input type="number" name="port" class="form-control" value="<?=$edit_row->port;?>"  placeholder="43" required />
                              </div>
                                   

                              
                              <button type="submit" class="btn-primary">Kaydet</button>
                              <a href="tlds.php" class=" btn-danger">Sil</a>
                              <input type="hidden" name="edit_id" value="<?=$edit_row->id;?>" />
                              <input type="hidden" name="frm" value="frmEditTlds" />
                        </form>
                  </div>
            <?php } ?>

     </body>
</html>


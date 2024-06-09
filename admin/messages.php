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
                        <div class="left">Mesajlar</div>
                        <div class="right"></div>
                  </div>

           
                  <table id="messages" class="table">
                        <thead>
                              <tr>
                                 <th>Ad soyad</th>
                                 <th>E-mail</th>
                                 <th>Telefon</th>
                                 <th width="100px">Durum</th>
                                 <th></th>
                             </tr>
                        </thead>
                        <tbody>
                              
                        </tbody>
                  </table>
            </div>

            <?php if(isset($_GET['edit'])){ 
                        $edit_id = $pia->control($_GET['edit'],'int');
                        $edit_row = $pia->get_row("SELECT * FROM messages WHERE id=$edit_id");
            ?>
           
                  <div class="modal active">
                              <form class="widget normal" method="post" action="_ajax/_ajaxMessages.php" autocomplete="off">
                                    <div class="heading">
                                          <div class="left"><?=$edit_row->fullname;?></div>
                                          <div class="right"><a href="messages.php"><i class="fal fa-times"></i></a></div>
                                    </div>
                                          
                                    <div class="form-group">
                                          <label>Ad soyad :</label> <?=$edit_row->fullname;?>
                                    </div>

                                    <div class="form-group">
                                          <label>E-mail :</label> <?=$edit_row->email;?>
                                    </div>

                                    <div class="form-group">
                                          <label>Telefon :</label> <?=$edit_row->phone;?>
                                    </div>
                                    <div class="form-group">
                                          <label>Mesaj :</label> <?=$edit_row->description;?>
                                    </div>
                                    <div class="form-group">
                                          <label>Durum</label>
                                          <select name="status">
                                                <option value="1" <?=$edit_row->status==1?'selected':'';?>>Okundu olarak işaretle</option>
                                                <option value="0" <?=$edit_row->status==0?'selected':'';?>>Okunmadı olarak işaretle</option>
                                          </select>
                                    </div> 
                                       
                                    <button type="submit" class="btn-primary">Kaydet</button>
                                    <a href="messages.php" class="btn-danger">Vazgeç</a>
                                    <input type="hidden" name="edit_id" value="<?=$edit_row->id;?>" />
                                    <input type="hidden" name="frm" value="frmMessages" />
                              </form>
                        </div>
                  </div>
            <?php } ?>

     </body>
</html>


<?php require('../_class/config.php'); require('session.php'); ?>
<!DOCTYPE html>
<html>
      <head>
          <?php require('_inc/head.php');  ?>

      </head>
      <body>
            <?php require('_inc/header.php'); ?>
            <div class="container">
                  <?php if(isset($_GET['add'])){  ?>
                        <form class="widget" action="_ajax/_ajaxAddPages.php" method="post" autocomplete="off">
                            
                              <div class="heading">Yeni ekle</div>

                              <div class="form-group">
                                    <label>Sayfa adı</label>
                                    <input type="text" name="title" class="form-control" required />
                              </div>
                             
                              <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea name="description" class="ckeditor"></textarea>
                              </div>
                  
                              <div class="form-group">
                                    <label>Durum</label>
                                    <select name="status" class="form-control">
                                          <option value="1">Aktif</option>
                                          <option value="0">Pasif</option>
                                    </select>
                              </div>
                              <button type="submit" class="btn-primary">Kaydet</button>
                              <a href="pages.php" class="btn-danger">Vazgeç</a>
                                    
                              <input type="hidden" name="frm" value="frmAddPages" />
                        </form>
                  <?php 
                        }elseif(isset($_GET['edit'])){ 
                              $edit_id = $pia->control($_GET['edit'],'int');
                              $edit_row = $pia->get_row("SELECT * FROM pages WHERE id=$edit_id");
                  ?>
                        
                        <form class="widget" action="_ajax/_ajaxEditPages.php" method="post" autocomplete="off">

                              
                              <div class="heading">Düzenle</div>
                      
                              <div class="form-group">
                                    <label>Sayfa adı</label>
                                    <input type="text" name="title" class="form-control" value="<?=$edit_row->title;?>" required />
                              </div>
                              
                              <div class="form-group">
                                    <label>Açıklama</label>
                                    <textarea name="description" class="ckeditor"><?=$edit_row->description;?></textarea>
                              </div>
                               <div class="form-group">
                                    <label>Durum</label>
                                    <select name="status" class="form-control">
                                          <option value="1" <?=$edit_row->status==1?'selected':'';?>>Aktif</option>
                                          <option value="0" <?=$edit_row->status==0?'selected':'';?>>Pasif</option>
                                    </select>
                              </div>
                              
                    
                              <button type="submit" class="btn-primary">Kaydet</button>
                              <a href="pages.php" class="btn-danger">Vazgeç</a>
                                    
                              <input type="hidden" name="edit_id" value="<?=$edit_row->id;?>" />       
                              <input type="hidden" name="frm" value="frmEditPages" />        
                        </form>
                            
                  <?php }else{ ?>


                        <div class="tools">
                              <div class="left">Sayfalar</div>
                              <div class="right"><a href="pages.php?add" class="btn-success btn-sm">Yeni ekle</a></div>
                        </div>


                        
                        <table id="pages" class="table">
                              <thead>
                                    <tr>
                                         <th>Sayfa adı</th>
                                         <th width="150px">Durum</th>
                                          <th></th>
                                    </tr>
                              </thead>
                              <tbody></tbody>
                        </table>
                  <?php } ?>
            </div>
        
             
     </body>
</html>

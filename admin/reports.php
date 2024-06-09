<?php require('../_class/config.php'); require('session.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <?php 
                  require('_inc/head.php'); 
                  if(isset($_GET['clear'])){
                        $pia->exec("DELETE FROM records");
                        exit('<script>window.location.href="reports.php";</script>');
                  }
            ?>
      </head>
      <body>
            <?php require('_inc/header.php'); ?>

            <div class="container">
                  
                   <div class="tools">
                        <div class="left">SORGULAR</div>
                        <div class="right">
                              <a href="export.php" class="btn-info btn-sm">Dışarı aktar</a>
                              <a href="reports.php?clear" class="btn-danger btn-sm">Tümünü sil</a>
                        </div>
                  </div>

               
                  <table id="reports" class="table">
                        <thead>
                              <tr>
                                    <th>ALAN ADI</th>
                                    <th>MODÜL</th>
                                    <th>TARAYICI</th>
                                    <th>PLATFORM</th>
                                    <th>IP</th>
                                    <th class="text-right">TARİH</th>
                              </tr>
                        </thead>
                        <tbody>
                        </tbody>
                  </table>
            </div>
      </body>
</html>

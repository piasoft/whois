<?php require('../_class/config.php');  session_destroy();  $_SESSION = array();  setcookie('admin_id', false, time() - 7200, '/');  exit('<script>window.location.href="/";</script>');  ?>

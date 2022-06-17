<?php

    session_start();
    
   
    if (isset($_SESSION['connected']) && $_SESSION['role']=='0' ) {
    require_once('../vue/panel-admin.php');
  } 
  else if (isset($_SESSION['connected']) && $_SESSION['role']=='1' ){
  require_once('../vue/panel-gestionnaire.php');
  }
  else  {
    require_once('../vue/panel-user.php');
  }


?>
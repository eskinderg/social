<?php
//header('Location:/customframing');


   
    require_once 'config.php';
    
    require_once DIR_SYSTEM . 'bootstrap.php';
    require_once DIR_SYSTEM . 'controller.php';
    require_once DIR_SYSTEM . 'request.php';
  
    
    require_once DIR_SYSTEM . 'registry.php';
    require_once DIR_SYSTEM . 'session.php';
    
    require_once DIR_SYSTEM . 'loader.php';
    require_once DIR_SYSTEM .'model.php';
    
    require_once DIR_SYSTEM . 'db.php';
    
    require_once DIR_LIBRARY . 'user.php';
    require_once DIR_LIBRARY . 'userprofile.php';
    
    require_once DIR_LIBRARY . 'document.php';
    require_once DIR_LIBRARY . 'mail.php';
    
   $app = new bootstrap();  //Start application

  



?>
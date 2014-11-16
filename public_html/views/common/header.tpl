<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
       
        <title></title>
        <base href="<?php echo $base;?>">  
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" type="text/css" href="<?php echo HTTP_SERVER;?>views/stylesheets/style.css" />
        
    <?php foreach ($styles as $style) { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo HTTP_SERVER . $style['href']; ?>" media="<?php echo $style['media']; ?>" />
    <?php } ?>

      
        <script type="text/javascript" src="<?php echo HTTP_SERVER;?>views/scripts/jquery/jquery-1.11.0.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_SERVER;?>views/scripts/jquery/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript" src="<?php echo HTTP_SERVER;?>views/scripts/jquery/jquery-ui-1.10.4.custom.min.js"></script>
    
    <?php foreach($scripts as $script) { ?>
        <script type="text/javascript" src="<?php echo $script; ?>"></script>
    <?php } ?>
    
</head>
    <body>
        
         
        
        <div id="header"> 
            <div id="main-title"> 
                
                <h1> <?php echo $header_title; ?> </h1>
            
            </div>
             

            
        
       
         
        </div>
      
        
        
        <div id="menu">
            
            
        <div id="links"> 
             <?php
             echo $logout_text;
             ?>
         </div>
          
            <?php 
                if(isset($dash))
                {
                  echo "<div id='profile_menu'>" . $dash . "</div>";
                }
            ?>
        
        
            

        <div id="menulist">  
            
            <?php 
             foreach ($menus as $menu => $href) 
             {
                 echo "<li><a href='/". $href . "'> ". $menu . "</a></li>";
             }

            ?>
        </div>
    </div>
        
        

        
          
          

          
              
          
               
        

    
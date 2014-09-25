<?php echo $header; ?>

<div id='content'>
    <div id='profile-container'>
        
        <div id='profile-header'>
            <div id='user-profile-picture' 
                 style=" border: 2px solid rgba(215, 215, 215, 1); 
                 display: inline-block;
                 position: relative;
                 background-repeat: no-repeat;
                 background-size: contain;
                 background-position: center center;">
            
                
                <img src="<?php echo $profile_picture; ?>" style="position:absolute;margin: auto;
                     max-height: 100%;max-width: 100%;top:0;bottom:0;left:0;right:0;">            
            </div>
            <div style="display: inline-block;">
                <h1><?php echo $profile_firstname . " " . $profile_lastname; ?></h1>
                <h3><?php echo $profile_email ?> </h3>
                <div style='padding:5px;'> <?php echo $profile_about;?></div>
            </div>

            <button id='' onclick="return false;" 
                    style="position: absolute; bottom:0; right:0; 
                    box-shadow: 0px 0px 4px #F0F0F0; margin-right: 10px;margin-bottom: 10px;
                    background-color: #EBEBEB; border:none;border: 1px solid #CCC;">
                <?php echo $button_text; ?></button>
        </div>
        
        
     <div id='profile-page-content'>   
       
        <div id='profile-menu'>
            <?php
                   foreach ($profile_menu as $key => $value)
                   {
                        $href=$profile_menu[$key]['href'];
                        $text=$profile_menu[$key]['title'];
                        
                        echo "<li><a href= $href>" .$text . "</a></li>";
                   }
               ?>
            
               
            
            <div id="datejoined" style="position: absolute;bottom:15px; left:16px; font-size:10px; color:#1F68D5">
                <?php
                    echo 'Joined ' . $profile_datejoined;
                ?>
            </div>
            <div style='clear: both;'></div>
        </div>
         
         <div id='profile-friends' style="padding:10px;width:805px;margin:auto;">
             
                   <?php
                   //var_dump($friends);
                    foreach($friends as $key=>$value)
                    {?>
                        <div id="friends-list">
                            <a href ="<?php echo HTTPS_SERVER . $friends[$key]['username']; ?>"> <span alt = "<?php echo $friends[$key]['UserId'] ?>"><?php echo ucfirst($friends[$key]['firstname']) . ' ' . ucfirst($friends[$key]['lastname']); ?> </span></a>
                            <div id='profile-list-email'><span><a href='#'><?php echo $friends[$key]['email']; ?></a></span></div>
                            <button href="<?php echo $friends[$key]['username']; ?>" alt = "<?php echo $friends[$key]['UserId'] ?>" id='btn-addfriend'><?php echo $friends[$key]['txt_button']; ?></button>

                            <div id="image">
                                <img style='max-width: 100%;max-height: 100%;position:absolute;margin: auto;top:0;left:0;bottom:0;right:0;' 
                                    src="<?php echo $friends[$key]['profilepicture']; ?>">
                            </div>

                            <div><img style='margin-top: 12px;' src="../image/mail.png"></div>
                         </div>
                    <?php }?>
                   
               </div>
         
         <!--
                <?php foreach ($friends as $friend)
                { 
                   ?>


                   <div id="friends-list">

                       <a href ="<?php echo HTTPS_SERVER . $friend['username']; ?>"> <span alt = "<?php echo $friend['UserId'] ?>"><?php echo ucfirst($friend['firstname']) . ' ' . ucfirst($friend['lastname']); ?> </span></a>
                       <div id='profile-list-email'><span><a href='#'><?php echo $friend['email']; ?></a></span></div>
                       <button href="<?php echo $friend['username']; ?>" alt = "<?php echo $friend['UserId'] ?>" id='btn-addfriend'><?php echo $friend['txt_button']; ?></button>
                       <div id="image"><img src="<?php echo $profile_pic; ?>"></div>
                       <div><img style='margin-top: 12px;' src="../image/mail.png"></div>
                   </div>


                  <?php 
                  }
              ?>
         
         
         -->
         
        <div style="clear:both;"></div>
     </div>
        
 </div>
  
</div>

<?php echo $footer; ?>
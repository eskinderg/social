<?php echo $header; ?>

<div id='content'>
    <h1></h1>
 <div id='dashboard-wrapper'>
            <?php echo $sidebar; ?>
            
            <!-- <h2>This is your dashboard  </h2>  -->
            <?php echo $panelleft; ?>

            <div id ='newsfeed'>
                <?php foreach ($friends as $user)
                {?>


                   <div id="friends-list">

                        <a href ="<?php echo HTTPS_SERVER . $user['username']; ?>"> <span alt = "<?php echo $user['UserId'] ?>"><?php echo ucfirst($user['firstname']) . ' ' . ucfirst($user['lastname']); ?> </span></a>
                       <div id='profile-list-email'><span><a href='#'><?php echo $user['email']; ?></a></span></div>
                       <button href="<?php echo $user['username']; ?>" alt = "<?php echo $user['UserId'] ?>" id='btn-addfriend'><?php echo $user['txt_button']; ?></button>
                       
                       <div id="image">
                           <img style='max-width: 100%;max-height: 100%;display:block;margin: auto;' 
                                src="<?php echo $user['profilepicture']; ?>">
                       </div>
                       
                       <div><img style='margin-top: 12px;' src="../image/mail.png"></div>
                   </div>


                  <?php 
                }
              ?>
            </div>
               <div style='clear:both;'></div>
            <div id='message-display'>
                <div>
                    <div></div>
                </div> 
            </div>

    </div>
</div>
              

<div id="friendsDetail" style="background-color: white; width:300px; height: 150px; display:none; position:absolute;">
    
</div>
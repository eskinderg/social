<?php echo $header; ?>

<div id="content">
    
    <!--    <div id='profile_menu'>
        <?php
            foreach($profile_menu as $menu => $href)
             {
             ?>       
             <li> <?php  echo "<a href='".$href."'>" . $menu . "</a>"; ?></li>
              <?php  
              }
         ?>

        </div>

 -->
    
    <div id='profile-left'>
        
        <div id='profile-picture' style="width:170px;height:170px; cursor: pointer;
        border: 2px solid darkgrey; text-align: center; vertical-align: central;">
                    <div id='profile-picture-edit'></div>
                   <!-- <img src="<?php echo $profile_pic; ?>">-->
        </div>
        
    <!--  <div style='padding:3px;'><textarea id='txtabout' name='about'><?php echo $about;?></textarea></div>-->   
    </div>
    
   <div id='profile-right'>
       
    <form action="<?php echo $action; ?>" method="post">
        <table>
            <tr><td colspan="2" class="profilelable">First Name</td></tr>
            <tr>
                <td><input type="text" id='txt-profile-firstname' name = 'txt-profile-firstname' value="<?php echo $first_name; ?>"> </td><td></td> 
            </tr>
            
            <tr><td colspan="2" class="profilelable">Last Name</td></tr>
            <tr>
                <td><input type="text" id="txt-profile-lastname" name='txt-profile-lastname'value="<?php echo $last_name; ?>"> </td> <td></td>
            </tr>
            
            <tr><td colspan="2" class="profilelable">E-Mail</td></tr>
             <tr>
                 <td><input type="text" id ='txt-profile-email' name='txt-profile-email' value="<?php echo $email; ?>" ></td> <td></td>
            </tr>
            
            <tr><td colspan="2" class="profilelable">Address</td></tr>
             <tr>
                 <td><input type="text" id ='txt-profile-address' name='txt-profile-address' value="<?php echo $address; ?>" ></td> <td></td>
            </tr>
            
            <tr><td colspan="2" class="profilelable">Occupation</td></tr>
             <tr>
                 <td><input type="text" id ='txt-profile-occupation' name='txt-profile-occupation' value="<?php echo $occupation; ?>" ></td> <td></td>
            </tr>
            
            <tr><td colspan="2" class="profilelable">Hobby</td></tr>
             <tr>
                 <td><input type="text" id ='txt-profile-hobby' name='txt-profile-hobby' value="<?php echo $hobby; ?>" ></td> <td></td>
            </tr>
            
            <tr><td colspan="2" class="profilelable">Height</td></tr>
             <tr>
                 <td><input type="text" id ='txt-profile-height' name='txt-profile-height' value="<?php echo $height; ?>" ></td> <td></td>
            </tr>
            
                        <tr><td colspan="2" class="profilelable">Sex</td></tr>
            <tr>
                <!--
                <?php if($sex)
                   { ?>
                   <td><input type="text" name='sex' value="<?php echo $sex; ?>" ></td> <td>E-Mail</td>
                    <?php 
                    }
                    else
                    {
                    ?>
                    <td> <a href="#">Add Gender</a></td><td></td>
                    <?php 
                    }
                    ?>
                -->
            </tr>

            <tr>
                <td><button id="btn-profile-save" type="submit">Save</button></td> <td></td>
            </tr>

        </table>
        
    </form>
       <div style="clear:both;"></div>
   </div>
   
</div>





<div id="profile-upload-dialog-background">  
</div>

<div id='profile-upload-wrapper'>
        <form method="post" action="tools/image" name ='photo' id='imageuploadform' enctype="multipart/form-data">
           <div id ="profile-upload-container">

               <div id='close-icon'></div>
               <div id="profile-picture-upload-content" style="padding:5px;"><h3>Upload Profile Picture</h3></div>
               <input type="file" id='imagebrowse' hidden='hidden' name="image" size='30'>

               <div id="profile-image-edit-container">
                   
                   <img src='<?php echo $profile_pic; ?>'>

                     <!--  <div id='profile-image-edit' style="display: none; ">
                       </div> -->


               </div>

               <button type="submit" id ='btn-upload' name="upload" style="line-height: 0px;float:right; width:100px;height:35px;font-size:13px;box-shadow: none;">Upload</button>
               <!-- <button type="button" id="btn-upload">Upload</button> -->
               <div id='profilephotouploadprogress' class='progressbar'>
                   <div id='uploadcompletedstatus'>Upload Completed</div>
                   <div id='progress'></div>
               </div>
           </div>
        </form>
</div>

 <div style="clear:both;"></div>

<?php echo $footer; ?>
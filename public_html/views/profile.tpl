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
                    <img src="<?php echo $profile_pic; ?>">
        </div>
        
      <div style='padding:3px;'><textarea id='txtabout' name='about'><?php echo $about;?></textarea></div>
    </div>
    
   <div id='profile-right'>
       
    <form action="<?php echo $action; ?>" method="post">
        <table>
            <tr><td colspan="2" style='text-align: left;'>First Name</td></tr>
            <tr>
                <td><input type="text" id='txt-profile-firstname' name = 'txt-profile-firstname' value="<?php echo $first_name; ?>"> </td><td><button id='btnname'>Update</button></td> 
            </tr>
            
            <tr><td colspan="2" style='text-align: left;'>Last Name</td></tr>
            <tr>
                <td><input type="text" id="txt-profile-lastname" name='txt-profile-lastname'value="<?php echo $last_name; ?>"> </td> <td><button onclick="return false;">Update</button></td>
            </tr>
            
            <tr><td colspan="2" style='text-align: left;'>E-Mail</td></tr>
             <tr>
                 <td><input type="text" id ='txt-profile-email' name='txt-profile-email' value="<?php echo $email; ?>" ></td> <td><button onclick="return false;">Update</button></td>
            </tr>
            
            <tr><td colspan="2" style='text-align: left;'>Sex</td></tr>
            <tr>
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
        <div id="profile-picture-upload-content"><h2>Upload Profile Picture</h2></div>
        <input type="file" id='imagebrowse' hidden='hidden' name="image" size='30'>
        
        <div id="profile-image-edit-container">
            <img src='<?php echo $profile_pic; ?>' style="position:absolute;margin:auto; 
                 top:0;bottom:0;left:0;right:0;
                 max-height: 100%; max-width:100%;">

                <div id='profile-image-edit' style="display: none; ">
                </div>

            
        </div>
        
        <button type="submit" id ='btn-upload' name="upload">Upload</button>
        <!-- <button type="button" id="btn-upload">Upload</button> -->
    </div>
 </form>
</div>

 <div style="clear:both;"></div>

<?php echo $footer; ?>
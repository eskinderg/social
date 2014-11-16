<div id='recent_users' style='width:100px;float: left;margin-top:50px;' >
    
 <?php foreach ($users as $user)
{?>


   

        <a href ="<?php echo HTTPS_SERVER . $user['username']; ?>">

                <div id="image" style='width:40px; height:40px; display:inline-block; margin:auto;'>
                    <img style='max-width: 100%;max-height: 100%;display:block;margin: auto;' 
                         src="<?php echo $user['profilepicture']; ?>">

                </div>
        </a>
        
    


    <?php 
}
?>

    
</div>
<div id='sidebar'>
    <h3 style="border-bottom: 1px solid #CCC; padding:3px;margin:3px;">
        Recent Users
    </h3>
       
        <?php foreach ($users as $user)
                       {?>




               <a href ="<?php echo HTTPS_SERVER . $user['username']; ?>">

                       <div id="image" style='position:relative;width:40px; height:40px; 
                                                display:inline-block; margin:auto;
                                                border:1px solid grey;'>
                           <img style='max-width: 100%;max-height: 100%;display:block;margin: auto;
                                       position:absolute;top:0;bottom:0;right:0;left:0;' 
                                src="<?php echo $user['profilepicture']; ?>">

                       </div>
               </a>




           <?php 
           }
       ?>
       
 
</div>
       

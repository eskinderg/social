<div id="post">
    <textarea></textarea>
    
    <div>
        <button>Post</button>
    </div>
    

</div>

    <div id="user-posts" style="width:700px;margin:auto;">
        
        <?php
            foreach($postdata as $key=>$value)
            {?>
                <div id='post-list' 
                    style="color:cadetblue; font-size:13px;background-color:#E9E9E9;margin:3px;
                    border: 1px solid #CCC;height:60px;">
                    
                    
                    <div style='padding:5px;'> <?php  echo $postdata[$key]['username']; ?> </div>
                    <div style='padding:5px;'> <?php echo $postdata[$key]['post']; ?></div>
                </div>
                
            <?php 
            }?>
    </div>
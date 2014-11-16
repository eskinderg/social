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
                <div class='post-list'>    
                    <div style='padding:5px;'> <?php  echo $postdata[$key]['username']; ?> </div>
                    <div style='padding:5px;'> <?php echo $postdata[$key]['post']; ?></div>
                </div>
                
            <?php 
            }?>
    </div>
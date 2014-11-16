<?php echo $header; ?>
<div style="color:white;" id="files-selected"></div> 
<div style ='padding:15px; font-size: 12px; color:grey; line-height: 1.8;' id="content">
    
    <form method="post" action="ajax/uploadImages" name ='photo' id='imageuploadform' enctype="multipart/form-data">
        <input hidden="true" id="fileupload" type="file" name="image[]" multiple >
    
    
    
        <div id ="divleft">
            <button id="btnupload"></button>
            
        </div>
        
        
        
        <div id="phototitle">
            Photo Section
        </div> 
        </form>
    
    <div id='imagelist'>
        <div id="imagereference"></div>
        
    </div>

    
    <?php
    /*
        foreach($images as $image)
        {
            echo "<div class ='lstimages'>";
                echo "<img src=".$image["filepath"].">";
            echo "</div>";
        }
    */    
    ?>
    
  
    
    <div id="picturevieweroverlay"></div>
    <div id="picture-viewer-wrapper">
        
        <div id="navigate-left" class="photoNavigation"><div class="navigationImage"></div></div>
            <div id="navigate-right" class="photoNavigation"><div class="navigationImage"></div></div>
        
        
        <div id="pictureviewer">
            
            <div id="rightcontrols">
                
                <div ></div>
                <div id="likepicture"></div>
                <div id="sharepicture"></div>
                <div id="deletepicture"></div>
                
            </div>
            
            <div id="closeImage"></div>
            
            <div id="picture">
                <div id="loadingicon"></div>
                <div id="pictureframe"></div>
            </div>
            <div id="picturecontrols"></div>
        </div>
    </div>
    
    <div id='progressFormWrapper'>
        <div id='ProgressForm'>
            <div id='PhotoUploadProgress'>
                <div id='progress'></div>
            </div>
        </div>
    </div>
    
    <div id="deleteconfirmwrapper">
        <div id="deleteconfirm">
            <div style="text-align: center;margin-top: 15px;">Are you Sure you want to delete the Picture ?</div>
            <div id="deleteconfirmbuttonwrapper">
                <div id="deletebuttons">
                    <div id="deleteyes" class="confirmbtn">Yes</div>
                    <div id="deleteno" class="confirmbtn">No</div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php echo $footer; ?>
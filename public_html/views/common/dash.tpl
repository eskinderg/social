<script type="text/javascript" src="<?php echo $search_script; ?>"></script>
<div id='profile_menu'>
    
    <?php
        foreach($dashboard_menu as $menu => $href)
     {
     ?>       
     <li><?php  echo "<a href='".$href."'>" . $menu . "</a>"; ?></li>
      <?php  
      }
      ?>
      
     <div id="searchdiv" style="position: absolute; right: 0px; border:none;
          top:0px;bottom:0px;margin:auto;margin-right: 5px;">
         
         <!-- <img style='position:absolute;' src="../../image/button-search.png"> -->
         
                <input id='txtsearch' type="text" style="padding:0px; padding-left: 2px;
                      right:0px;background-color: #D3D3D3;width:auto;">

                <div id='search' style="position: absolute;right: 0px; top:30px; 
                     background-color: rgba(203, 203, 203, 1);opacity: 0.9;
                     box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);">

                </div>
                
      
     </div>
</div>

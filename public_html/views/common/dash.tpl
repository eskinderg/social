<script type="text/javascript" src="<?php echo $search_script; ?>"></script>
<script type="text/javascript" src="<?php echo $dash_script; ?>"></script>

<div id='user_profile_menu'>
   
    <?php
    
        foreach($dashboard_menu as $menu)
        {      
            echo "<li>";
                echo "<a href='".$menu["link"]."'>"; 
                    echo "<img style='width:30px;height:30px;' src=".$menu["icon"].">";
                 echo "</a>";
            echo "</li>";

        }
      
    ?>
    <div id='popupmenu' 
         style='
         display:none;top:56px; width:260px;right:-20px;height:247px;
         ; position:absolute;z-index: 2;
         border-radius: 14px; padding-top: 6px;
         background: #10475C; border: 2px solid rgba(12, 53, 69, 1);
         
         '>
        
        
        <div id='menuarrow' style='width:23px; height:23px; background-color: #10475C; position:absolute;
             transform: rotate(45deg); top: -13px; right: 28px;
             z-index: -1; border-left:2px solid rgba(12, 53, 69, 1);;border-top:2px solid rgba(12, 53, 69, 1);'>
            
        </div>
        <?php
         foreach($popupmenu as $menu)
        {      
            echo "<li class='clspopup'>";
                echo "<a href='".$menu["link"]."'>"; 
                    echo $menu["Title"];
                 echo "</a>";
            echo "</li>";

        }
        ?>
    </div>
      

</div>


     <div id="searchdiv" style="right: 0px; border:none;margin-right: 5px; display: block">
         
        <!--  <img  src="../../image/button-search.png"> -->
        
        <input placeholder="Search" autocomplete="off" id='txtsearch' type="text" 
               style="border:none;background-color:#10475C;width:246px; height:29px; 
                      margin-top:16px; font-size: 23px;padding:0px;font-style: italic;
                      padding-left: 9px; color:black">
         
                <div id='search' style="position: absolute; top:64px; padding-bottom: 6px;
                     background-color: rgb(45, 45, 45); width:400px; display:none;
                     //border: 3px solid rgb(41, 41, 41);
                     border-bottom-left-radius: 10px;
                     border-bottom-right-radius: 10px; border-top:none;">

                </div>
                
         
     </div>

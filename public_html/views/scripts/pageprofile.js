$(document).ready(function(){
   
   //$('#tab-friends').css('display','block');
   
   
   $('#profile-page-menu>li>a').click(function(e){
        //alert($(this).text().toLowerCase());
        
        var tabname = $(this).text().toLowerCase();
        $('.tabdetail').removeClass('tooggleClassShow'); 
        $('.tabdetail').addClass('tooggleClassHide');
        $('#tab-' + tabname).addClass('tooggleClassShow'); 
       
       //resseting
        $('#profile-page-menu>li>a').css('background-color','black');
        $('#profile-page-menu>li>a').css('border','none');
        
        
        $(this).css('background-color','#444');
        //$(this).css('border','1px solid rgba(128, 128, 128, 0.55)');
        $(this).css('border-bottom','none');
        
       
       e.preventDefault();
   }) ;
   
   
   $('#tab-profile').click(function(e){
       //alert('sample')
       e.preventDefault();
   });
   
   
});
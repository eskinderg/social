$(document).ready(function(){

     $('html').click(function(e)
      {
        $('#popupmenu').hide();
    });
    


    $('#user_profile_menu > li > a').click(function(e){
      if($(this).attr('href') == 'http://eskinder.net/settings')
      {    
          $('#popupmenu').fadeToggle();
          
          e.preventDefault();
          e.stopPropagation();
      }
    });
    
    
     $('#popupmenu').click(function(e){
            e.stopPropagation();
     });
    
});
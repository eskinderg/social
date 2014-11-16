$(document).ready(function(){
    
    
    
    $('#friends-list>a>span').mouseover(function(e){
         //alert(e.pageX);
         
         $('#friendsDetail').css('top',e.pageY);
         $('#friendsDetail').css('left',e.pageX);
        // $('#friendsDetail').css('display','block');
    });
    
    
});
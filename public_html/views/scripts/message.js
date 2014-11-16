$(document).ready(function(){
   
    $('#messagesearch').on('click', 'span', function(){
         
       
        $('#txt-message-to').val($(this).attr("email"));
         $('#messagesearch').css('display','none');
        
    });
   
   
    if($('#txt-message-to').val().length<=0)
    {
        $('#messagesearch').css('display','none'); //hide the search initially
    }
    
    $('#btnsearch').click(function(){
                
        $.ajax({
        dataType: "json",
        url: '/ajax/ajaxgetfriends/search/'+ $('#txt-message-to').val(),
        success: success
        });
      
    });
    
    

    
    
    $('#txt-message-to').keyup(function() {
         
        if($('#txt-message-to').val().length<=0)
        {
            $('#messagesearch').css('display','none');
        }
        else
        {
        
            $.ajax({
                   dataType: "json",
                   url: '/ajax/ajaxgetfriends/search/'+ $('#txt-message-to').val(),
                   success: success
                   });
        }
    });
    
    
    function success(data)
    {
        
        $("#messagesearch").empty();
        
        if(data.length<=0)
        {
            $('#messagesearch').css('display','none');
           // console.log(data);
        }
        else
        {
            $('#messagesearch').css('display','block');
        
             for (var i = 0; i < data.length; i++) 
            { 
                $("#messagesearch").append(
                       // "<a email=" + data[i].email + " href='/"+ data[i].username +"'>\n\
                         "<span email=" + data[i].email + " >" +  data[i].firstname + "&nbsp;" + data[i].lastname + "</span>\n\
                </a> "
            );
            }
        }
        
         

    }
     
    $('#txt-message-to').focus(function() {
          
        if($('#txt-message-to').val().length<=0)
        {
            $('#messagesearch').css('display','none');
        }
        else
        {
            $.ajax({
                dataType: "json",
                url: '/ajax/ajaxgetfriends/search/'+ $('#txt-message-to').val(),
                success: function(data){
                    if(data.length>0)
                    {
                        $('#messagesearch').css('display','block'); //display the search if textbox is not empty and has a matching data
                    }
                }
                });
        }
           
        
    });

    $('html').click(function(e)
      {
        $('#messagesearch').css('display','none');
    });
    
    $('#messagesearch').click(function(e)
    {
         e.stopPropagation();
    });
   
});
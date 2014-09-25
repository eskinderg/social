$(document).ready(function(){
    
    if($('#txtsearch').val().length<=0)
    {
        $('#search').css('display','none'); //hide the search initially
    }
    
    $('#btnsearch').click(function(){
                
        $.ajax({
        dataType: "json",
        url: '/ajax/ajaxsearch/search/'+ $('#txtsearch').val(),
        success: success
        });
      
    });
    
    
    $('#txtsearch').keyup(function() {
         
        if($('#txtsearch').val().length<=0)
        {
            $('#search').css('display','none');
        }
        else
        {
        
         $.ajax({
                dataType: "json",
                url: '/ajax/ajaxsearch/search/'+ $('#txtsearch').val(),
                success: success
                });
            }
    });
    
    
    function success(data)
    {
        $("#search").empty();
        
        if(data.length<=0)
        {
            $('#search').css('display','none');
        }
        else
        {
            $('#search').css('display','block   ');
        
             for (var i = 0; i < data.length; i++) 
            { 
                $("#search").append(
                        "<a href='/"+ data[i].username +"'>\n\
                            <span>" +  data[i].firstname + "&nbsp;" + data[i].lastname + "</span>\n\
                        </a> ");
            
            }
        }
        
         

    }
     
    $('#txtsearch').focus(function() {
          
        if($('#txtsearch').val().length<=0)
        {
            $('#search').css('display','none');
        }
        else
        {
            $.ajax({
                dataType: "json",
                url: '/ajax/ajaxsearch/search/'+ $('#txtsearch').val(),
                success: function(data){
                    if(data.length>0)
                    {
                        $('#search').css('display','block'); //display the search if textbox is not empty and has a matching data
                    }
                }
                });
        }
           
        
    });

    $('html').click(function(e)
      {
        $('#search').css('display','none');
    });
    
    $('#search,#txtsearch').click(function(e)
    {
         e.stopPropagation();
    });
   
});
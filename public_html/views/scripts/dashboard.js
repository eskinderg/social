$(document).ready(function(){
    
    var startItem = 21;
    
    $(window).scroll(function() {
        if($(window).scrollTop() === (($(document).height()) - $(window).height())) {
            
            $("#loadingdiv").addClass('ajaxloading');
            
            $.ajax({
                dataType: "json",
                url: '/ajax/more/loadmore/'+ startItem,
                    success: loadItems
                    ,
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log("Error from scrolling")
                    }
                });

        }
        
        
    });
    
    
    
    
    
    $("#btnloadmore").click(function(){
        startItem = startItem +21;

       $.ajax({
                dataType: "json",
                url: '/ajax/more/loadmore/'+ startItem,
                    success: loadItems
                    ,
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });
        
    });
    
    
    
    
    function loadItems(data)
    {
        console.log(startItem);
        if(data.length>0)
        {
           
           
            for(i =0; i< data.length; i++)
            {
                   $(
                        
                        "<div id='friends-list'>" +
                            
                            "<div id='image'>" +
                                " <img style='max-width: 100%;max-height: 100%;position: absolute;margin: auto; " +
                                   " top:0;bottom:0;right:0;left:0;' " +
                                   " src='" + data[i].profilepicture +"'>" +
                            "</div>" +
                            "<div id='rightSplit'>" +
                            
                                "<a href ='"+ $("base").text() + data[i].username +"'> <span alt = '"+data[i].UserId+"'>"+ ucword(data[i].firstname) +" "+ ucword(data[i].lastname) + " </span></a>" +
                                "<div id='profile-list-email'><span><a href='#'>"+ data[i].email +"</a></span></div>" +
                                "<button href='"+ data[i].username + "' alt = '"+ data[i].UserId+"' id='btn-addfriend'>"+ data[i].txt_button +"</button>" +


                                "<div><img style='margin-top: 12px;' src='../image/mail.png'></div>" +
                            "</div>" +
                        "</div>"
                    
                    ).fadeIn(750).css("display","inline-block").insertBefore($('#btnclear'));
            }
            
            
            //$("#loadingdiv").removeClass('ajaxloading');
            
            startItem = startItem +21;
        }
        
        $("#loadingdiv").removeClass('ajaxloading');
    }
    
    
function ucword (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

});
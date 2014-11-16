$(document).ready(function(){
   
    var pictureList;
    var picID;
    var position;
    
    pageload();
   
   
   
    $("#btnupload").click(function(e){
        
        $("#fileupload").click();
        e.preventDefault();
   }) ;
   
   
   $('#fileupload').change(function (e) {
       
       $("#imageuploadform").submit();
       e.preventDefault();
        
   });
   
   $('#imageuploadform').submit(function(e)
   {
       e.preventDefault();
       
        var formData = new FormData(this);
        
        
        $.ajax({
            type:'POST',
            url: 'ajax/uploadImages',
            data:formData,
            xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
            },
            cache:false,
            contentType: false,
            processData: false,
            
            success:function(data){
                    $('#progressFormWrapper').fadeOut();
                    $("#progress").css('width',"0%");
                    refreshImageList(data);
            },

            error: function(data){
                alert('data');
            }
        });
       
   });
   
   
   function progress(e){
        $("#progressFormWrapper").fadeIn();
        //$('#uploadcompletedstatus').css('display','none');
        if(e.lengthComputable){
            //console.log(e.loaded);
            //console.log(e.total);
            var max = e.total;
            var current = e.loaded;
            
            var Percentage = (current * 100)/max;
            //console.log(Percentage);
            $("#progress").css('width',Percentage + "%");
            
            if(Percentage >= 100)
            {
                 
            }
        }  
     }
     
     function refreshImageList(data)
     {
         $('#imagelist').html("");
         $('#imagelist').append("<div id='imagereference'></div>")
         pageload();
        
     }


$("#closeImage").click(function(){
    
        closePictureViewer();
   
});

$("#picturevieweroverlay").click(function(){
    
        closePictureViewer();
});

function closePictureViewer()
{
   $("#picture-viewer-wrapper").css('display','none'); 
   $("#picturevieweroverlay").css('display','none');
   $('#picture > #pictureframe').html("");
   $("html").css('overflow-y','auto');
   $("html").css('position','static');
}


$('#content').on('click',".lstimages .imgthumb",(function(){ //binding the element to the click event
    
    $('#rightcontrols #likepicture').css('background', "url(../../image/heart.png)" ); // default like button

        var photoid = $(this).attr('alt');
        
        picID = photoid;
        
        $("#picture-viewer-wrapper").css('display','block');
        $("#picturevieweroverlay").css('display','block');
        
        
        $("html").css('overflow-y','scroll');
        $("html").css('position','fixed');
        
        
        $.ajax({
        dataType: "json",
        url: '/ajax/pictureview/load/' + photoid,
            success: loadImg
            ,
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        
    

}));
    
    
function loadImg(data)
{
    
    position = -1;
    
     $('#picture > #pictureframe').hide().html("<img alt='"+ data[0].pictureid +"' src='"+ data[0].filepath + "'>").fadeIn(250);
     
     if(data[0].btnclass === "likedbtn")
        {
            $('#rightcontrols #likepicture').css('background', "url(../../image/heart-liked.png)" );
        }
        else
        {
           $('#rightcontrols #likepicture').css('background', "url(../../image/heart.png)" );
        }
     
     
     for(i=0;i<pictureList.length;i++)
    {
       
       if(pictureList[i].pictureid === picID)
       {
           //alert(picID +" " +pictureList[i].pictureid + " "  +currnetPosition)
           position=i;
           
       }
    }
     
     adjustNavigationControlls();
}

   
$('#navigate-left > .navigationImage').click(function(e){

    var nextPos=position -1;
        
    if(nextPos > -1)
    {
        if(pictureList[nextPos].btnclass === "likedbtn")
        {
            $('#rightcontrols #likepicture').css('background', "url(../../image/heart-liked.png)" );
        }
        else
        {
           $('#rightcontrols #likepicture').css('background', "url(../../image/heart.png)" );
        }
        $('#picture > #pictureframe').hide().html("<img alt='"+ pictureList[nextPos].pictureid +"' src='"+ pictureList[nextPos].filepath + "'>").fadeIn(250);
        position--;
    }
    
        adjustNavigationControlls();

});
   
$('#navigate-right > .navigationImage').click(function(e){
    
    
    
    var prevPos=position +1;
    if(prevPos < pictureList.length)
    {
        if(pictureList[prevPos].btnclass === "likedbtn")
        {
            $('#rightcontrols #likepicture').css('background', "url(../../image/heart-liked.png)" );
        }
        else
        {
           $('#rightcontrols #likepicture').css('background', "url(../../image/heart.png)" );
        }
        
        $('#picture > #pictureframe').hide().html("<img alt='"+ pictureList[prevPos].pictureid +"' src='"+ pictureList[prevPos].filepath + "'>").fadeIn(250);
        position++;
    }
    
        adjustNavigationControlls();
});   
   
   
   
   
   
   
function adjustNavigationControlls()
{
    
    var leftctrl = $('#navigate-left > .navigationImage');
    var rightctrl = $('#navigate-right > .navigationImage');
    
    //console.log(position);
    //console.log(pictureList.length);
    
    if((position === 0) && (position < pictureList.length))
    {
        //alert('Leftchanged');
        leftctrl.css('background','url(../../image/previous-icon-grey.png)');
        rightctrl.css('background','url(../../image/next-icon.png)');
    }
    
    
    if((position === 0) && (pictureList.length === 1)) // if there is one element in the pictureList array
    {
        //alert('Leftchanged');
        leftctrl.css('background','url(../../image/previous-icon-grey.png)');
        rightctrl.css('background','url(../../image/next-icon-grey.png)');
    }
    
    
    if((position > 0) && (position < pictureList.length))
    {
        rightctrl.css('background','url(../../image/next-icon.png)');
        leftctrl.css('background','url(../../image/previous-icon.png)');
    }
    if(position === (pictureList.length-1))
    {
        //alert('Rightchanged');
        rightctrl.css('background','url(../../image/next-icon-grey.png)');
    }


    

    
  
}







   //when the page loads
   function pageload()
   {
       $.ajax({
            dataType: "json",
            url: '/ajax/loadImages',
                success: loadItems
                ,
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
        });
        
   }   
    function loadItems(data)
    {
        //console.log(data);
        pictureList=data;
        
        if(data.length>0)
        {
            var btnclass;
            
            for(i =0; i< data.length; i++)
            {
                $("#imagelist").append(
                        "<div class ='lstimages'>" +
                            
                            "<img class=imgthumb alt='"+ data[i].pictureid +"' src='"+ data[i].filepath + "'>" +
                            "<div class=controls><div id=likebutton class="+ data[i].btnclass +" data=" +data[i].pictureid +"></div></div>"+
                        "</div>"                            
                        
                        ).hide().fadeIn();
            }
        }
        
       // $("#loadingdiv").removeClass('ajaxloading');
        
    }
    
    
    
 // for the like and unlike button
 //------------------------------------------------------------------------------------
 //------------------------------------------------------------------------------------
    
    $('#content').on('click',".likedbtn , .likebtn",(function(e){ //binding the element to the click event

       var photoid = $(this).attr('data');
       var status;
       //console.log(isliked(photoid));
        var button = $(this);
        
        $.ajax({
        dataType: "json",
        url: '/ajax/likephoto/like/' + photoid,
            success: function(data){
                    if(data[0].status==="liked")
                    {
                       button.removeClass('likebtn');
                       button.addClass('likedbtn');
                       
                       for(i=0;i<pictureList.length;i++)
                        {

                           if(pictureList[i].pictureid === photoid)
                           {
                               pictureList[i].btnclass="likedbtn";

                           }
                        }
                    }
                    
                    if(data[0].status==="unliked")
                    {
                       button.removeClass('likedbtn');
                       button.addClass('likebtn');
                       
                       for(i=0;i<pictureList.length;i++)
                        {

                           if(pictureList[i].pictureid === photoid)
                           {
                               pictureList[i].btnclass="likebtn";

                           }
                        }
                    }   
            }
            ,
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });    

        
    }));
    
    
    $("#likepicture").click(function(){
        
        var photoid = $("#pictureviewer > #picture > #pictureframe > img").attr('alt');
        
       var likebutton = $("#imagelist div[data="+photoid+"]");
        //console.log(likebutton);
        
        var button = $(this);
        
        $.ajax({
        dataType: "json",
        url: '/ajax/likephoto/like/' + photoid,
            success: function(data){
                
                //console.log(data);
                    if(data[0].status==="liked")
                    {
                       likebutton.removeClass('likebtn');
                       likebutton.addClass('likedbtn');
                       button.css('background','url(../../image/heart-liked.png)');
                       
                       for(i=0;i<pictureList.length;i++)
                        {

                           if(pictureList[i].pictureid === photoid)
                           {
                               pictureList[i].btnclass="likedbtn";

                           }
                        }
                    }
                    
                    if(data[0].status==="unliked")
                    {
                      likebutton.removeClass('likedbtn');
                       likebutton.addClass('likebtn');
                       button.css('background','url(../../image/heart.png)');
                       for(i=0;i<pictureList.length;i++)
                        {

                           if(pictureList[i].pictureid === photoid)
                           {
                               pictureList[i].btnclass="likebtn";

                           }
                        }
                    }   
            }
            ,
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });    
    });
    
    
    
    $("#deletepicture").click(function(){
        $('#deleteconfirmwrapper').css('display','block');
    });
    
    $('#deleteno').click(function(){
       $(deleteconfirmwrapper).css('display','none'); 
    });
    
});
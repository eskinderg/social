$(document).ready(function(){
        
 //Load Profile image on Page Load ------------------------------------------------------------------------------  
    $.ajax({
                dataType: "json",
                url: '/ajax/loadProfilePicture',
                    success: loadProfilePicture
                    ,
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
        });
        
        
    function loadProfilePicture(data)
    {
        console.log(data[0].profilePicture);
        
        if(data.length>0)
        {  
            $(    
                     "<img class=likebtn src='"+ data[0].profilePicture + "?" + Math.floor(Math.random() * 6)+ "'>"
             ).fadeIn(750).insertAfter($('#profile-picture-edit'));
        }
    }
    
    // End Profile Image load
    
    
    
    $('#btnname').click(function (e){
           // alert($('#firstname').val());
            return false;
    });
        
    
    $('#profile-picture').mouseover(function(){
       $('#profile-picture-edit').fadeIn(100);
    });
    
    $('#profile-picture').mouseleave(function(){
       $('#profile-picture-edit').fadeOut()
    });
    
    $('#profile-upload-dialog-background').click(function(){
        $(this).hide();
        $('#profile-upload-container').fadeOut();
        $('#profile-upload-wrapper').fadeOut();
       
    });
    
    $('#close-icon').click(function(){
        $("#profilephotouploadprogress").css('display','none');
         $('#profile-upload-dialog-background').fadeOut();
         $('#profile-upload-container').fadeOut();
         $('#profile-upload-wrapper').fadeOut();
         $('#uploadcompletedstatus').css('display','none');
    });
    
    
    $('#profile-left').on('click','#profile-picture-edit',function(){ //binding the element to the click event
        $('#profile-picture-edit').css('display','none'); 
        $('#profile-upload-wrapper').show();
        $('#profile-upload-container').show();
        $("#profile-upload-dialog-background").show();
        
    });
         
        
    $('#txtabout').bind('input propertychange', function() {
           
    });
    
    $('#btn-profile-save').click(function(){
       
       //var returnvalue = false;
       
       if($('#txt-profile-firstname').val()==='' || $('#txt-profile-lastname').val()==='' || $('#txt-profile-email').val()=='' )
       {
           return false;
       }
        return true;
    });

   
/* ajax photo upload -----------------------------------------*/

    $('#imageuploadform').on('submit',(function(e) {
        
        e.preventDefault();
        var formData = new FormData(this);
        
        
        var profileimage = $('#profile-image-edit-container');
        //var mainprofilepicture = $('#profile-picture > img');
        
        $.ajax({
            type:'POST',
            url: 'tools/image',
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
                
               console.log(data);
               
               $("#progress").css('display','none');
               $("#progress").css('width',"0%");
               $('#uploadcompletedstatus').css('display','block');
               
               
               $('#profile-image-edit-container').html(data);
               
               $('#profile-picture').html(data);
               $('#profile-picture').append("<div id='profile-picture-edit'></div>");
               
            },

            error: function(data){
                console.log(data);
            }
        });
        
    }));
    
    // End Ajax Profile photo upload
    
    
    function progress(e){
        $("#profilephotouploadprogress").css('display','block');
        
        $("#progress").css('display','block');
        $('#uploadcompletedstatus').css('display','none');
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

    $("#imagebrowse").on("change", function() {
        $("#imageuploadform").submit();
    });


    $('#btn-upload').click(function(e){
        $("#imagebrowse").click();
         
          e.preventDefault();
    });


//$('#profile-image-edit').draggable({containment: '#profile-image-edit-container'});
//$('#profile-image-edit').resizable({containment: '#profile-image-edit-container'});   



});





$(document).ready(function(){
        
    $('#btnname').click(function (e){
           // alert($('#firstname').val());
            return false;
    });
        
 
   // $('#profile-upload-container').draggable({containment:'#profile-upload-dialog-background'});

   /* $("#input-profile-upload").change(function(){
        var filename = $('#input-profile-upload').val();
        
        $.post('tools/image',
            {filename :filename},
                 function(data){
            
                  alert (data);
                    
                });
        

        
    });
    
     $('#btn-upload').click(function(e){
        
        var button = $(e.target);
        $('#input-profile-upload').click();        
        
    });
    */
    
    
    
    
    $('#profile-picture').mouseover(function(){
       $('#profile-picture-edit').css('display','block'); 
    });
    
    $('#profile-picture').mouseleave(function(){
       $('#profile-picture-edit').css('display','none'); 
    });
    
    $('#profile-upload-dialog-background').click(function(){
        $(this).hide();
        $('#profile-upload-container').fadeOut();
        $('#profile-upload-wrapper').fadeOut();
       
    });
    
    $('#close-icon').click(function(){
         $('#profile-upload-dialog-background').fadeOut();
         $('#profile-upload-container').fadeOut();
         $('#profile-upload-wrapper').fadeOut();
    });
    
    
    $('#profile-picture-edit').click(function(){
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
            cache:false,
            contentType: false,
            processData: false,
            
            success:function(data){
                //alert(data);
                //$('#profile-image-edit-container').css('background-image','none');
                //profileimage.css('background-image','none');
                //
               
                $('#profile-image-edit-container > img').attr('src', $('#profile-image-edit-container > img').attr('src') + '?' + Math.random());
                $('#profile-picture > img').attr('src', $('#profile-picture > img').attr('src') + '?' + Math.random());
               //profileimage.css('background-color','red');
                //mainprofilepicture.html("<img style='width:100%;height:100%;' src='" + data + "'>"); //refresh profile picture
              
                $('#profile-image-edit').show();
              
            },

            error: function(data){
                //alert('error');
                //console.log("error");
                console.log(data);
            }
        });
    }));

    $("#imagebrowse").on("change", function() {
        $("#imageuploadform").submit();
    });


    $('#btn-upload').click(function(e){
        $("#imagebrowse").click();
         
          e.preventDefault();
    });


$('#profile-image-edit').draggable({containment: '#profile-image-edit-container'});
$('#profile-image-edit').resizable({containment: '#profile-image-edit-container'});   



});





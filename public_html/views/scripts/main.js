$(document).ready(function(){
   
   $("#register input[type='password']").focus(function(){
        $(this).removeAttr('placeholder');
   });
   
   $("#register input[type='password']").blur(function(){
        if($(this).val().length ===0)
        {
            $(this).attr('placeholder', 'Password');
        }
        
        
   });
   
   $("#signup").click(function(){
        
        if($("#password").val().length ===0 || $("#passwordconfirm").val().length===0)
        {
            $("#passworderror > span").text('Password Cannot Be Empty');
            return false;
        }
        
        
        if($("#password").val() !== $("#passwordconfirm").val())
        {
            $("#passworderror > span").text('Password Mismatch');
            return false;
        }
       
    });
    
    
    

    
    
    /* ajax call for adding friends -------------------------------------------------*/
    
    //$(':button').click(function(e){
    
    $(document).on('click',':button',function(e){ //rebinding the element to the click event
        var button = $(e.target);
        
        if($(this).attr('alt'))
        {
            //url = $('base').attr('href') + $(this).attr('href') + '/addfriend/' + $(this).attr('alt'); 
            if(button.text()==='Add Friend')
            {
                
                    button.text('');
                    button.addClass('ajaxbutton');

                    $.post('ajax/addfriend/add/' + $(this).attr('alt'),
                    {id : $(this).attr('alt')},
                         function(data){

                            if(data==='success')

                             {
                               //alert (data);
                                button.removeClass('ajaxbutton');
                                 $('#message-display').fadeIn();
                                button.text('Unfriend');
                                $('#message-display > div >div').text('Added');

                                $('#message-display').fadeOut(1000);

                            } 
                            else{

                                return;
                            }
                        });
            
            }
            else
            {
                
                 button.text('');
                    button.addClass('ajaxbutton');

                    $.post('ajax/deletefriend/delete/' + $(this).attr('alt'),
                    {id : $(this).attr('alt')},
                         function(data){

                            if(data==='success')

                             {
                               //alert (data);
                                button.removeClass('ajaxbutton');
                                 $('#message-display').fadeIn();
                                button.text('Add Friend');
                                $('#message-display > div >div').text('Removed');

                                $('#message-display').fadeOut(1000);

                            } 
                            else{

                                return;
                            }
                        });
                        
            }

        }
        
    });
    
    // ajax call end---------------------------------------------------------
    
    
   
});
$(document).ready(function(){
    
    $("#btn-mainlogin-login").click(function(){
        if($('#txt-mainlogin-username').val()==='' || $('#txt-mainlogin-password').val()==='')
        {
            $("#label-mainlogin-warning").text('Please fill out the Information correctly');
            return false; 
        }
    });
    
    
});


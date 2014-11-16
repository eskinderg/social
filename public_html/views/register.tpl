<?php echo $header; ?>
<div id="registerwrapper">
<div id="content">
    
    <div id="register">
        <form action= "register" method="post">  
        <table>
            <tr>
                <td></td> <th>Sign Up</th>
            </tr>

            <tr>
                <td><span class="error"> <?php if($register_username_error){echo $register_username_error;} ?> </span></td>
                <td><input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"></td>
                 
            </tr>

            

            <tr>
                <td><span class='error'> <?php if($register_email_error){echo $register_email_error;} ?> </span></td>
                <td><input type="text" placeholder="E-Mail" name="email" value="<?php echo $email ?>"></td>
                
            </tr>


            <tr>
                <td></td>
                <td><input type="text" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>"></td>
                
            </tr>


            <tr>
                <td></td>
                <td><input type="text" placeholder="Last Name" name="lastname"></td>
                
            </tr>


            <tr>
                <td></td>
                <td><input type="password" placeholder="Password" id="password" name="password"></td>
                
            </tr>

            <tr>
                <td></td>
                <td><input placeholder="Confirm" type="password" id="passwordconfirm"></td>
                
            </tr>

            <tr>
                <td id="passworderror"><span class="error"></span></td>
                <td colspan="2"> <button type="submit" name="register" id="signup">SignUp</button></td>
            
            </tr>

        </table>

        </form>

    </div>
        
                
    <div id="front-text">
                <h1>Welcome to the community</h1>
                <h5>Social networking powered by PHP</h5>
    </div>
                
    <div id="mainlogin">
        <form action="login" method="post" >
    
        <table style="">
            <tr>
                <td></td>   <td><input id='txt-mainlogin-username' type="text" name="username" placeholder="Username"></td> <td><span class='error'> <?php if($username_error){echo $username_error;} ?> </span></td>
            </tr>
            
            <tr>
                <td></td>   <td><input id="txt-mainlogin-password" type="password" name="password" placeholder="Password"></td><td><span class='error'> <?php if($password_error){echo $password_error;} ?></span></td>
            </tr>
            <tr style="text-align: center;">
                <td></td><td><button id='btn-mainlogin-login' style='float:left;' type="submit">Login </button></td><td></td>
            </tr>
            <tr><td></td><td colspan="2" ><span class="error" id="label-mainlogin-warning"> <?php if($error_warning){echo $error_warning;} ?> </span></td></tr>
            
           
        </table>
        
        </form>
    </div>  
            <div style="clear: left;"></div>    
            
            
    </div>     
</div>

<?php echo $footer; ?>
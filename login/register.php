<?php
session_start();
//if (!session_is_registered(myusername)) {
//    header("location:../login/login.php");
//}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../belonging/thousestyle.css">
        <title></title>
        <script>
// When the browser is ready...
//  $(function() {
//  
//    // Setup form validation on the #register-form element
//    $("#register-form").validate({
//    
//        // Specify the validation rules
//        rules: {
//            username: "required",
//            email: {
//                required: true,
//                email: true
//            },
//            password: {
//                required: true,
//                minlength: 5
//            }
//        },
//        
//        // Specify the validation error messages
//        messages: {
//            username: "Please enter your user name",            
//            password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long"
//            },
//            email: "Please enter a valid email address"
//        },
//        
//        submitHandler: function(form) {
//            form.submit();
//        }
//    });           
            function insertRecord()
            {
                var x = document.forms["register-form"]["username"].value;
                if (x == null || x == "")
                {
                    alert("Name of the item(s) must be filled out");
                    return false;
                }

                var username = document.getElementById('username').value;
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;

//                var resultStr = username + " " +
//                                number + " " +
//                                email + " " +
//                                password + " " +
//                                room + " " +
//                                type + "</br> Record added."; 

                var xmlhttp;
                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        //document.getElementById("recAdded").innerHTML = resultStr;
                        document.getElementById("ajaxDiv").innerHTML = xmlhttp.responseText;
                        document.getElementById("register-form").reset();
                    }
                }
                var queryStr = "?username=" + username +
                        "&email=" + email +
                        "&password=" + password;

                //document.write(queryStr + "|" + resultStr);
                xmlhttp.open("GET", "registersql.php" + queryStr, true);
                xmlhttp.send();
                window.history.back()
            }
        </script>
    </head>
    <body>
        <?php include_once("../inc/analyticstracking.php") ?>    
        <?php
        require '../inc/analyticstracking.php';
        require_once '../menu.php';
        require_once '../inc/database.php';
        //require_once '../inc/gettext.php';
        ?>

        <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
            <tr>        
            <form name="input" id="register-form" novalidate="novalidate">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                            <td colspan="3"><strong>Member Register</strong></td>
                        </tr>
                        <tr>
                            <td width="78">
                                <?php echo (_("Username")); ?></td>
                            <td width="6">:*</td>
                            <td width="294"><input type="text" name="username" id="username"></td>
                            </td>                    
                        </tr>
                        <tr>
                            <td width="78">
                                <?php echo (_("Email")); ?></td><td width="6">:*</td>
                            <td width="294"><input type="text" name="email" id="email"></td>
                            </td>
                        </tr>
                        <tr>                   
                            <td width="78">
                                <?php echo (_("Password")); ?></td><td width="6">:*</td>
                            <td width="294"><input type="password" name="password" id="password"></td>
                            </td>                   
                        </tr>                
                        <tr>
                            <td colspan="3" align="center">
                                <input type='button' onclick='insertRecord()' 
                                       value='Sign Up'/><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </form>
        </tr>
    </table>
    <div id='recAdded'></div>
    <div id='ajaxDiv'><?php echo (_("Your result will display here")); ?></div> 
    <?php echo (_("Hello")) . "<br>"; ?>
</body>
</html>

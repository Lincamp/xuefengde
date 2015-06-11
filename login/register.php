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
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <!--link rel="stylesheet" type="text/css" href="../belonging/thousestyle.css"-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <title></title>
        <script>
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
        <div class="container">
            <?php
            require_once '../inc/analyticstracking.php';
            require_once '../menu.php';
            require_once '../inc/database.php';
            //require_once '../inc/gettext.php';
            ?>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-2">                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-8">
                    <form class="form" name="input" id="register-form" novalidate="novalidate">
                        <div class="form-group">
                            <strong>Member Register</strong><br><br>
                            <label for="email">*Email</label>
                            <input name="email" type="text" id="email" class="form-control" placeholder="Email" />
                        </div>
                        <div class="form-group">                            
                            <label for="mysername">Username</label>
                            <input name="username" type="text" id="username" class="form-control" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="nameField">*Password</label>
                            <input name="password" type="password" id="password" class="form-control" placeholder="Password" />
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type='button' name="Sign Up" value="Sign Up" class="btn btn-primary" onclick="insertRecord()">Sign Up</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-2">                    
                </div>
            </div>
        </div>



        <!--table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
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
    </table-->

    <div id='ajaxDiv'><?php // echo (_("Your result will display here")); ?></div> 
</body>
</html>

<?php
session_start();
if (!session_is_registered(myusername)) {
    header("location:../login/login.php");
}
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
        <link rel="stylesheet" type="text/css" href="../belonging/thousestyle.css">
        <title></title>
        <script>
            function insertRecord()
            {
                var x = document.forms["input"]["username"].value;
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
                        document.getElementById("input").reset();
                    }
                }
                var queryStr = "?username=" + username +
                        "&email=" + email +
                        "&password=" + password;

                //document.write(queryStr + "|" + resultStr);
                xmlhttp.open("GET", "registersql.php" + queryStr, true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <?php include_once("../inc/analyticstracking.php") ?>    
        <?php
        require '../inc/analyticstracking.php';
        require_once '../belonging/menu.php';
        require_once '../inc/database.php';
        //require_once '../inc/gettext.php';
        ?>
        <form name="input" id="input">
            <table>
                <tr>
                    <td>
                        <?php echo (_("Username")); ?>:*
                        <input type="text" name="username" id="username">
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <?php echo (_("EMAIL")); ?>:*
                        <input type="text" name="email" id="email">
                    </td>
                </tr>
                <tr>                   
                    <td>
                        <?php echo (_("Password")); ?>:*
                        <input type="text" name="password" id="password">
                    </td>                   
                </tr>                
                <tr>
                    <td colspan="3" align="center">
                        <input type='button' onclick='insertRecord()' 
                               value='Submit'/><br>
                    </td>
                </tr>
            </table>
        </form>

        <div id='recAdded'></div>
        <div id='ajaxDiv'><?php echo (_("Your result will display here")); ?></div> 
        <?php echo (_("Hello")) . "<br>"; ?>
    </body>
</html>

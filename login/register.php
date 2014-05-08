<!DOCTYPE html>


<?php
//require '../inc/database.php';
////include("config.php");
//$con = connect_db();
//
////session_start();
//
//if($_SERVER["REQUEST_METHOD"] == "POST")
//{
//// username and password sent from Form 
//$myusername=addslashes($_POST['myusername']); 
//$mypassword=addslashes($_POST['mypassword']); 
//
//////$result = mysqli_query($con, "SELECT * FROM belonging ORDER BY name, change_date DESC");
//////$numOfRows = mysqli_num_rows($result);
//
//$sqlcmd="SELECT id FROM user WHERE username='$myusername' and password='$mypassword'";
////$result=mysql_query($sql);
//$result=mysqli_query($con, $sqlcmd);
//
////$row=mysqli_fetch_array($result);
//////$active=$row['active'];
//$count=mysqli_num_rows($result);
//
//// If result matched $myusername and $mypassword, table row must be 1 row
//if($count==1)
//{
//session_register("myusername");
//session_register("mypassword");
//$_SESSION['login_user']=$myusername;
//
//header("location:../belonging/main.html");
////header("location:welcome.php");
//echo "count: $count <br>";
//}
//else 
//{
//$error="Your Login Name or Password is invalid";
//echo $error;
//}
//}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" href="thousestyle.css">
        <title></title>
        <script>
            function insertRecord()
            {
//                var x = document.forms["input"]["itemname"].value;
//                if (x == null || x == "")
//                {
//                    alert("Name of the item(s) must be filled out");
//                    return false;
//                }
                
                var username = document.getElementById('myusername').value;
                var password = document.getElementById('mypassword').value;
                var email = document.getElementById('myemail').value;
                
//                var resultStr = itemname + " " +
//                                number + " " +
//                                position + " " +
//                                container + " " +
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
                var queryStr = "?email=" + email +
                        "&password=" + password +
                        "&username=" + username;

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
        
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="input" id="input">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Register</strong></td>
</tr>
<tr>
<td width="78">Email</td>
<td width="6">:</td>
<td width="294"><input name="myemail" type="text" id="myusername"></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Sign Up"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
        
        <div id='ajaxDiv'><?php echo (_("Your result will display here")); ?></div> 
        <?php echo (_("Hello")) . "<br>"; ?>
    </body>
</html>        
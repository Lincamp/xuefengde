<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//if (!session_is_registered(myusername)) {
//    header("location:../login/login.php");
//}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../belonging/thousestyle.css">
        <title></title>
    </head>
    <body>

        <?php
        require '../inc/database.php';
//include("config.php");
        $con = connect_db();


        require_once '../menu.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from Form 
            $myusername = addslashes($_POST['myusername']);
            $mypassword = addslashes($_POST['mypassword']);

////$result = mysqli_query($con, "SELECT * FROM belonging ORDER BY name, change_date DESC");
////$numOfRows = mysqli_num_rows($result);

            $sqlcmd = "SELECT id FROM user WHERE username='$myusername' and password='$mypassword'";
//$result=mysql_query($sql);
            $result = mysqli_query($con, $sqlcmd);

//$row=mysqli_fetch_array($result);
////$active=$row['active'];
            $count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
            if ($count == 1) {
                session_register("myusername");
                session_register("mypassword");
                $_SESSION['login_user'] = $myusername;

                if (isset($_SESSION['url']))
                    $url = $_SESSION['url']; // holds url for last page visited.
                else
                    $url = "/index.php"; // default page for



                    
// go to previous page
                header("location:$url");
//header("location:welcome.php");
                echo "count: $count <br>";
            }
            else {
                $error = "Your Login Name or Password is invalid";
                echo $error;
            }
        }
        ?>
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
            <form name="form1" method="post" action="login.php">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                            <td colspan="3"><strong>Member Login </strong></td>
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
                            <td><input type="submit" name="Submit" value="Login"></td>
                        </tr>
                    </table>
                </td>
            </form>
        </tr>
    </table>
</body>
</html>
<?
/*
<form action="" method="post">
<label>UserName :</label>
<input type="text" name="myusername"/><br />
<label>Password :</label>
<input type="password" name="mypassword"/><br/>
<input type="submit" value=" Submit "/><br />
</form>*/
?>
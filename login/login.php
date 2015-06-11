<?php
session_start();
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//if (!session_is_registered(myusername)) {
//    header("location:../login/login.php");
//}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">        
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../belonging/thousestyle.css"-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

            <?php
            require_once '../inc/database.php';
//include("config.php");
            $con = connect_db();


            require_once '../menu.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from Form 
                $myusername = addslashes($_POST['myusername']);
                $mypassword = addslashes($_POST['mypassword']);

////$result = mysqli_query($con, "SELECT * FROM belonging ORDER BY name, change_date DESC");
////$numOfRows = mysqli_num_rows($result);

                $sqlcmd = "SELECT id FROM user WHERE username='$myusername' and password='" . md5($mypassword) . "'";
//$result=mysql_query($sql);
                $result = mysqli_query($con, $sqlcmd);

//$row=mysqli_fetch_array($result);
////$active=$row['active'];
                $count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
                if ($count == 1) {
//        session_register("myusername");
                    $_SESSION['myusername'] = "myusername";
//        session_register("mypassword");
                    $_SESSION['mypassword'] = "mypassword";
                    $_SESSION['login_user'] = $myusername;

                    echo "##" . $_SESSION['url'] . "##";
                    //echo $_SESSION['url'] !== "/login/login.php";
                    if (isset($_SESSION['url']))
                        $url = $_SESSION['url']; // holds url for last page visited.
                    else
                        $url = "../index.php"; // default page for
// go to previous page
                    //header("location:$url");
                    header("location:../index.php");

                    //header("location:welcome.php");
                    echo "count: $count <br>";
                }
                else {
                    $error = "Your Login Name or Password is invalid";
                    echo $error;
                }
            }
            ?>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-2">                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-8">
                    <form class="form" method="post" action="login.php">
                        <div class="form-group">
                            <strong>Member Login </strong><br><br>
                            <label for="myusername">Username or Email</label>
                            <input name="myusername" type="text" id="myusername" class="form-control" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="mypassword">Password</label>
                            <input name="mypassword" type="password" id="mypassword" class="form-control" placeholder="Password" />
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" name="Login" value="Login" class="btn btn-primary">Login</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-2">                    
                </div>
            </div>

            <?php
//            <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
//                <tr>
//                <form name="form1" method="post" action="login.php">
//                    <td>
//                        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
//                            <tr>
//                                <td colspan="3"><strong>Member Login </strong></td>
//                            </tr>
//                            <tr>
//                                <td width="78">Username</td>
//                                <td width="6">:</td>
//                                <td width="294"><input name="myusername" type="text" id="myusername"></td>
//                            </tr>
//                            <tr>
//                                <td>Password</td>
//                                <td>:</td>
//                                <td><input name="mypassword" type="password" id="mypassword"></td>
//                            </tr>
//                            <tr>
//                                <td>&nbsp;</td>
//                                <td>&nbsp;</td>
//                                <td><input type="submit" name="Submit" value="Login"></td>
//                            </tr>
//                        </table>
//                    </td>
//                </form>
//                </tr>
//            </table>
            ?>


        </div>
    </body>
</html>
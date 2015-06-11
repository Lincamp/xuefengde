<?php
require_once 'inc/gettext.php';
//echo 'This is a included message <br>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
require_once 'inc/database.php';
//include("config.php");
$con = connect_db();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = addslashes($_POST['myusername']);
    $mypassword = addslashes($_POST['mypassword']);

    $sqlcmd = "SELECT id FROM user WHERE username='$myusername' and password='" . md5($mypassword) . "'";
    $result = mysqli_query($con, $sqlcmd);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['myusername'] = "myusername";
        $_SESSION['mypassword'] = "mypassword";
        $_SESSION['login_user'] = $myusername;

//        echo "##" . $_SESSION['url'] . "##";
//        echo "count: $count <br>";
    } else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>

<div class = "row">
    <div class = "col-md-1 col-sm-1 col-xs-1">        
        <a href="http://xuefeng.de" align="left">xuefeng.de</a>
    </div>

    <div class = "col-md-11 col-sm-11 col-xs-11" style="text-align:right">
        <a href="?locale=en_US">English</a> |
        <a href="?locale=fr_FR">Français</a> |
        <a href="?locale=de_DE">Deutsch</a> |
        <a href="?locale=zh_CN">中文</a> |
        <a href="?locale=es_ES">Español</a> &nbsp;&nbsp;&nbsp;

        <!--a href="../login/login.php">login</a-->
        <button type="button" class="btn btn-default btn-xs"><a href="../login/register.php">register</a></button>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Login</button>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog  modal-sm">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="text-align:left">Sign in</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-1 col-sm-1 col-xs-1"></div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <form class="form" method="post">
                                    <div class="form-group">
                                        <strong></strong><br><br>
                                        <!--label for="emailField">Username</label-->
                                        <input name="myusername" type="text" id="myusername" class="form-control" placeholder="Username" />
                                    </div>
                                    <div class="form-group">
                                        <!--label for="nameField">Password</label-->
                                        <input name="mypassword" type="password" id="mypassword" class="form-control" placeholder="Password" />
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                    <button type="submit" name="Submit" value="Login" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>
                            </div>                            
                        </div>

                    </div>
                    <!--div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                
                    </div-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <button type="button" class="btn btn-warning btn-xs"  ><a href="../index.php">Log out</a></button>        
    </div>
    <br>
</div>



<div align="right">
    <span align="left">

    </span>
    <span align="right">

    </span>
</div>

<h1><?php //echo _("This page is dedicated to managing my belongings.");              ?></h1>

<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//if (!session_is_registered(myusername)) {
//    header("location:../login/login.php");
//}
if (!isset($_SESSION['myusername'])) {
    header("location:../login/login.php");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" href="thousestyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <title>Search</title>
        <script>
            function searchRecord()
            {
                //document.write("#####");
                var x = document.forms["input"]["item"].value;
                if (x == null || x == "")
                {
                    alert("Name of the item(s) must be filled out");
                    return false;
                }

                var item = document.getElementById('item').value;

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
                        document.getElementById("resultList").innerHTML = xmlhttp.responseText;

                        document.getElementById("input").reset();
                    }
                }
                var queryStr = "?item=" + item;

                //document.write(queryStr + "|" + resultStr);
                xmlhttp.open("GET", "searchsql.php" + queryStr, true);
                xmlhttp.send();
            }
        </script>
    </head>

    <body>
        <!--?php //include_once("../inc/analyticstracking.php") ?-->
        <div class="container">
            <?php
            require_once '../menu.php';
            require_once 'menu.php';
            require_once '../inc/database.php';
            ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4><?php echo _("This page is dedicated to managing my belongings."); ?></h4>
                </div>
                <div class="panel-body">
                    <form name="input">
                        Where have I put my: <input type="text" name="item" id="item">
                        <input type='button submit'  name="Search" value="Search" class="btn btn-primary btn-sm" onclick='searchRecord()' value='Submit'>
                        <!--button type="submit" name="Search" value="Search" class="btn btn-primary btn-sm" onclick='searchRecord()'>Search</button-->
                    </form>
                    <div id="resultList"><?php //echo (_("Result table"));  ?></div>
                </div>
            </div>
    </body>
</html>
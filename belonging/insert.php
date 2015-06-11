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
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" href="thousestyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <title></title>
        <script>
            function insertRecord()
            {
                var x = document.forms["input"]["itemname"].value;
                if (x == null || x == "")
                {
                    alert("Name of the item(s) must be filled out");
                    return false;
                }

                var itemname = document.getElementById('itemname').value;
                var number = document.getElementById('number').value;
                var position = document.getElementById('position').value;
                var container = document.getElementById('container').value;
                var room = document.getElementById('room').value;
                var type = document.getElementById('type').value;
                var comment = document.getElementById('comment').value;
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
                var queryStr = "?itemname=" + itemname +
                        "&number=" + number +
                        "&position=" + position +
                        "&container=" + container +
                        "&room=" + room +
                        "&type=" + type +
                        "&comment=" + comment;

                //document.write(queryStr + "|" + resultStr);
                xmlhttp.open("GET", "insertsql.php" + queryStr, true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <div class="container">
        <?php include_once("../inc/analyticstracking.php") ?>    
        <?php
        require '../inc/analyticstracking.php';
        require_once '../menu.php';
        require_once 'menu.php';
        require_once '../inc/database.php';
        //require_once '../inc/gettext.php';
        ?>
        
        <form name="input" id="input">
            <table>
                <tr>
                    <td>
                        <select name="number" id="number">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="100">100</option><br>
                        </select>
                    </td>
                    <td>
                        <?php echo (_("Item name")); ?>:*
                        <input type="text" name="itemname" id="itemname">
                    </td>
                    <td>
                        <?php echo (_("Type")); ?>:
                        <select name="type" id="type">
                            <option value=""></option>    
                            <option value="clothes"><?php echo (_("clothes")); ?></option>
                            <option value="food"><?php echo (_("food")); ?></option>
                            <option value="electronic device"><?php echo (_("electronic device")); ?></option>
                            <option value="stationary"><?php echo (_("stationary")); ?></option>
                            <option value="others"><?php echo (_("others")); ?></option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="position" id="position">
                            <option value="in"><?php echo (_("in")); ?></option>
                            <option value="on"><?php echo (_("on")); ?></option>
                            <option value="under"><?php echo (_("under")); ?></option>
                            <option value="in front of"><?php echo (_("in front of")); ?></option>
                            <option value="behind"><?php echo (_("behind")); ?></option>
                        </select>
                    </td>
                    <td>
                        Container: <input type="text" name="container" id="container">
                    </td>
                    <td>
                        <?php echo (_("Room")); ?>:
                        <select name="room" id="room">
                            <option value="living room"><?php echo (_("living room")); ?></option>
                            <option value="bed room"><?php echo (_("bed room")); ?></option>
                            <option value="storage room"><?php echo (_("storage room")); ?></option>
                            <option value="kitchen"><?php echo (_("kitchen")); ?></option>
                            <option value="bath room"><?php echo (_("bath room")); ?></option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <?php echo (_("Comment")); ?>: <input type="text" name="comment" id="comment"><br>
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
        </div>
    </body>
</html>

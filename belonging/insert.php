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
        <link rel="stylesheet" type="text/css" href="thousestyle.css">
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
        <?php include_once("../inc/analyticstracking.php") ?>    
        <?php
        require '../inc/analyticstracking.php';
//        require 'menu.php';
        require '../inc/database.php';
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
                        Item name:*
                        <input type="text" name="itemname" id="itemname">
                    </td>
                    <td>
                        Type:
                        <select name="type" id="type">
                            <option value=""></option>    
                            <option value="clothes">clothes</option>
                            <option value="food">food</option>
                            <option value="electronic device">electronic device</option>
                            <option value="stationary">stationary</option>
                            <option value="others">others</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="position" id="position">
                            <option value="in">in</option>
                            <option value="on">on</option>
                            <option value="under">under</option>
                            <option value="in front of">in front of</option>
                            <option value="behind">behind</option>
                            <option value=""></option>
                        </select>
                    </td>
                    <td>
                        Container: <input type="text" name="container" id="container">
                    </td>
                    <td>
                        Room:
                        <select name="room" id="room">
                            <option value="living room">living room</option>
                            <option value="bed room">bed room</option>
                            <option value="storage room">storage room</option>
                            <option value="kitchen">kitchen</option>
                            <option value="bath room">bath room</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        Comment: <input type="text" name="comment" id="comment"><br>
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
        <div id='ajaxDiv'>Your result will display here</div>        
    </body>
</html>

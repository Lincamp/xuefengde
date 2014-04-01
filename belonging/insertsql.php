<?php
session_start();
if (!session_is_registered(myusername)) {
    header("location:../login/login.php");
}
?>
<?php include_once("../inc/analyticstracking.php") ?>    

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../inc/analyticstracking.php';
//require '../inc/menu.php';
require '../inc/database.php';

$itemlist = $_GET['itemname'];
$number = $_GET['number'];
$position = $_GET['position'];
$container = $_GET['container'];
$room = $_GET['room'];
$type = $_GET['type'];
$comment = $_GET['comment'];

//echo "################################<br>";

$delimiter = ';';
$countAscii = count_chars($itemlist, 0);
$itemCount = $countAscii[59] + 1;
$items = explode($delimiter, $itemlist, $itemCount);

// Only print out if there are more than one items
if ($itemCount > 1) {
    echo "$itemCount items<br>";

    print_r($items);
    echo "<br>";
}

echo "$itemlist $number $position $container $room $type </br>";

if ($itemlist != "") {
    $con = connect_db();
    $username = $_SESSION['login_user'];
    $sqlcmd = "SELECT id FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $sqlcmd);
    $row = mysqli_fetch_array($result);
    //print_r($row);
    $userId = $row['id'];
    //echo "user_id:$userId<br>";        
    //echo 'Connected successfully<br>';

    for ($i = 0; $i < $itemCount; $i++) {
        $item = $items[$i];

        $sqlcmd = "INSERT INTO belonging (name, number, position, container, room, type, user_id, comment)
        VALUES ('$item', $number, '$position', '$container', '$room', '$type', '$userId', '$comment')";
        //$result = mysqli_query($con,"SELECT * FROM belonging");
        //echo "$sqlcmd<br>";

        if (!mysqli_query($con, $sqlcmd)) {
            die('Error: ' . mysqli_error($con));
        } else {
            echo "Record added.";
			echo (gettext("Hello"));
        }
    }

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="thousestyle.css">
</head>
<body>
<!--a href="thouse.php" target="_self">show all</a>
<a href="tform.php" target="_self">search</a>
<a href="tinsert.php" target="_self">insert</a-->

<ul id="menu">
    <li><a href="thouse.php" target="_self">show all</a></li>
    <li><a href="tform.php" target="_self">search</a></li>
    <li><a href="tinsert.php" target="_self">insert</a></li>
</ul><br><br>
    
<h1>This page is dedicated to managing my belongings.</h1>

<form name="input" action="tinsert.php" method="post">
<select name="number">
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
Item name:
<input type="text" name="itemname">

<!--input type="text" name="number"<br-->

Type:
<select name="type">
<option value=""></option>    
<option value="clothes">clothes</option>
<option value="food">food</option>
<option value="electronic device">electronic device</option>
<option value="stationary">stationary</option>
<option value="others">others</option>
</select><br>

<select name="position">
<option value="in">in</option>
<option value="on">on</option>
<option value="under">under</option>
<option value="in front of">in front of</option>
<option value="behind">behind</option>
<option value=""></option>
</select>

Container: <input type="text" name="container">

Room:
<select name="room">
<option value="living room">living room</option>
<option value="bed room">bed room</option>
<option value="storage room">storage room</option>
<option value="kitchen">kitchen</option>
<option value="bath room">bath room</option>
</select><br>

Comment: <input type="text" name="comment"><br>

<input type="submit" value="Submit"><br>
</form>

<?php
$itemlist = $_POST["itemname"];
$number = $_POST["number"];
$position = $_POST["position"];
$container = $_POST["container"];
$room = $_POST["room"];
$type = $_POST["type"];
$comment = $_POST["comment"];

$delimiter = ';';
$countAscii = count_chars($itemlist, 0);
$itemCount = $countAscii[59] + 1;
echo "$countAscii[59] items<br>";
$items = explode($delimiter, $itemlist, $itemCount);
print_r($items);

echo "$itemlist $number $position $container $room $type </br>";

if($itemlist != "")
{
    $con=mysqli_connect('xuefeng.de.mysql','xuefeng_de','CUmYAQ2c','xuefeng_de');
    //if (!$con)
    if (mysqli_connect_errno($con)) 
    {
        //die('Could not connect: ' . mysql_error());
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_set_charset($con,"utf8");
    
    //echo 'Connected successfully<br>';

    for($i = 0; $i < $itemCount; $i++)
    {
        $item = $items[$i];
        $sqlcmd = "INSERT INTO belonging (name, number, position, container, room, type, comment)
        VALUES ('$item', $number, '$position', '$container', '$room', '$type', '$comment')";
        //$result = mysqli_query($con,"SELECT * FROM belonging");
        if(!mysqli_query($con, $sqlcmd))
        {
            die('Error: ' . mysqli_error($con));
        }
        else 
        {
            echo "Record added.";    
        }
    }
    
    mysqli_close($con);
}

?>
</body>
</html>
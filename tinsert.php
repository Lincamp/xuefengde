<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="thousestyle.css">
</head>
<body>

<?php include_once("inc/analyticstracking.php") ?>    
<?php
require 'inc/analyticstracking.php';
require 'inc/menu.php';
require 'inc/database.php';
?>

<script>
//document.write("<p>My First JavaScript</p>");
function validateForm()
{
    var x=document.forms["input"]["itemname"].value;
    if (x==null || x=="")
    {
        alert("Name of the item(s) must be filled out");
        return false;
    }
}
</script>
   
<form name="input" action="tinsert.php" method="post" onsubmit="return validateForm()">
<table>
    <tr>
        <td>
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
        </td>
        <td>
            Item name:*
            <input type="text" name="itemname">
        </td>
        <td>
            Type:
            <select name="type">
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
            <select name="position">
            <option value="in">in</option>
            <option value="on">on</option>
            <option value="under">under</option>
            <option value="in front of">in front of</option>
            <option value="behind">behind</option>
            <option value=""></option>
            </select>
        </td>
        <td>
            Container: <input type="text" name="container">
        </td>
        <td>
            Room:
            <select name="room">
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
            Comment: <input type="text" name="comment"><br>
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center">
        <input type="submit" value="Submit"><br>
        </td>
    </tr>
</table>
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
$items = explode($delimiter, $itemlist, $itemCount);

// Only print out if there are more than one items
if($itemCount > 1)
{
    echo "$itemCount items<br>";
    
    print_r($items);
    echo "<br>";
}

echo "$itemlist $number $position $container $room $type </br>";

if($itemlist != "")
{
    $con = connect_db();
    
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
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
<?php include_once("inc/analyticstracking.php") ?>
<?php
require 'inc/menu.php'; 
require 'inc/database.php';
$con = connect_db();
?>

<script>
function validateForm()
{
    var x=document.forms["input"]["item"].value;
    if (x==null || x=="")
    {
        alert("Name of the item must be filled out");
        return false;
    }
}
</script>
<form name="input" action="tform.php" method="post" onsubmit="return validateForm()">
Where have I put my: <input type="text" name="item">
<input type="submit" value="Submit">
</form>

<?php
/*
if(isset($_POST["item"]))
{
    echo "SUBMITTED<br>";
}
else
{
    echo "UNSUBMITTED<br>";
}
*/
$item1 = $_POST["item"];

//echo "SELECT * FROM belonging WHERE name LIKE '%$item1%' ORDER BY change_date DESC";
if($item1 != "")
{
    $result = mysqli_query($con, "SELECT * FROM belonging WHERE name like '%$item1%' ORDER BY change_date DESC");

echo "<br>";
/*
if($item1 != "")
{
    echo 'I would like to know where I have put my ' . "$item1" . '<br>';
}
 * 
 */

$count = 0;

while($row = mysqli_fetch_array($result))
{
    $count++;
//    echo "$count<br>";
    if($count == 1)
    {      
        echo '<table border="1">';
        echo '<tr>';
        echo '<td>Item</td>
              <td>Number</td>
              <td>Location</td>
              <td>Room</td>
              <td>Comment</td>
              <td>Last updated</td>';
        echo '</tr>';
    }
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['number'] . '</td>';
    echo '<td>' . $row['position'];
    echo ' '    . $row['container'] . '</td>';
    echo '<td>' . $row['room'] . '</td>';
    echo '<td>' . $row['comment'] . '</td>';
    echo '<td>' . $row['change_date'] . '</td>';
    echo '</tr>';
}

if($count)
    echo '</table>';

else if($item1 != "")
{
    echo 'The item is not found.';
}
else
{
    echo 'Nothing is submitted!';
}
}
else
{
 //   echo '<br>Nothing is submitted!';
 //   $result = mysqli_query($con, "SELECT * FROM belonging WHERE name = '$item1' ORDER BY change_date DESC");;
}
    mysqli_close($con);
?>    

</body>

</html>
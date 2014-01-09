<!DOCTYPE html>
<html>
<body>

<h1>The page is dedicated to managing my belongings.</h1>

<?php
$con=mysqli_connect('xuefeng.de.mysql','xuefeng_de','CUmYAQ2c','xuefeng_de');
//if (!$con)
if (mysqli_connect_errno($con)) 
{
    die('Could not connect: ' . mysql_error());
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo 'Connected successfully<br>';

//echo 'I would like to know where I have put my ' . $_POST["item"] . '<br>';
$item1 = $_POST["item"];

$result = mysqli_query($con, "SELECT * FROM belonging where name = '$item1'");

if($item1 != "")
{
    echo 'I would like to know where I have put my ' . "$item1" . '<br>';
}
$count = 0;

while($row = mysqli_fetch_array($result))
  {
      $count++;
  if($count == 1)
  {      
      echo '<table border="1">';
      echo '<tr>';
      echo '<td>Item</td> <td>Number</td> <td>Location</td>  <td>Room</td> <td>Last updated</td>';
      echo '</tr>';
  }
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['number'] . '</td>';
  echo '<td>' . $row['position'];
  echo ' '    . $row['container'] . '</td>';
  echo '<td>' . $row['room'] . '</td>';
  echo '<td>' . $row['change_date'] . '</td>';
  echo "<br>"; 
  }
  if($count == 1)
      echo '</table>';
  else if($item1 != "")
  {
      echo 'The item is not found.';
  }
  else
  {
      echo 'Nothing is submitted!';
  }
mysqli_close($con);
?>
</body>
</html>
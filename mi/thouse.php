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

<h1>The page is dedicated to managing my belongings.</h1>

<?php

$con=mysqli_connect('xuefeng.de.mysql','xuefeng_de','CUmYAQ2c','xuefeng_de');

if (mysqli_connect_errno($con))
{
    die('Could not connect: ' . mysql_error());
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_set_charset($con,"utf8");
//echo 'Connected successfully<br>';

$result = mysqli_query($con,"SELECT * FROM belonging");

echo '<table border="1">';
echo '<tr>';
echo '<td>Item</td>
      <td>Number</td>
      <td>Location</td>
      <td>Room</td>
      <td>Comment</td>
      <td>Last updated</td>';
echo '</tr>';

while($row = mysqli_fetch_array($result))
  {
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['number'] . '</td>';
  echo '<td>' . $row['position'];
  echo ' '    . $row['container'] . '</td>';
  echo '<td>' . $row['room'] . '</td>';
  echo '<td>' . $row['comment'] . '</td>';
  echo '<td>' . $row['change_date'] . '</td>';
//  echo "<br>";
  echo '</tr>';
  }
echo '</table>';  
mysqli_close($con);
?>
</body>
</html>
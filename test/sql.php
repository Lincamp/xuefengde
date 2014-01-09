<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>

<h1>My First Heading</h1>

<p>My first paragraph.!!!测试</p>

<?php
$con=mysqli_connect('xuefeng.de.mysql','xuefeng_de','CUmYAQ2c','xuefeng_de');

if (mysqli_connect_errno($con)) 
{
    die('Could not connect: ' . mysql_error());
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo 'Connected successfully<br>';
mysqli_set_charset($con,"utf8");


//mysql_query("SET character_set_client=utf8", $con);
//mysql_query("SET character_set_connection=utf8", $con);

$result = mysqli_query($con,"SELECT * FROM test");

while($row = mysqli_fetch_array($result))
  {
  echo $row['id'] . " " . $row['string'];
  echo "<br>";
  }
  
mysqli_close($con);
?>

<a href="http://info.flagcounter.com/5OJP"><img src="http://s04.flagcounter.com/count/5OJP/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/" alt="Flag Counter" border="0"></a>
</body>
</html>
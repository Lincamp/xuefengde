<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="thousestyle.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42543853-1', 'xuefeng.de');
  ga('send', 'pageview');

</script> 
</head>
<body>

    
    
<?php 
require 'inc/menu.php';
require 'inc/database.php';

$con = connect_db();

$result = mysqli_query($con, "SELECT * FROM belonging ORDER BY name, change_date DESC");
$numOfRows = mysqli_num_rows($result);
echo "Number of rows: ". $numOfRows ."<br>";
?>
   
<form name="input" action="thouse.php" method="post">
<table border="1">
<tr>
    <td colspan="6" align="center">
    <input name="update" type="submit" id="update" value="Update">
    </td>
</tr>
<tr>
    <td  align="center">Item</td>
    <td  align="center">Number</td>
    <td  align="center">Location</td>
    <td  align="center">Room</td>
    <td  align="center">Comment</td>
    <td  align="center">Last updated</td>
</tr>

<?php
while($row = mysqli_fetch_array($result))
{
?>
<tr>
    <td> <input name="name" type="text" id="name" value="<? echo $row['name']; ?>"> </td>
    <td> <?php echo $row['number'];  ?> </td>
    <td> <?php echo $row['position']." ".$row['container']; ?> </td>
    <td> <?php echo $row['room']; ?> </td>
    <td> <input name="comment" type="text" id="name" value="<? echo $row['comment']; ?>"> </td>
    <td> <?php echo $row['change_date']; ?>  </td>
</tr>
<?php
}
?>

</table>
</form>

<?php
$isDeletePushed = isset($_POST['delete']);
$toBeDeleted = $_POST['toBeDeleted'];

if($isDeletePushed)
{
//echo "delete button pushed<br>";
//print_r($toBeDeleted);

/* this method seems slow
//$sqlcmd = "DELETE FROM belonging WHERE id in ";
//$sqlcmd .= "(".implode(",", array_values($toBeDeleted)).")";
//echo "$sqlcmd";
//$result = mysqli_query($con, "$sqlcmd");
*/
//
//echo "<br>";
//echo "number of rows to be deleted: ".count($toBeDeleted);
//echo "<br>";

    if(count($toBeDeleted))
    {
        foreach($toBeDeleted as $del_id)
        {
            echo $del_id."<br>";
            $result = mysqli_query($con, "DELETE FROM belonging WHERE id = $del_id");
        }

        echo "<meta http-equiv=\"refresh\" content=\"0;URL=thouse.php\">";
    }
}

mysqli_close($con);
?>
    
    
  
</body>
</html>
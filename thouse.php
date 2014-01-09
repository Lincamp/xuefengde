<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="thousestyle.css">
</head>
<body>

<?php include_once("inc/analyticstracking.php") ?>    
<?php 
require 'inc/menu.php';
require 'inc/database.php';
$numDeletedRows = 0;

$con = connect_db();

$result = mysqli_query($con, "SELECT * FROM belonging ORDER BY name, change_date DESC");
$numOfRows = mysqli_num_rows($result);
echo "Number of rows: ". $numOfRows ."<br>";
if(isset($_POST['delete']))
{
    echo ", $numDeletedRows rows just deleted";
}  
?>
   
<form name="input" action="thouse.php" method="post">
<table border="1">
<tr>
    <td colspan="7" align="center">
    <input name="delete" type="submit" id="delete" value="Delete">
    </td>
</tr>
<tr>
    <td  align="center" colspan="2">Item</td>
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
    <td align="center">
    <input type="checkbox" name="toBeDeleted[<?php echo $row['id']; ?>]" id="checkbox[<?php echo $row['id']; ?>]" value= "<?php echo $row['id']; ?>">
    </td>
    <td>  <?php echo $row['name']; ?> </td>
    <td>  <?php echo $row['number'];  ?> </td>
    <td>  <?php echo $row['position']." ".$row['container']; ?> </td>
    <td>  <?php echo $row['room']; ?> </td>
    <td>  <?php echo $row['comment']; ?>  </td>
    <td>  <?php echo $row['change_date']; ?>  </td>
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

    $numDeletedRows = count($toBeDeleted);
    if($numDeletedRows)
    {
        foreach($toBeDeleted as $del_id)
        {
            echo $del_id."<br>";
            $result = mysqli_query($con, "DELETE FROM belonging WHERE id = $del_id");
        }

//        echo "<meta http-equiv=\"refresh\" content=\"0;URL=thouse.php\">";
    }
}

mysqli_close($con);
?>
</body>
</html>
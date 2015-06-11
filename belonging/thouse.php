<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//if(!session_is_registered(myusername))
//{
//    header("location:../login/login.php");
//}
if (!isset($_SESSION['myusername'])) {
    header("location:../login/login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" href="thousestyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include_once("../inc/analyticstracking.php") ?>   
        <div class="container">
            <?php
            require_once '../menu.php';
            require_once 'menu.php';
            require_once '../inc/database.php';

            $username = $_SESSION['login_user'];

            $numDeletedRows = 0;

            $con = connect_db();

//echo "$username<br>";

            $sqlcmd = "SELECT b.id, b.name, b.number, b.position, b.container, b.room, b.comment, b.change_date 
           FROM belonging b, user u 
           WHERE b.user_id = u.id 
           AND u.username = '$username' 
           ORDER BY name, change_date DESC";

            $result = mysqli_query($con, $sqlcmd);
//$numOfRows = mysqli_num_rows($result);
//echo "Number of rows seleted: ". $numOfRows ."<br>";
//    print_r($result);
            if (isset($_POST['delete'])) {
                echo ", $numDeletedRows rows just deleted";
            }
            ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4><?php echo _("This page is dedicated to managing my belongings."); ?></h4>
                </div>
                <div class="panel-body"> 

                    <form name="input" action="thouse.php" method="post">
                        <table class="table table-striped">
                            <tr>
                                <td colspan="7" align="center">
                                    <input name="delete" type="submit" id="delete" value="Delete">
                                    <input name="deleteOld" type="submit" id="deleteOld" value="Delete old records">
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
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td align="center">
                                        <input type="checkbox" name="toBeDeleted[<?php echo $row['id']; ?>]" id="checkbox[<?php echo $row['id']; ?>]" value= "<?php echo $row['id']; ?>">
                                    </td>
                                    <td>  <?php echo $row['name']; ?> </td>
                                    <td>  <?php echo $row['number']; ?> </td>
                                    <td>  <?php echo $row['position'] . " " . $row['container']; ?> </td>
                                    <td>  <?php echo $row['room']; ?> </td>
                                    <td>  <?php echo $row['comment']; ?>  </td>
                                    <td>  <?php echo $row['change_date']; ?>  </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                    </form>
                </div>
            </div>
        </div>
        <?php
        $isDeletePushed = isset($_POST['delete']);
        $isDelOldPushed = isset($_POST['deleteOld']);
        $toBeDeleted = $_POST['toBeDeleted'];

//print_r($toBeDeleted);

        if ($isDeletePushed) {
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
//
//echo "delete button pushed<br>";

            $numDeletedRows = count($toBeDeleted);
            echo "$numDeletedRows records are selected<br>";
            if ($numDeletedRows) {
                foreach ($toBeDeleted as $del_id) {
                    echo "item_id: $del_id.<br>";
                    $sqlcmd = "DELETE FROM belonging WHERE id = $del_id";
                    $result = mysqli_query($con, $sqlcmd);
                }

                echo "<meta http-equiv=\"refresh\" content=\"0;URL=thouse.php\">";
            }
        }

        if ($isDelOldPushed) {
            // Get the user_id in belonging table
            $sqlcmd = "SELECT id FROM user WHERE username = '$username'";
            $result = mysqli_query($con, $sqlcmd);
            $row = mysqli_fetch_array($result);
            $uid = $row[id];

            $sqlcmd = "DELETE FROM belonging WHERE id in (
               SELECT id FROM(
               SELECT id
                   FROM(select * from belonging
                   WHERE user_id = $uid) origin
               INNER JOIN(
                   SELECT MAX(change_date) AS lastDate, name
                   FROM belonging
                   WHERE belonging.user_id = $uid
                   GROUP BY name
                   HAVING count(*) > 1) duplic 
               ON duplic.name = origin.name
               WHERE origin.change_date < duplic.lastDate) x)";
            /*
             * // less efficient, because first join, then where clause
             * $sqlcmd = "DELETE belonging
              FROM belonging
              INNER JOIN(
              SELECT MAX(change_date) AS lastDate, name
              FROM belonging
              WHERE belonging.user_id = $uid)
              GROUP BY name
              HAVING count(*) > 1) duplic
              ON duplic.name = belonging.name
              WHERE belonging.change_date < duplic.lastDate
              AND belonging.user_id = $uid;"; */
            $result = mysqli_query($con, $sqlcmd);

            echo "<meta http-equiv=\"refresh\" content=\"0;URL=thouse.php\">";
        }

        mysqli_close($con);
        ?>
    </body>
</html>
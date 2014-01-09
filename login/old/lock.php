<?php
require '../inc/database.php';
//include("config.php");
$bd = connect_db();

echo "1#########################<br>";

session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select username from user where username='$user_check' ");

$row=mysql_fetch_array($ses_sql);

$login_session=$row['username'];

if(!isset($login_session))
{
header("Location: login.php");
}
?>

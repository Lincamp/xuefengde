<?php
//include('lock.php');

session_start();
if(!session_is_registered(myusername))
{
    header("location:login.php");
}
?>
<body>
<h1>Welcome <?php echo $login_user.$_SESSION['login_user'].isset($_SESSION['login_user']); ?></h1>
</body>

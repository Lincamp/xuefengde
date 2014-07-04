<?php
session_start();
$username = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/sanhangCss.css">
        <title>three lines</title>        
    </head>
    <body>
        <div id = content>
        <?php
        if ($username === "Lincamp" || $username === "dorothy") {
        echo "<div class=\"threeLine\">";
        echo "都行<br>";
        echo "我在上面<br>";
        echo "还要什么<br>";
        echo "</div>";
        
        echo "<br>";
        echo "<br>";
        
        echo "<div class=\"threeLine\">";        
        echo "Je t'aimais<br>";        
        echo "Je t'aime<br>";
        echo "Et je t'aimerais<br>";
        echo "</div>";
        
        echo "<br>";
        echo "<br>";
        
        echo "<div class=\"threeLine\">";        
        echo "Lufthansa, Thalys, 老头<br>";        
        echo "都是好东西<br>";
        echo "也不是好东西<br>";
        echo "</div>";        
        }
        ?>
        </div>
    </body>
</html>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // set the locale into the instance of gettext 
        setlocale(LC_ALL, "fr_FR.utf8");

        // 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
        bindtextdomain("fr1", "../locale");

        // Choose domain 
        textdomain("fr1");

        // Print a test message 
        echo (gettext("Hello"));
        ?>
    </body>
</html>

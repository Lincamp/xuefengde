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
        // Set language to German 
        putenv("LC_ALL=fr_FR.utf8");

        // set the locale into the instance of gettext 
        setlocale(LC_ALL, "fr.utf8");

        // Specify location of translation tables 
        bindtextdomain("fr", "../locale");

        // Choose domain 
        textdomain("fr");

        // Print a test message 
        echo (gettext("Hello"));
        ?>
    </body>
</html>

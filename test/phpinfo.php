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
// Show all information, defaults to INFO_ALL
        phpinfo();

// Show just the module information.
// phpinfo(8) yields identical results.
        phpinfo(INFO_MODULES);
        ?>
    </body>
</html>

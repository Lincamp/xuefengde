<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php
        require_once '../inc/gettext.php';
//echo 'This is a included message <br>';
        /*
         * To change this template, choose Tools | Templates
         * and open the template in the editor.
         */
        ?>

        <ul id="menu" class="nav nav-tabs">
            <li><a href="search.php" target="_self"><?php echo (_("search")); ?></a></li>
            <li><a href="insert.php" target="_self"><?php echo (_("insert")); ?></a></li>

            <li><a href="thouse.php" target="_self"><?php echo (_("show")); ?></a>
                <ul>
                    <li><a href="#"><?php echo (_("Clothes")); ?></a></li>
                    <li><a href="#"><?php echo (_("Food")); ?></a></li>
                    <li><a href="#"><?php echo (_("Electronic Device")); ?></a></li>
                </ul>
            </li>


            <li><a href="tupdate.php" target="_self"><?php echo (_("update")); ?> </a></li>
        </ul><br>

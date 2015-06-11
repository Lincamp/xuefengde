<?php
        require_once '../inc/gettext.php';
//echo 'This is a included message <br>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<ul id="menu">
    <li><a href="thouse.php" target="_self"><?php echo (_("show")); ?></a>
        <ul>
            <li><a href="#"><?php echo (_("Clothes")); ?></a></li>
            <li><a href="#"><?php echo (_("Food")); ?></a></li>
            <li><a href="#"><?php echo (_("Electronic Device")); ?></a></li>
        </ul>
    </li>

    <li><a href="search.php" target="_self"><?php echo (_("search")); ?></a></li>
    <li><a href="insert.php" target="_self"><?php echo (_("insert")); ?></a></li>
    <li><a href="tupdate.php" target="_self"><?php echo (_("update")); ?> </a></li>
</ul><br><br>

<h1><?php echo _("This page is dedicated to managing my belongings."); ?></h1>

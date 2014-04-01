<?php
        require_once '../inc/gettext.php';
//echo 'This is a included message <br>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<a href="?locale=en_US">English</a> |
<a href="?locale=es_ES">Spanish</a> |
<a href="?locale=de_DE">German</a><br>
<!--a href="thouse.php" target="_self">show all</a>
<a href="tform.php" target="_self">search</a>
<a href="tinsert.php" target="_self">insert</a-->

<ul id="menu">
    <li><a href="thouse.php" target="_self">show all</a>
        <ul>
            <li><a href="#">Clothes</a></li>
            <li><a href="#">Food</a></li>
            <li><a href="#">Electronic Device</a></li>
        </ul>
    </li>

    <li><a href="search.php" target="_self">search</a></li>
    <li><a href="insert.php" target="_self">insert</a></li>
    <li><a href="tupdate.php" target="_self">update</a></li>
</ul><br><br>

<h1><?php echo _("This page is dedicated to managing my belongings."); echo (gettext("Hello")); ?></h1>

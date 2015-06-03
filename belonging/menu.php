<?php
        require_once '../inc/gettext.php';
//echo 'This is a included message <br>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div align="right">
    <span align="left">
        <a href="http://xuefeng.de" align="left">xuefeng.de</a>
    </span>
    <span align="right">
        <a href="?locale=en_US">English</a> |
        <a href="?locale=fr_FR">Français</a> |
        <a href="?locale=de_DE">Deutsch</a> |
        <a href="?locale=zh_CN">中文</a> |
        <a href="?locale=es_ES">Español</a> &nbsp;&nbsp;&nbsp;
        <a href="../login/register.php">register</a>
        <a href="../login/login.php">login</a>
        <a href="../login/logout.php">logout</a>
        <br>
    </span>
</div>

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

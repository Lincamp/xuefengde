<?php
require_once 'inc/gettext.php';
//echo 'This is a included message <br>';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class = "row">
    <div class = "col-md-1 col-sm-1 col-xs-1">        
        <a href="http://xuefeng.de" align="left">xuefeng.de</a>
    </div>

    <div class = "col-md-11 col-sm-11 col-xs-11" style="text-align:right">
        <a href="?locale=en_US">English</a> |
        <a href="?locale=fr_FR">Français</a> |
        <a href="?locale=de_DE">Deutsch</a> |
        <a href="?locale=zh_CN">中文</a> |
        <a href="?locale=es_ES">Español</a> &nbsp;&nbsp;&nbsp;
        <a href="../login/register.php">register</a>
        <a href="../login/login.php">login</a>
        <a href="../login/logout.php">logout</a>
    </div>
    <br>
</div>



<div align="right">
    <span align="left">

    </span>
    <span align="right">

    </span>
</div>

<h1><?php //echo _("This page is dedicated to managing my belongings.");        ?></h1>

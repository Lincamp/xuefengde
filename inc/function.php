<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getAbsPath($oriDirName, $path) {
    $pathname = substr($oriDirName, strpos($oriDirName, "www")) . "<br>";
    $slashCount = substr_count($pathname, "/");
    $absPath = "";
    for ($i = 0; $i < $slashCount; $i++) {
        $absPath = "../" . $absPath;
    }
    $absPath = $absPath . $path;
    return $absPath;
}
<?php
// 0: en, 1:fr, 2:de 3:cn 4:es
$lang = 4;

// set the locale into the instance of gettext 
if ($lang == 1) {
    setlocale(LC_ALL, "fr_FR.utf8");
    echo "fr<br>";
    // 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
    bindtextdomain("fr", "../locale");

    // Choose domain 
    textdomain("fr");
} else if ($lang == 2) {
    setlocale(LC_ALL, "de_DE.utf8");
    echo "de<br>";
    // 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
    bindtextdomain("de", "../locale");
    // Choose domain 
    textdomain("de");
} else if ($lang == 3) {
    setlocale(LC_ALL, "zh_CN.utf8");
    echo "cn<br>";
    // 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
    bindtextdomain("cn", "../locale");
//bind_textdomain_codeset("cn", 'UTF-8');
    // Choose domain 
    textdomain("cn");
} else if ($lang == 4) {
    setlocale(LC_ALL, "es_ES.utf8");
    echo "es<br>";
    // 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
    bindtextdomain("es", "../locale");
    //bind_textdomain_codeset("es", 'UTF-8');
    // Choose domain 
    textdomain("es");
}

// Print a test message 
echo (gettext("Hello")) . "<br>";
?>


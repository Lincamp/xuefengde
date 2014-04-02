<?php

// 0: en, 1:fr, 2:de 3:cn 4:es
$lang = 2;

$locale = false;
if (isSet($_GET["locale"])) {
    $locale = $_GET["locale"];
    setcookie("locale", $locale);// save a cookie
}
if (!$locale && isSet($_COOKIE["locale"])){
$locale = $_COOKIE["locale"];
}
else if(!$locale)
{
    $locale = "en_US";
}

echo $locale;

// set the locale into the instance of gettext
if ($lang == 3) {
setlocale(LC_ALL, "zh_CN.utf8");
//echo "cn";
// 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
bindtextdomain("cn", "../locale");
bind_textdomain_codeset("cn", 'UTF-8');
// Choose domain 
textdomain("cn");
} else {
setlocale(LC_ALL, $locale.".utf8");
//echo "de";
// 这一行设置路径，"locale"是语言包路径，一般用相对路径，如果这个文件在刚刚那个test目录里面这里就应该是"../locale"
bindtextdomain($locale, "../locale");
// Choose domain 
textdomain($locale);
}

echo " ";
// Print a test message 
echo (gettext("Hello"));
?>


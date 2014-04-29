<?php
session_start();
$username = $_SESSION['login_user'];
//echo "============1" . $username;
//if (!session_is_registered(myusername)) {
//    echo "============3" . $username;
//}
//echo "============4" . $username;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/inputCss.css">
        <title>cost calculator</title>
        <script>
            var EURO = 8.7;
            var bubbleWrap = 2;
            function doMath(autoPost) {

                var prePrice = 14.95;
                var onePrice = 13.95;
                var twoPrice = 13.95;
                var threePrice = 13.95;
                var oneplusPrice = 9.25;
                var twoplusPrice = 9.25;

                var aptpreval = document.getElementById('aptpre').value;
                var aptprenum;
                if (aptpreval == null || aptpreval == "")
                {
                    aptprenum = 0;
                }
                else
                {
                    aptprenum = parseInt(aptpreval);
                }

                var apt1val = document.getElementById('apt1').value;
                var apt1num;
                if (apt1val == null || apt1val == "")
                {
                    apt1num = 0;
                }
                else
                {
                    apt1num = parseInt(apt1val);
                }

                var apt2val = document.getElementById('apt2').value;
                var apt2num;
                if (apt2val == null || apt2val == "")
                {
                    apt2num = 0;
                }
                else
                {
                    apt2num = parseInt(apt2val);
                }

                var apt3val = document.getElementById('apt3').value;
                var apt3num;
                if (apt3val == null || apt3val == "")
                {
                    apt3num = 0;
                }
                else
                {
                    apt3num = parseInt(apt3val);
                }

                var apt1plusval = document.getElementById('apt1plus').value;
                var apt1plusnum;
                if (apt1plusval == null || apt1plusval == "")
                {
                    apt1plusnum = 0;
                }
                else
                {
                    apt1plusnum = parseInt(apt1plusval);
                }

                var apt2plusval = document.getElementById('apt2plus').value;
                var apt2plusnum;
                if (apt2plusval == null || apt2plusval == "")
                {
                    apt2plusnum = 0;
                }
                else
                {
                    apt2plusnum = parseInt(apt2plusval);
                }

                // Weight
                var weight = (aptprenum + apt1num + apt2num + apt3num) * 0.8 + (apt1plusnum + apt2plusnum) * 0.6;
                weight = parseFloat(Math.round(weight * 10) / 10).toFixed(1);

                var GW;
                var tmpGW;
                if (weight == 0)
                {
                    GW = 0;
                }
                else
                {
                    tmpGW = weight;
                    //GW = weight + 1.3;
                    GW = Math.ceil(parseFloat(weight) + 1.3);
                }

                // Other cost
                var otherCost;
                var otherval = document.getElementById('otherCost').value;
                if (otherval == null || otherval == "")
                {
                    otherCost = 0;
                }
                else
                {
                    otherCost = parseFloat(otherval);
                }

                // Postage
                var postage;
                var postval = document.getElementById('postage').value;

                if (autoPost == 1 || postval == null || postval == "")
                {
                    switch (GW)
                    {
                        case 3:
                            postage = 195.5;
                            break;
                        case 4:
                            postage = 212.5;
                            break;
                        case 5:
                            postage = 211.8;
                            break;
                        case 6:
                            postage = 228.8;
                            break;
                        case 7:
                            postage = 246;
                            break;
                        case 8:
                            postage = 263;
                            break;
                        case 9:
                            postage = 288;
                            break;
                        case 10:
                            postage = 305;
                            break;
                        case 11:
                            postage = 348;
                            break;
                        case 12:
                            postage = 357;
                            break;
                        case 13:
                            postage = 365;
                            break;
                        case 14:
                            postage = 391;
                            break;
                        case 15:
                            postage = 408;
                            break;
                        default:
                            postage = 0;
                    }
                    //document.write("!!!!!" + postage);
                }
                else
                {
                    postage = parseInt(postval);
                }

                var sixhPostage;
                var eighthPostage;
                var sixhCost;
                var eighthCost;

                if (weight > 0)
                {
                    sixhPostage = postage / weight * 0.6;
                    eighthPostage = postage / weight * 0.8;

                }
                else
                {
                    sixhPostage = 0;
                    eighthPostage = 0;
                }
                
                sixhPostage = parseFloat(parseFloat(Math.round(sixhPostage * 100) / 100).toFixed(2));
                eighthPostage = parseFloat(parseFloat(Math.round(eighthPostage * 100) / 100).toFixed(2));
                sixhCost = sixhPostage + oneplusPrice * EURO;
                eighthCost = eighthPostage + onePrice * EURO;

                sixhPostage = parseFloat(parseFloat(Math.round(sixhPostage * 100) / 100).toFixed(2));
                eighthPostage = parseFloat(parseFloat(Math.round(eighthPostage * 100) / 100).toFixed(2));
                sixhCost = parseFloat(parseFloat(Math.round(sixhCost * 100) / 100).toFixed(2));
                eighthCost = parseFloat(parseFloat(Math.round(eighthCost * 100) / 100).toFixed(2));

                // Schutzfolie cost
                var packCost = (aptprenum + apt1num + apt2num + apt3num) * bubbleWrap;
                var euroCost = aptprenum * prePrice +
                        apt1num * onePrice +
                        apt2num * twoPrice +
                        apt3num * threePrice +
                        apt1plusnum * oneplusPrice +
                        apt2plusnum * twoplusPrice +
                        otherCost;
                euroCost = parseFloat(parseFloat(Math.round(euroCost * 100) / 100).toFixed(2));
                /*   
                 if(weight == 0)
                 {
                 postage = 0;
                 }*/

                var rmbCost = euroCost * EURO + packCost + postage;
                rmbCost = rmbCost.toFixed(0);
                if (!(isNaN(postage) ||
                        isNaN(euroCost) ||
                        isNaN(packCost) ||
                        isNaN(rmbCost) ||
                        isNaN(weight) ||
                        isNaN(GW)))
                {
                    //var finalCost = MATH.floor(rmbCost);
                    document.getElementById('postage').value = postage;
                    //var fomular = euroCost + " & times " + EURO + " + " + packCost + " + " + postage + " = " + rmbCost;
                    if (packCost != 0)
                    {
                        document.getElementById('calc').innerHTML = euroCost + " &times " + EURO + " + " + packCost + " + " + postage + " = " + rmbCost;
                    }
                    else
                    {
                        document.getElementById('calc').innerHTML = euroCost + " &times " + EURO + " + " + postage + " = " + rmbCost;
                    }
                    //document.getElementById('kilo').innerHTML = weight + " 公斤  ";
                    document.getElementById('gw').innerHTML = GW + " 公斤 （净重" + weight + " 公斤）";
                    document.getElementById('euro').innerHTML = euroCost + " 欧";
                    document.getElementById('total').innerHTML = rmbCost + " 元";
                    document.getElementById('sixhPostage').innerHTML = sixhPostage + " 元";
                    document.getElementById('eighthPostage').innerHTML = eighthPostage + " 元";
                    document.getElementById('sixhCost').innerHTML = sixhCost + " 元";
                    document.getElementById('eighthCost').innerHTML = eighthCost + " 元";
                }
                else
                {
                    //var finalCost = MATH.floor(rmbCost);
                    document.getElementById('postage').value = 0;
                    //var fomular = euroCost + " & times " + EURO + " + " + packCost + " + " + postage + " = " + rmbCost;

                    document.getElementById('calc').innerHTML = "";
                    document.getElementById('kilo').innerHTML = 0;
                    document.getElementById('gw').innerHTML = 0;
                    document.getElementById('euro').innerHTML = 0;
                    document.getElementById('total').innerHTML = 0;
                    document.getElementById('sixhPostage').innerHTML = 0;
                    document.getElementById('eighthPostage').innerHTML = 0;
                    document.getElementById('sixhCost').innerHTML = 0;
                    document.getElementById('eighthCost').innerHTML = 0;
                }
            }
        </script>
    </head>
    <body>
        <?php
//        if ($username === "Lincamp" || $username === "whbxld") {
//        echo "============" . $username;
//        }
        ?>
        <br>
        <div><label for="calc">计算:</label><span id="calc" class="result"></span></div>
        <br><br>
        <div><label for="aptpre">PRE: </label> <input type="text" id="aptpre" value="0" onBlur="doMath(1);" /><br>
            <label for="apt1">1: </label> <input type="text" id="apt1" value="0" onBlur="doMath(1);" /><br>
            <label for="apt2">2: </label> <input type="text" id="apt2" value="0" onBlur="doMath(1);" /><br>
            <label for="apt3">3: </label> <input type="text" id="apt3" value="0" onchange="doMath(1);" /><br>
            <label for="apt1plus">1+: </label> <input type="text" id="apt1plus" value="0" onchange="doMath(1);" /><br>
            <label for="apt2plus">2+: </label> <input type="text" id="apt2plus" value="0" onBlur="doMath(1);" /><br>
            <label for="otherCost">其他(欧元价值): </label> <input type="text" id="otherCost" onBlur="doMath(1);" /><br>
            <label for="postage">包裹单(人民币价值):</label> <input type="text" id="postage" onBlur="doMath(0);" /></div>
        <br><br>
        <div><label>包裹重量:</label> <span id="gw" class="result"></span><br>
            <label>价值:</label> <span id="euro" class="result"></span><br>
            <label>总价:</label> <span id="total" class="result"></span><br>
            <?php
            if ($username === "Lincamp" || $username === "whbxld") {
                echo "<label>600克运费:</label> <span id=\"sixhPostage\" class=\"result\"></span><br>";
                echo "<label>800克运费:</label> <span id=\"eighthPostage\" class=\"result\"></span><br>";
                echo "<label>600克成本:</label> <span id=\"sixhCost\" class=\"result\"></span><br>";
                echo "<label>800克成本:</label> <span id=\"eighthCost\" class=\"result\"></span><br>";
            }
            ?>
        </div>

        <br><br><br><br><br><br><br><br>
        <div><label>*</label><span class="result"> 自动计算出的包裹单价格只是粗略价格</span><br>
            <label>*</label><span class="result"> 汇率按照<script>document.write(EURO.toString());</script>计算</span><br>
            <label>*</label><span class="result"> P、1、2、3段每罐多<script>document.write(bubbleWrap.toString());</script>元保护费</span><br>
        </div>
    </body>
</html>

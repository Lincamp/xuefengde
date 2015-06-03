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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            require 'menu.php';

//        session_start();
//        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
//            echo "<h4>";
//            echo (_("I wrote a simple webpage to note down anything your want, to help your organize your things, thus to save your energy and time."
//                    . "<br>Please click the image below."));
//            echo "</h4>";
            echo "<br>";
            echo "<br>";
            ?> 

            <div class = "row">
                <div class = "col-sm-4">
                    <a href = "pink floyd/index.html">
                    </a>
                </div>
                <div class = "col-sm-4">
                    <h4>
                        <?php
                        echo (_("I wrote a simple webpage to note down anything your want, "
                                . "to help your organize your things, "
                                . "thus to save your energy and time. "
                                . "Please click the image below."));
                        ?> 
                    </h4>
                    <a href="/belonging/insert.php">
                        <img src="pic/organize.jpg" class="img-rounded" alt="Software for Organzing" style="width:350px;height:350px;border:10;"/>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="ajax/index.html">                        
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <a href="pink floyd/index.html">
                        <img src="pic/Pink Floyd The Wall.jpg" class="img-rounded" alt="Pink Floy The Wall" style="width:350px;height:350px;border:10;"/>                   
                    </a>
                </div>    
                <div class="col-sm-4">
                    <a href="ajax/index.html">
                        <img src="pic/AFC_Ajax_Amsterdam.png" class="img-rounded" alt="AFC Ajax Amsterdam" style="width:350px;height:350px;border:10;"/>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="/belonging/insert.php">                       
                        
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <a href="wuhan/index.php">                       
                        <img src="pic/wuhan.jpg" class="img-rounded" alt="Wuhan" style="width:700px;height:350px;border:10;"/>
                    </a>
                </div>
                <div class="col-sm-4">
                    <a href="wuhan/index.php">                       
                        <img src="pic/hsyfz.jpg" class="img-rounded" alt="Wuhan" style="width:350px;height:350px;border:10;"/>
                    </a>
                </div>
            </div>
        </div>


        <!-- Start of StatCounter Code for Default Guide -->
        <script type="text/javascript">
            var sc_project = 9104726;
            var sc_invisible = 1;
            var sc_security = "4090b474";
            var scJsHost = (("https:" == document.location.protocol) ?
                    "https://secure." : "http://www.");
            document.write("<sc" + "ript type='text/javascript' src='" +
                    scJsHost +
                    "statcounter.com/counter/counter.js'></" + "script>");
        </script>
        <noscript><div class="statcounter"><a title="free hit
                                              counters" href="http://statcounter.com/free-hit-counter/"
                                              target="_blank"><img class="statcounter"
                                 src="http://c.statcounter.com/9104726/0/4090b474/1/"
                                 alt="free hit counters"></a></div></noscript>
        <!-- End of StatCounter Code for Default Guide -->
    </body>
</html>

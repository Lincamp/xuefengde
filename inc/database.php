<?php

function connect_db()
{
    //echo "Attempt to connect to MySQL: ";
    $con=mysqli_connect('xuefeng.de.mysql','xuefeng_de','CUmYAQ2c','xuefeng_de');
    //if (!$con)
    if (mysqli_connect_errno($con)) 
    {
        //die('Could not connect: ' . mysql_error());
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_set_charset($con,"utf8");
    
    return $con;
}
?>

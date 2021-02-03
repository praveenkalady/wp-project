<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $shopName = $_POST["shop-name"];
    $category = $_POST["category"];
    $mobile = $_POST["mobile"];
    $location = $_POST["location"];
    
    $con = mysql_connect("localhost","root","");

    if(!$con){
        die("Could not connect to database".mysql_error());   
    } else {
        echo "Success"
        mysql_select_db("user",$con);
        $sql = "INSERT INTO user (username,password) VALUES('$username','$password)";
        mysql_query($sql,$con);
        mysql_select_db("shop",$con);
        $sql2 = "INSERT INTO shop (shop-name,category,location,mobile) VALUES('$shopName','$category','$location','$mobile')";
        mysql_query($sql2,$con);
        mysql_select_db("user",$con);
        $sql3 = "SELECT * from user WHERE username = '$username'";
        $user = mysql_query($sql3,$con);
        if($user["user-id"]){
            session_start();
            $_SESSION["userid"] = $user["user-id"];
            echo $_SESSION["userid"];
        }
    }

?>
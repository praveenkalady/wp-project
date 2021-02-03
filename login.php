<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $con = mysql_connect("localhost","root","");
    echo $username;
    echo $password;
    if(!$con){
        die("Could not connect to database".mysql_error());   
    } else {
        mysql_select_db("tirurinfo",$con);
        $sql3 = "SELECT * from user WHERE username='$username' AND pass='$password'";
        $result = mysql_query($sql3,$con);
        if ($row = mysql_fetch_array($result)) {
            session_start();
            $_SESSION['userid'] = $row['userid'];
            echo $_SESSION['userid'];
          }
    }

?>
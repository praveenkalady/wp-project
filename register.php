<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $shopName = $_POST["shopname"];
    $category = $_POST["category"];
    $mobile = $_POST["mobile"];
    $place = $_POST["place"];
    
    $con = mysql_connect("localhost","root","");

    if(!$con){
        die("Could not connect to database".mysql_error());   
    } else {
        echo "Success";
        mysql_select_db("tirurinfo",$con);
        $sql = "INSERT INTO user(username,pass) VALUES('$username','$password')";
        mysql_query($sql,$con);
        $sql2 = "INSERT INTO shop(shopname,category,place,mobile,userid) VALUES('$shopName','$category','$place','$mobile',(SELECT userid FROM user WHERE username='$username'))";
        mysql_query($sql2,$con);
        $sql3 = "SELECT * from user WHERE username='$username'";
        $result = mysql_query($sql3,$con);
        if ($row = mysql_fetch_array($result)) {
            session_start();
            $_SESSION['userid'] = $row['userid'];
            echo "
            <script type=\"text/javascript\">
             window.alert('User Registration Successful !');
             window.location.href='/wp-project/view.php';
            </script>
            ";
          }
    }

?>
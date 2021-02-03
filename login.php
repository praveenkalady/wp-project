<?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $con = mysql_connect("localhost","root","");
    if(!$con){
        die("Could not connect to database".mysql_error());   
    } else {
        mysql_select_db("tirurinfo",$con);
        $sql3 = "SELECT * from user WHERE username='$username' AND pass='$password'";
        $result = mysql_query($sql3,$con);
        if ($row = mysql_fetch_array($result)) {
            session_start();
            $_SESSION['userid'] = $row['userid'];
            echo "
            <script type=\"text/javascript\">
             window.alert('User Login Successful !');
             window.location.href='/wp-project/view.php';
            </script>
            ";
          }
    }

?>
<?php
    $shopname = $_POST['shopname'];
    $category = $_POST['category'];
    $place = $_POST['place'];
    $mobile = $_POST['mobile'];
    $con = mysql_connect("localhost","root","");
    if(!$con){
        die("Could not connect to database".mysql_error());
    } else {
        session_start();
        $user = $_SESSION['userid'];
        mysql_select_db("tirurinfo",$con);
        $sql = "UPDATE shop SET shopname='$shopname', category='$category', place='$place', mobile='$mobile' WHERE userid='$user'";
        mysql_query($sql,$con);
        echo "
        <script type=\"text/javascript\">
         window.alert('Your shop details updated !');
         window.location.href='/wp-project/view.php';
        </script>
        ";
    }

?>
<?php
    session_start();
   if($_SESSION['userid']) {
        echo "
        <script type=\"text/javascript\">
        window.alert('User Logout Success');
        </script>
        ";
        session_start();
        $_SESSION['userid'] = '';
        echo "
        <script type=\"text/javascript\">
            window.location.href='/wp-project/index.html';
        </script>
        ";
   } else {
        echo "
        <script type=\"text/javascript\">
            window.location.href='/wp-project/index.html';
        </script>
        ";
   }
?>
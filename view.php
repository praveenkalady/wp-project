<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./tirur.css">
    <title>SHOP MANAGEMENT</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
        <a class="navbar-brand" href="index.html">TIRUR INFO BUSINESS DIRECTORY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.html">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="view.php">View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update.php">Update</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              </ul>
            </div>
    </nav>
<section class="mt-5">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <div class="card p-3">
                    <h1 class="text-center mb-3">Your Shop</h1>
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Shop Id</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Category</th>
      <th scope="col">Location</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
<tr>
    <?php
     session_start();
     $uid = $_SESSION["userid"];
     if($uid){
      $con = mysql_connect("localhost","root","");
      if(!$con){
        die("Could not connect to database".mysql_error());
      } else {
       mysql_select_db("tirurinfo",$con);
       $sql = "SELECT * FROM  shop WHERE userid='$uid'";
       $result = mysql_query($sql,$con);
       if($row = mysql_fetch_array($result)){
         echo "<td>";
         echo $row["shopid"];
         echo "</td>";
         echo "<td>";
         echo $row["shopname"];
         echo "</td>";
         echo "<td>";
         echo $row["category"];
         echo "</td>";
         echo "<td>";
         echo $row["place"];
         echo "</td>";
         echo "<td>";
         echo $row["mobile"];
         echo "</td>";
       }
      }
     } else {
       echo "<p class='text-center lead text-danger'>You need to authenticate first.</p>";
     }
    ?>
</tr>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
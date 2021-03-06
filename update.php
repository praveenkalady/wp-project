<?php
  $con = mysql_connect("localhost","root","");
  $shopname = '';
  $category = '';
  $place = '';
  $mobile = '';
  $isthere = false;
  if(!$con) {
    die("Could not connect to database".mysql_error());
  } else {
    session_start();
    $user = $_SESSION['userid'];
    if($user){
      $isthere = true;
      mysql_select_db('tirurinfo',$con);
      $sql = "SELECT shopname,category,place,mobile FROM shop WHERE userid='$user'";
      $result = mysql_query($sql,$con);
      if($row = mysql_fetch_array($result)){
        $shopname = $row['shopname'];
        $category = $row['category'];
        $place = $row['place'];
        $mobile = $row['mobile'];
      }
    }
  }
  
?>
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
                  <li class="nav-item ">
                    <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.html">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="view.php">View</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="update.php">Update</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  </ul>
                </div>
        </nav>
        <section class="container mt-5">
           <div class="row d-flex justify-content-center align-item-center">
               <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="card mt-3 shadow-lg p-3">
                        <h2 class="text-center mb-3">Update Your Shop</h2>
                        <form action="updater.php" method="post">
                            <div class="form-group">
                                <label for="shop-name">Shop Name</label>
                                <input type="text" value="<?=$shopname?>" name="shopname" class="form-control" placeholder="Enter your shop's name">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select value="<?=$category?>" class="form-control" name="category" >
                                <option value="none" selected disabled hidden> 
                                  Select your Category
                                  </option> 
                                    <option value="vegitable">Vegitable</option>
                                    <option value="Grocery">Grocery</option>
                                    <option value="Woods">Woods</option>
                                    <option value="Food Products">Food Products</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select value="<?=$place?>" class="form-control" name="place" >
                                <option value="none" selected disabled hidden> 
                                  Select your location
                                  </option> 
                                    <option value="Tirur">Tirur</option>
                                    <option value="BP Angadi">BP Angadi</option>
                                    <option value="Karathoor">Karathoor</option>
                                    <option value="Kolupalam">Kolupalam</option>
                                </select>
                          </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input type="number" name="mobile" value="<?=$mobile?>"  class="form-control" placeholder="Enter your mobile number">
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="login.html" class="btn btn-dark">Login</a>
                                <button <?php if (!$isthere){ ?> disabled <?php   } ?> type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
               </div>
           </div>
        </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
<?php    
    include 'server/models/database.php';
    $database = Database::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>Zen Ecommerce</title>
</head>
<body>
    <!--Navigation-->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Zen-Ecommerce</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">All Products</a></li>
        <li><a href="#">My Account</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
      <!-- Search box -->
      <form class="navbar-form navbar-left" role="search" method="get" action="results.php" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="user_query">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <!-- end:Search box -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Shopping Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
    <!--end:Navigation-->
    <!--main section-->
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <ul class="categories">
              <li>
                <a href="#">Categories <span class="glyphicon glyphicon-chevron-right"></span></a>
                <ul class="inner-list">
                  <!--<li><a href="#">Mobiles</a></li>
                  <li><a href="#">Cameras</a></li>
                  <li><a href="#">iPads</a></li>
                  <li><a href="#">Tablets</a></li>-->
                  <?php echo $database->getCats();?>
                </ul>
              </li>
              <li><a href="#">Brands <span class="glyphicon glyphicon-chevron-right"></span></a>
              <ul class="inner-list">
              <?php echo $database->getBrands();?>
              </ul>
              </li>
            </ul>
          </div>
          <div class="col-lg-10">
            Main Section Comes here
          </div>
        </div>
    </div>
    <!--end:main section-->











    <!--Scripts-->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/angular.min.js"></script>
    <script src="scripts/angular-animate.min.js"></script>
    <script src="scripts/app.min.js"></script>
</body>
</html>

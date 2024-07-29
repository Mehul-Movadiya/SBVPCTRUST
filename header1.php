<?php
include_once('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>SBVPCS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap5.css">
    
  </head>

  <body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
      <a href="index.php" class="navbar-brand font-weight-bold text-secondary">
        <img src="img/logo.png" class="logo" height="120px">
        <!-- <h4 style="color:skyblue; vertical-align: top;" class="d-inline-block py-4"><b>શ્રી સમસ્ત બાવનગોળ વાટલિયા </br><h4 style="color:skyblue;">&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspપ્રજાપતિ સમાજ</h4></b></h4> -->
        <span class="text-primary"><div style="display: inline-block;vertical-align:middle">સર્વ બાવનગોળ વાટલિયા<br>પ્રજાપતિ ચેરીટેબલ સમાજ</div></span>
    </a>
        <!-- <a
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px"
        >
          <i class="flaticon-043-teddy-bear"></i>
          <span class="text-primary">KidKinder</span>
        </a> -->
        
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="index.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'index.php')) echo "active";?>">Home</a>
            <a href="about.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'about.php')) echo "active";?>">About</a>
            <a href="committee.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'committee.php')) echo "active";?>">Committee</a>
            <a href="events.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'event')) echo "active";?>">Functions</a>
            <!-- <a href="gallery.html" class="nav-item nav-link">Gallery</a>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Pages</a
              >
              <div class="dropdown-menu rounded-0 m-0">
                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                <a href="single.html" class="dropdown-item">Blog Detail</a>
              </div>
            </div> -->
            <?php
            // session_start();
            if(isset($_COOKIE['member_id']))
            {
            ?>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle <?php if(str_contains($_SERVER['REQUEST_URI'],'my') or str_contains($_SERVER['REQUEST_URI'],'relative')) echo "active";?>"
                data-toggle="dropdown"
                >Myprofile</a
              >
            
            <div class="dropdown-menu rounded-0 m-0">
                <a href="myprofile.php" class="dropdown-item">Profile</a>
                <a href="myrelatives.php" class="dropdown-item">Relatives</a>
                <a href="logout.php" class="dropdown-item">Logout</a>
            </div>
            </div>
            <?php
            }
            else
            {
                ?>
            <a href="Login.php" class="nav-item nav-link">Login</a>
            <?php
            }
            ?>
          </div>
          <a href="memberlist.php" class="btn btn-primary px-4">Members</a>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->


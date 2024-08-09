<?php
session_start();

// If the session doesn't exist and there's no valid cookie, redirect to login page
if (!isset($_SESSION['member_id']) && !isset($_COOKIE['member_id'])) {
    header("Location: login.php");
    exit();
}

// If the session doesn't exist but the cookie does, recreate the session
if (!isset($_SESSION['member_id']) && isset($_COOKIE['member_id'])) {
    $_SESSION['member_id'] = $_COOKIE['member_id'];
    $_SESSION['member_name'] = $_COOKIE['member_name'];
}

include_once('dbconfig.php');
?>
<html lang="en">
<head>
<meta charset="utf-8" />
  <title>SBVPCT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  
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

    <style>
      .member-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
    }
    </style>
    


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- <script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script> -->
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>
</head>
<body>
<div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="index.php" class="navbar-brand font-weight-bold text-secondary">
                <span class="text-primary">
                    <div style="display: inline-block;vertical-align:middle">
                        સર્વ બાવનગોળ વાટલિયા<br>પ્રજાપતિ ચેરીટેબલ સમાજ
                    </div>
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
            <!-- <a href="about.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'about.php')) echo "active";?>">About</a>
            <a href="committee.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'committee.php')) echo "active";?>">Committee</a>
            <a href="events.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'event')) echo "active";?>">Functions</a>
            <a href="gallery.html" class="nav-item nav-link">Gallery</a>
            </div> -->
            
            </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



   
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">Members</h1>
        <div class="table-responsive">
            <table id="membersTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Education</th>
                        <th>Profession</th>
                        <th>Gender</th>
                        <th>Shakh</th>
                        <th>Contact No.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include_once('dbconfig.php');
                    $data = $conn->query("SELECT * FROM memberview");
                    while($row = $data->fetch_assoc()) {
                    ?>    
                    <tr>
                        <td><img src="memberimages/<?php echo $row['image']; ?>" class="member-image" alt="<?php echo $row['member_name']; ?>"></td>
                        <td><?php echo $row['member_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['education']; ?></td>
                        <td><?php echo $row['profession']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['gotra_name']; ?></td>
                        <td><?php echo $row['contact_no']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Members List End -->

<!-- Footer Start -->
<div
      class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
    >
      <div class="row pt-5">
        <div class="col-lg-4 col-md-6 mb-5">
         
          <center>
          <a href="index.php" class="navbar-brand font-weight-bold text-secondary">
            <img src="img/logo.png" class="logo" style="height: 200px;">
            <!-- <h4 style="color:skyblue; vertical-align: top;" class="d-inline-block py-4"><b>શ્રી સમસ્ત બાવનગોળ વાટલિયા </br><h4 style="color:skyblue;">&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspપ્રજાપતિ સમાજ</h4></b></h4> -->
            <span class="text-white"><div style="text-align: center;margin-top: 20px;font-family: 'rasabold';">સર્વ બાવનગોળ વાટલિયા<br>પ્રજાપતિ ચેરીટેબલ ટ્રસ્ટ</div></span>
        </a>
          
         
</center>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Get In Touch</h3>
          <div class="d-flex">
            <h4 class="fa fa-map-marker-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Address</h5>
              <p>115, ANAND VIHAR BUNGALOW,IOC ROAD CHANDKHEDA,
TRAGAD,AHMEDABAD
AHMEDABAD
GUJARAT - INDIA - 382424</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Email</h5>
              <p>info@sbvpctrust.com</p>
            </div>
          </div>
          
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <h3 class="text-primary mb-4" style="font-family: 'rasabold';">દાન માટેની માહિતી</h3>
          <div class="d-flex">
            <div class="pl-3">
            <p>Donation covered u/s 80G of Income Tax Act.</p>
<p>Exempted U/S 12A of the Income Tax Act. 1961. prov Reg No. :-ABITS0115RE20231 &
80G Reg. No. ABITS00115RE20241</p>
            </div>
          </div>
          
        </div>
       
      </div>
      <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">sbvpctrust.com</a>.
          All Rights Reserved.

        
        </p>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <script>
        $(document).ready(function() {
            $('#membersTable').DataTable({
                responsive: true
            });
        });
    </script>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="js/jquery-3.7.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script language="JavaScript" src="js/dataTables.bootstrap5.js" type="text/javascript"></script>
    <script language="JavaScript" src="js/dataTables.js" type="text/javascript"></script>
    
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
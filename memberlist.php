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
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
      <a href="index.php" class="navbar-brand font-weight-bold text-secondary">
        <!-- <img src="img/logo.png" class="logo" height="120px"> -->
        <!-- <h4 style="color:skyblue; vertical-align: top;" class="d-inline-block py-4"><b>શ્રી સમસ્ત બાવનગોળ વાટલિયા </br><h4 style="color:skyblue;">&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspપ્રજાપતિ સમાજ</h4></b></h4> -->
        <span class="text-primary">
          <div style="display: inline-block;vertical-align:middle">
            સર્વ બાવનગોળ વાટલિયા<br>પ્રજાપતિ ચેરીટેબલ સમાજ
          </div>
      </span>
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
            <a href="index.php" class="nav-item nav-link">Home</a>
            <!-- <a href="about.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'about.php')) echo "active";?>">About</a>
            <a href="committee.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'committee.php')) echo "active";?>">Committee</a>
            <a href="events.php" class="nav-item nav-link <?php if(str_contains($_SERVER['REQUEST_URI'],'event')) echo "active";?>">Functions</a>
            <a href="gallery.html" class="nav-item nav-link">Gallery</a>
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
            
          </div>
        
        </div>
      </nav>
    </div>

    <!-- <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Our Members</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Committee</p>
        </div>
      </div>
    </div> -->
<div class="container">
	
    
        <div class="row">
		
            <div class="col-md-12">
            <h1 style="text-align:center;font-weight:700;">Members</h1><br>
            
<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
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

					<!-- <tfoot>
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
					</tfoot> -->

					<tbody>
          <?php 
include_once('dbconfig.php');

$data = $conn->query("select *  from memberview");
while($row = $data -> fetch_assoc())
{
?>    
						     <tr>
                                <td><img src="memberimages/<?php echo $row['image']; ?>" height="100px"> </td>
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
</div>
<!-- Footer Start -->
<div
      class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
    >
      <div class="row pt-5">
        <div class="col-lg-4 col-md-6 mb-5">
          <!-- <a
            href=""
            class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
            style="font-size: 40px; line-height: 40px"
          >
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-white">KidKinder</span>
          </a> -->
          <center>
          <a href="index.php" class="navbar-brand font-weight-bold text-secondary">
            <img src="img/logo.png" class="logo" style="height: 200px;">
            <!-- <h4 style="color:skyblue; vertical-align: top;" class="d-inline-block py-4"><b>શ્રી સમસ્ત બાવનગોળ વાટલિયા </br><h4 style="color:skyblue;">&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspપ્રજાપતિ સમાજ</h4></b></h4> -->
            <span class="text-white"><div style="text-align: center;margin-top: 20px;font-family: 'rasabold';">સર્વ બાવનગોળ વાટલિયા<br>પ્રજાપતિ ચેરીટેબલ ટ્રસ્ટ</div></span>
        </a>
          
          <!-- <div class="d-flex justify-content-start mt-4">
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-twitter"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-instagram"></i
            ></a>
          </div> -->
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
          <!-- <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Phone</h5>
              <p>+012 345 67890</p>
            </div>
          </div> -->
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
          <h3 class="text-primary mb-4" style="font-family: 'rasabold';">દાન માટેની માહિતી</h3>
          <div class="d-flex">
            <!-- <h4 class="fa fa-map-marker-alt text-primary"></h4> -->
            <div class="pl-3">
            <!-- <p style="font-family: 'rasabold';">આપના દાનની રાશિ નીચે જણાવેલ એકાંઉન્ટ નંબરમાં મોકલો</p> -->
            <p>Donation covered u/s 80G of Income Tax Act.</p>
<p>Exempted U/S 12A of the Income Tax Act. 1961. prov Reg No. :-ABITS0115RE20231 &
80G Reg. No. ABITS00115RE20241</p>
            </div>
          </div>
          
        </div>
        <!-- <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Newsletter</h3>
          <form action="">
            <div class="form-group">
              <input
                type="text"
                class="form-control border-0 py-4"
                placeholder="Your Name"
                required="required"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                class="form-control border-0 py-4"
                placeholder="Your Email"
                required="required"
              />
            </div>
            <div>
              <button
                class="btn btn-primary btn-block border-0 py-3"
                type="submit"
              >
                Submit Now
              </button>
            </div>
          </form>
        </div> -->
      </div>
      <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">sbvpctrust.com</a>.
          All Rights Reserved.

          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          <!-- Designed by
          <a class="text-primary font-weight-bold" href="https://htmlcodex.com"
            >HTML Codex</a
          >
          <br />Distributed By:
          <a href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
        </p>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

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
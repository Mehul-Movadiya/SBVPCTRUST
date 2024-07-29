<?php
if (isset($_GET['eid'])==false)
header("location: events.php");
include_once('dbconfig.php');
include_once('header.php');
?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Event Detail</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Event Detail</p>
        </div>
      </div>
    </div>
    <!-- Header End -->
<?php 
$fid=$_GET['eid'];
$data = $conn->query("select *  from function_view where f_id='$fid'");
$row = $data -> fetch_assoc();
?> 

    <!-- Detail Start -->
    <div class="container py-5">
      <div class="row pt-5">
      <div class="col-lg-2"></div>
        <div class="col-lg-12">
          <div class="d-flex flex-column text-left mb-3">
            <p class="section-title pr-5">
              <span class="pr-2">Event Details</span>
            </p>
            <h1 class="mb-3"><?php echo $row['f_title'];?></h1>
            <div class="d-flex">
              <p class="mr-3"><i class="fa fa-user text-primary"></i> <?php echo $row['f_date'];?></p>
              <p class="mr-3">
                <i class="fa fa-folder text-primary"></i> <?php echo $row['time'];?>
              </p>
              <p class="mr-3"><i class="fa fa-comments text-primary"></i> <?php echo $row['place'];?></p>
            </div>
          </div>
          <div class="mb-5">
            <img
              class="img-fluid rounded w-100 mb-4"
              src="<?php echo $row['image'];?>"
              alt="Image"
            />
            <p>
            <?php echo $row['description'];?>
            </p>
          </div>

          
        </div>

        
      </div>
    </div>
    <!-- Detail End -->

<?php 
    $fid=$_GET['eid'];
    $data1 = $conn->query("select *  from functionimg where f_id='$fid'");
    if($data1->num_rows>0)
    {
    ?> 
    <div class="container-fluid pt-5 pb-3">
      <div class="container">
        
        <div class="row portfolio-container">
<?php
    while($row1 = $data1 -> fetch_assoc())
    {
?>

          <div class="col-lg-4 col-md-6 mb-4 portfolio-item">
            <div class="position-relative overflow-hidden mb-2">
              <img class="img-fluid w-100" src="functionimages/<?php echo $row1['imgurl'];?>" alt="" />
              <div
                class="portfolio-btn bg-primary d-flex align-items-center justify-content-center"
              >
                <a href="functionimages/<?php echo $row1['imgurl'];?>" data-lightbox="portfolio">
                  <i class="fa fa-plus text-white" style="font-size: 60px"></i>
                </a>
              </div>
            </div>
          </div>
 <?php
    }
?>       
          
        </div>
      </div>
    </div>
<?php
    }
?>
<?php
include_once('footer.php')
?>
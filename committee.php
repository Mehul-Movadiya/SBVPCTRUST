<?php
include_once('dbconfig.php');
include_once('header.php');
?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Our Admins</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Committee</p>
        </div>
      </div>
    </div>
    <!-- Facilities Start -->

<!-- Facilities Start -->
<div class="container-fluid pt-5">
      <div class="container pb-3">
        <div class="row">
        <?php 
$data = $conn->query("select *  from committee");
// $stmt->bind_param("sssssssss", $membername,$contactno, $email,$education,$profession,$dob,$gotraid,$homeaddress, $password);
//print_r($stmt);
// $data=$stmt->execute(); 
while($row = $data -> fetch_assoc())
{
?>              
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="d-flex bg-light shadow-sm border-top rounded mb-4"
              style="padding: 30px"
            >
              <i
                class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"
              ></i>
              <div class="pl-4">
                <h4><a href="cdetails.php?cid=<?php echo $row['committee_id'];?>"><?php echo $row['com_name'];?></a></h4>
                <p class="m-0">
                <?php echo $row['com_role'];?>
                </p>
              </div>
            </div>
          </div>
          <?php
}
?>
        </div>
      </div>
    </div>
    <!-- Facilities Start -->





<?php
include_once('footer.php')
?>
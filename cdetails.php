<?php
if (isset($_GET['cid'])==false)
    header("location: committee.php");
include_once('dbconfig.php');
include_once('header.php');
?>
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Committee Members</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Committee Members</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Committee</span>
          </p>
          <h1 class="mb-4">Meet Our Committee Members</h1>
        </div>
        <div class="row">
<?php 
$cid=$_GET['cid'];
$data = $conn->query("select *  from committe_member_view where committee_id='$cid'");
// $stmt->bind_param("sssssssss", $membername,$contactno, $email,$education,$profession,$dob,$gotraid,$homeaddress, $password);
//print_r($stmt);
// $data=$stmt->execute(); 
while($row = $data -> fetch_assoc())
{
?> 
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div
              class="position-relative overflow-hidden mb-4"
              style="border-radius: 100%"
            >
              <img class="img-fluid w-100" src="memberimages/<?php echo $row['image']?>" alt="" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <!-- <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-twitter"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a> -->
              </div>
            </div>
            <h4><?php echo $row['member_name']?></h4>
            <i><?php echo $row['cm_role']?></i>
          </div>
<?php
}
?>          
        </div>
      </div>
    </div>
    <!-- Team End -->


<?php
include_once('footer.php')
?>
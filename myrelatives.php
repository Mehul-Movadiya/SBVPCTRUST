<?php
include_once('dbconfig.php');
include_once('header.php');
if(isset($_COOKIE['member_id'])==false)
{
    header("Location: login.php");
}
?>    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Family Details</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Family Members</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Relatives</span>
          </p>
          <h1 class="mb-4"><?php echo "";?></h1>
        </div>
        <div class="row pb-3">
        <?php 
$mid=$_COOKIE['member_id'];
$data = $conn->query("select *  from relative where member_id='$mid'");
// $stmt->bind_param("sssssssss", $membername,$contactno, $email,$education,$profession,$dob,$gotraid,$homeaddress, $password);
//print_r($stmt);
// $data=$stmt->execute(); 
while($row = $data -> fetch_assoc())
{
?>  

          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="<?php echo $row['image'];?>" alt="" />
              <div class="card-body bg-light text-center p-4">
                <h4 class=""><?php echo $row['name'];?></h4>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"
                    ><i class="fa fa-user text-primary"></i> <?php echo $row['relation'];?></small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-folder text-primary"></i> <?php echo $row['name'];?></small
                  >
                  <small class="mr-3"
                    ><i class="fa fa-comments text-primary"></i> <?php echo $row['dob'];?></small
                  >
                </div>
                <p>
                <?php echo $row['email'];?>
                </p>
                <a href="updaterelative.php?relative_id=<?php echo $row['relative_id'];?>" class="btn btn-primary px-4 mx-auto my-2"
                  >Details</a
                ><a href="deleterelative.php?relative_id=<?php echo $row['relative_id'];?>" onclick="return confirm('Do you want to delete data??');" class="btn btn-primary px-4 mx-auto my-2"
                  >Delete</a
                >
              </div>
            </div>
          </div>      
          <?php
}
?>          

          <!-- <div class="col-md-12 mb-4">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Blog End -->

<?php
include_once('footer.php')
?>
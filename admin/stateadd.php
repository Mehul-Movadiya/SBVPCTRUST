<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sname = $_POST['state_name'];
    $statename = strip_tags(mysqli_real_escape_string($con, $sname)); 


    // $sql = "insert into state(state_name) VALUES ('$statename')";
    // mysqli_query($con, $sql);
    // echo "<script>alert('inserted');</script>";


    $stmt = $con->prepare("insert into state (state_name) VALUES (?)");
    $stmt->bind_param("s", $statename);
    // print_r($stmt);
    $stmt->execute();
    //echo "updated";
//mysqli_query($con, $sql);
    echo "<script>alert('inserted');</script>";
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">State form</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label>State Name</label>
                      <input type="text" class="form-control" id="state_name" name="state_name" placeholder="State" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        <!-- partial -->
      </div>
<?php
include_once('footer.php');
?>

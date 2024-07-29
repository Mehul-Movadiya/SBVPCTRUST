<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gname = $_POST['gotra_name'];
    $gotraname = strip_tags($gname); 


    $stmt = $conn->prepare("insert into gotra (gotra_name) VALUES (?)");
    $stmt->bind_param("s", $gotraname);
    // print_r($stmt);
    $stmt->execute();
    //echo "updated";
   // mysqli_query($con, $sql);
    echo "<script>alert('inserted');</script>";
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="font-size:30px">Add Shakh</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" autocomplete="off">
                    <div class="form-group">
                      <label>Shakh Name</label>
                      <input type="text" class="form-control" id="gotra_name" name="gotra_name" placeholder="Shakh" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Add Shakh</button>
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

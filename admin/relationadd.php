<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rname = $_POST['relation_name'];
    $relationname = strip_tags($rname); 


    $stmt = $conn->prepare("insert into relation (relation_name) VALUES (?)");
    $stmt->bind_param("s", $relationname);
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
                  <h4 class="card-title">Add Relation</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label>Relation Name</label>
                      <input type="text" class="form-control" id="relation_name" name="relation_name" placeholder="relation" required>
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

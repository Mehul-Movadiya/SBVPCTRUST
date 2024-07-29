<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
 

    $cname=$_POST['city_name'];
    $cityname = strip_tags(mysqli_real_escape_string($con, $cname)); 

    $sid=$_POST['state_id'];
    $stateid = strip_tags(mysqli_real_escape_string($con, $sid)); 

    // $sql = "insert into city (city_name,state_id) VALUES ('$cname','$sid')";
    // echo $sql;
    // mysqli_query($con, $sql);
    // echo "<script>alert('inserted');</script>";


    
    $stmt = $con->prepare("insert into city (city_name,state_id) VALUES (?,?)");
    $stmt->bind_param("ss", $cityname, $stateid);
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
                  <h4 class="card-title"style="font-size:30px">Add City</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" autocomplete="off">
                    <div class="form-group">
                      <label>City Name</label>
                      <input type="text" class="form-control" id="city_name" name="city_name" placeholder="city" required>
                    </div>
                    <div class="form-group">
                                                <label>State Name</label>
                                                <select name="state_id" class="form-control" required>
                                                <?php
                                                    $rs = mysqli_query($con, "select * from state");
                                                    while ($row = mysqli_fetch_assoc($rs)) {
                                                    echo "<option value='" . $row['state_id'] . "'>" . $row['state_name'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                                
                                            </div>
                                        

                    <button type="submit" class="btn btn-primary mr-2">Add City</button>
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

<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $arpin = $_POST['area_pincode'];
    $areapin = strip_tags(mysqli_real_escape_string($con, $arpin)); 

    $arname=$_POST['area_name'];
    $areaname = strip_tags($con, $arname); 

    $cid=$_POST['city_id'];
    $cityid = strip_tags($con, $cid); 

    $sql = "insert into area(area_pincode,area_name,city_id) VALUES ('?','?','?')";
    $conn = new mysqli("localhost", 'root', '', "sbvp");

    $stmt = $conn->prepare("insert into area(area_pincode,area_name,city_id) VALUES (?,?,?)");
    $stmt->bind_param("sss", $areapin, $areaname,$cityid);
    // print_r($stmt);
    $stmt->execute();
    //echo "updated";
    mysqli_query($con, $sql);
    echo "<script>alert('inserted');</script>";
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Add Area</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" autocomplete="off">
                    <div class="form-group">
                      <label>Area Pincode</label>
                      <input type="text" class="form-control" id="area_pincode" name="area_pincode" placeholder="area" required>
                    </div>
                    <div class="form-group">
                      <label>Area Name</label>
                      <input type="text" class="form-control" id="area_name" name="area_name" placeholder="area" required>
                    </div>

                    <div class="form-group">
                                                <label>City Name</label>
                                                <select name="city_id" class="form-control" required>
                                                <?php
                                                    $rs = mysqli_query($con, "select * from city");
                                                    while ($row = mysqli_fetch_assoc($rs)) {
                                                    echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                                
                                            </div>
                                        

                    <button type="submit" class="btn btn-primary mr-2">Add Area</button>
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

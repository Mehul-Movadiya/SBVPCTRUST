<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $cityid=$_GET['city_id'];
    $cid = strip_tags(mysqli_real_escape_string($con, $cityid)); 

    $cname = $_POST['city_name'];
    $cityname = strip_tags(mysqli_real_escape_string($con, $cname)); 

    $sid=$_POST['state_id'];
    $stateid = strip_tags(mysqli_real_escape_string($con, $sid)); 

    $sql = "update city set city_name='?',state_id='?' where city_id='?'";
    $conn = new mysqli("localhost", 'root', '', "sbvp");

    $stmt = $conn->prepare("update city set city_name=?,state_id=? where city_id=?");
    $stmt->bind_param("sss", $cityname, $stateid, $cid);
    // print_r($stmt);
    $stmt->execute();
    //echo "updated";

    // echo $sql;
    // mysqli_query($con, $sql);
    // echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['city_id']))
    {
        $cid=$_GET['city_id'];
        $sql = "select * from city where city_id='$cid'";
        $data=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($data);
    
    }
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Update City</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label>City Name</label>
                      <input type="text" class="form-control" id="city_name" name="city_name" value="<?php if (isset($row['city_name'])) echo $row['city_name'];?>" placeholder="city" required>
                    </div>
                    <div class="form-group">
                                                <label>State Name</label>
                                                <select name="state_id" class="form-control" required>
                                                <?php
                                                    $rs = mysqli_query($con, "select * from state");
                                                    while ($row1 = mysqli_fetch_assoc($rs))
                                                    {
                                                        if ($row['state_id']==$row1['state_id'])
                                                            echo "<option value='" . $row1['state_id'] . "' selected>" . $row1['state_name'] . "</option>";
                                                        else
                                                            echo "<option value='" . $row1['state_id'] . "'>" . $row1['state_name'] . "</option>";
                                                    }
                                            ?>
                                            </select>
                                                
                                            </div>
                                        

                    <button type="submit" class="btn btn-primary mr-2">Update City</button>
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

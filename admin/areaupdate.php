<?php
include_once('header.php');
?>
<!-- partial -->
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $arpin= $_POST['area_pincode'];
    $areapin = strip_tags($con, $arpin);
    $arname = $_POST['area_name'];
    $areaname= strip_tags($con, $arname);
    $cid=$_POST['city_id'];
    $cityid = strip_tags($con, $cid);
    
    $sql = "update area set area_name='?',city_id='?' where area_pincode='?'";
    $conn = new mysqli("localhost", 'root', '', "sbvp");

    $stmt = $conn->prepare("update area set area_name=?,city_id=? where area_pincode=?");
    $stmt->bind_param("sss", $areaname, $cityid, $areapin);
    // print_r($stmt);
    $stmt->execute();
    echo "updated";
    
}
$areapin = $_GET['area_pincode'];

$rs = mysqli_query($con, "select * from area where area_pincode=$areapin");
$row = mysqli_fetch_assoc($rs);

$areapin = $row['area_pincode'];
$areaname = $row['area_name'];
$cityid= $row['city_id'];
?>
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Update Area</h4>

                <div class="table-responsive">
                <div class="card">
                            
                            <div class="content">
                                <form method="POST">
                                    <br>
                                    <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Area Name</label>
                                                <input type="text" class="form-control" id="area_name" name="area_name" value="<?php if (isset($row['area_name'])) echo $row['area_name'];?>" placeholder="area" required>

                                                <!-- <input type="hidden" name="area_pincode" value="<?php echo $areapin; ?>">
                                                <input type="text" class="form-control" name="area_name" value="<?php echo $areaname; ?>"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>city name</label>

                                                <select name="city_id" class="form-control" required>
                                                <?php
                                                    $rs = mysqli_query($con, "select * from city");
                                                    while ($row1 = mysqli_fetch_assoc($rs))
                                                    {
                                                        if ($row['city_id']==$row1['city_id'])
                                                            echo "<option value='" . $row1['city_id'] . "' selected>" . $row1['city_name'] . "</option>";
                                                        else
                                                            echo "<option value='" . $row1['city_id'] . "'>" . $row1['city_name'] . "</option>";
                                                    }
                                            ?>
                                            </select>
                                                <!-- <input type="hidden" name="area_pincode" value="<?php echo $areapin; ?>">
                                                <input type="text" class="form-control" name="area_name" value="<?php echo $areaname; ?>"> -->
                                            </div>
                                        </div>
                                     <div class="clearfix"></div>
                                     <div class="card-footer">
                                     <button type="submit" class="btn btn-primary mr-2">Update Area</button>
                                    </div>
                                </form>
                            </div>
                        </div>
</div>
</div>
                        </div>
</div>

<?php
include_once('footer.php');
?>
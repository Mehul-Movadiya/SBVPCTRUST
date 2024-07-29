<?php
include_once('header.php');

?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $sfid=$_GET['f_id'];
    $fid = strip_tags($sfid); 

    $sftitle = $_POST['f_title'];
    $ftitle = strip_tags($sftitle); 
    
    $fdesc = $_POST['description'];
    $desc = strip_tags($fdesc);
    
    $fdate = $_POST['f_date'];
    $date = strip_tags($fdate);
    
    $ftime = $_POST['time'];
    $time = strip_tags($ftime);
    
    $fplace = $_POST['place'];
    $place = strip_tags($fplace);
    
    $fcomid = $_POST['committee_id'];
    $comid = strip_tags($fcomid);
    
    $freg = $_POST['registration'];
    $reg =strip_tags($freg);
    
    $frdate = $_POST['r_date'];
    $rdate =strip_tags($frdate);
    
    $famt = $_POST['amount'];
    $amt = strip_tags($famt);

    
    

    // $comid=$_POST['committee_id'];
    // echo $_FILES['image']['name'];
if(!empty($_FILES['image']['name']))
{
  $target_dir = "../functionimages/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  $target_file = basename($_FILES["image"]["name"]);
  
    $stmt = $conn->prepare("update function_ set f_title=?,description=?,f_date=?,time=?,place=?,committee_id=?,registration=?,r_date=?,amount=?,image=? where f_id=?");
    $stmt->bind_param("ssssssissss", $ftitle, $desc, $date,$time,$place,$comid,$reg,$rdate,$amt,$target_file,$fid);
    // print_r($stmt);
    $stmt->execute();
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    // echo "<script> alert('updated');</script>";
    // set parameters and execute
}
else
{

    // $sql = "update function_ set f_title='$ftitle',description='$desc',f_date='$date',time='$time',place='$place',committee_id='$comid',registration=$reg,r_date='$rdate',amount='$amt' where f_id='$fid'";
    $conn = new mysqli("localhost", 'root', '', "sbvp");

    $stmt = $conn->prepare("update function_ set f_title=?,description=?,f_date=?,time=?,place=?,committee_id=?,registration=?,r_date=?,amount=? where f_id=?");
    $stmt->bind_param("ssssssisss", $ftitle, $desc, $date,$time,$place,$comid,$reg,$rdate,$amt,$fid);
    // print_r($stmt);
    $stmt->execute();
    // echo "updated";
    }   // echo $sql;
    
// prepare and bind


// mysqli_query($con, $sql);
//   echo $sql;
    echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['f_id']))
    {
        $fid=$_GET['f_id'];
        $rs=$conn->query("select * from function_ where f_id='$fid'");
        $row=$rs -> fetch_assoc();
    
    }
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Update Function</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Function Name</label>
                      <input type="text" class="form-control" id="f_title" name="f_title" value="<?php if (isset($row['f_title'])) echo $row['f_title'];?>" placeholder="function" required>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" id="description" name="description" value="<?php if (isset($row['description'])) echo $row['description'];?>" placeholder="function" required>
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" id="f_date" name="f_date" value="<?php if (isset($row['f_date'])) echo $row['f_date'];?>" placeholder="function" required>
                    </div>
                    <div class="form-group">
                      <label>Time</label>
                      <input type="time" class="form-control" id="time" name="time" value="<?php if (isset($row['time'])) echo $row['time'];?>" placeholder="function" required>
                    </div>
                    <div class="form-group">
                      <label>place</label>
                      <input type="text" class="form-control" id="place" name="place" value="<?php if (isset($row['place'])) echo $row['place'];?>" placeholder="function" required>
                    </div>

                    <div class="form-group">
                                                <label>committee Name</label>
                                                <select name="committee_id" class="form-control" required>
                                                <?php
                                                    $rs = $conn->query("select * from committee");
                                                    while ($row1 = $rs -> fetch_assoc())
                                                    {
                                                        if ($row['committee_id']==$row1['committee_id'])
                                                            echo "<option value='" . $row1['committee_id'] . "' selected>" . $row1['com_name'] . "</option>";
                                                        else
                                                            echo "<option value='" . $row1['committee_id'] . "'>" . $row1['com_name'] . "</option>";
                                                    }
                                            ?>
                                            </select>
                                                
                                            </div>




                    <div class="form-group">

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Registration Required?</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="registration" id="registration" value="1" <?php if (isset($row['registration'])) if($row['registration']=="1") echo "checked";?> >
                                Yes
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="registration" id="registration" value="0" <?php if (isset($row['registration'])) if($row['registration']=="0") echo "checked";?>>
                                No
                                <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                     </div>
                                        
           
                    <div class="form-group">
                      <label>registration Date</label>
                      <input type="date" class="form-control" id="r_date" name="r_date" value="<?php if (isset($row['r_date'])) echo $row['r_date'];?>" placeholder="Date">
                    </div>
                    <div class="form-group">
                      <label>Amount</label>
                      <input type="number" class="form-control" id="amount" name="amount" value="<?php if (isset($row['amount'])) echo $row['amount'];?>" placeholder="Amount">
                    </div>
                    
                    <div class="form-group">
                      <label>Image</label>
                      <img src="../functionimages/<?php if (isset($row['image'])) echo $row['image'];?>" width="100px">
                      <input type="file" class="form-control" id="image" name="image" placeholder="image" onchange="Filevalidation()">
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-2">Update Function</button>
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
<script>
        Filevalidation = () => {
            const fi = document.getElementById('image');
            // Check if any file is selected.
            if (fi.files.length > 0) 
            {
                for (const i = 0; i <= fi.files.length - 1; i++) 
                {
 
                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 2048)
                    {
                        alert("File too Big, please select a file less than 2mb");
                        fi.value='';
                    }
                }
            }
        }
</script>

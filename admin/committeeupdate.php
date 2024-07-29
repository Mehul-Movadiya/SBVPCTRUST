<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $coid=$_GET['committee_id'];
    $comid = strip_tags($coid); 

    $cmname = $_POST['com_name'];
    $comname = strip_tags($cmname); 

    $crole = $_POST['com_role'];
    $comrole = strip_tags($crole); 

    $cvillage = $_POST['com_village'];
    $comvillage = strip_tags($cvillage); 

    $cmcontact = $_POST['com_phone_no'];
    $comcontact = strip_tags($cmcontact); 

    // $comid=$_POST['committee_id'];
    
    $stmt = $conn->prepare("update committee set com_name=?,com_role=?,com_village=?,com_phone_no=? where committee_id=?");
    $stmt->bind_param("sssss", $comname, $comrole, $comvillage,$comcontact,$comid);
    // print_r($stmt);
    $stmt->execute();
    echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['committee_id']))
    {
        $comid=$_GET['committee_id'];
        $rs = $conn->query("select * from committee where committee_id='$comid'");
        $row=$row = $rs -> fetch_assoc();
    
    }
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Update Committee</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Committee Name</label>
                      <input type="text" class="form-control" id="com_name" name="com_name" value="<?php if (isset($row['com_name'])) echo $row['com_name'];?>" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      <input type="text" class="form-control" id="com_role" name="com_role" value="<?php if (isset($row['com_role'])) echo $row['com_role'];?>" placeholder="Role" required>
                    </div>
                    <div class="form-group">
                      <label>Village</label>
                      <input type="text" class="form-control" id="com_village" name="com_village" value="<?php if (isset($row['com_village'])) echo $row['com_village'];?>" placeholder="Village" >
                    </div>
                    <div class="form-group">
                      <label>Contact No</label>
                      <input type="text" class="form-control" id="com_phone_no" name="com_phone_no" value="<?php if (isset($row['com_phone_no'])) echo $row['com_phone_no'];?>" placeholder="Contact No.">
                    </div>
                    
                   
                    <button type="submit" class="btn btn-primary mr-2">Update Committee</button>
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

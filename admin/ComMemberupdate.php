<?php
if(isset($_GET['cm_id'])==false)
header("location: commiteememberlist.php");
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $cmemid=$_GET['cm_id'];
    $cmid = strip_tags($cmemid); 

    $comid = $_POST['committee_id'];
    $committeeid = strip_tags($comid); 

    $memid = $_POST['member_id'];
    $mid = strip_tags($memid); 

    $jdate = $_POST['joindate'];
    $joindate = strip_tags($jdate); 

    $cmstatus = $_POST['status'];
    $status = strip_tags($cmstatus); 

    $cmleftdate = $_POST['leftdate'];
    $leftdate = strip_tags($cmleftdate); 

    $cmvillage = $_POST['village'];
    $village = strip_tags($cmvillage); 

    $cmemrole = $_POST['cm_role'];
    $cmrole = strip_tags($cmemrole); 

    $cmphone = $_POST['cm_phone_no'];
    $phone = strip_tags($cmphone); 

    

    // $comid=$_POST['committee_id'];
if($leftdate=="")
{
  $stmt = $conn->prepare("update committeemember set committee_id=?,member_id=?,joindate=?,status=?,village=?,cm_role=?,cm_phone_no=? where cm_id=? ");
  $stmt->bind_param("ssssssss", $committeeid, $mid,$joindate,$status,$village,$cmrole,$phone,$cmid);

}
else
{
    $stmt = $conn->prepare("update committeemember set committee_id=?,member_id=?,joindate=?,status=?,leftdate=?,village=?,cm_role=?,cm_phone_no=? where cm_id=? ");
    $stmt->bind_param("sssssssss", $committeeid, $mid,$joindate,$status,$leftdate,$village,$cmrole,$phone,$cmid);
}    // print_r($stmt);
    $stmt->execute();
    // echo "updated";
    echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['cm_id']))
    {
        $cmid=$_GET['cm_id'];
        $rs=$conn->query("select * from committeemember where cm_id='$cmid'");
        $row = $rs -> fetch_assoc();
    }
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Update Committee Member</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label>Committee Name</label>
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
                                                <label>Member Name</label>
                                                <select name="member_id" class="form-control" required>
                                                <?php
                                                    $rs = $conn->query("select * from member");
                                                    while ($row1 = $rs -> fetch_assoc())
                                                    {
                                                        if ($row['member_id']==$row1['member_id'])
                                                            echo "<option value='" . $row1['member_id'] . "' selected>" . $row1['member_name'] . "</option>";
                                                        else
                                                            echo "<option value='" . $row1['member_id'] . "'>" . $row1['member_name'] . "</option>";
                                                    }
                                            ?>
                                            </select>
                                                
                                            </div>

                      
                    <div class="form-group">
                      <label>JoinDate</label>
                      <input type="date" class="form-control" id="joindate" name="joindate" value="<?php if (isset($row['joindate'])) echo $row['joindate'];?>" placeholder="committeemember" required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="radio" class="radio" id="status" name="status" placeholder="Status" required value="Active"<?php if (isset($row['status'])) if($row['status']=="Active") echo "checked";?>>Active</input>
                      <input type="radio" class="radio" id="status" name="status" placeholder="Status" required value="Inactive" <?php if (isset($row['status'])) if($row['status']!="Active") echo "checked";?>>Inactive</input>
                    </div>
                    
                    <div class="form-group">
                      <label>leftdate</label>
                      <input type="date" class="form-control" id="leftdate" name="leftdate" value="<?php if (isset($row['leftdate'])) echo $row['leftdate'];?>" placeholder="committeemember">
                    </div>
                    <div class="form-group">
                      <label>village</label>
                      <input type="text" class="form-control" id="village" name="village" value="<?php if (isset($row['village'])) echo $row['village'];?>" placeholder="committeemember">
                    </div>
                    <div class="form-group">
                      <label>role</label>
                      <input type="text" class="form-control" id="cm_role" name="cm_role" value="<?php if (isset($row['cm_role'])) echo $row['cm_role'];?>" placeholder="committeemember">
                    </div>
                    <div class="form-group">
                      <label>Contact No</label>
                      <input type="text" class="form-control" id="cm_phone_no" name="cm_phone_no" value="<?php if (isset($row['cm_phone_no'])) echo $row['cm_phone_no'];?>" placeholder="committeemember">
                    </div>
                    

                    

                    <button type="submit" class="btn btn-primary mr-2">Update Committee Member</button>
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

<?php
include_once('header.php');
?>
<div class="main-panel"> 
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $comid = $_POST['committee_id'];
    $committeeid = strip_tags($comid); 

    $mid = $_POST['member_id'];
    $memberid = strip_tags($mid); 

    $jdate = $_POST['joindate'];
    $joindate = strip_tags($jdate); 

    $cmstatus= $_POST['status'];
    $status = strip_tags($cmstatus); 

    $ldate = $_POST['leftdate'];
    $leftdate = strip_tags($ldate); 

    $cmvillage = $_POST['village'];
    $village = strip_tags($cmvillage); 

    $role = $_POST['cm_role'];
    $cm_role = strip_tags($role); 

    $phoneno = $_POST['cm_phone_no'];
    $cm_phone_no = strip_tags($phoneno); 


    // $target_dir = "images/";
    // $target_file = $target_dir . basename($_FILES["profile"]["name"]);
    // $image = basename($_FILES["profile"]["name"]);
    // move_uploaded_file($_FILES["profile"]["tmp_name"],$target_file);


    // $sql = "insert into committeemember(committee_id,member_id,joindate,status,leftdate,profile,village,cm_role,cm_phone_no)VALUES('$committeeid','$memberid','$joindate','$status','$leftdate','$image','$village','$cm_role','$cm_phone_no')";
    // mysqli_query($con, $sql);
    // echo "<script>alert('inserted');</script>";
    if($leftdate=="")
    {
        $stmt = $conn->prepare("insert into committeemember (committee_id,member_id,joindate,status,village,cm_role,cm_phone_no) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $committeeid,$memberid,$joindate,$status,$village,$cm_role,$cm_phone_no);
            
    }
    else
    {
        $stmt = $conn->prepare("insert into committeemember (committee_id,member_id,joindate,status,leftdate,village,cm_role,cm_phone_no) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $committeeid,$memberid,$joindate,$status,$leftdate,$village,$cm_role,$cm_phone_no);
    }
    // print_r($stmt);
    // echo "insert into committeemember (committee_id,member_id,joindate,status,leftdate,village,cm_role,cm_phone_no) VALUES ('$committeeid','$memberid','$joindate','$status','$leftdate','$village','$cm_role','$cm_phone_no')";
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
                  <h4 class="card-title"style="font-size:30px">Add Committee Member</h4>
                  <p class="card-description">
                
                  </p>
                  <form method="POST" enctype="multipart/form-data">
                                    <br>
                                        
                                            <div class="form-group">
                                                <label>Committee</label>
                                                <select name="committee_id" class="form-control" required>
                                                <?php
                                                    $rs = $conn->query("select * from committee");
                                                    while ($row =  $rs -> fetch_assoc()) {
                                                    echo "<option value='" . $row['committee_id'] . "'>" . $row['com_name'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Member</label>
                                                <select name="member_id" class="form-control" required>
                                                <?php
                                                $rs = $conn->query("select * from member");
                                                while ($row =  $rs -> fetch_assoc()) {
                                                echo "<option value='" . $row['member_id'] . "'>" . $row['member_name'] . "</option>";
                                                }
                                            ?>
                                    </select><br>
                                                <!-- <input type="text" class="form-control" id="member_id" name="member_id" placeholder="Member Name"> -->
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Joindate</label>
                                                <input type="date" class="form-control" id="joindate" name="joindate" placeholder="joindate" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="radio" class="radio" id="status" name="status" placeholder="Status" required value="Active" checked>Active</input>
                                                <input type="radio" class="radio" id="status" name="status" placeholder="Status" required value="Inactive">Inactive</input>
                                            </div>
                                                                          
                                        
                                            <div class="form-group">
                                                <label>Leftdate</label>
                                                <input type="date" class="form-control" id="leftdate" name="leftdate" placeholder="leftdate">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Village</label>
                                                <input type="text" class="form-control" id="village" name="village" placeholder="Village">
                                            </div>
                                            <div class="form-group">
                                                <label>Committee Member Role</label>
                                                <input type="text" class="form-control" id="cm_role" name="cm_role" placeholder="Committee Member Role">
                                            </div>
                                            <div class="form-group">
                                                <label>Committee Number</label>
                                                <input type="text" class="form-control" id="cm_phone_no" name="cm_phone_no" placeholder="Committee Number">
                                            </div>


                                            
                                     <div class="clearfix"></div>
                                     
                                     <button type="submit" class="btn btn-primary mr-2">Add Committee Member</button>
                                    
                                </form>

                  </div>
              </div>
            </div>
          </div>
        </div>
<?php
include_once('footer.php');
?>
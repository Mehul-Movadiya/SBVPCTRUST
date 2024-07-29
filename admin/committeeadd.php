<?php
include_once('header.php');
?>
<div class="main-panel">

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $coname = $_POST['com_name'];
    $comname = strip_tags($coname); 

    $role = $_POST['com_role'];
    $comrole = strip_tags($role); 

    $village = $_POST['com_village'];
    $comvillage = strip_tags($village); 

    $phoneno = $_POST['com_phone_no'];
    $comphoneno = strip_tags($phoneno); 

    
    
    // $sql = "insert into committee(com_name,com_role,com_village,com_phone_no,com_images)VALUES('$comname','$comrole''$comvillage','$comphoneno','$image')";
    // mysqli_query($con, $sql);
    // echo "<script>alert('inserted');</script>";

    $stmt = $conn->prepare("insert into committee (com_name,com_role,com_village,com_phone_no) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $comname,$comrole,$comvillage,$comphoneno);
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
                  <h4 class="card-title"style="font-size:30px">Add Committee</h4>
                  <p class="card-description">
                  
                  </p>

                  <form method="POST" enctype="multipart/form-data">
                                    <br>
                                        
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="com_name" name="com_name" placeholder="Committee Name" required>
                                            </div>
                                        
                                    
                                        
                                            <div class="form-group">
                                                <label>Role</label>
                                                <input type="text" class="form-control" id="com_role" name="com_role" placeholder="Role" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Village</label>
                                                <input type="text" class="form-control" id="com_village" name="com_village" placeholder="Village">
                                            </div>
                                        
                                
                                            <div class="form-group">
                                                <label>Contact NO.</label>
                                                <input type="number" maxlength="10" minlength="10" class="form-control" id="com_phone_no" name="com_phone_no" placeholder="Contact No.">
                                            </div>

                                            
                                     <div class="clearfix"></div>
                                     
                                     <button type="submit" class="btn btn-primary mr-2">Add Committee</button>
                                    
                                </form>

                  </div>
              </div>
            </div>

            
          </div>
        </div>
<?php
include_once('footer.php');
?>
<?php
include_once('header.php');
?>
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_FILES["image"]["size"] > (2*1024*1024))
  {
    echo "<script>alert('Sorry, your file is too large.');";
  }
  else
  {
    $rname = $_POST['name'];
    $name = strip_tags($rname); 

    $rel = $_POST['relation'];
    $relation = strip_tags($rel); 

    $mid = $_POST['member_id'];
    $memberid = strip_tags($mid); 

    $rmail = $_POST['email'];
    $email = strip_tags($rmail); 

    $rgender = $_POST['gender'];
    $gender = strip_tags($rgender); 

    $redu = $_POST['eduacation'];
    $edu = strip_tags($redu); 

    $rprof = $_POST['profession'];
    $prof = strip_tags($rprof); 

    $rdob = $_POST['dob'];
    $dob = strip_tags($rdob); 

    $rinloves = $_POST['Inloves'];
    $inloves = strip_tags($rinloves); 

    
    // $target_dir = "images/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // // $image = basename($_FILES["image"]["name"]);
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // $sql = "insert into relative (name,relation,member_id,email,gender,education,profession,dob,Inloves,image)VALUES('$name','$relation','$memberid','$email','$gender','$edu','$prof','$dob','$inloves','$target_file')";
    // mysqli_query($con, $sql);
    // echo $sql;
    // echo "<script>alert('inserted');</script>";

    $stmt = $conn->prepare("insert into relative(name,relation,member_id,email,gender,education,profession,dob,Inloves) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $name,$relation,$memberid,$email,$gender,$edu,$prof,$dob,$inloves);
    // print_r($stmt);
    $stmt->execute();
 
    $last_id = $conn->insert_id;
    $target_dir = "../api/images/";
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

    $target_file = "../api/images/" . "R_".$last_id.".". $imageFileType;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $target_file = "api/images/" . "R_".$last_id.".". $imageFileType;

    $stmt = $conn->prepare("update relative set image=? where relative_id=?");
    $stmt->bind_param("ss",$target_file,$last_id );
    //print_r($stmt);
    $stmt->execute();
   
 
 
    //echo "updated";
//mysqli_query($con, $sql);
    echo "<script>alert('inserted');</script>";
  }

}
?> 
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Relative form</h4>
                  <p class="card-description">
                  
                  </p>
                  <!-- <form method="POST" enctype="multipart/form-data"> -->
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                                    <br>
                                    
                                            <div class="form-group">
                                                <label>name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
                                            </div>

                                            <div class="form-group">
                                                <label>member name</label>
                                                <select name="relation" class="form-control" required>
                                                <?php
                                                    $rs = $conn->query("select * from relation");
                                                    while ($row = $rs -> fetch_assoc()) {
                                                    echo "<option value='" . $row['relation_name'] . "'>" . $row['relation_name'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                                
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>member name</label>
                                                <select name="member_id" class="form-control" required>
                                                <?php
                                                    $rs = $conn->query("select * from memberview");
                                                    while ($row = $rs -> fetch_assoc()) {
                                                    echo "<option value='" . $row['member_id'] . "'>" . $row['member_name'] . "</option>";
                                                }
                                            ?>
                                            </select>
                                                
                                            </div>
                                        
                                    
                                        
                                            <div class="form-group">
                                                <label>email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Gender</label>
                                                            <div class="col-sm-4">
                                                                <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="Male" checked="">
                                                                    Male
                                                                <i class="input-helper"></i></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="Female">
                                                                    Female
                                                                    <i class="input-helper"></i></label>
                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                        
                                                                          
                                           
                                           
                                        
                                
                                            

                                           
                                        
                                        
                                            <div class="form-group">
                                                <label>eduacation</label>
                                                <input type="text" class="form-control" id="eduacation" name="eduacation" placeholder="eduacation" >
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="profession" >
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>dob</label>
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" >
                                            
                                        </div>
                                        
                                            <div class="form-group">
                                                <label>In Laws</label>
                                                <input type="text" class="form-control" id="Inloves" name="Inloves" placeholder="Inloves" >
                                            </div>
                                        
                                                                                
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" id="image" name="image" placeholder="image">
                                            </div>
                                        
                                     <div class="clearfix"></div>
                                     
                                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                   
                                </form>
                  </div>
              </div>
            </div>

            
          </div>
        </div>
<?php
include_once('footer.php');
?>
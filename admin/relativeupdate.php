<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $relid=$_GET['relative_id'];
    $rid = strip_tags(mysqli_real_escape_string($con, $relid)); 

    $memid = $_POST['member_id'];
    $mid = strip_tags(mysqli_real_escape_string($con, $memid)); 

    $mrelation= $_POST['relation'];
    $relation = strip_tags(mysqli_real_escape_string($con, $mrelation)); 

    $rname = $_POST['name'];
    $name = strip_tags(mysqli_real_escape_string($con, $rname)); 

    $remail = $_POST['email'];
    $email = strip_tags(mysqli_real_escape_string($con, $remail)); 

    $rgender = $_POST['gender'];
    $gender = strip_tags(mysqli_real_escape_string($con, $rgender)); 

    $redu = $_POST['education'];
    $edu = strip_tags(mysqli_real_escape_string($con, $redu)); 

    $rprof = $_POST['profession'];
    $prof = strip_tags(mysqli_real_escape_string($con, $rprof)); 

    $rdob = $_POST['dob'];
    $dob = strip_tags(mysqli_real_escape_string($con, $rdob)); 

    $rinlaws = $_POST['Inloves'];
    $inlaws = strip_tags(mysqli_real_escape_string($con, $rinlaws)); 


    

    // $comid=$_POST['committee_id'];
if(!empty($_FILES['image']['name'])){
  if ($_FILES["image"]["size"] > (2*1024*1024))
  {
    echo "<script>alert('Sorry, your file is too large.');";
  }
  else
  {
  
  $target_dir = "../api/images/";
  $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

  $target_file = "../api/images/" . "R_".$relid.".". $imageFileType;
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  $target_file = "api/images/" . "R_".$relid.".". $imageFileType;

  
  
    $sql = "update relative set member_id='?',relation='?',name='?',email='?',gender='?',education='?',profession='?',dob='?',Inloves='?',image='?' where relative_id='?'";
    $conn = new mysqli("localhost", 'root', '', "sbvp");

    $stmt = $conn->prepare("update relative set member_id=?,relation=?,name=?,email=?,gender=?,education=?,profession=?,dob=?,Inloves=?,image=? where relative_id=?");
    $stmt->bind_param("ssssssssss", $mid, $relation,$name,$email,$gender,$edu,$prof,$dob,$inlaws,$target_file,$rid);
    // print_r($stmt);
    $stmt->execute();
    echo "updated";
  }
}
else
{

    $sql = "update relative set member_id='$mid',relation='$relation',name='$name',email='$email',gender='$gender',education='$edu',profession='$prof',dob='$dob',Inloves='$inlaws' where relative_id='$rid'";
}   // echo $sql;
    mysqli_query($con, $sql);
    echo $sql;
    echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['relative_id']))
    {
        $rid=$_GET['relative_id'];
        $sql = "select * from relative where relative_id='$rid'";
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
                  <h4 class="card-title">Relative form</h4>
                  <p class="card-description">
                  
                  </p>
                  
                                            <div class="form-group">
                                                <label>Member Name</label>
                                                <select name="member_id" class="form-control" required>
                                                <?php
                                                    $rs = mysqli_query($con, "select * from member");
                                                    while ($row1 = mysqli_fetch_assoc($rs))
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
                      <label>relation</label>
                      <input type="text" class="form-control" id="relation" name="relation" value="<?php if (isset($row['relation'])) echo $row['relation'];?>" placeholder="relative" required>
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($row['name'])) echo $row['name'];?>" placeholder="relative" required>
                    </div>
                    <div class="form-group">
                      <label>email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($row['email'])) echo $row['email'];?>" placeholder="relative" required>
                    </div>
                    <div class="form-group">

                <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="<?php if (isset($row['gender'])) echo $row['gender'];?>" checked="">
                                Male
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="<?php if (isset($row['gender'])) echo $row['gender'];?>">
                                Female
                                <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                                            <!-- </div> -->
                                        
                                            
                                        
                                           

                                            <!-- </div> -->
                                        
                                        
                                            <div class="form-group">
                                                <label>eduacation</label>
                                                <input type="text" class="form-control" id="eduacation" name="eduacation" placeholder="eduacation" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="profession" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>dob</label>
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" required>
                                            
                                        </div>
                                        
                                            <div class="form-group">
                                                <label>In Laws</label>
                                                <input type="text" class="form-control" id="Inloves" name="Inloves" placeholder="Inloves" required>
                                            </div>
                                        
                                                                                
                                            <div class="form-group">
                      <label>Image</label>
                      <img src="<?php if (isset($row['image'])) echo $row['image'];?>" width="100px">
                      <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    </div>
                                        
                  <div class="clearfix"></div>
                                     
                  



                      <!-- <label>gender</label>
                      <input type="text" class="form-control" id="gender" name="gender" value="<?php if (isset($row['gender'])) echo $row['gender'];?>" placeholder="relative" required> -->
                    
                    

                                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
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

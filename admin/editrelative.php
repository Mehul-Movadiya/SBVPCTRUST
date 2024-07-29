<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $rid=$_GET['relative_id'];
    $mid = $_POST['member_id'];
    $relation= $_POST['relation'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $edu = $_POST['education'];
    $prof = $_POST['profession'];
    $dob = $_POST['dob'];
    $inlaws = $_POST['Inloves'];

    

    // $comid=$_POST['committee_id'];
if(!empty($_FILES['image']['name'])){

  $target_dir = "../api/images/";
  $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

  $target_file = "../api/images/" . "R_".$rid.".". $imageFileType;
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  $target_file = "api/images/" . "R_".$rid.".". $imageFileType;
  
  
  
  // $target_dir = "images/";
  //   $target_file = $target_dir . basename($_FILES["image"]["name"]);
  //   move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "update relative set member_id='$mid',relation='$relation',name='$name',email='$email',gender='$gender',education='$edu',profession='$prof',dob='$dob',Inloves='$inlaws',image='$target_file' where relative_id='$rid'";

}
else
{

    $sql = "update relative set member_id='$mid',relation='$relation',name='$name',email='$email',gender='$gender',education='$edu',profession='$prof',dob='$dob',Inloves='$inlaws' where relative_id='$rid'";
}   // echo $sql;
    $rs = $conn->query($sql);
    // echo $sql;
    echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['relative_id']))
    {
        $rid=$_GET['relative_id'];
        $sql = "select * from relative where relative_id='$rid'";
        $rs = $conn->query($sql);
        $row = $rs -> fetch_assoc();
        // print_r($row);
    
    }
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"style="font-size:30px">Update Relative</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" autocomplete="off" enctype="multipart/form-data">
                                        

                                            <div class="form-group">
                                                <label>Member Name</label>
                                                <select name="member_id" class="form-control" required>
                                                <?php
                                                    $rs1 = $conn->query( "select * from member");
                                                    while ($row1 = $rs1 -> fetch_assoc())
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
                                                <label>Relation</label>
                                                <select name="relation" class="form-control" required>
                                                <?php
                                                    $rs2 = $conn->query( "select * from relation");
                                                    while ($row2 = $rs2 -> fetch_assoc())
                                                    {
                                                        if ($row['relation']==$row2['relation_name'])
                                                            echo "<option value='" . $row2['relation_name'] . "' selected>" . $row2['relation_name'] . "</option>";
                                                        else
                                                            echo "<option value='" . $row2['relation_name'] . "'>" . $row2['relation_name'] . "</option>";
                                                    }
                                            ?>
                                            </select>
                                                
                                            </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($row['name'])) echo $row['name'];?>" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label>email</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($row['email'])) echo $row['email'];?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="Male" <?php if (isset($row['gender'])) if($row['gender']=="Male") echo "checked";?>>
                                Male
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" <?php if (isset($row['gender']))  if($row['gender']=="Female") echo "checked";?>>
                                Female
                                <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                    </div>
                                                                      
                                        
                                            <div class="form-group">
                                                <label>Eduacation</label>
                                                <input type="text" class="form-control" id="eduacation" name="education" placeholder="Eduacation" value="<?php if (isset($row['education'])) echo $row['education'];?>">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession" value="<?php if (isset($row['profession'])) echo $row['profession'];?>">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Birthdate</label>
                                                <input type="date" class="form-control" id="dob" name="dob" value="<?php if (isset($row['dob'])) echo $row['dob'];?>">
                                            
                                        </div>
                                        
                                            <div class="form-group">
                                                <label>In Laws</label>
                                                <input type="text" class="form-control" id="Inloves" name="Inloves" placeholder="Inlaws" value="<?php if (isset($row['Inloves'])) echo $row['Inloves'];?>">
                                            </div>
                                        
                                                                                
                                            <div class="form-group">
                      <label>Image</label>
                      <img src="../<?php if (isset($row['image'])) echo $row['image'];?>" width="100px">
                      <input type="file" class="form-control" id="image" name="image" placeholder="image">
                    </div>
                                        
                                     <div class="clearfix"></div>
                                     
                                     <button type="submit" class="btn btn-primary mr-2">Update Relative</button>
                                   
                                </form>
                  </div>

                    

                    
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

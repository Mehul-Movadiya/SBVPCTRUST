<?php
include_once('header.php');
?>
<div class="main-panel">  
  
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    $mid=$_GET['member_id'];
    $memberid = strip_tags($mid); 

    $memname = $_POST['member_name'];
    $mname = strip_tags( $memname); 

    $homeaddress = $_POST['home_address'];
    $haddress = strip_tags( $homeaddress); 

    $mcontact = $_POST['contact_no'];
    $contact = strip_tags( $mcontact); 

    $memail = $_POST['email'];
    $email = strip_tags( $memail); 

    $mpwd = $_POST['password'];
    $pwd = strip_tags( $mpwd); 

    $mgend = $_POST['gender'];
    $gend = strip_tags( $mgend); 

    $medu = $_POST['education'];
    $edu = strip_tags( $medu); 

    $mprof = $_POST['profession'];
    $prof = strip_tags( $mprof); 

    $mdob = $_POST['dob'];
    $dob = strip_tags( $mdob); 

    $gid = $_POST['gotra_id'];
    $gotraid = strip_tags( $gid); 

    $hpin = $_POST['home_pincode'];
    $homepin = strip_tags( $hpin); 

    // $image = $_POST['image'];
    $badd = $_POST['business_address'];
    $businessadd = strip_tags( $badd); 

    $bpin = $_POST['business_pincode'];
    $businesspin = strip_tags( $bpin); 

    $mrstatus = $_POST['married_status'];
    $mrgstatus = strip_tags( $mrstatus); 

    





    // $comid=$_POST['committee_id'];
if(!empty($_FILES['image']['name']))
{
  $target_dir = "../memberimages/";
  $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

  $target_file = $target_dir . "M_".$memberid.".". $imageFileType;
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  $target_file = "M_".$memberid.".". $imageFileType;
  
   
    $stmt = $conn->prepare("update member set member_name=?,home_address=?,contact_no=?,email=?,password=?,gender=?,education=?,profession=?,dob=?,gotra_id=?,home_pincode=?,business_address=?,business_pincode=?,married_status=?,image=? where member_id=?");
    $stmt->bind_param("ssssssssssssssss", $mname, $haddress, $contact,$email,$pwd,$gend,$edu,$prof,$dob,$gotraid,$homepin,$businessadd,$businesspin,$mrgstatus,$target_file,$memberid);
    // print_r($stmt);
    $stmt->execute();
    // echo "updated";

}
else
{
 
  $stmt = $conn->prepare("update member set member_name=?,home_address=?,contact_no=?,email=?,password=?,gender=?,education=?,profession=?,dob=?,gotra_id=?,home_pincode=?,business_address=?,business_pincode=?,married_status=? where member_id=?");
  $stmt->bind_param("sssssssssssssss", $mname, $haddress, $contact,$email,$pwd,$gend,$edu,$prof,$dob,$gotraid,$homepin,$businessadd,$businesspin,$mrgstatus,$memberid);
  // print_r($stmt);
  $stmt->execute();
  
    // $sql = "update member set member_name='$mname',home_address='$haddress',contact_no='$contact',email='$email',password='$pwd',gender='$gend',education='$edu',profession='$prof',dob='$dob',gotra_id='$gotraid',home_pincode='$homepin',business_address='$businessadd',business_pincode='$businesspin',married_status='$mrgstatus' where member_id='$memberid'";
}   // echo $sql;
    // mysqli_query($con, $sql);
    //echo $sql;
    echo "<script>alert('Member details updated successfully.');window.location.href = 'memberlist.php';</script>";
}
else
{
    if(isset($_GET['member_id']))
    {
        $memberid=$_GET['member_id'];
        $rs = $conn->query("select * from member where member_id='$memberid'");
        $row=$row = $rs -> fetch_assoc();
    
    }
}
?>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="font-size:30px">Update Member Details</h4>
                  <p class="card-description">
                  
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
<div class="row">
  <div class="col-lg-9">
                    <div class="form-group">
                      <label>Member Name</label>
                      <input type="text" class="form-control" id="member_name" name="member_name" value="<?php if (isset($row['member_name'])) echo $row['member_name'];?>" placeholder="member" required>
                    </div>
                    <div class="form-group">
                      <label>Home Address</label>
                      <input type="text" class="form-control" id="home_address" name="home_address" value="<?php if (isset($row['home_address'])) echo $row['home_address'];?>" placeholder="member">
                    </div>
                    <div class="form-group">
                      <label>Contact No</label>
                      <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php if (isset($row['contact_no'])) echo $row['contact_no'];?>" placeholder="member" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($row['email'])) echo $row['email'];?>" placeholder="member">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($row['password'])) echo $row['password'];?>" placeholder="member" required>
                    </div>
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
                              <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" <?php if (isset($row['gender'])) if($row['gender']=="Female") echo "checked";?>>
                              Female
                              <i class="input-helper"></i></label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Education</label>
                      <input type="text" class="form-control" id="education" name="education" value="<?php if (isset($row['education'])) echo $row['education'];?>" placeholder="Education">
                    </div>
                    <div class="form-group">
                      <label>Profession</label>
                      <input type="text" class="form-control" id="profession" name="profession" value="<?php if (isset($row['profession'])) echo $row['profession'];?>" placeholder="Profession">
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="date" class="form-control" id="dob" name="dob" value="<?php if (isset($row['dob'])) echo $row['dob'];?>" placeholder="DOB" required>
                    </div>
                    <div class="form-group">
                                                <label>Shakh Name</label>
                                                <select name="gotra_id" class="form-control" required>
                                                <?php
                                                     $rs = $conn->query("select * from gotra");
                                                     while ($row1 = $rs -> fetch_assoc())
                                                      {
                                                        if ($row['gotra_id']==$row1['gotra_id'])
                                                            echo "<option value='" . $row1['gotra_id'] . "' selected>" . $row1['gotra_name'] . "</option>";
                                                        else
                                                            echo "<option value='" . $row1['gotra_id'] . "'>" . $row1['gotra_name'] . "</option>";
                                                    }
                                            ?>
                                            </select>
                                                
                                            </div>
                                       <div class="form-group">
                      <label>Home Pincode</label>
                      <input type="text" class="form-control" id="home_pincode" name="home_pincode" value="<?php if (isset($row['home_pincode'])) echo $row['home_pincode'];?>" placeholder="Pincode">
                    </div>
                    <div class="form-group">
                      <label>Business Address</label>
                      <input type="text" class="form-control" id="business_address" name="business_address" value="<?php if (isset($row['business_address'])) echo $row['business_address'];?>" placeholder="Business Address">
                    </div>
                    <div class="form-group">
                      <label>Business Pincode</label>
                      <input type="number" class="form-control" id="business_pincode" name="business_pincode" value="<?php if (isset($row['business_pincode'])) echo $row['business_pincode'];?>" placeholder="Business Pincode">
                    </div>
                    <div class="form-group">
                      <label>Marrital Status</label>
                      <input type="text" class="form-control" id="married_status" name="married_status" value="<?php if (isset($row['married_status'])) echo $row['married_status'];?>" placeholder="Marital Status">
                    </div>
                                                  </div>
<div class="col-lg-3">
                    <div class="form-group" style="text-align:center">
                      <label>Image</label>
                      <br>
                      <img src="../memberimages/<?php if (isset($row['image'])) echo $row['image'];?>" width="100px">
                      <input type="file" class="form-control" id="image" name="image" placeholder="image"  onchange="Filevalidation()">
                    </div>
                                                  </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Member</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                                                  </div>
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

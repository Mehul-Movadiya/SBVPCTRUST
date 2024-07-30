<?php
include_once('header.php');

if (!isset($_COOKIE['member_id'])) {
    header("location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mname = strip_tags($_POST['member_name']);
    $haddress = strip_tags($_POST['home_address']);
    $memberid = $_COOKIE['member_id'];
    $cno = strip_tags($_POST['contact_no']);
    $mail = strip_tags($_POST['email']);
    $gender = $_POST['gender'];
    $edu = strip_tags($_POST['education']);
    $prof = strip_tags($_POST['profession']);
    $dob = strip_tags($_POST['dob']);
    $hpin = strip_tags($_POST['home_pincode']);
    $businessadd = strip_tags($_POST['business_address']);
    $businesspin = strip_tags($_POST['business_pincode']);
    $mstatus = strip_tags($_POST['married_status']);

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "memberimages/";
        $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . "M_" . $memberid . "." . $imageFileType;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $target_file = "M_" . $memberid . "." . $imageFileType;

        $stmt = $conn->prepare("UPDATE member SET member_name=?, home_address=?, contact_no=?, email=?, gender=?, education=?, profession=?, dob=?, home_pincode=?, business_address=?, business_pincode=?, married_status=?, image=? WHERE member_id=?");
        $stmt->bind_param("ssssssssssssss", $mname, $haddress, $cno, $mail, $gender, $edu, $prof, $dob, $hpin, $businessadd, $businesspin, $mstatus, $target_file, $memberid);
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("UPDATE member SET member_name=?, home_address=?, contact_no=?, email=?, gender=?, education=?, profession=?, dob=?, home_pincode=?, business_address=?, business_pincode=?, married_status=? WHERE member_id=?");
        $stmt->bind_param("sssssssssssss", $mname, $haddress, $cno, $mail, $gender, $edu, $prof, $dob, $hpin, $businessadd, $businesspin, $mstatus, $memberid);
        $stmt->execute();
    }

    echo "<script>
        alert('Updated');
        window.location.href = window.location.href; // Refresh the page
    </script>";
    exit();
} else {
    if (isset($_COOKIE['member_id'])) {
        $memberid = $_COOKIE['member_id'];
        $sql = "SELECT * FROM member WHERE member_id='$memberid'";
        $data = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($data);
    } else {
        header("location: login.php");
        exit();
    }
}
?>



    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">Contact Us</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Contact Us</p>
        </div>
      </div>
    </div> -->
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <!-- <p class="section-title px-5">
            <span class="px-2">Login</span>
          </p> -->
          <h1 class="mb-4">Update Profile</h1>
        </div>
        <div class="row">
        <div class="col-lg-3 mb-5">
        </div>
          <div class="col-lg-6 mb-5">
            <div class="contact-form">
              <div id="success"></div>
              <form novalidate="novalidate" method="post" enctype="multipart/form-data">
                <div class="control-group">
                 <input type="text" class="form-control" id="member_name" name="member_name" value="<?php if (isset($row['member_name'])) echo $row['member_name'];?>" placeholder="Name" required>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="home_address" name="home_address" value="<?php if (isset($row['home_address'])) echo $row['home_address'];?>" placeholder="home address" required>
                      <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php if (isset($row['contact_no'])) echo $row['contact_no'];?>" placeholder="contactno" required>
                      <p class="help-block text-danger"></p>

                    </div>
                    <div class="control-group">
                      <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($row['email'])) echo $row['email'];?>" placeholder="email" required>
                      <p class="help-block text-danger"></p>

                    </div>
                                

                <div class="control-group">
                  <!-- <input type="password" class="form-control" id="email" name="email" placeholder="Your Email" required="required"
                    data-validation-required-message="Please enter your Email"/> -->


                    <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="Male" <?php if(isset($row['gender'])){if($row['gender']=='Male') echo "checked";}?>>
                                Male
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="Female"  <?php if(isset($row['gender'])){if($row['gender']=='Female') echo "checked";}?>>
                                Female
                                <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                         
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="education" name="education" value="<?php if (isset($row['education'])) echo $row['education'];?>" placeholder="education" required>
                      <p class="help-block text-danger"></p>
                </div>


                <div class="control-group">
                      <input type="text" class="form-control" id="profession" name="profession" value="<?php if (isset($row['profession'])) echo $row['profession'];?>" placeholder="profession" required>
                      <p class="help-block text-danger"></p>
                </div>



                <div class="control-group">
                      <input type="text" class="form-control" id="dob" name="dob" value="<?php if (isset($row['dob'])) echo $row['dob'];?>" placeholder="dob" required>
                      <p class="help-block text-danger"></p>
                </div>


                <div class="control-group">
                      <input type="text" class="form-control" id="home_pincode" name="home_pincode" value="<?php if (isset($row['home_pincode'])) echo $row['home_pincode'];?>" placeholder="home pincode" required>
                      <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="business_address" name="business_address" value="<?php if (isset($row['business_address'])) echo $row['business_address'];?>" placeholder="business address" required>
                      <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="business_pincode" name="business_pincode" value="<?php if (isset($row['business_pincode'])) echo $row['business_pincode'];?>" placeholder="business pincode" required>
                      <p class="help-block text-danger"></p>
                </div>



                <div class="control-group">
                <select class="form-control" id="married_status" name="married_status" required>
                  <option value="" disabled selected>Select your marital status</option>
                  <option value="Married" <?php if (isset($row['married_status']) && $row['married_status'] == 'Married') echo 'selected';?>>Married</option>
                  <option value="Unmarried" <?php if (isset($row['married_status']) && $row['married_status'] == 'Unmarried') echo 'selected';?>>Unmarried</option>
                </select>                      
                <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                                <div class="form-group">
                                <img src="memberimages/<?php if (isset($row['image'])) echo $row['image'];?>" width="100px">
                                <input type="file"  accept=".jpg, .jpeg, .png, .bmp" class="form-control" id="image" name="image" placeholder="image"  onchange="Filevalidation()">

                                </div>
                            </div>

                <div style="text-align:center;">
                  <button class="btn btn-primary py-2 px-4" type="submit"
                    id="sendMessageButton"
                    style="min-width:200px"
                  >
                    Update
                  </button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Contact End -->
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
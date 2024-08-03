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
      // Fetch the old image name from the database
      $sql = "SELECT image FROM member WHERE member_id='$memberid'";
      $result = mysqli_query($conn, $sql);
      $oldImage = mysqli_fetch_assoc($result)['image'];
  
      $target_dir = "memberimages/";
      $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      $allowedExtensions = array("jpg", "jpeg", "png", "gif");

      foreach ($allowedExtensions as $ext) {
        $oldFile = $target_dir . "M_" . $memberid . "." . $ext;
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }
      }

  
      // Check file extension
      $allowedExtensions = array("jpg", "jpeg", "png", "gif");
      if (!in_array($imageFileType, $allowedExtensions)) {
          echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location.href = window.location.href;</script>";
          exit();
      }
  
      // Check file size (5MB limit)
      if ($_FILES["image"]["size"] > 5000000) {
          echo "<script>alert('Sorry, your file is too large. Maximum size is 5MB.'); window.location.href = window.location.href;</script>";
          exit();
      }
  
      $newImageName = "M_" . $memberid . "." . $imageFileType;
      $target_file = $target_dir . $newImageName;
  
      // Delete all possible old image files
      foreach ($allowedExtensions as $ext) {
          $oldFile = $target_dir . "M_" . $memberid . "." . $ext;
          if (file_exists($oldFile)) {
              unlink($oldFile);
          }
      }
  
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          $stmt = $conn->prepare("UPDATE member SET member_name=?, home_address=?, contact_no=?, email=?, gender=?, education=?, profession=?, dob=?, home_pincode=?, business_address=?, business_pincode=?, married_status=?, image=? WHERE member_id=?");
          if ($stmt === false) {
              die("Error preparing statement: " . $conn->error);
          }
          $stmt->bind_param("ssssssssssssss", $mname, $haddress, $cno, $mail, $gender, $edu, $prof, $dob, $hpin, $businessadd, $businesspin, $mstatus, $newImageName, $memberid);
          
          if ($stmt->execute()) {
              echo "<script>alert('Profile updated successfully with image.'); window.location.href = window.location.href;</script>";
          } else {
              echo "<script>alert('Failed to update profile with image: " . $stmt->error . "'); window.location.href = window.location.href;</script>";
          }
      } else {
          echo "<script>alert('Failed to upload image. Error: " . error_get_last()['message'] . "'); window.location.href = window.location.href;</script>";
      }
  } else {
        $stmt = $conn->prepare("UPDATE member SET member_name=?, home_address=?, contact_no=?, email=?, gender=?, education=?, profession=?, dob=?, home_pincode=?, business_address=?, business_pincode=?, married_status=? WHERE member_id=?");
        $stmt->bind_param("sssssssssssss", $mname, $haddress, $cno, $mail, $gender, $edu, $prof, $dob, $hpin, $businessadd, $businesspin, $mstatus, $memberid);
        if ($stmt->execute()) {
            echo "<script>alert('Profile updated successfully.'); window.location.href = window.location.href;</script>";
        } else {
            echo "<script>alert('Failed to update profile.');</script>";
        }
    }
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

<style>
  .update-profile-form {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  }

  .update-profile-form h1 {
    color: #007bff;
    margin-bottom: 30px;
  }

  .update-profile-form .form-control {
    margin-bottom: 20px;
  }

  .update-profile-form .btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 30px;
    font-size: 18px;
    transition: background-color 0.7s;
  }

  .update-profile-form .btn-primary:hover {
    background-color: #0056b3;
  }

  .gender-group {
    display: flex;
    justify-content: start;
    margin-bottom: 20px;
  }

  .gender-group .form-check {
    margin-right: 20px;
  }

  #imagePreview {
    max-width: 200px;
    margin-bottom: 10px;
    border-radius: 5px;
  }
</style>


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
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="update-profile-form">
          <h1 class="text-center mb-4">Update Profile</h1>
          <form novalidate="novalidate" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control" id="member_name" name="member_name" value="<?php echo isset($row['member_name']) ? htmlspecialchars($row['member_name']) : ''; ?>" placeholder="Name" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="home_address" name="home_address" value="<?php echo isset($row['home_address']) ? htmlspecialchars($row['home_address']) : ''; ?>" placeholder="Home Address" required>
            </div>

            <div class="form-group">
              <input type="tel" class="form-control" id="contact_no" name="contact_no" value="<?php echo isset($row['contact_no']) ? htmlspecialchars($row['contact_no']) : ''; ?>" placeholder="Contact Number" required>
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($row['email']) ? htmlspecialchars($row['email']) : ''; ?>" placeholder="Email" required>
            </div>

            <div class="form-group">
              <label>Gender</label>
              <div class="gender-group">
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="male" value="Male" <?php echo (isset($row['gender']) && $row['gender'] == 'Male') ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="female" value="Female" <?php echo (isset($row['gender']) && $row['gender'] == 'Female') ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="female">Female</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="education" name="education" value="<?php echo isset($row['education']) ? htmlspecialchars($row['education']) : ''; ?>" placeholder="Education" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="profession" name="profession" value="<?php echo isset($row['profession']) ? htmlspecialchars($row['profession']) : ''; ?>" placeholder="Profession" required>
            </div>

            <div class="form-group">
              <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($row['dob']) ? htmlspecialchars($row['dob']) : ''; ?>" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="home_pincode" name="home_pincode" value="<?php echo isset($row['home_pincode']) ? htmlspecialchars($row['home_pincode']) : ''; ?>" placeholder="Home Pincode" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="business_address" name="business_address" value="<?php echo isset($row['business_address']) ? htmlspecialchars($row['business_address']) : ''; ?>" placeholder="Business Address" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="business_pincode" name="business_pincode" value="<?php echo isset($row['business_pincode']) ? htmlspecialchars($row['business_pincode']) : ''; ?>" placeholder="Business Pincode" required>
            </div>

            <div class="form-group">
              <select class="form-control" id="married_status" name="married_status" required>
                <option value="" disabled selected>Select your marital status</option>
                <option value="Married" <?php echo (isset($row['married_status']) && $row['married_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                <option value="Unmarried" <?php echo (isset($row['married_status']) && $row['married_status'] == 'Unmarried') ? 'selected' : ''; ?>>Unmarried</option>
              </select>
            </div>

            <div class="form-group">
              <label for="image">Profile Picture</label>
              <img id="imagePreview" src="memberimages/<?php echo isset($row['image']) ? htmlspecialchars($row['image']) : ''; ?>" alt="Profile Picture" class="img-thumbnail mb-2" style="max-width: 200px; display: <?php echo isset($row['image']) ? 'block' : 'none'; ?>;">
              <input type="file" accept=".jpg, .jpeg, .png, .bmp" class="form-control-file" id="image" name="image" onchange="Filevalidation()">
            </div>

            <div class="text-center mt-4">
              <button class="btn btn-primary btn-lg" type="submit" id="sendMessageButton">
                Update Your Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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
<script>
function Filevalidation() {
  const input = document.getElementById('image');
  const imagePreview = document.getElementById('imagePreview');
  const reader = new FileReader();

  reader.onload = function(e) {
    imagePreview.src = e.target.result;
    imagePreview.style.display = 'block';
  }

  if (input.files && input.files[0]) {
    reader.readAsDataURL(input.files[0]);
  }
}
</script>

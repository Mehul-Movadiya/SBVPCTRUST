<?php
include_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Collect all form data
    $member_name = mysqli_real_escape_string($conn, $_POST['member_name']);
    $home_address = mysqli_real_escape_string($conn, $_POST['home_address']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $profession = mysqli_real_escape_string($conn, $_POST['profession']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $home_pincode = mysqli_real_escape_string($conn, $_POST['home_pincode']);
    $business_address = mysqli_real_escape_string($conn, $_POST['business_address']);
    $business_pincode = mysqli_real_escape_string($conn, $_POST['business_pincode']);
    $married_status = mysqli_real_escape_string($conn, $_POST['married_status']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password is exactly 8 characters
    if (strlen($password) != 8) {
        echo "<script>alert('Password must be exactly 8 characters long');</script>";
    }
    // Check if passwords match
    else if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Proceed with registration process
        $password = mysqli_real_escape_string($conn, $password);

        // Check if email already exists
        $check_email = $conn->prepare("SELECT * FROM member WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Email already exists');</script>";
        } else {
            // Handle file upload
            $image = '';
            if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "memberimages/";
                $image = basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $image;
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            }

            // Insert new user
            $stmt = $conn->prepare("INSERT INTO member (member_name, home_address, contact_no, email, gender, education, profession, dob, home_pincode, business_address, business_pincode, married_status, password, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssss", $member_name, $home_address, $contact_no, $email, $gender, $education, $profession, $dob, $home_pincode, $business_address, $business_pincode, $married_status, $password, $image);
            
            if ($stmt->execute()) {
                echo "<script>alert('Registration successful. Please login.'); window.location.href='login.php';</script>";
                exit();
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
    }
}

include_once('header.php');
?>

<!-- Registration Form HTML -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <h1 class="mb-4">Register</h1>
        </div>
        <div class="row">
            <div class="col-lg-2 mb-5"></div>
            <div class="col-lg-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form novalidate="novalidate" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Home Address" required>
                        </div>

                        <div class="form-group">
                            <input type="tel" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" required>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <div class="gender-group">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender" id="male" value="Male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="education" name="education" placeholder="Education" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession" required>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="home_pincode" name="home_pincode" placeholder="Home Pincode" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="business_address" name="business_address" placeholder="Business Address" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="business_pincode" name="business_pincode" placeholder="Business Pincode" required>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="married_status" name="married_status" required>
                                <option value="" disabled selected>Select your marital status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Profile Picture</label>
                            <img id="imagePreview" src="memberimages/<?php echo isset($row['image']) ? htmlspecialchars($row['image']) : ''; ?>" alt="Profile Picture" class="img-thumbnail mb-2" style="max-width: 200px; display: <?php echo isset($row['image']) ? 'block' : 'none'; ?>;">
                            <input type="file" accept=".jpg, .jpeg, .png, .bmp" class="form-control-file" id="image" name="image" onchange="Filevalidation()">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password (8 characters)" required maxlength="8">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required maxlength="8">
                        </div>
                        <div style="text-align:center;">
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton" style="min-width:200px">
                                Register
                            </button>
                        </div>
                    </form>
                    <div style="text-align:center; margin-top: 20px;">
                        <p>Already have an account? <a href="login.php">Login here</a></p>
                    </div>
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
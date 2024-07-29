<?php
include_once('header.php');
?>
<div class="main-panel">
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
  
    $mname = $_POST['member_name'];
    $membername = strip_tags($mname); 

    $contact = $_POST['contact_no'];
    $contactno = strip_tags($contact); 

    $mail = $_POST['email'];
    $email = strip_tags($mail); 

    $edu=$_POST['education']; 
    $education = strip_tags($edu); 

    $prof=$_POST['profession']; 
    $profession = strip_tags($prof); 

    $mdob=$_POST['dob']; 
    $dob = strip_tags($mdob); 

    $gend=$_POST['gender'];
    $gender = strip_tags($gend);


    $gid=$_POST['gotra_id']; 
    $gotraid = strip_tags($gid); 

    $haddress=$_POST['home_address'];
    $homeaddress = strip_tags($haddress); 


    $hpincode=$_POST['home_pincode'];
    $hpin = strip_tags($hpincode); 

    $baddress=$_POST['business_address'];
    $businessaddress = strip_tags($baddress); 

    $businesspin=$_POST['business_pincode'];
    $bpin = strip_tags($businesspin); 

    $marriedstatus=$_POST['married_status'];
    $mstatus = strip_tags($marriedstatus); 

    $pwd = $_POST['password']; 
    $password = strip_tags($pwd); 

      
    
    

    
       
    $stmt = $conn->prepare("insert into member (member_name,contact_no,email,education,profession,dob,gender,gotra_id,home_address,home_pincode,business_address,business_pincode,married_status,password)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssissss", $membername,$contactno,$email,$education,$profession,$dob,$gender,$gotraid,$homeaddress,$hpin,$businessaddress,$bpin,$mstatus,$password);
    //echo "insert into member (member_name,contact_no,email,education,profession,dob,gender,gotra_id,home_address,home_pincode,business_address,business_pincode,married_status,password)VALUES('$membername','$contactno','$email','$education','$profession','$dob','$gender','$gotraid','$homeaddress','$hpin','$businessaddress','$bpin','$mstatus','$password')"; 
    //print_r($stmt);
    $stmt->execute();
    if (empty($_FILES['image']['name'])==false) 
    {
      $last_id = $conn->insert_id;
      $target_dir = "../memberimages/";
      $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

      $target_file = $target_dir . "M_".$last_id.".". $imageFileType;
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
      $target_file = "M_".$last_id.".". $imageFileType;

      $stmt = $conn->prepare("update member set image=? where member_id=?");
      $stmt->bind_param("ss",$target_file,$last_id );
      //print_r($stmt);
      $stmt->execute();
    }
  // echo "updated";
    // mysqli_query($con, $sql);
    echo "<script>alert('Member added successfully');window.location.href = 'memberlist.php';</script>";
}
?>
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"  style="font-size:30px">Add Member</h4>
                  <p class="card-description">
                  
                  </p>

                  <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <br>
                                
                                            <div class="form-group">
                                                <label>Member name</label>
                                                <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Username" required>
                                            </div>
                                    
                                        
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            
                                        </div>
                                        
                                            <div class="form-group">
                                                <label>Contact No.</label>
                                                <input type="number" minlength="10" maxlength="10" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No." required>
                                            
                                        </div>



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
                                      
                                        
                                        
                                            <!-- <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control required" oninput="removeInvalidClass(this)" name="gender" placeholder="જાતિ" required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                         -->
                                        
                                            <div class="form-group">
                                                <label>Education</label>
                                                <input type="text" class="form-control" id="education" name="education" placeholder="Education">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Profession</label>
                                                <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Shakh</label>
                                                <select name="gotra_id" class="form-control">
                                                <?php
                                                $rs = $conn->query("select * from gotra");
                                                while ($row = $rs -> fetch_assoc()) {
                                                echo "<option value='" . $row['gotra_id'] . "'>" . $row['gotra_name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        
                                        
                                        
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" id="home_address" name="home_address" placeholder="Home Address">
                                            </div>

                                            <div class="form-group">
                                                <label>Home Pincode</label>
                                                <input type="text" class="form-control" id="home_pincode" name="home_pincode" placeholder="Home Pincode">
                                            </div>

                                            <div class="form-group">
                                                <label>Business Address</label>
                                                <input type="text" class="form-control" id="business_address" name="business_address" placeholder="business pincode">
                                            </div>

                                            

                                            <div class="form-group">
                                                <label>Business Pincode</label>
                                                <input type="text" class="form-control" id="business_pincode" name="business_pincode" placeholder="Business Pincode">
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Marrital Status</label>
                                                <input type="text" class="form-control" id="married_status" name="married_status" placeholder="married status">
                                            </div>
                                        
                                        
                                        
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            </div>
                                        
                                        
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" id="image" name="image" placeholder="image" onchange="Filevalidation()" required>
                                            </div>
                                        
                                     <div class="clearfix"></div>
                                     <div class="row">
                                      <div class="col-lg-9">
                                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                              </div>
                                              <div class="col-lg-3"><a href="memberlist.php" class="btn btn-primary mr-2">Back to Member List</a></div>
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

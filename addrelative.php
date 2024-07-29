<?php
include_once('header.php');
?>
<?php
if(isset($_COOKIE['member_id'])==false)
header("location: login.php");

if ($_SERVER['REQUEST_METHOD']=="POST")
{
  if ($_FILES["image"]["size"] > (2*1024*1024))
  {
    echo "<script>alert('Sorry, your file is too large.(Max 2MB)');";
  }
  else
  {
    // $mail = $_POST['email'];
    // $email = strip_tags(mysqli_real_escape_string($con, $mail)); 

    // $pwd = $_POST['password']; 
    // $password = strip_tags(mysqli_real_escape_string($con, $pwd)); 

    // session_start();
    
    $name =strip_tags($_POST['name']);
    $relation =strip_tags($_POST['relation']);
    // session_start();
    $memberid = $_COOKIE['member_id'];
    $email =strip_tags($_POST['email']);
    $gender = strip_tags($_POST['gender']);
    $edu = strip_tags($_POST['education']);
    $prof = strip_tags($_POST['profession']);
    $dob = strip_tags($_POST['dob']);
    $inloves =strip_tags($_POST['inlaws']);
    

    // $uname=mysqli_real_escape_string($conn, $_POST['email']);
    // $pwd=mysqli_real_escape_string($conn, $_POST['password']);

    
    // $conn = new mysqli("localhost", 'root', '', "sbvp");
    // echo $sql;    
       
        // $sql = "update relative set member_id='?',relation='?',name='?',email='?',gender='?',education='?',profession='?',dob='?',Inloves='?',image='?' where relative_id='?'";
        // $conn = new mysqli("localhost", 'root', '', "sbvp");
    
    // $sql = "insert into relation (name,relation,member_id,email,gender,education,profession,dob,Inloves,image)VALUES(?,?,?,?,?,?,?,?,?,?)";



    $stmt = $conn->prepare("insert into relative (name,relation,member_id,email,gender,education,profession,dob,Inloves)VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $name,$relation,$memberid,$email,$gender,$edu,$prof,$dob,$inloves);
    //print_r($stmt);
    $stmt->execute();
    $last_id = $conn->insert_id;
    

    $target_dir = "relativeimages/";
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

    $target_file = $target_dir . "R_".$last_id.".". $imageFileType;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $stmt = $conn->prepare("update relative set image=? where relative_id=?");
    $stmt->bind_param("ss",$target_file,$last_id );
    //print_r($stmt);
    $stmt->execute();
   
    // $stmt->get_result();
    echo "<script>alert('Inserted data');</script>";
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
          <h1 class="mb-4">Add Relative</h1>
        </div>
        <div class="row">
        <div class="col-lg-3 mb-5">
        </div>
          <div class="col-lg-6 mb-5">
            <div class="contact-form">
              <div id="success"></div>
              <form method="post" enctype="multipart/form-data">
                <div class="control-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Relative Name" required
                    />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                  <!-- <input type="password" class="form-control" id="relation" name="relation" placeholder="Your Relation" required="required"
                    data-validation-required-message="Please enter your Relation"/> -->

                    <select name="relation" class="form-control" placeholder="Your Relation" required>
                        <?php
                        $data = $conn->query("select *  from relation");

                        while($row = $data -> fetch_assoc())
                         {
                          echo "<option value='" . $row['relation_name'] . "'>" . $row['relation_name'] . "</option>";
                         }
                        ?>
                    </select>
                  <p class="help-block text-danger"></p>

                </div>
                

                <div class="control-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Your Email"
                    data-validation-required-message="Please enter your Email"/>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <!-- <input type="password" class="form-control" id="email" name="email" placeholder="Your Email" required="required"
                    data-validation-required-message="Please enter your Email"/> -->


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
                         
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <input type="text" class="form-control" id="education" name="education" placeholder="Your Education"/>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <input type="text" class="form-control" id="profession" name="profession" placeholder="Your profession" 
                    data-validation-required-message="Please enter your Profession"/>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <input type="date" class="form-control" id="dob" name="dob" placeholder="Your DOB"
                    data-validation-required-message="Please enter your date of birth"/>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                  <input type="text" class="form-control" id="Inloves" name="inlaws" placeholder="Your Inlaws"
                    data-validation-required-message="Please enter name of Inlaws"/>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                                <div class="form-group">
                                  <input type="file" accept=".jpg, .jpeg, .png, .bmp" name="image" class="form-control" placeholder="image" onchange="Filevalidation()">
                                </div>
                            </div>

                <div style="text-align:center;">
                  <button class="btn btn-primary py-2 px-4" type="submit"
                    id="sendMessageButton"
                    style="min-width:200px"
                  >
                    Submit Your Data
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
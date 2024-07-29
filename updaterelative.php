<?php
if(isset($_COOKIE['member_id'])==false)
header("location: login.php");
include_once('header.php');
if ($_SERVER['REQUEST_METHOD']=="POST")
{
    // $mail = $_POST['email'];
    // $email = strip_tags(mysqli_real_escape_string($con, $mail)); 

    // $pwd = $_POST['password']; 
    // $password = strip_tags(mysqli_real_escape_string($con, $pwd)); 

    // session_start();
    $rid=$_GET['relative_id'];

    $name =mysqli_real_escape_string($conn, $_POST['name']);
    $relation =mysqli_real_escape_string($conn, $_POST['relation']);
    // session_start();
    $memberid = $_COOKIE['member_id'];
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $edu = mysqli_real_escape_string($conn,$_POST['education']);
    $prof = mysqli_real_escape_string($conn,$_POST['profession']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $inlaws =mysqli_real_escape_string($conn, $_POST['inlaws']);
    

    // $uname=mysqli_real_escape_string($conn, $_POST['email']);
    // $pwd=mysqli_real_escape_string($conn, $_POST['password']);

    
    // $conn = new mysqli("localhost", 'root', '', "sbvp");
    // echo $sql;    
    // $target_dir = "img/";
    // $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    // // $sql = "insert into relation (name,relation,member_id,email,gender,education,profession,dob,Inloves,image)VALUES(?,?,?,?,?,?,?,?,?,?)";



    // $stmt = $conn->prepare("insert into relative (name,relation,member_id,email,gender,education,profession,dob,Inloves,image)VALUES(?,?,?,?,?,?,?,?,?,?)");
    // $stmt->bind_param("ssssssssss", $name,$relation,$memberid,$email,$gender,$edu,$prof,$dob,$inloves,$target_file);
    // //print_r($stmt);
    // $stmt->execute();
    // // $stmt->get_result();
    // echo "<script>alert('Inserted data');</script>";




    if(!empty($_FILES['image']['name'])){
        $target_dir = "api/images/";
        $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

        $target_file = $target_dir . "R_".$rid.".". $imageFileType;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        // $sql = "update relative set member_id='?',relation='?',name='?',email='?',gender='?',education='?',profession='?',dob='?',Inloves='?',image='?' where relative_id='?'";
        // $conn = new mysqli("localhost", 'root', '', "sbvp");
    
        $stmt = $conn->prepare("update relative set member_id=?,relation=?,name=?,email=?,gender=?,education=?,profession=?,dob=?,Inloves=?,image=? where relative_id=?");
        $stmt->bind_param("sssssssssss", $mid, $relation,$name,$email,$gender,$edu,$prof,$dob,$inlaws,$target_file,$rid);
        // print_r($stmt);
        $stmt->execute();
        // echo "updated";
    
    }
    else
    {
     
      $stmt = $conn->prepare("update relative set member_id=?,relation=?,name=?,email=?,gender=?,education=?,profession=?,dob=?,Inloves=? where relative_id=?");
      $stmt->bind_param("ssssssssss", $mid, $relation,$name,$email,$gender,$edu,$prof,$dob,$inlaws,$rid);
      // print_r($stmt);
      $stmt->execute();
      // echo "updated";
        // $sql = "update relative set member_id='$mid',relation='$relation',name='$name',email='$email',gender='$gender',education='$edu',profession='$prof',dob='$dob',Inloves='$inlaws' where relative_id='$rid'";
    }   // echo $sql;
        // mysqli_query($con, $sql);
        // echo $sql;
        echo "<script>alert('Updated');</script>";
}
else
{
    if(isset($_GET['relative_id']))
    {
        $rid=$_GET['relative_id'];
        $data = $conn->query("select *  from relative where relative_id='$rid'");
        $row = $data -> fetch_assoc();
    
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
          <h1 class="mb-4">Update Relative</h1>
        </div>
        <div class="row">
        <div class="col-lg-3 mb-5">
        </div>
          <div class="col-lg-6 mb-5">
            <div class="contact-form">
              <div id="success"></div>
              <form novalidate="novalidate" method="post" enctype="multipart/form-data">
                <div class="control-group">
                  <input type="text" class="form-control" id="name" value="<?php if (isset($row['name'])) echo $row['name'];?>" name="name" placeholder="Your Name" required="required"
                    data-validation-required-message="Please enter your Relatives Name"/>
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="relation" name="relation" value="<?php if (isset($row['relation'])) echo $row['relation'];?>" placeholder="relative" required>
                      <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($row['email'])) echo $row['email'];?>" placeholder="Email">
                      <p class="help-block text-danger"></p>

                    </div>
                
            

                <div class="control-group">
                  <!-- <input type="password" class="form-control" id="email" name="email" placeholder="Your Email" required="required"
                    data-validation-required-message="Please enter your Email"/> -->


                    <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="1" checked="">
                                Male
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" id="gender" value="0">
                                Female
                                <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                         
                  <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="education" name="education" value="<?php if (isset($row['education'])) echo $row['education'];?>" placeholder="Education">
                      <p class="help-block text-danger"></p>
                </div>


                <div class="control-group">
                      <input type="text" class="form-control" id="profession" name="profession" value="<?php if (isset($row['profession'])) echo $row['profession'];?>" placeholder="Profession" >
                      <p class="help-block text-danger"></p>
                </div>



                <div class="control-group">
                      <input type="text" class="form-control" id="dob" name="dob" value="<?php if (isset($row['dob'])) echo $row['dob'];?>" placeholder="dob" required>
                      <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                      <input type="text" class="form-control" id="inlaws" name="inlaws" value="<?php if (isset($row['Inloves'])) echo $row['Inloves'];?>" placeholder="inlaws">
                      <p class="help-block text-danger"></p>
                </div>

                <div class="control-group">
                                <div class="form-group">
                                <img src="<?php if (isset($row['image'])) echo $row['image'];?>" width="100px">
                                <input type="file" accept=".jpg, .jpeg, .bmp, .png" class="form-control" id="image" name="image" placeholder="image">

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
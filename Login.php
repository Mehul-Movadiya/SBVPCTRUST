
<?php
include_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD']=="POST")
{
    // $mail = $_POST['email'];
    // $email = strip_tags(mysqli_real_escape_string($con, $mail)); 

    // $pwd = $_POST['password']; 
    // $password = strip_tags(mysqli_real_escape_string($con, $pwd)); 

    $uname=mysqli_real_escape_string($conn, $_POST['email']);
    $pwd=mysqli_real_escape_string($conn, $_POST['password']);

    
    // $conn = new mysqli("localhost", 'root', '', "sbvp");
    // echo $sql;    
    $stmt = $conn->prepare("select * from member where email=? and password=?");
    $stmt->bind_param("ss", $uname,$pwd);
    //print_r($stmt);
    $stmt->execute();
    $data= $stmt->get_result();
    
    // $rs=mysqli_query($con,"select * from member where email='$uname' and password='$pwd'");
      if($data->num_rows>0)
        {
            $row=$data -> fetch_assoc();
        //   session_start();
            setcookie('member_id', $row['member_id'], time() + (86400));
            setcookie('member_name', $row['member_name'], time() + (86400));
            header("location: index.php");
            exit();
        }
      else
        {
          echo "<script>alert('Please enter valid data');</script>";
        }

        $_SESSION['member_id'] = $member_id;
        $_SESSION['member_name'] = $member_name;

        // Optional: Set a cookie for persistent login (e.g., valid for 30 days)
        setcookie('member_id', $member_id, time() + (30 * 24 * 60 * 60), "/");
        setcookie('member_name', $member_name, time() + (30 * 24 * 60 * 60), "/");

        // Redirect to the member list or home page
        header("Location: memberlist.php");
        exit();
  }
?>
<?php
include_once('header.php');
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
          <h1 class="mb-4">Sign-in</h1>
        </div>
        <div class="row">
        <div class="col-lg-3 mb-5">
        </div>
          <div class="col-lg-6 mb-5">
            <div class="contact-form">
              <div id="success"></div>
              <form novalidate="novalidate" method="post">
                <div class="control-group">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Your Email"
                    required="required"
                    data-validation-required-message="Please enter your registered email"
                    maxlength="50"
                  />
                  <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Your Password"
                    required="required"
                    data-validation-required-message="Please enter your password"
                    maxlength="8"
                  />
                  <p class="help-block text-danger"></p>
                </div>
                <div style="text-align:center;">
                  <button
                    class="btn btn-primary py-2 px-4"
                    type="submit"
                    id="sendMessageButton"
                    style="min-width:200px"
                  >
                    Sign-in
                  </button>
                </div>
                <div style="text-align:center; margin-top: 20px;">
                  <p>New user? <a href="registration.php">Register here</a></p>
                  <p><a href="forgetpassword.php">Forgot Password?</a></p>
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

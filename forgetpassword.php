<?php
require 'api/PHPMailer/PHPMailer.php';
require 'api/PHPMailer/SMTP.php';
require 'api/PHPMailer/Exception.php';
include_once('dbconfig.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT * FROM member WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);

        // Store OTP in session
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        
        // Send OTP to user's email
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'webmail.sbvpsamaj.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'info@sbvpsamaj.com';
            $mail->Password   = 'Abc@123#123';
            $mail->SMTPSecure = 'ssl'; // For SSL
            $mail->Port       = 465;   // For SSL

            //Recipients
            $mail->setFrom('info@sbvpsamaj.com', 'SBVP Admin');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset OTP';
            $mail->Body    = "Your OTP for password reset is: <b>$otp</b>";
            $mail->AltBody = "Your OTP for password reset is: $otp";

            $mail->send();
            echo "<script>alert('OTP sent to your email.');</script>";
            header("Location: verifyotp.php");
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script>alert('Email not registered.');</script>";
    }
}
?>

<?php
include_once('header.php');
?>
<!-- Forgot Password Form -->
<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2">
      <h1 class="mb-4">Forgot Password</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-5"></div>
      <div class="col-lg-6 mb-5">
        <div class="contact-form">
          <form novalidate="novalidate" method="post">
            <div class="control-group">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Your Registered Email"
                required="required"
                data-validation-required-message="Please enter your registered email"
                maxlength="50"
              />
              <p class="help-block text-danger"></p>
            </div>
            <div style="text-align:center;">
              <button
                class="btn btn-primary py-2 px-4"
                type="submit"
                id="sendOtpButton"
                style="min-width:200px"
              >
                Send OTP
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

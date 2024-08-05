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
        $row = $result->fetch_assoc();
        $id = $row['member_id'];

        // Generate new password
        $new_password = getName(8);

        // Update the new password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the password
        $update_stmt = $conn->prepare("UPDATE member SET password=? WHERE member_id=?");
        $update_stmt->bind_param("si", $new_password, $id);
        $update_stmt->execute();

        // Send new password to user's email
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'webmail.sbvpctrust.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'info@sbvpctrust.com';
            $mail->Password   = 'Abc@123#123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // For SSL
            $mail->Port       = 465;   // For SSL

            // Enable verbose debug output
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = function($str, $level) {
                file_put_contents('phpmailer_debug.log', date('Y-m-d H:i:s')." [$level] $str\n", FILE_APPEND);
            };

            //Recipients
            $mail->setFrom('info@sbvpctrust.com', 'SBVP Admin');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Password';
            $mail->Body    = "Your new password is: <b>$new_password</b>";
            $mail->AltBody = "Your new password is: $new_password";

            $mail->send();
            echo "<script>alert('New password sent to your email.');</script>";
            header("Location: login.php");
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
            file_put_contents('phpmailer_error.log', "Mailer Error: {$mail->ErrorInfo}\n", FILE_APPEND);
        }
    } else {
        echo "<script>alert('Email not registered.');</script>";
    }
}

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    
    return $randomString;
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
                id="sendPasswordButton"
                style="min-width:200px"
              >
                Send New Password
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

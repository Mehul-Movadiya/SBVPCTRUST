<?php
include_once('dbconfig.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    if ($otp == $_SESSION['otp']) {
        $_SESSION['otp_verified'] = true;
        header("Location: resetpassword.php");
    } else {
        echo "<script>alert('Invalid OTP.');</script>";
    }
}
?>

<?php
include_once('header.php');
?>
<!-- Verify OTP Form -->
<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2">
      <h1 class="mb-4">Verify OTP</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-5"></div>
      <div class="col-lg-6 mb-5">
        <div class="contact-form">
          <form novalidate="novalidate" method="post">
            <div class="control-group">
              <input
                type="text"
                class="form-control"
                id="otp"
                name="otp"
                placeholder="Enter OTP"
                required="required"
                data-validation-required-message="Please enter the OTP sent to your email"
                maxlength="6"
              />
              <p class="help-block text-danger"></p>
            </div>
            <div style="text-align:center;">
              <button
                class="btn btn-primary py-2 px-4"
                type="submit"
                id="verifyOtpButton"
                style="min-width:200px"
              >
                Verify OTP
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

<?php
include_once('dbconfig.php');
session_start();

if (!isset($_SESSION['otp_verified']) || !$_SESSION['otp_verified']) {
    header("Location: forgetpassword.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['password'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = $_SESSION['email'];

    // Update password in the database
    $stmt = $conn->prepare("UPDATE member SET password=? WHERE email=?");
    $stmt->bind_param("ss", $password, $email);
    
    if ($stmt->execute()) {
        echo "<script>alert('Password updated successfully.');</script>";
        session_destroy();
        header("Location: login.php");
    } else {
        echo "<script>alert('Failed to update password.');</script>";
    }
}
?>

<?php
include_once('header.php');
?>
<!-- Reset Password Form -->
<div class="container-fluid pt-5">
  <div class="container">
    <div class="text-center pb-2">
      <h1 class="mb-4">Reset Password</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-5"></div>
      <div class="col-lg-6 mb-5">
        <div class="contact-form">
          <form novalidate="novalidate" method="post">
            <div class="control-group">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Enter New Password"
                required="required"
                data-validation-required-message="Please enter your new password"
                maxlength="8"
              />
              <p class="help-block text-danger"></p>
            </div>
            <div style="text-align:center;">
              <button
                class="btn btn-primary py-2 px-4"
                type="submit"
                id="resetPasswordButton"
                style="min-width:200px"
              >
                Reset Password
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

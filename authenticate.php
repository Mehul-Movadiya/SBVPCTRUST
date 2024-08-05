<?php
include_once('dbconfig.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT * FROM member WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct
            $_SESSION['member_id'] = $row['member_id'];
            $_SESSION['email'] = $row['email'];
            header("Location: myprofile.php");
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password.');</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
    } else {
        // Email not found
        echo "<script>alert('Email not registered.');</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
}
?>

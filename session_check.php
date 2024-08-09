<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['member_id']) && !empty($_SESSION['member_id']);
}

if (!isLoggedIn()) {
    // If not logged in via session, check for valid cookie
    if (isset($_COOKIE['member_id']) && !empty($_COOKIE['member_id'])) {
        // Validate the cookie against the database
        include_once('dbconfig.php');
        $member_id = $_COOKIE['member_id'];
        $stmt = $conn->prepare("SELECT * FROM member WHERE member_id = ?");
        $stmt->bind_param("i", $member_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['member_id'] = $row['member_id'];
            $_SESSION['member_name'] = $row['member_name'];
        } else {
            // Invalid cookie, clear it
            setcookie('member_id', '', time() - 3600, '/');
            setcookie('member_name', '', time() - 3600, '/');
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
}
?>
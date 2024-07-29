<?php
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");
    $cno=$_POST['contact_no'];
    $email=$_POST['email'];
    include("dbconfig.php");
    
    $rs=mysqli_query($con,"select * from member where contact_no='$cno' or email='$email'");
    if(mysqli_num_rows($rs)==1)
    {
        $row=mysqli_fetch_assoc($rs);
        $add=$row['email'];
        $nm=$row['member_name'];
        $id=$row['member_id'];
        $pwd=getName(8);

        mysqli_query($con,"update member set password='$pwd' where member_id='$id'");
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'webmail.sbvpsamaj.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@sbvpsamaj.com';                 // SMTP username
        $mail->Password = 'Abc@123#123';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        
        $mail->From = 'info@sbvpsamaj.com';
        $mail->FromName = 'SBVP Admin';
        $mail->addAddress($add, $nm);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        
        $mail->Subject = 'New password';
        $mail->Body    = "Your new password is: <b>$pwd</b>";
        $mail->AltBody = "Your new password is: $pwd";
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
            echo 'SUCCESS';
        
    }
    else
    {
        echo "Invalid Details";
    }
  
function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    
    for ($i = 0; $i < $n; $i++)
    {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    
    return $randomString;
}
//    echo "SUCCESS"; 
?>
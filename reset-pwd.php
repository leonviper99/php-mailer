<?php
use PHPmailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\SMTP;
use PHPmailer\PHPMailer\Exception;

include 'backend/connect.php';

if(isset($_POST['reset'])){
    $res_mail = $_POST['email'];
    $temp_pwd = uniqid();
    $check = $conn->query("SELECT * from users where email='$res_mail';");
    if(mysqli_num_rows($check)<1){
        echo "<script>alert('Email not found')</script>";
        echo "<meta http-equiv='refresh' content='0; url=lost_password.php'>";
    }else{
        $temp_update = $conn->query("UPDATE users set pwd = '$temp_pwd' where email = '$res_mail';");
        if($temp_update){
            require 'vendor/phpmailer/phpmailer/src/Exception.php';
            require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
            require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    
    
            //Load Composer's autoloader
            require 'vendor/autoload.php';
    
            // require ('phpmailer/PHPMailer.php');         
            // require ('phpmailer/SMTP.php');
            // require ('phpmailer/Exception.php');
            
            
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
            $mail=new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth="true";
            $mail->SMTSecure ="tls";
            $mail->Port=587;
            $mail->Username="innov8pod@gmail.com";
            $mail->Password="wfqerijturxrzyna";
            $mail->Subject="Password reset succesful";
            $mail->setFrom("innov8pod@gmail.com", "Innov8Pod");
            $mail->Body="Your password has been successfully reset. Your new temporary password is: ".$temp_pwd;
            $mail->addAddress($res_mail);
            // $mail->send();
            
            if($mail->send()){
                echo "Successfully restored. Your new temporary password has been sent to ".$res_mail.". Use it for loging in!";
                echo "<meta http-equiv='refresh' content='15; url=login.php'>";
            }else{
                echo "email Failed!";
                ECHO $mail->ErrorInfo;
            }
            
            $mail->smtpClose();
                }
    }
    
}




       
?>



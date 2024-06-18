<?php
include('smtp/PHPMailerAutoload.php');

// Replace 'to_email' with the actual recipient email address
$to_email = $_GET['email'];

// Replace 'Subject' with the actual email subject
$subject = 'UOM Complaint Portal Activation';

// Replace 'html' with the actual HTML content of your email message
$html_message = '<html><body> Subject: Welcome to UOM Complaint Portal - Account Activation<br>

Dear [User],<br>

We are thrilled to welcome you to the UOM Complaint Portal! Your registration has been successfully processed, and your account is now active. <br>

Your account is now ready for use. You can log in to the portal using your email address and the password you provided during registration.<br>

You can login through the below link thanks <br> http://localhost/Complaint%20Portal/index.php <br>

We are committed to providing you with a seamless experience on our platform. If you encounter any issues or have any feedback,<br> please do not hesitate to contact us. Our team is here to assist you.<br>

Thank you for choosing the UOM Complaint Portal. We look forward to serving you.<br>

Best regards,<br>
UOM Complaint Portal Team</body></html>';

echo smtp_mailer($to_email, $subject, $html_message);

function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; 
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    // Uncomment the line below if you want to enable debugging
    // $mail->SMTPDebug = 2; 
    $mail->Username = 'jailany7272@gmail.com'; // Replace with your Gmail email address
    $mail->Password = 'rkee xrii zxto fhkr'; // Replace with your Gmail app-specific password
    $mail->SetFrom('jailany7272@gmail.com', 'UOM Complaint Portal'); // Replace with the sender's email address and name
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if(!$mail->Send()){
        return $mail->ErrorInfo;
    } else {
        return '<script>window.location="Validate_User.php"</script>';
    }
}
?>

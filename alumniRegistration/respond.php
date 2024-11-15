<?php
    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    // Send email with alumni_id
    $toEmail = $email;
    $subject = "Your TU CSE Alumni ID";
    $message = "<div style='text-align: center; margin: 30px auto; max-width: 800px; background-color: #e8e8f9; padding: 20px; border-radius:  10px;'>
                    <h4 style='color: #2c3e50;'>Dear $name,</h4>
                    <h3 style='color: #3498db; margin: 10px 20px;'>Your Unique Alumni ID is <span style='font-weight: bold; color: #e74c3c;'>$alumniId</span></h3>

                    <div style='color: #7f8c8d; margin: 10px 20px;'>
                        <p>Welcome to our vibrant alumni community!</p>
                        <p>Thank you for joining us in this exciting initiative to connect with the Computer Science and Engineering alumni of Tezpur University.</p>
                        <p>Together, let's build bridges of knowledge and memories.</p>
                        <p>Please use this Alumni ID for all future communications with the department.</p>
                    </div>

                    <div style='color: #2c3e50;'>
                        <h4 >Best Regards,</h4>
                        <h4>The Alumni Connect Team</h4>
                        <h4>Computer Science and Engineering Department</h4>
                        <h4>Tezpur University</h4>
                        <h4>Tezpur, Assam, India</h4>
                    </div>
                </div>";

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // Set the debug level to 0 (zero) to suppress all messages
    $mail->SMTPDebug = 0;  

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'deepakpk756@gmail.com';
        $mail->Password   = 'vouivcenwzonwpic';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('deekapk756@gmail.com', 'TU CSE Alumni Connect');
        $mail->addAddress($toEmail, 'TU CSE Alumni');     //Add a recipient
        $mail->addReplyTo('deekapk756@gmail.com', 'TU CSE Alumni Connect');

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        // Set this variable based on whether the email was sent successfully
        $emailSentSuccessfully = true;
        // echo 'Message has been sent';
    } catch (Exception $e) {
        $emailSentSuccessfully = false;
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
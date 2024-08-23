<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>


<?php 

    // if (!isset($_SERVER["HTTP_REFERR"])){
    //     header("location: index.php");
    //     exit;
    // }

    // $select = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
    // $select->execute();
    // $allProducts = $select->fetchAll(PDO::FETCH_OBJ);

  

    // header('Content-Type: application/zip');
    // header('Content-disposition: attachment; filename='.$zipname);
    // header('Content-Length: ' . filesize($zipname));
    // readfile($zipname);

    // $select = $conn->query("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
    // $select->execute();

    // header("location: index.php");


    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'akumbomwesley802@gmail.com';                     //SMTP username
        $mail->Password   = 'hrye gwaf qtlr cazk';                               //SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       =  587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Sender
        $mail->setFrom('akumbomwesley802@gmail.com', 'Bookstore');

        //Add a recipient
        $mail->addAddress('keyzwesley@gmail.com', 'User');     

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'The books you bought';
        $mail->Body    = 'Here are your books <b>Thanks for buying from Bookstore</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
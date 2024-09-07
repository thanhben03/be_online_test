<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

class SendMail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }
    public function mail($to, $message)
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = 2;
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->Username = 'nben19732@gmail.com';
            $this->mail->Password = 'zvnd fmfr rmos zgub';
            $this->mail->SMTPSecure = 'ssl';
            $this->mail->Port = 465;

            //Recipients
            $this->mail->setFrom('nben19732@gmail.com', 'Nguyen Ben'); // Địa chỉ email và tên người gửi
            $this->mail->addAddress($to); // Địa chỉ mail và tên người nhận

            //Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = 'Thank you for contacting us'; // Tiêu đề
            $this->mail->Body = $message; // Nội dung

            $this->mail->send();
            echo 'Message has been sent';
            echo '<h1 style="color: red">The messages above are only displayed in the development environment!</h1>';
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}


?>
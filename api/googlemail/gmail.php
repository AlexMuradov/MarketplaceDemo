<?php
// Load Composer's autoloader


Namespace Api\GoogleMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/var/www/html/vendor/autoload.php';

Class Gmail
{
    protected $mail;

    public function __construct() {
        $this->mail = new \PHPMailer\PHPMailer\PHPMailer();
        $this->mail->IsSMTP();
        $this->mail->Mailer = "smtp";

        $this->mail->SMTPDebug  = FALSE;  
        $this->mail->SMTPAuth   = TRUE;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port       = 587;
        $this->mail->Host       = "smtp.gmail.com";
        $this->mail->Username   = "admin@rentxx.com";
        $this->mail->Password   = "Corfu1286.";

        $this->mail->IsHTML(true);
        $this->mail->SetFrom("admin@rentxx.com", "Rentxx");
        #$this->mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
        #$this->mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $this->mail->Subject = "Welcome to RentXx";
    }

    public function SendMail($vars, $email, $tempType) {
        // $link = "https://rentxx.com";
        $content = file_get_contents( dirname(__FILE__) . '/templates/'.$tempType.'.html');
        $x = explode(",", $vars);

        $lng = $x[0];

        $this->mail->AddAddress($email, $x[1]);
       
        foreach ($x as $k => $tag) {
            $content = str_replace("{{".$k."}}", $tag , $content);
        }

        // $content = str_replace("{{link}}", $link , $content);
        // echo $content;
        $this->mail->MsgHTML($content);  
        if(!$this->mail->Send()) {
          // echo "Error while sending Email.";
          // var_dump($this->mail);
        } else {
          // echo "Email sent successfully";
        }
    }
}

?>

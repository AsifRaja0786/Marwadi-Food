<?php
session_start();

use PHPmailer\PHPmailer\PHPmailer;
use PHPmailer\PHPmailer\Exception;

require_once __DIR__.'/database.php';
require_once __DIR__.'/config.php';
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


     $db;
     $query;
     $user_mail;
     $otp;
     $new_otp;
     $header;
     $message;
     $config;
    
    function kill()
    {
        unset($db);
        unset($query);
        unset($user_mail);
        unset($otp);
        unset($new_otp);
        unset($header);
        unset($message);
        unset($config);
    }

    function send_mail($email, $otp)
    {
        if(isset($email) )
        {
           
        
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();// Set mailer to use SMTP
        $mail->CharSet = "utf-8";// set charset to utf8
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
        
        $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
        $mail->Port = 587;// TCP port to connect to
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->isHTML(true);// Set email format to HTML
        
        $mail->Username = 'mohammadasif.raja108126@marwadiuniversity.ac.in';// SMTP username
        $mail->Password = "skpcmuswhymimihw";// SMTP password
        
        $mail->setFrom('mohammadasif.raja108126@marwadiuniversity.ac.in', 'MUFOOD');//Your application NAME and EMAIL
        $mail->Subject = 'OTP for Verification';//Message subject
        $mail->MsgHTML('<body style=\'background-color:rgb(238,238,238);padding-top:10px;padding-bottom:10px;text-align:center;\'>
        <div style=\'width:50%;margin:0 auto;background-color:rgb(248,248,248);padding:10px\'>
            <h3>Your OTP for email verification is</h3>
            <h1>'.$otp.'</h1>
        </div>');// Message body
        $mail->addAddress($email);// Target email
        
        $mail->send();
    
         return true;

        }

        else
        {
            return false;
        } 

    }


    function emailvalidate($email)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@(marwadiuniversity|marwadieducation)\.(ac|edu)\.in/", $email)) ? FALSE : TRUE;
    }

    //@marwadiuniversity\.ac\.in

    function send_mail_fun($user_mail, $otp){
        $config = new config();
        $user_mail = $user_mail;
        $otp = $otp;

        if(send_mail($user_mail, $otp)){
            header('Location: ../verification.php#req-verfication');
        }
        else{
            echo '<script>
            alert("Cannot send Mail");
            window.location.href="../index.php#req-verfication";
            </script>';

        }
    }


    
        if(isset($_POST['email']) && emailvalidate($_POST['email'])){
            $user_mail = $_POST['email'];
        }
        else{
            kill();
            echo '<script>
            alert("Invalid Email . Please Use university Student Mail Id or Faculty\'s Mail Id");
            window.location.href="../index.php#req-verfication";
            </script>';
            exit();
        }

        if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {

            kill();
            echo '<script>
            alert("Invalid Email");
            window.location.href="../index.php#req-verfication";
            </script>';
            exit();
        }

        $new_otp = random_int(100000, 999999);
        $db = new db();
        $db = $db->database();

        $user_mail = trim($user_mail);
        $user_mail = htmlspecialchars($user_mail,ENT_QUOTES);
        $user_mail = mysqli_real_escape_string($db,$user_mail);

        $query = $db->prepare('SELECT * FROM user WHERE email=?');
        $query->bind_param('s',$user_mail);
        $query->execute();
        $query->store_result();

        if ($query->num_rows != 0) {
            $_SESSION['email'] = $user_mail;
            kill();
            echo '<script>
            alert("Email has been already Verified");
            window.location.href="../main-index.php#contact";
            </script>';
            
            exit();
        }

        else{
            send_mail_fun($user_mail,$new_otp);
            $_SESSION['otp'] = $new_otp;
            $_SESSION['email'] = $user_mail;
    }

?>
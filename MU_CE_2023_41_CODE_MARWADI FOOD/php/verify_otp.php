<?php
session_start();
require_once __DIR__.'/database.php';
require_once __DIR__.'/config.php';


     $user_mail;
     $otp;
     $header;
     $message;
     $config;

    $otp = $_POST['otp'];
    $user_mail = $_SESSION['email'];

    if($otp == $_SESSION['otp'])
    {
        // send_mail_fun($user_mail);
        $db = new db();
        $db = $db->database();

        $user_mail = trim($user_mail);
        $user_mail = htmlspecialchars($user_mail,ENT_QUOTES);
        $user_mail = mysqli_real_escape_string($db,$user_mail);
        $otp_set = 1;
        $query = $db->prepare('INSERT INTO user(email,otp) VALUES(?,?)');
        $query2 = $db->prepare('INSERT INTO user_data(email) VALUES(?)');
        $query2->bind_param('s',$user_mail);
        $query->bind_param('ss',$user_mail,$otp_set);
        $query->execute();
        $query2->execute();

        if($query->affected_rows!=0 && $query2->affected_rows!=0){
            header('Location: ../main-index.php#contact');
        }
        else{
            kill();

            echo '<script>
            alert("Wrong OTP");
            window.location.href="../index.php#req-verfication";
            </script>';
            exit();
        }
    }
    else
    {
        echo '<script>
            alert("Wrong OTP");
            window.location.href="../verification.php#req-verfication";
            </script>';
    }

    function kill()
    {
        unset($db);
        unset($query);
        unset($user_mail);
        unset($otp);
        unset($err);
        unset($header);
        unset($message);
        unset($config);
    }

?>
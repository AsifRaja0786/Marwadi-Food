<?php
    session_start();

    require_once __DIR__.'/database.php';
    require_once __DIR__.'/config.php';
    $con = mysqli_connect("localhost","root","","mufood");


     $user_mail;
     $header;
     $message;
     $config;

        $user_mail = $_SESSION['email'];

        $db = new db();
        $db = $db->database();

        $user_mail = trim($user_mail);
        $user_mail = htmlspecialchars($user_mail,ENT_QUOTES);
        $user_mail = mysqli_real_escape_string($db,$user_mail);

        $query = $db->prepare('SELECT * FROM user_data WHERE email= ? ');
        $query->bind_param('s',$user_mail);
        $query->execute();
        $query->store_result();

        $query2 = $db->prepare('SELECT * FROM user WHERE email= ? ');
        $query2->bind_param('s',$user_mail);
        $query2->execute();
        $query2->store_result();

        if ($query->num_rows != 0 || $query2->num_rows !=0) {

            $name = trim($_POST['name']);
            $mealtime = trim($_POST['mealtime']);
            $reason = trim($_POST['reason']);
            $email = $_SESSION['email'];
            $filePath = ""; // Initialize to not get an error
            $validFileExtension = ["pdf", "doc", "docx", "txt"];

            $db = new db();
            $db = $db->database();

            $user_mail = trim($user_mail);
            $user_mail = htmlspecialchars($user_mail,ENT_QUOTES);
            $user_mail = mysqli_real_escape_string($db,$user_mail);
            

            if ($_FILES['file']['error'] === 4) {
                echo "<script>alert('File does not exist.')</script>";

            } else {

                $fileName = $_FILES['file']['name'];
                $fileSize = $_FILES['file']['size'];
                $tmpName = $_FILES['file']['tmp_name'];
        
                $fileExtension = explode('.', $fileName);
                $fileExtension = strtolower(end($fileExtension));
        
                if (!in_array($fileExtension, $validFileExtension)) {
                    echo "<script>alert('Invalid file type.')</script>";

                } else {

                    $filePath = date("Y-m-d") . strval(floor(microtime(true))). "." .$fileExtension;
                    move_uploaded_file($tmpName, "../file/" . $filePath);
                }
            }

            // $query = "UPDATE `user_data` SET `name` = '$name', `mealtime` = '$mealtime', `reason` = '$reason', `file` = '$filePath' WHERE `email` = '$email'";

            $query = $db->prepare('UPDATE `user_data` SET `name` = ?, `mealtime` = ?, `reason` = ?, `file` = ? WHERE `email` = ?');
            $query->bind_param('sssss',$name,$mealtime,$reason,$filePath,$user_mail);
            $query->execute();


            if($query->affected_rows!=0){
                echo '<script>
                alert("Request Sent Successfully");
                window.location.href="../main-index.php#home";
                </script>';
                
            }
            else{
                kill();

                echo '<script>
                alert("Something went wrong...");
                window.location.href="../index.php#req-verfication";
                </script>';
                exit();
            }


        }

        else{
            kill();
            echo '<script>
            alert("Email might not be verified");
            window.location.href="../index.php#req-verfication";
            </script>';
            exit();
    }



    // if (isset($_POST['file'])) {

        
    // }


    if($otp == $_SESSION['otp'])
    {
        // send_mail_fun($user_mail);
    

        if($query->affected_rows!=0){
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
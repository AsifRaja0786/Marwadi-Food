<?php
    $con = mysqli_connect("localhost","root","","mufood");
    $email = $_POST['email'];
    echo "$email";
    $query = "DELETE FROM `user_data` WHERE `email` = '$email'";
    mysqli_query($con, $query);
?>
<?php
session_start();
$_SESSION['otp'] = " ";
$_SESSION['email'] = " ";
session_unset();
session_destroy();
header('Location: ../index.php#req-verfication');

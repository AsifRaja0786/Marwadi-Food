<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self');</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marwadi Food: Admin</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                    }   if(isset($_GET['regularFood'])){
                        
                        include("regularFood.php");
                        
                    }   if(isset($_GET['specialMenu'])){
                        
                        include("specialMenu.php");
                        
                    }   if(isset($_GET['chefs'])){
                        
                        include("chefs.php");
                    
                    }   if(isset($_GET['foodRequest'])){
                        
                        include("foodReq.php");
                    
                    }
    
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>       
</body>
</html>


<?php } ?>
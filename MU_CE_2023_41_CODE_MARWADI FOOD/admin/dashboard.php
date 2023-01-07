<?php

    include "includes/db.php";
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self');</script>";
        
    } 

    
?> 

<!-- LINK -->
<style>
    
    .box-shadow {
        height: 50px;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }
</style>

<!-- HTML Starts Here -->
<!-- Breadcrumb Begin -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Home Page </li>
        </ol>
    </div>
</div>
<!-- Breadcrumb Finish -->

<?php

    $con = mysqli_connect("localhost","root","","mufood");
    $query = "SELECT * FROM `user_data`";
    $result = mysqli_query($con, $query);
    $numOfFoodRequest = 0;
    $numOfAdmins = 0;
    while($row=$result->fetch_assoc()) {
        $numOfFoodRequest++;
    }
    $query = "SELECT * FROM `admin`";
    $result = mysqli_query($con, $query);
    while($row=$result->fetch_assoc()) {
        $numOfAdmins++;
    }

?>

<div class="row" style="display: flex; justify-content: space-between;">
    <div class="col-12 col-sm-5 box-shadow">
        <h4 style="float:left;">&nbsp;Number of Food Request: </h2>
        <h4 style="float:right;"><?= $numOfFoodRequest ?>&nbsp;</h2>
    </div>
    <div class="col-12 col-sm-5 box-shadow">
        <h4 style="float:left;">&nbsp;Number of Admins: </h2>
        <h4 style="float:right; "><?= $numOfAdmins ?>&nbsp;</h2>
    </div>
    <!-- <div class="col-12 col-sm-3 box-shadow" style="padding: 5px;">
        <h4 style="float:left;">&nbsp;Number of Admins: </h2>
        <h4 style="float:right;"><?= $numOfAdmins ?>&nbsp;</h2>
    </div> -->
</div>

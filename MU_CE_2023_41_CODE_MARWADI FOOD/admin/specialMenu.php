<?php 

    include("includes/db.php");

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self');</script>";
    }

    if (isset($_POST['submit'])) {
        $errorFlag = false;
        for ($i=1; $i<=8; $i++) {
            $food = $_POST['specialMenuFood'.$i];
            $fullmenu = $_POST['specialFullMenu'.$i];
            $query = "UPDATE `specialmenu` SET `food`='$food', `fullmenu`='$fullmenu' WHERE `id`=$i";
            if (!mysqli_query($con, $query)) {
                $errorFlag = true;
            }
        }
        
        if ($errorFlag == true) {
            echo "<script>alert('Error: Unable To Update Special Menu.')</script>";
        } else {
            echo "<script>alert('Success: Special Menu Updated Successfully.')</script>";
        }
    }

    $specialMenuFood = ["", "", "", "", "", "", "", ""];
    $specialFullMenu = ["", "", "", "", "", "", "", ""];
    $specialMenuFeedback = ["", "", "", "", "", "", "", ""];

    $index = 0;
    $query = "SELECT * FROM `specialmenu`";
    $result = mysqli_query($con, $query);
    while ($row=$result->fetch_assoc()) {
        $specialMenuFood[$index] = $row['food'];
        $specialFullMenu[$index] = $row['fullmenu'];
        $specialMenuFeedback[$index] = $row['feedback'];
        $index++;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit Blogs </title>
    <style>
        .menuFood {
            width: 25%;
        }
    </style>
</head>

<body>

    <!-- Breadcrumb Begin -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Special Menu</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Finish -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <!-- Heading -->
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Special Menu</h3>
                </div>

                <!-- Form Begins -->
                <div class="panel-body">

                    <!-- Select Day -->
                    <form method="post" class="container form-horizontal" autocomplete="off">
                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <span type="text" style="width:17%;"><b><center>Food Name</center></b></span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span type="text" style="width:83%;"><b><center>Full Menu</center></b></span>  
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood1" class="form-control menuFood" value="<?= $specialMenuFood[0] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu1" class="form-control fullMenu" value="<?= $specialFullMenu[0] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood2" class="form-control menuFood" value="<?= $specialMenuFood[1] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu2" class="form-control fullMenu" value="<?= $specialFullMenu[1] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood3" class="form-control menuFood" value="<?= $specialMenuFood[2] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu3" class="form-control fullMenu" value="<?= $specialFullMenu[2] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood4" class="form-control menuFood" value="<?= $specialMenuFood[3] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu4" class="form-control fullMenu" value="<?= $specialFullMenu[3] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood5" class="form-control menuFood" value="<?= $specialMenuFood[4] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu5" class="form-control fullMenu" value="<?= $specialFullMenu[4] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood6" class="form-control menuFood" value="<?= $specialMenuFood[5] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu6" class="form-control fullMenu" value="<?= $specialFullMenu[5] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood7" class="form-control menuFood" value="<?= $specialMenuFood[6] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu7" class="form-control fullMenu" value="<?= $specialFullMenu[6] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="specialMenuFood8" class="form-control menuFood" value="<?= $specialMenuFood[7] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="text" name="specialFullMenu8" class="form-control fullMenu" value="<?= $specialFullMenu[7] ?>" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Submit -->
                        <div class="form-group row">

                            <label class="col-md-10 control-label"></label>
                            <div class="col-md-2">
                                <input name="submit" value="Submit" type="submit" class="btn btn-success form-control">
                            </div>

                        </div>
                    </form>
                    <!-- Form  Finish -->

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php 

    include("includes/db.php");

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self');</script>";
    }

    if (isset($_POST['submit'])) {

        $errorFlag = false;
        $validImgExtension = ['jpg', 'jpeg', 'png'];

        for ($i=1; $i<=3; $i++) {

            $imgName = "chefImg".(string)$i;
            if ($_FILES[$imgName]['error'] === 4) {
                echo "<script>alert('Image $i does not exist.')</script>";
                $errorFlag = true;
                break;
            } else {
                $fileName = $_FILES[$imgName]['name'];
                $fileSize = $_FILES[$imgName]['size'];
                $tmpName = $_FILES[$imgName]['tmp_name'];
        
                $imgExtension = explode('.', $fileName);
                $imgExtension = strtolower(end($imgExtension));
        
                if (!in_array($imgExtension, $validImgExtension)) {
                    echo "<script>alert('Image $i has invalid image extension.')</script>";
                    $errorFlag = true;
                    break;
                } else {
                    $newImgName = "chefImg" . (string)$i . "." . $imgExtension;
                    $filePath = "../img/" . $newImgName;
                    if (file_exists($filePath)) {
                        @unlink($filePath);
                    }
                    move_uploaded_file($tmpName, "../img/" . $newImgName);

                    $name = "chefName".(string)$i;
                    $post = "chefPost".(string)$i;
                    // $img = "chefImg".(string)$i;

                    $query = "UPDATE `chefs` SET `name` = '$_POST[$name]', `post` = '$_POST[$post]', `img` = '$newImgName' WHERE `id` = $i";
                    if(!mysqli_query($con, $query)) {
                        $errorFlag = true;
                        break;
                    }
                }
            }
    
            if ($errorFlag==true) {
                echo "<script>alert('Error: Could not update')</script>";
                break;
            }
        }
        if ($errorFlag==false) {
            echo "<script>alert('Success: Chefs Updated Successfully.')</script>";
        }
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
            width: 33%;
            
        }
        span.menuFood {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Breadcrumb Begin -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Chefs</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Finish -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <!-- Heading -->
                <div class="panel-heading">
                    <h3 class="panel-title"> Edit Chefs</h3>
                </div>

                <!-- Form Begins -->
                <div class="panel-body">

                <?php

                    $i = 0;
                    $chefName = ["", "", ""];
                    $chefPost = ["", "", ""];
                    $chefImg = ["", "", ""];

                    $query = "SELECT * FROM `chefs`";
                    $result = mysqli_query($con, $query);

                    while($row=$result->fetch_assoc()) {
                        $chefName[$i] = $row['name'];
                        $chefPost[$i] = $row['post'];
                        // $chefImg[$i] = "img/" . $row['img'];
                        $i++;
                    }

                ?>

                    <!-- Select Day -->
                    <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <span type="text" class="menuFood"><center>Chef Name</center></span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span type="text" class="menuFood"><center>Chef Post</center></span>  
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span type="text" class="menuFood"><center>Chef Image</center></span>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="chefName1" class="form-control menuFood" value="<?= $chefName[0] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;    
                            <input type="text" name="chefPost1" class="form-control menuFood" value="<?= $chefPost[0] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="file" name="chefImg1" accept=".png, .jpeg, .jpg" class="form-control menuFood" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="chefName2" class="form-control menuFood" value="<?= $chefName[1] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;    
                            <input type="text" name="chefPost2" class="form-control menuFood" value="<?= $chefPost[1] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="file" name="chefImg2" accept=".png, .jpeg, .jpg" class="form-control menuFood" required>
                            &nbsp;&nbsp;&nbsp;&nbsp;

                        </div>

                        <!-- Food Name -->
                        <div class="form-group" style="display:flex; justify-content: space-between">

                            <input type="text" name="chefName3" class="form-control menuFood" value="<?= $chefName[2] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;    
                            <input type="text" name="chefPost3" class="form-control menuFood" value="<?= $chefPost[2] ?>" required>
                            &nbsp;&nbsp;<h5><b>:</b></h5>&nbsp;&nbsp;
                            <input type="file" name="chefImg3" accept=".png, .jpeg, .jpg" class="form-control menuFood" required>
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
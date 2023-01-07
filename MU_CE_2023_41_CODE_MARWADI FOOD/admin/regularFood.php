<?php 

    include("includes/db.php");

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self');</script>";
    }
    
    $errorFlag = false;
    $foodName = ["", "", "", "", "", "", ""];
    $foodImg = ["", "", "", "", "", "", ""];
    $foodStartTime = ["", "", "", "", "", "", ""];
    $foodEndTime = ["", "", "", "", "", "", ""];
    $newFoodImg = ["", "", "", ""];
    $validImgExtension = ['jpg', 'jpeg', 'png'];
    $foodTiming = ["Breakfast", "Launch", "Snacks", "Dinner"];
    $newFoodTiming = ["breakfast", "launch", "snacks", "dinner"];
    $daysOfWeek = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
    $DaysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    function getPreviousFoodMenu($dayName) {
        global $con;
        global $foodName;
        global $foodImg;
        global $foodStartTime;
        global $foodEndTime;

        $index = 0;
        $query = "SELECT * FROM `$dayName`";
        $result = mysqli_query($con, $query);
        while ($row=$result->fetch_assoc()) {
            $foodName[$index] = $row['food'];
            $foodImg[$index] = $row['img'];
            $foodStartTime[$index] = $row['startTime'];
            $foodEndTime[$index] = $row['endTime'];
            $index++;
        }
    }

    for ($k=0; $k<7; $k++) {
        if(isset($_POST['submit_'.$daysOfWeek[$k]])) {

            $postFlag = true;

            // Food name
            $newFoodName = [$_POST['breakfastFor'.$DaysOfWeek[$k]], $_POST['launchFor'.$DaysOfWeek[$k]], $_POST['snacksFor'.$DaysOfWeek[$k]], $_POST['dinnerFor'.$DaysOfWeek[$k]]];
    
            // Food image
            for ($i=0; $i<4; $i++) {
                $imgName = $daysOfWeek[$k] . $foodTiming[$i] . "Img";
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
                        $newImgName = $daysOfWeek[$k] . "_" . $newFoodTiming[$i] . "." .  $imgExtension;
                        $newFoodImg[$i] = $newImgName;
                        $filePath = "../img/" . $newImgName;
                        if (file_exists($filePath)) {
                            @unlink($filePath);
                        }
                        move_uploaded_file($tmpName, "../img/" . $newImgName);
                    }
                }
            }
    
            if ($errorFlag==false) {
                for ($i=0; $i<4; $i++) {
                    $index = $i+1;
                    $query = "UPDATE `$daysOfWeek[$k]` SET `img` = '$newFoodImg[$i]', `food` = '$newFoodName[$i]' WHERE `id` = $index";
                    if(!mysqli_query($con, $query)) {
                        $errorFlag = true;
                        break;
                    } else {
                        echo "<script>alert('Success: Regular Food Updated Successfully.')</script>";
                    }
                }
                if ($errorFlag==true) {
                    echo "<script>alert('Error: Could not update')</script>";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Edit Blogs </title>
</head>

<body>

    <!-- Breadcrumb Begin -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Regular Food</li>
            </ol>
        </div>
    </div>
    <!-- Breadcrumb Finish -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <!-- Heading -->
                <div class="panel-heading">
                    <h3 class="panel-title"> Edit Regular Food</h3>
                </div>

                <!-- Form Begins -->
                <div class="panel-body">
                    
                    <!-- Sunday -->
                    <div class="sunday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Sunday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                                <?php getPreviousFoodMenu('sunday') ?>

                                <input type="text" name="breakfastForSunday" class="form-control col-3" id="breakfastForSunday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForSunday" class="form-control col-3" id="launchForSunday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForSunday" class="form-control col-3" id="snacksForSunday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForSunday" class="form-control col-3" id="dinnerForSunday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="sundayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="sundayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="sundaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="sundayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_sunday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>
                    
                    <!-- White Space to separate div -->
                    <div>
                        <br>
                    </div>

                    <!-- Monday -->
                    <div class="monday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Monday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                            <?php getPreviousFoodMenu('monday') ?>

                                <input type="text" name="breakfastForMonday" class="form-control col-3" id="breakfastForMonday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForMonday" class="form-control col-3" id="launchForMonday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForMonday" class="form-control col-3" id="snacksForMonday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForMonday" class="form-control col-3" id="dinnerForMonday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="mondayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="mondayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="mondaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="mondayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_monday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>

                    <!-- Tuesday -->
                    <div class="tuesday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Tuesday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                            <?php getPreviousFoodMenu('tuesday') ?>

                                <input type="text" name="breakfastForTuesday" class="form-control col-3" id="breakfastForTuesday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForTuesday" class="form-control col-3" id="launchForTuesday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForTuesday" class="form-control col-3" id="snacksForTuesday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForTuesday" class="form-control col-3" id="dinnerForTuesday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="tuesdayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="tuesdayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="tuesdaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="tuesdayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_tuesday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>

                    <!-- Wednesday -->
                    <div class="wednesday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Wednesday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                            <?php getPreviousFoodMenu('wednesday') ?>

                                <input type="text" name="breakfastForWednesday" class="form-control col-3" id="breakfastForWednesday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForWednesday" class="form-control col-3" id="launchForWednesday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForWednesday" class="form-control col-3" id="snacksForWednesday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForWednesday" class="form-control col-3" id="dinnerForWednesday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="wednesdayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="wednesdayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="wednesdaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="wednesdayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_wednesday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>

                    <!-- Thursday -->
                    <div class="thursday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Thursday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                            <?php getPreviousFoodMenu('thursday') ?>

                                <input type="text" name="breakfastForThursday" class="form-control col-3" id="breakfastForThursday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForThursday" class="form-control col-3" id="launchForThursday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForThursday" class="form-control col-3" id="snacksForThursday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForThursday" class="form-control col-3" id="dinnerForThursday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="thursdayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="thursdayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="thursdaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="thursdayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_thursday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>

                    <!-- Friday -->
                    <div class="friday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Friday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                            <?php getPreviousFoodMenu('friday') ?>

                                <input type="text" name="breakfastForFriday" class="form-control col-3" id="breaFridayFriday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForFriday" class="form-control col-3" id="launchForFriday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForFriday" class="form-control col-3" id="snacksForFriday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForFriday" class="form-control col-3" id="dinnerForFriday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="fridayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="fridayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="fridaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="fridayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_friday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>

                     <!-- Saturday -->
                     <div class="saturday_container" style="border-radius: 8px; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <!-- Select Day -->
                        <form method="post" class="container form-horizontal" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label"><h2>Saturday</h2></label>
                            </div>

                            <!-- Food Name -->
                            <div class="form-group row" style="display:flex; justify-content: space-between">

                            <?php getPreviousFoodMenu('friday') ?>

                                <input type="text" name="breakfastForSaturday" class="form-control col-3" id="breaFridaySaturday" value="<?= $foodName[0] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="launchForSaturday" class="form-control col-3" id="launchForSaturday" value="<?= $foodName[1] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="snacksForSaturday" class="form-control col-3" id="snacksForSaturday" value="<?= $foodName[2] ?>" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="dinnerForSaturday" class="form-control col-3" id="dinnerForSaturday" value="<?= $foodName[3] ?>" required>

                            </div>

                            <div class="form-group row"  style="display:flex; justify-content: space-between">
                                <input type="file" name="saturdayBreakfastImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="saturdayLaunchImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="saturdaySnacksImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="file" name="saturdayDinnerImg" accept=".png, .jpeg, .jpg" class="form-control col-2" required>
                            </div>

                            <!-- Submit -->
                            <div class="form-group row">

                                <label class="col-md-10 control-label"></label>
                                <div class="col-md-2">
                                    <input name="submit_saturday" value="Submit" type="submit" class="btn btn-success form-control">
                                </div>

                            </div>
                        </form>
                        <!-- Form  Finish -->
                    </div>

                    <!-- White Space to separate div -->
                    <div>
                        <br>
                    </div>



                </div>
            </div>
        </div>
    </div>

</body>

</html>
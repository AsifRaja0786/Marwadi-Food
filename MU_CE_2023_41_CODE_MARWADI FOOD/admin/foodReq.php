<?php 

    include("includes/db.php");

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self');</script>";
    }

    $name = [];
    $email = [];
    $mealtime = [];
    $reason = [];
    $file = [];

   $query = "SELECT * FROM `user_data`";
   $result = mysqli_query($con, $query);
   while($row=$result->fetch_assoc()) {
        array_push($name, $row['name']);
        array_push($email, $row['email']);
        array_push($mealtime, $row['mealtime']);
        array_push($reason, $row['reason']);
        array_push($file, $row['file']);
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

    <table class="table" style="margin-top: 34px;">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mealtime</th>
                <th scope="col">Reason</th>
                <th scope="col">File</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $numOfElements = count($name);
                for ($i=0; $i<$numOfElements; $i++) {
                    $sn = $i+1;
                    $path = "../file/" . $file[$i];
                    $newId = "deleteFoodReq".$sn;
                    echo "<tr>
                        <th scope='row'>$sn</th>
                        <td>$name[$i]</td>
                        <td>$email[$i]</td>
                        <td>$mealtime[$i]</td>
                        <td>$reason[$i]</td>
                        <td><a href='$path' download class='btn btn-primary'>Download</a></td>
                        <td><button class='btn btn-danger' data-email='$email[$i]'>Delete</button></td>
                    </tr>";
                    // <td><form method='post'><input value='$email[$i]' name='$i' type='hidden'><button class='btn btn-danger' name='submit' type='submit'>Delete</button></form></td>
                }
            ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>

        $('.btn-danger').on('click',function() {
            // alert($(this).attr('data-email'));
            $.ajax({
                type: 'POST',
                url: 'deleteFoodReq.php',
                data: {
                    email: $(this).attr('data-email')
                },
                success: (data) => {
                    alert("Success");
                    location.reload();
                },
                error: () => {
                    alert("Failed");
                }
            });
        });
    </script>

</body>

</html>
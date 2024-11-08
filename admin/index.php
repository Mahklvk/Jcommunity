<?php
require "session.php";
require "../config/connect.php";

$queryGetUser = mysqli_query($conn, "SELECT * FROM user");
$jumlahUser = mysqli_num_rows($queryGetUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>index admin</title>
    <style>
        .icon{
            justify-content: center;
            align-items: center;
            display: flex;
            margin-left: 16vh;
        }
    </style>
</head>

<body>
    <?php include('./config/navbar.php');
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-md-12 mb-3">
                <div class="shadow">
                    <div class="row">
                        <div class="card">
                            <div class="col-6">
                                <i class="fa-solid fa-user fa-7x text-black-50 p-2 icon"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">UserS</h5>
                                <p class="card-text">Total User/s <?php echo $jumlahUser?></p>
                                <a href="user.php" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>

</html>
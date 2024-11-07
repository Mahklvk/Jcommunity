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
    <title>Document</title>
</head>
<body>
    <?php include('./config/navbar.php');
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-md-12 mb-3">
                <div class="p-3 shadow">
                    <div class="row">
                        <div class="col-6">
                        <i class="fa-solid fa-user fa-7x text-black-50 p-2"></i>
                        </div>
                        <div class="col-6" >
                        <h3 class="fs-2">User</h3>
                        <p class="fs-4"><?php echo $jumlahUser; ?> User</p>
                        <p><a href="user.php" class="nodeco">Lihat User</a></p>
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
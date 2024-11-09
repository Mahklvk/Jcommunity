<?php
require 'session.php';
require '../config/connect.php';

$queryGetPost = mysqli_query($conn, "SELECT * FROM post");
$jumlahPost = mysqli_num_rows($queryGetPost);
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
    <?php include('config/navbar.php')?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-md-12 mb-3">
                <div class="shadow">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if($jumlahPost == 0){
                                    ?>
                                    <h1 class="text-center">tidak ada postingan</h1>
                                    <?php
                                }
                                else{
                                    while($getData = mysqli_fetch_array($queryGetPost)){
                                        ?>
                                        <h2 class="card-title"><?php echo $getData['title']?></h2>
                                        <h4 class="card-text"><?php echo $getData['content']?></h4>
                                        <h4 class="card-text"><?php echo $getData['status']?></h4>
                                        <h4 class="card-text"><?php echo $getData['user_id']?></h4>
                                        <?php
                                    }
                                }
                                ?>
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
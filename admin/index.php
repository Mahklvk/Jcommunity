<?php
require "session.php";
require "../config/connect.php";

$queryGetUser = mysqli_query($conn, "SELECT * FROM user");
$jumlahUser = mysqli_num_rows($queryGetUser);
$queryGetPost = mysqli_query($conn, "SELECT * FROM post");
$jumlahPost = mysqli_num_rows($queryGetPost);
$quertGetComment = mysqli_query($conn, "SELECT * FROM comment");
$jumlahComment = mysqli_num_rows($quertGetComment);
$queryGetReport = mysqli_query($conn, "SELECT * FROM report");
$jumlahReport = mysqli_num_rows($queryGetReport);
$queryGetCommunity = mysqli_query($conn, "SELECT * FROM community");
$jumlahCommunity = mysqli_num_rows($queryGetCommunity);
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
        .icon-user {
            justify-content: center;
            align-items: center;
            display: flex;
            margin-left: 30vh;
            position: absolute;
        }

        .icon-post {
            justify-content: center;
            align-items: center;
            display: flex;
            margin-left: 28vh;
            position: absolute;
        }

        .icon-comment {
            justify-content: center;
            align-items: center;
            display: flex;
            margin-left: 28vh;
            position: absolute;
        }

        .icon-reports {
            justify-content: center;
            align-items: center;
            display: flex;
            margin-left: 55vh;
            position: absolute;
        }

        .icon-community {
            justify-content: center;
            align-items: center;
            display: flex;
            margin-left: 50vh;
            position: absolute;
        }

        .card {
            border-radius: 10px;
        }

        .summary-user {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-user:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }

        .summary-post {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-post:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }
        .summary-comment {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-comment:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }
        .summary-report {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-report:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }
        .summary-community {
            box-shadow: 6px 6px 15px rgba(97, 92, 92, 0.4);
            transition: transform 0.1s ease, box-shadow 0.1s ease;
            border-radius: 10px;
        }

        .summary-community:hover {
            transform: translateY(2px);
            /* Sedikit turun */
            box-shadow: 3px 3px 10px rgba(97, 92, 92, 0.3);
            /* Bayangan lebih kecil */
        }

        .no-decoration{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <?php include('./config/navbar.php');
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <a href="post.php" class="no-decoration">
                <div class="summary-user p-3">
                    <div class="row">
                        <div class="col-6">
                            <i class="fas fa-user fa-7x text-black-50 icon-user"></i>
                        </div>

                        <div class="text-black" >
                            <h3 class="fs-2">Users</h3>
                            <p class="fs-4">Users: <?php echo $jumlahUser ?></p>
                            <p><a href="kategori.php" class="text-white nodeco">Lihat Kategori</a></p>
                        </div>
                    </div>
                </div>
            </a>
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <a href="post.php" class="no-decoration">
                <div class="summary-post p-3">
                    <div class="row">
                        <div class="col-6 ">
                            <i class="fas fa-circle-plus fa-7x text-black-50 icon-post"></i>
                        </div>

                        <div class="text-black">
                            <h3 class="fs-2">Post</h3>
                            <p class="fs-4">Posts: <?php echo $jumlahPost ?></p>
                            <p><a href="produk.php" class="text-white nodeco">Lihat detail</a></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
            <a href="comment.php" class="no-decoration">
                <div class="summary-comment p-3">
                    <div class="row">
                        <div class="col-6 ">
                            <i class="fas fa-comment fa-7x text-black-50 icon-comment"></i>
                        </div>

                        <div class="text-black">
                            <h3 class="fs-2">Comment</h3>
                            <p class="fs-4">Comments: <?php echo $jumlahComment ?></p>
                            <p><a href="produk.php" class="text-white nodeco">Lihat detail</a></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <a href="report.php" class="no-decoration">
                <div class="summary-report p-3">
                    <div class="row">
                        <div class="col-6 ">
                            <i class="fas fa-flag fa-7x text-black-50 icon-reports"></i>
                        </div>

                        <div class="text-black">
                            <h3 class="fs-2">Reports</h3>
                            <p class="fs-4">Reports: <?php echo $jumlahReport ?></p>
                            <p><a href="produk.php" class="text-white nodeco">Lihat detail</a></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
            <a href="community.php" class="no-decoration">
                <div class="summary-community p-3">
                    <div class="row">
                        <div class="col-6 ">
                            <i class="fas fa-user-group fa-7x text-black-50 icon-community"></i>
                        </div>

                        <div class="text-black">
                            <h3 class="fs-2">Community</h3>
                            <p class="fs-4">Communitys <?php echo $jumlahCommunity ?></p>
                            <p><a href="produk.php" class="text-white nodeco">Lihat detail</a></p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    </div>




    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>

</html>
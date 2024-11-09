<?php
require 'session.php';
require '../config/connect.php';

// Query untuk mengambil semua data postingan
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
    <title>Data Postingan</title>
</head>
<body>
    <?php include('config/navbar.php') ?>

    <div class="container mt-3">
        <div class="row">
            <?php
            // Cek apakah ada postingan
            if ($jumlahPost == 0) {
                echo '<h1 class="text-center">Tidak ada postingan</h1>';
            } else {
                // Lakukan perulangan untuk setiap postingan
                while ($getData = mysqli_fetch_array($queryGetPost)) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $getData['title']; ?></h2>
                            <p class="card-text"><?php echo $getData['content']; ?></p>
                            <p class="card-text"><strong>Status:</strong> <?php echo $getData['status']; ?></p>
                            <p class="card-text"><strong>User ID:</strong> <?php echo $getData['user_id']; ?></p>
                            
                            <!-- Tombol Approve dan Reject -->
                            <form method="post" action="process_post.php">
                                <input type="hidden" name="post_id" value="<?php echo $getData['post_id']; ?>">
                                <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>

<?php
session_start();
require '../config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Login Page</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-5 shadow">
                    <h2 class="mb-4 text-center">Login</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3" style="width: 500px">
    <?php
    if (isset($_POST['login'])) {
        // Mengambil input dari form login
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        // Memastikan koneksi ke database berhasil
        if ($conn) {
            // Query untuk mencari username di database
            $query = "SELECT * FROM admin WHERE username = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            // Mengecek apakah data ada
            if ($data = mysqli_fetch_array($result)) {
                // Memverifikasi password tanpa hash
                if ($password === $data['password']) {
                    // Jika berhasil, buat session
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    echo "<script>console.log('Login berhasil, session dibuat');</script>";
                    header('Location: ../admin/');
                    exit();
                } else {
                    echo '<div class="alert alert-warning" role="alert">Password salah</div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">Akun tidak tersedia</div>';
            }

            // Menutup statement
            mysqli_stmt_close($stmt);
        } else {
            echo '<div class="alert alert-danger" role="alert">Koneksi database gagal</div>';
        }
    }
    ?>
</div>

<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>

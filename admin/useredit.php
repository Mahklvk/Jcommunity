<?php
require 'session.php';
require '../config/connect.php';

$id = $_GET['p'] ?? '';  // Memastikan parameter id ada
if (!$id) {
    echo "ID pengguna tidak ditemukan!";
    exit;
}

$queryGetUser = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$id'");
if ($queryGetUser && mysqli_num_rows($queryGetUser) > 0) {
    $data = mysqli_fetch_array($queryGetUser);
} else {
    echo "Data pengguna tidak ditemukan atau terjadi kesalahan: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <title>Edit User</title>
</head>
<body>
    <?php include('config/navbar.php') ?>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body p-5 shadow">
                        <h2 class="mb-4 text-center">User Detail</h2>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="password" id="password" value="<?php echo htmlspecialchars($data['password']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($data['email']); ?>" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" type="submit" name="submit">Edit</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $username = htmlspecialchars($_POST['username']);
                            $password = htmlspecialchars($_POST['password']);
                            $email = htmlspecialchars($_POST['email']);

                            if ($data['username'] == $username && $data['password'] == $password && $data['email'] == $email) {
                                echo '<meta http-equiv="refresh" content="0;url=user.php">';
                            } else {
                                // Menggunakan query yang benar untuk memeriksa keberadaan pengguna dengan data baru
                                $queryCheckUser = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND user_id != '$id'");
                                if (mysqli_num_rows($queryCheckUser) > 0) {
                                    echo '<div class="alert alert-warning mt-3" role="alert">Username sudah ada</div>';
                                } else {
                                    $queryUpdate = mysqli_query($conn, "UPDATE user SET username='$username', password='$password', email='$email' WHERE user_id='$id'");
                                    if ($queryUpdate) {
                                        echo '<div class="alert alert-primary mt-3" role="alert">User berhasil diupdate</div>';
                                        echo '<meta http-equiv="refresh" content="0;url=user.php">';
                                    } else {
                                        echo "Terjadi kesalahan: " . mysqli_error($conn);
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>
</html>

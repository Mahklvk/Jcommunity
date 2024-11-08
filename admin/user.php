<?php
require 'session.php';
require '../config/connect.php';

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
    
    <title>User</title>
</head>
<body>
    <div class="container mt-3">
        <div class="">
            <h2>List Users</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Dibuat Pada</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($jumlahUser == 0){
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">Data User tidak ada</td>
                            </tr>
<?php
                        }else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($queryGetUser)){
                                ?>
                                <tr>
                                    <td><?php echo $jumlah;?></td>
                                    <td><?php echo $data['username']?></td>
                                    <td><?php echo $data['email']?></td>
                                    <td><?php echo$data['created_at']?></td>
                                    <td>
                                        <a href="useredit.php?p=<?php echo $data['user_id']; ?>">
                                            <div class="btn btn-primary">Edit</div>
                                        </a>
                                    </td>
                                    <td>
                                    <a href="userdelete.php?p=<?php echo $data['user_id']; ?>">
                                            <div class="btn btn-danger" >Delete</div>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $jumlah++;
                            }
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
require('session.php');
require('../config/connect.php');
$id = $_GET['p'];

$queryDelete = mysqli_query($conn, "DELETE FROM user WHERE user_id='$id'");
if($queryDelete){
    ?>
                  <div class="alert alert-primary mt-3" roles="alert">
                    Kategori berhasil dihapus
                </div>

                <meta http-equiv="refresh" content="0; user.php">
                <?php   
            }  
                else{
                    echo mysqli_error($conn);
                }


?>
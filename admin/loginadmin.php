<?php
session_start();

require "../proses.php";

if (isset($_POST['login'])) {
    loginadmin();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halama login admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php require "menuadmin.php"; ?>
    <div class="container">
        <h4 class="text-center">halaman login admin</h4>
        <div class="row">
            <div class="col-md-4">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username" placeholder="masuakn username">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" name="password" class="form-control" placeholder="masukan password anda">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" name="login">login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
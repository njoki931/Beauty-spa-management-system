<?php
include('./admin/includes/dbconnection.php');


$email = $password = $username = $confirm_password = "";
$email_error = $password_error = $username_error = $confirm_password_error = "";
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST["email"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($_POST["email"])) {
        $email_error = "Please enter email";
    } else {
        $sql = "SELECT * FROM tblcustomers WHERE Email=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if ($query->rowCount() > 0) {
            $email_error = "User with same email already eixsts";
            // echo "<script>alert('Email Exists')</script>";
        } else {
            $email = trim($_POST["email"]);
        }
    }


    if (empty($_POST["username"])) {
        $username_error = "Please enter a user name";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $password_error = "Please enter password";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["confirm_password"])) {
        $confirm_password_error = "Please confirm password";
    } else {
        if (empty($password_error) && $password != $confirm_password) {
            $confirm_password_error = "Password does not match";
        }
    }


    if (empty($email_error) && empty($password_error) && empty($username_error) && empty($confirm_password_error)) {
        $password = md5($_POST["password"]);
        $sql = "INSERT INTO tblcustomers(Name, Email, password) values(:Name, :Email, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':Name', $username, PDO::PARAM_STR);
        $query->bindParam(':Email', $email, PDO::PARAM_STR);
        $query->execute();
        if ($query) {
            header('location: ./login.php');
        } else {
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Beauty spa </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="./admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="./admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="hold-transition login-page">
    <!-- Logo box -->
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <p><b>
                        </b></p><!-- Link can also be removed -->
                    <center><img src="./admin/company/NEW (1).png" width="150" height="130" class="user-image" alt="User Image" /></center>
                </div>
                <p class="login-box-msg"><b>
                        <h4>
                            <center> Welcome </center>
                        </h4>
                    </b></p>
                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php $username ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-warning"> <?php echo $username_error ?></p>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="email" value="<?php $email ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-warning"> <?php echo $email_error ?></p>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-warning"> <?php echo $password_error ?></p>
                    <div class="input-group mb-3">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $confirm_password ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <p class="text-warning"> <?php echo $confirm_password_error ?></p>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="register" class="btn btn-primary btn-block" data-toggle="modal" data-taget="#modal-default">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="login.php">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <?php @include("./admin/includes/foot.php"); ?>
    <script src="assets/js/core/js.cookie.min.js"></script>
</body>

</html>
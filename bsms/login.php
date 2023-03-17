<?php
session_start();
error_reporting(0);
include('./admin/includes/dbconnection.php');

$invalid_cridentials = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tblcustomers WHERE Email=:Email and password=:password ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':Email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            session_start();
            $_SESSION['email'] = $result->Email;
            $_SESSION['id'] = $result->ID;
            $_SESSION['name'] = $result->Name;
        }
        if (!empty($_POST["remember"])) {
            //COOKIES for username
            setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
            //COOKIES for password
            setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
        } else {
            if (isset($_COOKIE["user_login"])) {
                setcookie("user_login", "");
                if (isset($_COOKIE["userpassword"])) {
                    setcookie("userpassword", "");
                }
            }
        }
        header('location: ./index.php');
        // $aa = $_SESSION['sid'];
        // $sql = "SELECT * from tblcustomers  where id=:aa";
        // $query = $dbh->prepare($sql);
        // $query->bindParam(':aa', $aa, PDO::PARAM_STR);
        // $query->execute();
        // $results = $query->fetchAll(PDO::FETCH_OBJ);

        // $cnt = 1;
        // if ($query->rowCount() > 0) {
        //   foreach ($results as $row) {

        //       $extra = "index.php";
        //       $username = $_POST['username'];
        //       $email = $_SESSION['email'];
        //       $name = $_SESSION['name'];
        //       $lastname = $_SESSION['lastname'];
        //     //   $_SESSION['login'] = $_POST['username'];
        //     //   $_SESSION['id'] = $num['id'];
        //     //   $_SESSION['username'] = $num['name'];
        //       $uip = $_SERVER['REMOTE_ADDR'];
        //     //   $status = 1;
        //       // date_default_timezone_set('Africa/Nairobi');
        //       $ldate = date('Y-d-m H:i:s');
        //       $sql = "insert into userlog(userEmail,userip,username,ldate)values(:email,:uip,:username,:ldate)";
        //       $query = $dbh->prepare($sql);
        //       $query->bindParam(':username', $username, PDO::PARAM_STR);
        //       $query->bindParam(':email', $email, PDO::PARAM_STR);
        //       $query->bindParam(':uip', $uip, PDO::PARAM_STR);
        //       $query->bindParam(':ldate', $ldate, PDO::PARAM_STR);
        //       $query->execute();
        //       $host = $_SERVER['HTTP_HOST'];
        //       $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        //       header("location:http://$host$uri/$extra");
        //       exit();
        //   }
        // }
    } else {
        // $extra = "index.php";
        // $username = $_POST['username'];
        // $uip = $_SERVER['REMOTE_ADDR'];
        // $status = 0;
        // $email = 'Not registered in system';
        // $name = 'Potential Hacker';
        // $sql = "insert into userlog(userEmail,userip,status,username,name)values(:email,:uip,:status,:username,:name)";
        // $query = $dbh->prepare($sql);
        // $query->bindParam(':username', $username, PDO::PARAM_STR);
        // $query->bindParam(':name', $name, PDO::PARAM_STR);
        // $query->bindParam(':email', $email, PDO::PARAM_STR);
        // $query->bindParam(':uip', $uip, PDO::PARAM_STR);
        // $query->bindParam(':status', $status, PDO::PARAM_STR);
        // $query->execute();
        // $host  = $_SERVER['HTTP_HOST'];
        // $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        // echo "<script>alert('Username or Password is incorrect');document.location ='http://$host$uri/$extra';</script>";
        $invalid_cridentials = "User name or password is invalid";
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
                    <center><img src="./admin/company/NEW (1).png " width="150" height="130" class="user-image" alt="User Image" /></center>
                </div>
                <p class="login-box-msg"><b>
                        <h4>
                            <center> Welcome </center>
                        </h4>
                    </b></p>
                <p class="text-warning"><?php echo $invalid_cridentials ?></p>

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="Email" required value="<?php if (isset($_COOKIE["user_login"])) {
                                                                                                                        echo $_COOKIE["user_login"];
                                                                                                                    } ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php if (isset($_COOKIE["userpassword"])) {
                                                                                                                                echo $_COOKIE["userpassword"];
                                                                                                                            } ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" <?php if (isset($_COOKIE["user_login"]))  ?> checked>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block" data-toggle="modal" data-taget="#modal-default">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="changepassword.php">I forgot my password</a>
                </p>
                <p class="mb-1">
                    <a href="register.php">Register</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <?php @include("./admin/includes/foot.php"); ?>
    <script src="assets/js/core/js.cookie.min.js"></script>
</body>

</html>
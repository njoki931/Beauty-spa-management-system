
<?php
session_start();
include("./admin/includes/dbconnection.php");
date_default_timezone_set('Africa/Kampala');
$logout_date=date('Y-d-m H:i:s');
$email=$_SESSION['email'];
// $query=$dbh->prepare($sql);
// $query->bindParam(':logout_date',$logout_date,PDO::PARAM_STR);
// $query->execute();
// $sql = "insert into userlog(logout_date)values(:logout_date)";
// $sql="UPDATE userlog  SET logout_date=:logout_date WHERE userEmail = '$email' ORDER BY id DESC LIMIT 1";
// $query = $dbh->prepare($sql);
// $query->bindParam(':logout_date', $logout_date, PDO::PARAM_STR);
// $query->execute();
$_SESSION['errmsg']="You have successfully logout";
unset($_SESSION['cpmsaid']);
session_destroy(); // destroy session
echo "<script>alert('Loggedout succefully!')</script>";
header("location: ./login.php");
?>
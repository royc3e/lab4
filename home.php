<?php 
session_start();
include 'db_conn.php';

if(!isset($_SESSION['status'])){
  header("Location: loginform.php");
}
$uname = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE username='$uname' AND user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$firstname = $row['Firstname'];
$middilename = $row['Middlename'];
$lastname = $row['Lastname'];

$fullName = $firstname .' '. $middilename .' '. $lastname;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="row">
    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center"> <!-- Added classes for centering -->
      <h1>Welcome <?php echo $fullName;?></h1> <!-- Updated h1 tag -->
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut mauris euismod,
        <br> fringilla risus vel, bibendum ligula. Sed eget nisi vel ipsum lacinia bibendum.
      </p>
      <button type="button" class="btn btn-primary">Log Out</button>
    </div>
  </div>
</div>
</body>
</html>

<?php 
if(isset($_POST["submit"])) {
  session_start();
  session_destroy();
  header("Location: loginform.php");
}
?>
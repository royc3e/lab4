<?php
include 'db_conn.php';

// this will secure the program from vurnabilities
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (!isset($_GET['token']) || empty($_GET['token'])){
    echo '<script>alert("There is an error")</script>'; 
    header("Refresh:0.5; url=index.php");
}

if(isset($_POST['verify'])){
    $token = validate($_GET['token']);
    //To get the token from url and check
    if(isset($_GET['token'])){
        
        $activation_code = $_GET['token'];
        $otp = $_POST['otp'];

        $sql = "SELECT * FROM users WHERE verify_token = '$activation_code'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $rowSelect = mysqli_fetch_assoc($result);

            $rowOtp = $rowSelect['otp'];
            $token = $rowSelect['verify_token'];

            if($rowOtp !== $otp){
                echo '<script>alert("Please provide correct OTP!")</script>';
            } else {
                $sqlUpdate = "UPDATE users SET active = 'true' WHERE otp = '$otp' 
                AND verify_token = '$activation_code'";

                $result = mysqli_query($conn, $sqlUpdate);
                
                if($result){
                    echo '<script>alert("Your account successfuly activated")</script>'; 
                    header("Refresh:2; url=index.php");
                }
                else{
                    echo '<script>alert("Opss... Your account is already activated")</script>'; 
                }
            }
        } else {
            echo '<script>alert("Invalid token")</script>'; 
            header("Refresh:2; url=index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh; background: lightblue;">
    <div class="text-center">
        <h2>Otp Verify</h2><br>
        <form action="" method="post">
            <div class="form-group">
                <div class="input-group input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg"><b>INSERT CODE</b></span>
                    <input name="otp" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
            </div>
            <button type="submit" name="verify" class="btn mt-3 btn-success">Verify</button>
        </form>
    </div>
</body>
</html>
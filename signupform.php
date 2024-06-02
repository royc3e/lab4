<?php include 'signup-index.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightblue;">
    <div class="container mt-5"  style="max-width: 20rem; ">
        <form method="post"  class="p-2 rounded bg-light shadow">
            <h2>REGISTER</h2>
            <p>Create your account here.</p>
            <?php if (isset($_GET['success'])) { ?>
                <div class="p bg-success text-white p-1 rounded mb-4 text-center mx-auto">
                    <?php echo $_GET['success']; ?>
                </div>  
            <?php } ?>

            <div class="form-group mb-3">
                    <div class="col-md-11">
                        <input value="" class="form-control" name="firstname" placeholder="First name" required>
                    </div><br>
                    <div class="col-md-11">
                        <input value="" class="form-control" name="middlename" placeholder="Middle name" required>
                    </div>
            </div>

            <div class="form-group mb-3 col-md-11">
                <input value="" name="lastname" class="form-control" placeholder="Lastname" required>
            </div>

            <div class="form-group mb-3 col-md-11">
                <input type="email" value="" name="email" class="form-control" placeholder="Email Address" required>
                <p style="color: red;"><?php echo $email_message; ?></p>
            </div>

            <div class="form-group mb-3 col-md-11">
                <input value="" name="status" class="form-control" placeholder="Status" required>
            </div>

            <div class="form-group mb-3">
                    <div class="col-md-11">
                        <input value="" class="form-control" name="username" placeholder="Username" required>
                        <p style="color: red;"><?php echo $uname_error; ?></p>
                    </div>
                    <div class="col-md-11">
                        <input type="password" value="" class="form-control" name="password" placeholder="Password" required>
                    </div>                
            </div>
            <div class="form-group mb-3">
                Already have an account?<a href="loginform.php">Log in here</a>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
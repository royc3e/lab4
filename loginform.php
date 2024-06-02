<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body style="background: lightblue;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="index.php" method="post" class="shadow p-3 mb-5 bg-white rounded">
                <h2 class="text-center mb-4">LOGIN</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="uname">Username:</label>
                    <input type="text" name="uname" id="uname" class="form-control mt-2" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                <p class="mt-3 text-center">Don't have an account? <a href="signupform.php">Sign up here</a></p>
            </form>
        </div>
    </div>
</div>

</body>
</html>
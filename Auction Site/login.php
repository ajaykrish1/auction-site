<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<style>
    body {
        height: 100vh;
        display: grid;
        place-items: center;

    }

    .header {
        display: flex;
        justify-content: center;
        margin-bottom: 40px;
    }
</style>

<body>


    <form  method="post" action="login.php">
        <div class="header">
            <h2>Login</h2>
        </div>
        <?php include('errors.php'); ?>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
        <p>
            <a href="forgot.php">Forgot Password</a>
        </p>
    </form>
</body>

</html>
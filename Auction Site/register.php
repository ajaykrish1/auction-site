<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
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


    <form  method="post" action="register.php">
        <div class="header">
            <h2>Register</h2>
        </div>
        <?php include('errors.php'); ?>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control form-control-lg" type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control form-control-lg" type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control form-control-lg" type="password" name="password_1">
        </div>
        <div class="form-group">
            <label>Confirm password</label>
            <input class="form-control form-control-lg" type="password" name="password_2">
        </div>
        <br>
        <div class="form-group">
            <button class="form-control btn btn-primary form-control-lg" type="submit" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Log In</a>
        </p>
    </form>
</body>

</html>
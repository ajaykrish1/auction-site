<?php include('server.php') ?>

<head>
    <title>Forgot Password</title>
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

<div class="wrapper">
    <form  method="post" action="register.php">
        <div class="header">
            <h2>Forgot Password</h2>
        </div>
        <?php include('errors.php'); ?>
        <div  class="form-group" >
            <label>Username</label>
            <input class="form-control " type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div  class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div  class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password_1">
        </div>
        <div  class="form-group">
            <label>Confirm password</label>
            <input class="form-control" type="password" name="password_2">
        </div>
        <div  class="form-group">
            <button class="btn btn-primary form-control" type="submit" class="ui button primary" name="change_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</div>
</body>

<?php include('footer.php') ?>
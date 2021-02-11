<?php
session_start();


$username = "";
$email    = "";
$errors = array();


$db = mysqli_connect('localhost', 'root', '', 'auction');

if (isset($_POST['reg_user'])) {
 
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

 
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

   
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { 
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}


if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

if (isset($_POST['sell_item'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $amount = mysqli_real_escape_string($db, $_POST['amount']);
    $owner = mysqli_real_escape_string($db, $_SESSION['username']);

    if (empty($name)) {
        array_push($errors, "Item name is required");
    }
    if (empty($description)) {
        array_push($errors, "Description name is required");
    }
    if (empty($date)) {
        array_push($errors, "Closing date is required");
    }
    if (empty($amount)) {
        array_push($errors, "Amount  is required");
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO items(name,description,owner,end_date,bid,highest_bidder) 
        VALUES ('$name','$description','$owner','$date','$amount','$owner')";
        mysqli_query($db, $query);
        header('location: index.php');
    }
}

if (isset($_POST['make_bid'])) {
    $id = $_POST['id'];
    $old_bid = $_POST['old_bid'];
    $new_bid = $_POST['new_bid'];
    $username = $_SESSION['username'];
    $date = date("Y-m-d");
    if ($new_bid > $old_bid) {
        $query = "UPDATE items SET  highest_bidder = '$username', bid = $new_bid WHERE id = $id";
        $results = mysqli_query($db, $query);
        $query = "INSERT INTO bids(item_id,bidder,bid,date) VALUES($id,'$username',$new_bid,'$date')";
        $results = mysqli_query($db, $query);
        header("location:item.php?id=$id");
    }
}

if (isset($_POST['change_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "SELECT * FROM users WHERE username='$username' AND email='$email'";
        if (mysqli_query($db, $query)) {
            $query = "UPDATE users SET password = '$password' WHERE username = '$username'";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }
    }
}

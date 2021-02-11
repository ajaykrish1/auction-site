<!DOCTYPE html>
<html>

<head>
    <title>Auction Site</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><b>Auction Site</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <li  style=" margin-left:10px; color:white;" >Welcome <strong><?php echo $_SESSION['username']; ?></strong></li>
  <div style=" margin-left:60%; " class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li style=" margin-left:20px; " class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li style=" margin-left:20px; "class="nav-item">
        <a class="nav-link" href="items.php">Your Items</a>
      </li>
      <li style=" margin-left:20px; "class="nav-item">
        <a class="nav-link" href="bids.php">Your Bids</a>
      </li>
     
    </ul>
    <div style=" margin-left:20px; " class="right">
        <?php if (isset($_SESSION['username'])) : ?>
           
            <a  href="index.php?logout='1'" style="color: red;">logout</a>
        <?php endif ?>
    </div>
  </div>
</nav>

    
    


<body>
    <div class="container">
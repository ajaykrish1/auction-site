<?php include('server.php') ?>
<?php include('header.php') ?>

<h1>Your Bids</h1>

<?php
$username = $_SESSION['username'];
$query = "SELECT * FROM items WHERE highest_bidder='$username'";
$results = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($results)) {
    $id = $row['id'];
    $name = $row['name'];
    $desc = $row['description'];
    $owner = $row['owner'];
    $end_date = $row['end_date'];
    $bid = $row['bid'];
    $highest = $row['highest_bidder'];
    echo "<div> Name : $name <br> Description :$desc <br> Owner : $owner <br> Ending Date : $end_date <br> Current Price: $bid <br> Highest Bidder : $highest 
        </div>";
    echo "<a href='item.php?id=$id'>View</a>";
}
if (mysqli_num_rows($results) == 0) {
    echo "<h3> You have no bids </h3>";
}
?>

<?php include('footer.php') ?>
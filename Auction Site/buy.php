<?php include('server.php') ?>
<?php include('header.php') ?>

<h1>Buy Items</h1>
<?php
$username = $_SESSION['username'];
$date = date("Y-m-d");
$query = "SELECT * FROM items WHERE NOT owner='$username' AND end_date > '$date' ";
$results = mysqli_query($db, $query);
if (isset($_POST['make_bid'])) {
    $new_bid = $_POST['bid'];
    echo 'hello';
}
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $id = $row['id'];
        $name = $row['name'];
        $desc = $row['description'];
        $owner = $row['owner'];
        $end_date = $row['end_date'];
        $bid = $row['bid'];
        $highest = $row['highest_bidder'];
        echo "<div> $name <br> Description:$desc <br> Owner :  $owner <br> End Date $end_date <br> Current Price: $bid <br> Highest Bidder : $highest <br> 
        <a href='item.php?id=$id'>View</a> 
        ";
    }
} else {
    echo "0 results";
}
?>

<?php include('footer.php') ?>
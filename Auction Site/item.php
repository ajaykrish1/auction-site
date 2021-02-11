<?php include('server.php') ?>
<?php include('header.php') ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $query = "SELECT * FROM items WHERE id=$id";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            $id = $row['id'];
            $name = $row['name'];
            $desc = $row['description'];
            $owner = $row['owner'];
            $end_date = $row['end_date'];
            $bid = $row['bid'];
            $highest = $row['highest_bidder'];
            echo "<div> Name: $name <br> Description:$desc <br> Owner :  $owner <br> End Date: $end_date <br> Current Price: $bid <br> Highest Bidder : $highest <br> ";
        }
    } else {
        echo "Link Broken";
    }
}
?>
<form action="item.php" method="POST">
    <input type="number" placeholder="Enter the bid amount" name="new_bid">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="hidden" name="old_bid" value="<?php echo $bid; ?>" />
    <button type="submit" name="make_bid">Make bid</button>
</form>
<h3>Bidding History</h3>
<?php
$query = "SELECT * FROM bids WHERE item_id=$id";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
        $id = $row['id'];
        $name = $row['bidder'];
        $bid = $row['bid'];
        $date = $row['date'];
        echo "$name offered $bid on $date <br> ";
    }
} 
?>

<?php include('footer.php') ?>
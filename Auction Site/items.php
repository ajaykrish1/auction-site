<?php include('server.php') ?>
<?php include('header.php') ?>

<h1>Your Items</h1>
<?php
$username = $_SESSION['username'];
$query = "SELECT * FROM items WHERE owner='$username'";
$current_date = date("Y-m-d");
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
        if ($current_date > $end_date) {
            echo "<h3> Auction Expired</h3>";
        }
        echo "<div> Name : $name <br> Description :$desc <br> Owner : $owner <br> Ending Date : $end_date <br> Current Price: $bid <br> Highest Bidder : $highest 
        </div>";
?>
        <form method="post" action="items.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <button type='submit' name='delete'>DELETE</button>
        </form>
        <br><br>
<?php

        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $query = "DELETE FROM items  WHERE id = '$id'";
            mysqli_query($db, $query);
            $query = "DELETE FROM bids  WHERE item_id = '$id'";
            mysqli_query($db, $query);

            header("Refresh:0");
        }
    }
} else {
    echo "0 results";
}
?>
<?php include('footer.php') ?>
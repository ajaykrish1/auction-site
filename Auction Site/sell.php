<?php include('server.php') ?>
<?php include('header.php') ?>

<form action="" method="post" class="ui form">
    <?php include('errors.php'); ?>
<br><br>
<h1>Enter Your Product Info</h1>
<br>
    <div >
        <label for="">
            Name
        </label>
        <input class="form-control" type="text" name="name" placeholder="Enter the name of the product">
    </div><br>
    <div >
        <label for="">
            Description
        </label>
        <input class="form-control" type="text" name="description" placeholder="Enter the description for the product">
    </div><br>
    <div >
        <label>
            Closing Date
        </label>
        <input class="form-control"name="date" type="date">
    </div><br>
    <div >
        <label for=""> Starting amount
        </label>
        <input class="form-control"name="amount" type="number" placeholder="Enter the starting amount">
    </div><br>
    <br>
    <button type="submit" class="btn btn-primary form-control" name="sell_item">Add</button>
</form>
<?php include('footer.php') ?>
<?php 
    $db = require('db/db.php');
    $connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) echo mysqli_connect_error();

?>

<form method='post' class="w-75 d-flex-column m-auto">
                <input type="hidden" name='sing'>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
</form>

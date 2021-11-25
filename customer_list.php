<?php

include ('index.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
        <script type="text/javascript" src="func.js"></script>
    </head>
    <body>
    <div class="container">
        <h2>Client List</h2>
        <button type="button" class="btn btn-success new" style="margin: 20px 0;">ADD NEW</button>
        <table id="mainTb" class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>ID NUMBER</th>
                <th>USER NAME</th>
                <th>DOB</th>
                <th>GENDER</th>
                <th>PHONE</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if($customerList)
                echo($customerList);
            ?>
            </tbody>
        </table>
    </div>

    <?php
        include('modal_form.html');
    ?>

    </body>
</html>


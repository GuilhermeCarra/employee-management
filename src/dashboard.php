<!-- TODO Application entry point. Login view -->
<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="../src/img/favicon.png">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
    <body>
        <?php require '../assets/header.html';?>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <div id="jsGrid"></div>
            </div>
            <div class="col-1"></div>
        </div>

        <div id="employeeAlert"></div>

        <?php require '../assets/footer.html';?>

        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
        <script src="../src/js/script.js"></script>
    </body>
</html>

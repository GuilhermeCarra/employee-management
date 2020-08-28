<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="node_modules/jsgrid/dist/jsgrid.min.css">
    <link type="text/css" rel="stylesheet" href="node_modules/jsgrid/dist/jsgrid-theme.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<div class="main d-flex flex-column justify-content-between">
    <?php include('assets/html/header.html') ?>
    <div class='main__content d-flex justify-content-center align-items-center flex-column'>
        <div class="container" id="jsGrid">
            <script>
                var employees = '<?php echo getEmployeesCont() ?>';
            </script>
        </div>
    </div>
    <?php include('assets/html/footer.html') ?>
</div>

<script src="https://kit.fontawesome.com/de217cab6a.js"></script>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script src="assets/js/jsGridEmployees.js"></script>

</body>

</html>
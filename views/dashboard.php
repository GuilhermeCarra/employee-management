<?php include_once LIBS . "sessionHelper.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body id="dashboardPage">
    <?php require '../assets/header.html'; ?>

    <div class="container min-vw-100">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-3">
                <div id="jsGrid"></div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <div id="employeeAlert"></div>

    <?php require '../assets/footer.html'; ?>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
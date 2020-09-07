<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>/assets/img/favicon.png">
    <link href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid.min.css">
    <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid-theme.min.css">
    <link rel="stylesheet" href="<?= CSS ?>/main.css">
</head>

<body id="dashboardPage">
    <div class="main d-flex flex-column justify-content-between">
        <?php include('assets/html/header.php') ?>
        <div id="dashboardErrMsg" class="d-none errorMsg mb-4 align-items-center justify-content-center alert">
            <span></span>
        </div>
        <div class='main__content d-flex justify-content-center align-items-center flex-column'>
            <div class="container mt-4" id="jsGrid">
            <script type='text/javascript'>
                <?php echo "var employees = '".$employees."';" ?>
            </script>
        </div>
    </div>
    <?php include('assets/html/footer.html') ?>
</div>

<script src="https://kit.fontawesome.com/de217cab6a.js"></script>
<script src="<?= BASE_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/jsGridEmployees.js"></script>

</body>

</html>
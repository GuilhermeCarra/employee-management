<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <title>Error</title>
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <link rel="icon" type="image/png" href="<?= BASE_URL ?>/assets/img/favicon.png">
  <link href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid.min.css">
  <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid-theme.min.css">
  <link rel="stylesheet" href="<?= CSS ?>/main.css">
</head>
<body>
<div class="main d-flex flex-column justify-content-between">
  <?php include('assets/html/header.php') ?>
  <div class='main__content d-flex justify-content-center align-items-center flex-column'>
    <div class="container" id="error-message">
      <div id="error-message" class="d-flex justify-content-center align-items-center">
        <i class="fas fa-exclamation-triangle fa-4x"></i>
        <p class="error__text"><?= $errorMsg ?></p>
      </div>
    </div>
  </div>
  <?php include('assets/html/footer.html') ?>
</div>


<script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/js/dist/index.js"></script>
<script type="text/javascript" src="node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script src="assets/js/jsGridEmployees.js"></script>

</body>

</html>
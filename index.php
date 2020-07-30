<!-- TODO Application entry point. Login view -->
<?php
    session_start();
    if(isset($_SESSION['name'])) {
        header('Location: src/dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body id="loginPage">
    <div class="form_bg">
        <div class="container">
            <div class="row">
            <div class="col-4"></div>
                <div class="col-4">
                    <div class="form-horizontal">
                        <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                        <h3 class="title">admin login</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input class="form-control" type="email" id="email" placeholder="Insert an Email" />
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" type="password" id="password" placeholder="Insert a Password" />
                        </div>

                        <button class="loginBtn" id="loginBtn">Log in</button>

                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
    <div id="loginError"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="src/js/script.js"></script>
</body>

</html>
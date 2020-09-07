<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body id="loginPage">
    <div class="form_bg">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <form class="form-horizontal" method="post" action="loginController/loginValidation">
                        <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                        <h3 class="title">admin login</h3>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Insert an Email">
                        </div>
                        <?php if (isset($_SESSION['wrong-email'])) echo '<div class="alert alert-danger">Email not found</div>' ?>
                        <div class="form-group">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="pwd" placeholder="Insert a Password">
                        </div>
                        <?php if (isset($_SESSION['wrong-pwd'])) echo '<div class="alert alert-danger">Wrong password</div>' ?>
                        <button type="submit" class="loginBtn">Log in</button>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/de217cab6a.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
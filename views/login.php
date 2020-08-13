<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
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

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
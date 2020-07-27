<!-- TODO Application entry point. Login view -->
<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css">
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css">
</head>
    <body>
        <header>
            <!-- LOGO -->
            <h4>LOGO</h4>

            <!-- DASHBOARD / EMPLOYEE NAVIGATION -->
            <ul>
                <li>Dashboard</li>
                <li>Employee</li>
            </ul>

            <!-- LOGOUT BUTTON -->
            <form method="POST" action="library/loginController.php">
                <input type="submit" name="logout" value="Log Out"/>
            </form>
        </header>

        <div>
            <!-- DASHBOARD TAB -->
            <div id="jsGrid"></div>

            <!-- EMPLOYEE TAB -->
            <div id="employeeTab">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="lastName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" id="" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="">Gender</label>
                        <select id="" class="form-control">
                            <option selected>Choose...</option>
                            <option>Man</option>
                            <option>Woman</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                        <label for="">Zip</label>
                        <input type="text" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="">
                        <label class="form-check-label" for="">
                            Check me out
                        </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>

        </div>

        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
        <script src="../src/js/script.js"></script>
    </body>
</html>

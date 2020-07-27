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
                <li id="navDashboard">Dashboard</li>
                <li id="navEmployee">Employee</li>
            </ul>

            <!-- LOGOUT BUTTON -->
            <form method="POST" action="library/loginController.php">
                <input type="submit" name="logout" value="Log Out"/>
            </form>
        </header>

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

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="">
                    <small>We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option>Man</option>
                        <option>Woman</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetAddress">Street Address</label>
                    <input type="text" class="form-control" name="streetAddress" id="streetAddress" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" id="age" placeholder="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="postalCode">Postal Code</label>
                    <input type="number" class="form-control" name="postalCode" id="postalCode" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="number" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-secondary">Return</button>
        </form>

        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
        <script src="../src/js/script.js"></script>
    </body>
</html>

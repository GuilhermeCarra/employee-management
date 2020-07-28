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
    <link rel="stylesheet" href="css/styles.css">
</head>
    <body>
        <header>
            <!-- LOGO -->
            <h4>LOGO</h4>

            <!-- DASHBOARD / EMPLOYEE NAVIGATION -->
            <ul>
                <a href="dashboard.php"><li>Dashboard</li></a>
                <a href="employee.php"><li>Employee</li></a>
            </ul>

            <!-- LOGOUT BUTTON -->
            <form method="POST" action="library/loginController.php">
                <input type="submit" name="logout" value="Log Out"/>
            </form>
        </header>

        <div id="jsGrid"></div>

        <div id="employeeAlert"></div>

        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
        <script src="../src/js/script.js"></script>
    </body>
</html>

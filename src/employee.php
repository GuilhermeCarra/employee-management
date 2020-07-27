<?php
    $method = "POST";
    if( isset($_GET['id']) ) {
        $method = "PUT";
        $url = $_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI']).'/library/employeeController.php?id='.$_GET['id'];
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $employee = json_decode(curl_exec($handle));
        curl_close($handle);
        if ($employee->gender == "man") {
            $male = true;
        } else {
            $female = true;
        }
    }
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
                <a href="dashboard.php"><li>Dashboard</li></a>
                <a href="employee.php"><li>Employee</li></a>
            </ul>

            <!-- LOGOUT BUTTON -->
            <form method="POST" action="library/loginController.php">
                <input type="submit" name="logout" value="Log Out"/>
            </form>
        </header>

        <div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php if(isset($employee)) echo $employee->name?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="<?php if(isset($employee)) echo $employee->lastName?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="" value="<?php if(isset($employee)) echo $employee->email?>">
                    <small>We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option <?php if(isset($male)) echo 'selected' ?> >Man</option>
                        <option <?php if(isset($female)) echo 'selected' ?> >Woman</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="" value="<?php if(isset($employee)) echo $employee->city?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetAddress">Street Address</label>
                    <input type="text" class="form-control" name="streetAddress" id="streetAddress" placeholder="" value="<?php if(isset($employee)) echo $employee->streetAddress?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" placeholder="" value="<?php if(isset($employee)) echo $employee->state?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" id="age" placeholder="" value="<?php if(isset($employee)) echo $employee->age?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="postalCode">Postal Code</label>
                    <input type="number" class="form-control" name="postalCode" id="postalCode" placeholder="" value="<?php if(isset($employee)) echo $employee->postalCode?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="number" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="" value="<?php if(isset($employee)) echo $employee->phoneNumber?>">
                </div>
            </div>

            <button id="employee<?php echo $method ?>" class="btn btn-primary">Save</button>
            <button id="employeeReturn"class="btn btn-secondary">Return</button>
        </div>

        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
        <script src="../src/js/script.js"></script>
    </body>
</html>

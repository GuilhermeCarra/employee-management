<?php
$method = 'POST';
if (isset($_GET['id'])) $method = 'PUT';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="../src/img/favicon.png">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <?php require '../assets/header.html'; ?>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 mb-5">
            <?php include('imageGallery.php') ?>
            <div class="col-1"></div>
            <div class="row form-employee">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control" id="email" placeholder="">
                            <small>We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control">
                                <option value="man">Man</option>
                                <option value="woman">Woman</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="streetAddress">Street Address</label>
                            <input type="text" class="form-control" id="streetAddress" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="postalCode">Postal Code</label>
                            <input type="number" class="form-control" id="postalCode" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" class="form-control" id="phoneNumber" placeholder="">
                        </div>
                    </div>
                    <div class="buttons-employeed">
                        <button id="employee<?php echo $method ?>" class="btn btn-outline-dark">Save</button>
                        <a href="dashboard.php"><button id="employeeReturn" class="btn btn-dark ">Return</button></a>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div id="employeeAlert"></div>

            <?php require '../assets/footer.html'; ?>

            <script src="../node_modules/jquery/dist/jquery.min.js"></script>
            <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
            <script src="../src/js/script.js"></script>
</body>

</html>
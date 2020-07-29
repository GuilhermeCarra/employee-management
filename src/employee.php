<?php
    require('library/sessionHelper.php');

    $method = "POST";  // $method variable defines if its an Employee Update (PUT) or new Employee creation (POST)

    if (isset($_GET['id'])) {
        require('library/employeeController.php');
        $method = "PUT";
        $employee = json_decode(getEmployee($_GET['id']));
        $gender = $employee->gender;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body id="employeePage">
    <?php require '../assets/header.html'; ?>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 mb-5">
            <div id="imageGallery">
                <?php include('imageGallery.php') ?>
            </div>
            <div class="col-1"></div>
            <div class="row form-employee">
                <div class="col-2"></div>
                <form class="col-8" method="POST" action="library/employeeController.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($employee)) echo $employee->name ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php if(isset($employee)) echo $employee->lastName ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php if(isset($employee)) echo $employee->email ?>">
                            <small class="text-info">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control">
                                <option value="man" <?php if(isset($gender) && $gender == 'man') echo 'selected' ?>>Man</option>
                                <option value="woman" <?php if(isset($gender) && $gender == 'woman') echo 'selected' ?>>Woman</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php if(isset($employee)) echo $employee->city ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="streetAddress">Street Address</label>
                            <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="" value="<?php if(isset($employee)) echo $employee->streetAddress ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?php if(isset($employee)) echo $employee->state ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="" value="<?php if(isset($employee)) echo $employee->age ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="postalCode">Postal Code</label>
                            <input type="number" class="form-control" id="postalCode" name="postalCode" placeholder="" value="<?php if(isset($employee)) echo $employee->postalCode ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="" value="<?php if(isset($employee)) echo $employee->phoneNumber ?>">
                        </div>
                    </div>

                    <div class="buttons-employeed float-right">
                        <button id="hiddenSubmitBtn" type="submit" class="d-none" name="<?php echo $method ?>" class="btn btn-outline-dark">Save</button>
                        <button id="submitBtn" type="button" class="btn btn-outline-dark">Save</button>
                        <button id="employeeReturnBtn" class="btn btn-dark ">Return</button>
                    </div>

                    <!-- Hidden inputs to send id and avatar info whithin the form -->
                    <input class="d-none" id="avatarInput" type="text" <?php if(isset($employee->avatar)) echo 'name="avatar" value="'.$employee->avatar.'"' ?>>
                    <input class="d-none" type="text" name="id" value="<?php if(isset($employee)) echo $employee->id ?>">
                </form>

                <div class="col-2"></div>
            </div>

            <!-- Alert message to updated or created employee -->
            <div id="employeeAlert"></div>

            <?php require '../assets/footer.html'; ?>

            <script src="../node_modules/jquery/dist/jquery.min.js"></script>
            <script src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
            <script src="../src/js/script.js"></script>
</body>

</html>
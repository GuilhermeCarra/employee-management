<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>/assets/img/favicon.png">
    <link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?= CSS ?>/main.css">
</head>

<body id="employeePage">
    <div class="main d-flex flex-column justify-content-between">
        <?php include('assets/html/header.php') ?>
        <div class='main__content d-flex justify-content-center align-items-center flex-column'>
            <div id="formErrMsg" class="d-none errorMsg mb-4 align-items-center justify-content-center alert">
                <span>Please, correct the highlighted errors.</span>
            </div>
            <div id="profilePicCont" class="profile__img img-container">
                <img src="<?= $employee && isset($employee->img) ? $employee->img : BASE_URL . "/assets/img/usuario.svg" ?>" alt="profile picture" id="profileImg" class="thumbnail">
            </div>
            <div id="profilePicSelect" class="profile__img--selector d-none flex-wrap justify-content-sm-between justify-content-center mt-3">
            </div>
            <form id="employeeForm" class="my-5" name="employeeInfo" method="POST" action="<?= isset($employee) ? BASE_URL."/employeeController/updateEmployeeCont/".$url[2]: BASE_URL."/employeeController/updateEmployeeCont" ?>">
                <input type="hidden" id="avatarInp" name="img" value="<?= $employee && isset($employee->img) ? $employee->img : '' ?>">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="nameInp" name="name" placeholder="Name" value="<?= $employee && isset($employee->name) ? $employee->name : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Last Name</label>
                        <input type="text" class="form-control" id="surnameInp" placeholder="Last name" name="lastName" value="<?= $employee && isset($employee->lastName) ? $employee->lastName : "" ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email adress</label>
                        <input type="email" class="form-control" name="email" id="emailInp" placeholder="Email address" value="<?= $employee && isset($employee->email) ? $employee->email : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select name="gender" id="genderInp" class="form-control" value="">
                            <option value="select" disabled selected>Select</option>
                            <option value="man" <?= $employee && isset($employee->gender) ? ($employee->gender == "man" ? "selected" : "") : "" ?>>Man</option>
                            <option value="woman" <?= $employee && isset($employee->gender) ? ($employee->gender == "woman" ? "selected" : "") : "" ?>>Woman</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" name="city" id="cityInp" class="form-control" placeholder="City" value="<?= $employee && isset($employee->city) ? $employee->city : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Street Address</label>
                        <input type="text" name="streetAddress" id="addressInp" class="form-control" placeholder="Street Adress" value="<?= $employee && isset($employee->streetAddress) ? $employee->streetAddress : "" ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="state">State</label>
                        <input type="text" name="state" id="stateInp" class="form-control" placeholder="State or Province" value="<?= $employee && isset($employee->state) ? $employee->state : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="ageInp" class="form-control" placeholder="Age" value="<?= $employee && isset($employee->age) ? $employee->age : "" ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="po">Postal Code</label>
                        <input type="text" name="postalCode" id="poInp" class="form-control" placeholder="Postal Code" value="<?= $employee && isset($employee->postalCode) ? $employee->postalCode : "" ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phoneNumber" id="phoneInp" class="form-control" placeholder="Phone number" value="<?= $employee && isset($employee->phoneNumber) ? $employee->phoneNumber : "" ?>">
                        <input type="hidden" name="id" id="id" value="<?= $employee && isset($employee->id) ? $employee->id : "" ?>">
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-dark" id='submitForm'>Submit</button>
                    <a href="<?= $_SERVER["HTTP_REFERER"] ?>" class="btn btn-outline-danger mx-2" id="returnBtn">Return</a>
                </div>
            </form>
        </div>
        <?php include('assets/html/footer.html') ?>
    </div>
    <script src="<?= BASE_URL ?>/node_modules/jquery/dist/jquery.js"></script>
    <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL ?>/node_modules/bootstrap/js/dist/index.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/utils.js"></script>
</body>


</html>
<?php
    if(isset($_SESSION['response'])) {
        echo $_SESSION['response'];
        echo '<script> var path = "'.BASE_URL.'"</script>';
        echo '<script> alertsMsg("'.$_SESSION['response'].'")</script>';
        unset($_SESSION['response']);
    }
?>
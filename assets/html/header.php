<header class="mb-4">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
         aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <a class="navbar-brand pl-2" href="<?= BASE_URL ?>/employeeController/getEmployeesCont/"><img class="logo"
               src="<?= BASE_URL ?>/assets/img/assembler.png"></a>
         <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item mt-2 ml-2">
               <a id="dashboardNav" class="mr-3 text-body nav-li" href="<?= BASE_URL ?>/employeeController/getEmployeesCont/">Dashboard</a>
            </li>
            <li class="nav-item mt-2">
               <a id="employeeNav" class="mr-3 text-body nav-li" href="<?= BASE_URL ?>/employeeController/addEditEmployee/">Employee</a>
            </li>
            <!-- LOGOUT BUTTON -->
            <form method="POST" action="<?= BASE_URL ?>/loginController/logout/">
               <input class="btn btn-dark mr-5 logOut" type="submit" name="logout" value="Log Out">
            </form>
         </ul>
      </div>
   </nav>
</header>
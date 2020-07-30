<?php
    include('library/avatarsApi.php');
    if(isset($employee->avatar)) {
        $avatar = $employee->avatar;
    } else {
        $avatars = getAvatars();

        if ($avatars == "error") $error = "Could not load avatars";
    }
?>

<div class="row mb-4 justify-content-center" id="employeeAvatar">
    <?php
        if(isset($avatar)) {
            echo '<div class="img-container"><img class="thumbnail" src="'.$avatar.'"></div>';
        } elseif (isset($error)) {
            echo '<kbd>'.$error.'</kbd>';
        } else {
            foreach($avatars as $avatar) {
                echo '<div class="img-container"><img class="thumbnail" src="'.$avatar.'"></div>';
            }
        }
    ?>
</div>
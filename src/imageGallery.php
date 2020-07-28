<?php
    include('library/avatarsApi.php');
    if(isset($employee->avatar)) {
        $avatar = $employee->avatar;
    } else {
        $avatars = getAvatars();
    }
?>

<div class="row mb-4" id="employeeAvatar">
    <?php
        if(isset($avatar)) {
            echo '<div class="img-container"><img class="thumbnail" src="'.$avatar.'"></div>';
        } else {
            foreach($avatars as $avatar) {
                echo '<div class="img-container"><img class="thumbnail" src="'.$avatar.'"></div>';
            }
        }
    ?>
</div>
<?php
    include('library/avatarsApi.php');
    $avatars = getAvatars();
?>

<div class="row" id="employeeAvatar">
    <?php
        foreach($avatars as $avatar) {
            echo '<div class="img-container"><img class="thumbnail" src="'.$avatar.'"></div>';
        }
    ?>
</div>
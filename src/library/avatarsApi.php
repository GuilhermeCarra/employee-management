<?php

function getAvatars() {
    $avatarsResponse = json_decode(file_get_contents("../resources/images_mock.json"));
    foreach($avatarsResponse as $avatar) {
        $avatars[] = $avatar->photo;
    }
    return $avatars;
}

?>
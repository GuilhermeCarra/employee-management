<?php

function getAvatars() {
    //$avatarsResponse = json_decode(file_get_contents("../resources/images_mock.json"));

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://uifaces.co/api",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => "limit=10",
        CURLOPT_HTTPHEADER => array('X-API-KEY: 6301675F-934441A8-BFE795BC-BFC60F6B')
    ));
    $output = curl_exec($ch);
    if (curl_errno($ch)) $error_msg = curl_error($ch);
    curl_close($ch);

    if (isset($error_msg)) return "error";

    $avatarsResponse = json_decode($output);

    foreach($avatarsResponse as $avatar) {
        $avatars[] = $avatar->photo;
    }
    return $avatars;
}

?>
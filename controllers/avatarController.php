<?php

require_once LIBS . 'classes/controller.php';

class avatarController extends Controller {

    function __construct(){
        parent::__construct();
    }

        public function avatar(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $tmp = json_decode(file_get_contents("php://input"), true);

        $results = $this-> model->CallAPI($tmp['request']['url']);

        $images = array();
        foreach ($results as $key => $value) {
        array_push($images, $value->photo);
        }
        echo json_encode($images);
        die();
        }
    }
}


?>
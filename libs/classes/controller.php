
<?php

class Controller{

    function __construct(){
    }

    function loadModel($model){
        $model = str_replace("Controller", "",$model);
        $modelPath = MODELS . $model.'Manager.php';

        if(file_exists($modelPath)){
            require_once $modelPath;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}

?>
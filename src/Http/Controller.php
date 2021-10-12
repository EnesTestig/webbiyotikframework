<?php

namespace Framework\Http;

use Framework\Core\Registry;
use Framework\Layouts\Http\Controller as IController;

/**
 * Webbiyotik controller class
 *
 * 
 * @package Webbiyotik
 * @license MIT
 * @copyright 2018
 */
abstract class Controller implements IController
{
    /**
     * Load model file
     *
     * @param  string $model
     * @return mixed
     */
    public function loadModel(String $model)
    {
        /* Check model type */
        if (is_admin_folder()) {
            $class = "\\Backend\\Models\\$model";

            $file   = ADMIN_MODELS."$model.php";
            $static = ADMIN_MODELS."static/$model.php";

            if (file_exists($file)) require $file;
            if (file_exists($static)) require $static;

        } else {
            $class = "\\Frontend\\Models\\$model";

            $file   = MODELS."$model.php";
            $static = MODELS."static/$model.php";

            if (file_exists($file)) require $file;
            if (file_exists($static)) require $static;
        }

        return Registry::set($class, new $class);
    }

    /* Controllers for default method */
    abstract public function index();
}

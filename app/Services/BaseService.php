<?php

namespace App\Services;

class BaseService  
{
    /**
     * @var validation
     */

     public $validation;
    function __construct()
    {
        $this->validation = \config\Services::validation();
    }
}

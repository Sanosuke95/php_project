<?php

namespace App\Controller;

class UserController
{

    public function getUser()
    {
        // echo "La liste des utilisateurs";
        $file = dirname(__DIR__, 1) . '/Views/user.php';
        require $file;
    }
}

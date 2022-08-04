<?php

namespace App\Controllers;

use App\Models\Login;
use App\Models\LoginModel;

class LoginController extends LoginModel
{
    public function login()
    {
        $validaLogin = $this->validarLogin();

        if($validaLogin == true) {
            //require_once __DIR__ . '/../Views/home.php';
            header('Refresh: 0; ?router=Controllers/home/');
        }
        else {
            require_once __DIR__ . '/../Views/login.php';
        }
    }

    public function deslogar()
    {
        require_once __DIR__ . '/../Models/Logout.php';
    }
}
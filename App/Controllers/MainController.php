<?php

namespace App\Controllers;

use App\Models\MainModel;


class MainController extends Controller
{
    function index(){
        $model = new MainModel;
        $names = $model->getNames();

        var_dump($names);

        $service = 'pervezimas';

        $this->view('main/index', ['service' => $service]);

    }

    function orders()
    {
        echo 'hello from main controller orders action';
        $this->view('main/orders', []);
    }
}
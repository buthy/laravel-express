<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index($pagina)
    {
        return view("test/index", ['pagina'=>$pagina]);
    }

    public function notas()
    {
        $notas = [
            0 => 'Anotação 1',
            1 => 'Anotação 2',
            2 => 'Anotação 3',
            3 => 'Anotação 4',
            4 => 'Anotação 5',
        ];
        return view("test/notas", compact('notas'));
    }

}

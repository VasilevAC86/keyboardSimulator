<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function lentaPage(){
        return view("lenta");
    }
    public function adminPage(){
        return view("admin");
    }
}

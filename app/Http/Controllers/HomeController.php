<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Category;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function homepage(){
        return view('welcome');
    }
}

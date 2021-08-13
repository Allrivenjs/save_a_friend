<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RutaPrimariaController extends Controller
{
    public function index(){
        return view('index');
    }
}

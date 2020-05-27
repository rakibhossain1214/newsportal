<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsPageController extends Controller
{
    function index(){
        return view('front.details');
    }
}

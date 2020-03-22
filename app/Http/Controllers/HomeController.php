<?php


namespace App\Http\Controllers;


use App\Model\navigation\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}

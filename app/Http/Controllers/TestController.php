<?php


namespace App\Http\Controllers;


use App\Model\Admin\HomeNavMenu;

class TestController extends Controller
{
    public function index()
    {

        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        return view('sample.home')
            ->with('navMenu', $navMenu);
    }
}

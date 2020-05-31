<?php

namespace App\Http\Controllers;

use App\Model\Admin\HomeNavMenu;

class HomeController extends Controller
{
    public function index()
    {
        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        return view('welcome.index')
            ->with('homeMenu', $navMenu);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\navigation\Category;

/**
 * 网址收藏
 * Class NavigationController
 * @package App\Http\Controllers
 */
class NavigationController extends Controller
{
    public function index()
    {
        $categories = Category::with(['children' => function ($query) {
            $query->orderBy('order');
        }, 'sites'])
            ->withCount('children')
            ->orderBy('order')
            ->get();

        return view('navigation.index')->with('categories', $categories);
    }
}

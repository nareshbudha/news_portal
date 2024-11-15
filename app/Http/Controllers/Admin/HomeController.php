<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $menuData = json_decode(file_get_contents(storage_path('app/menu.json')), true);
        return view('index', compact('menuData'));
    }
}

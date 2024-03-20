<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $is_logged_in = Auth::check();
        return view('home', ['is_logged_in' => $is_logged_in]);
    }

    public function home()
    {
        $data['meta_title'] = 'SoriesThriftShop';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '  ';

        return view('home', $data);
    }

    public function about()
    {
        $data['meta_title'] = 'About Us';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '  ';

        return view('about.about', $data);
    }
}

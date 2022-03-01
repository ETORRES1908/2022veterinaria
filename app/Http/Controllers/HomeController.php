<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);
        return view('welcome');
    }

    public function contact()
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);
        return view('contact');
    }

    public function about()
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);
        return view('about');
    }
}

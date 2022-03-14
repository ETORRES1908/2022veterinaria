<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function language($locale)
    {
        app()->setLocale($locale);
        session(['locale' => $locale]);
        return redirect(url(URL::previous()));
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('welcome', 'about', 'findperson', 'person');
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

    public function findperson(Request $request)
    {
        $users = User::where('name', 'LIKE', '%' . $request->username . '%')
            ->where('galpon', 'LIKE', '%' . $request->shed . '%')
            ->where('id', '!=', Auth::user()->id)
            ->where('usert', 'LIKE', '%' . $request->type . '%')
            ->where('country', 'LIKE', '%' . $request->country . '%')
            ->where('state', 'LIKE', '%' . $request->state . '%')
            ->where('usert', '!=', 'admin')
            ->where('usert', '!=', 'webmaster')
            ->paginate(10);
        return view('Users.findusers', compact('users'));
    }

    public function person(Request $request, $id)
    {
        $user = User::find($request->id);
        $mascotas = User::find($request->id)->mascotas()->paginate(10);
        return view('Users.user', compact('user', 'mascotas'));
    }

    public function reset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'answer' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        /*  return $request->all(); */
        $u = User::where('email', $request->email)->where('answer', $request->answer)->first();
        /*   return $u; */
        $u->update(['password' => bcrypt($request->password)]);
        /*  return $u->password; */
        return redirect()->route('login')->with('error', __('Successfully updated'));
    }

    public function language($locale)
    {
        app()->setLocale($locale);
        session(['locale' => $locale]);
        return redirect(url(URL::previous()));
    }
}

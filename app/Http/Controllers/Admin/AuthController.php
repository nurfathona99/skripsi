<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.site.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);

        $attempts = [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($attempts))
        {
            return redirect()->route('admin.dashboard');
        }

        $error = 'Invalid email or password';

      //  $request->session()->flash('danger', $error);

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

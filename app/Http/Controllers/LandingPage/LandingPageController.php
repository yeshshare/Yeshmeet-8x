<?php

namespace App\Http\Controllers\LandingPage;

use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingPageController extends Controller
{
    public function index() {
        return view('landingPage.index');
    }

    /*
    public function showSignup() {
        return view('landingPage.signup');
    }

    public function store(Request $request) {
        Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('staffDashboard');
    }
    */ 
    public function showLogin() {
        return view('landingPage.login');
    }

    public function doLogin(Request $request) {
        if(Auth::guard('yeshmeet_lp_participant')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //dd($email = Auth::guard('yeshmeet_lp_participant'));
            return 'Deu certo';
            // return redirect()->route('staffDashboard');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('yeshmeet_lp_participant')->logout();

        return redirect('/');
    }

    /*
    public function verifyEmail(Request $request) {
        if(Staff::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Já existe uma conta usando este e-mail'], 400);
        }

        return response()->json([]);
    }
    */
}

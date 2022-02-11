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
        if(Auth::guard('yeshmeet_lp_participant')->attempt(['email' => $request->email, 'password' => $request->password,
        'yeshmeet_customer_id' => $request->yeshmeet_customer_id, 'yeshmeet_event_id' => $request->yeshmeet_event_id,
        'yeshmeet_lp_id' => $request->yeshmeet_lp_id])) {
            return redirect()->route('index_lp');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('yeshmeet_lp_participant')->logout();

        return redirect('/');
    }

    /*

    Route::prefix('product')->middleware('auth.member')->group(function () {



    public function verifyEmail(Request $request) {
        if(Staff::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Já existe uma conta usando este e-mail'], 400);
        }

        return response()->json([]);
    }
    */
}

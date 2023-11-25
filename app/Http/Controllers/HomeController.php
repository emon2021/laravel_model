<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
// these methods are required for email verification
    public function verify_notice()
    {
        $auth = Auth::user()->email_verified_at;
        if($auth != null)
        {
            return view('/home');
        }
        return view('auth.verify');
    }
    
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/home');
    }

    public function verify_resend(Request $request)
    {
    
        $request->user()->sendEmailVerificationNotification();
         
        return back()->with('message', 'Verification link sent!');
    }

    //these methods are for changing password
    public function change_password()
    {
        return view('auth.change_password');
    }

    public function update_password(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'password' => ['required','min:8','confirmed'],
        ]);
        if(Hash::check($request->current_password, $user->password))
        {
            $data = array(
                'password' => Hash::make($request->password),
            );
            DB::table('users')->where('id',$user->id)->update($data);
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->back()->with('error','Current Password Mismacthed!');

    }
}

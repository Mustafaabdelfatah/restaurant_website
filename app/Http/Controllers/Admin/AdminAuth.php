<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;

use Illuminate\Http\Request;
//use  Illuminate\Support\Facades\Request;
class AdminAuth extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function dologin(Request $request)
    {


        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }


    public function logout(){
        auth()->logout();
        return redirect()->back();
    }

    public function forgot_password()
    {
        return view('admin/forgot_password');
    }
    public function forgot_password_post()
    {
        $admin =  Admin::where('email',request('email'))->first();
        if(!empty($admin))
        {
            $token = app('auth.password.broker')->createToken($admin);
            $data= DB::table('password_resets')->insert([
                'email'         => $admin->email,
                'token'         => $token,
                'created_at'    => Carbon::now(),
            ]);

            //return new AdminResetPassword(['data'=>$admin,'token'=>$token]);

            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success',trans('admin.the_link_reset_sent'));
            return back();
        }
        return back();
    }
    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')
        ->where('token',$token)
        ->where('created_at','>',Carbon::now()->subHours(2))->first();


        if(!empty($check_token))
        {
            return view('admin.reset_password')->with('data',$check_token);
        }
        else
        {
            return redirect(aurl('forgot/password'));
        }
    }
    public function reset_password_final($token)
    {

        $this->validate(request(),[

            'password'                  => 'required|confirmed',
            'password_confirmation'     => 'required',

        ],[],[

            'password'                  => 'password',
            'password_confirmation'     => 'Confirm Password',

        ]);

        $check_token = DB::table('password_resets')
        ->where('token',$token)
        ->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token))
        {
            $admin = Admin::where('email', $check_token->email)->update(['email'=>$check_token->email,
            'password'=> bcrypt(request('password'))
            ]);

            DB::table('password_resets')
            ->where('email',request('email'))->delete();
            admin()->attempt(['email'=>$check_token->email,'password'=> request('password')], true);
            return redirect(aurl());

        }
        else
        {
            return redirect(aurl('forgot/password'));
        }
    }
}

<?php

namespace App\Http\Controllers\CmsAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class CmsLoginController extends Controller
{

        public function showLoginForm()
        {
                // session()->forget('login');
                // session()->forget('not match');
                // session()->flash('fghf');
                return view('cmsauth.cmslogin');
        }






        public function login(Request $request)
        {

                // $user = Auth::user();
                // dd($user);
                $validator = $this->validate($request, [
                        'email' => 'required|email',
                        'password' => 'required|min:6|max:12',
                ], [
                        'email.required' => 'لظفا ایمیل را وارد کنید',
                        'email.email' => 'لظفا ایمیل معتبر وارد کنید',
                        'password.required' => 'لظفا پسورد را وارد کنید',
                        'password.min' => 'لظفا پسورد با طول شش کارکتر وارد کنید',
                        'password.max' => 'لظفا پسورد با حداکثر طول دوازده کارکتر وارد کنید',

                ]);


                if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
                 {
                        
                        // session()->put('login', auth()->user()->name);
                        // session()->flash('login', auth()->user()->name); 
                        if(auth()->user()->isAdmin())
                        {
                                return redirect('admin/dashboard');
                        }else
                        {
                                return redirect('/');    
                        }
                       
                }
                session()->flash('not_match', 'ایمیل یا پسورد صحیح نمی باشد');
                return back();
             
        }






        public function logout()
        {
                session()->forget('login');
                auth()->logout();

                return redirect('/');
        }
}

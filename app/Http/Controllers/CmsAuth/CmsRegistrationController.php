<?php
namespace App\Http\Controllers\CmsAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class CmsRegistrationController extends Controller
{

    public function showRegistrationForm()
    {

        return view('cmsauth.cmsregister');
    }


    public function register(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'password_confirmation' => 'required|min:6|max:12|same:password',
        ], [
            'name.required' => 'لظفا نام و نام خانوادگی را وارد کنید',
            'email.required' => 'لظفا ایمیل را وارد کنید',
            'email.email' => 'لظفا ایمیل معتبر وارد کنید',
            'password.required' => 'لظفا رمزعبور را وارد کنید',
            'password.min' => 'لظفا رمزعبور با طول شش کارکتر وارد کنید',
            'password.max' => 'لظفا رمزعبور با حداکثر طول دوازده کارکتر وارد کنید',
            'password_confirmation.required' => 'لظفا تکرار رمزعبور را وارد کنید',
            'password_confirmation.same' => 'لظفا رمزعبور را مطابق با هم وارد کنید',

        ]);


        $password = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;  
        $user->password = $password;
        $user->status = 0;
      
        // $user->password = $request->Password;
        
        $user->save();
        $user->roles()->sync([3]);
        session()->flash('login', $user->name);
        return redirect('/');
    }
}

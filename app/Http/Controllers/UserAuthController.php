<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function show()
    {
//         if(session()->has('email'))
//             back()->withErrors([
//                 'email' => 'You\'re already login',
//         ]);
            return back();
    }
    
    public function login()
    {
        //neu da dang nhap thi tro ve trang home
        if(session()->has('email'))
            back()->withErrors([
                'email' => 'You\'re already login',
            ]);
        
        //đăng nhập hệ thống
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);
        //, request()->has('remember'));
        
        $user = User::where('email', '=', request('email'))->first();
        
        //Thành công
        if($success) {            
            session(['name'=>$user->name, 'role'=>$user->role]);
            return back()->with('success','Bạn đã đăng nhập thành công'); 
        } else return back()->with('fail','Đăng nhập thất bại');
        
//         //Thất bại, báo lỗi
//         return back()->withErrors([
//             'email' => 'The provided credentials do not match our records.',
//         ]);
    }
    
    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect('login');
    }
    
    public function register()
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required_with:password|same:password']
        ]);
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role' => 'user'
        ]);
        $res = $user->save();
        if($res) 
        {
            session(['name'=>$user->name, 'role'=>'user']);
            return back()->with('success','Bạn đã đăng ký thành công');
        }
        else return back()->with('fail','Có lỗi đăng ký');
    }   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Mail;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', [
            'except' => ['create', 'store', 'confirmEmail']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);

    }

    public function create()
    {
        return view('users.create');
    }

    public function index()
    {
	return "error";
    }

    public function show()
    {
        return "error";
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

//    public function show(User $user)
//    {
//        return view('users.show', compact('user'));
//    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $this->sendEmailConfirmationTo($user);
	Auth::login($user);
        session()->flash('info', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect()->route('announcement');
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);
	if (Hash::check($request->oldpassword,Auth::user()->password)){
            $user->update([
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ]);
	    session()->flash('success', '修改成功！');
            return redirect()->route('profile');
	}
	else {
	    session()->flash('danger', '密码错误！');
	    return redirect()->route('profile');
	}
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'summer@example.com';
        $name = 'Summer';
        $to = $user->email;
        $subject = "感谢注册！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('announcement');
    }

}

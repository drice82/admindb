<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hotel;
use App\Order;
use App\WebContent;
use Auth;

class AppsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function recharge()
    {
	$data = Order::select('money', 'created_at', 'payment_type') -> where ('user_id', 10)->orderBy('id', 'desc') -> paginate(5);
        return view('recharge', compact('data'));
    }

    public function announcement()
    {
	$content = WebContent::where('key', 'announcement')->first();
        return view('announcement')->with('content', $content->value);
    }

    public function profile()
    {
        return view('profile');
    }

    public function hotel(Request $request)
    {
        $keywords_name = $request->input('name');
        $data = Hotel::select('Name', 'CtfId', 'Gender', 'Birthday', 'Address', 'Mobile', 'Version') -> where('Name', $keywords_name)->paginate(20);
        $appendData = $data->appends(array(
            'name' => $keywords_name,
        ));
        return view('hotel', compact('data'));
    }

}

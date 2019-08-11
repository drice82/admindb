<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use Carbon\Carbon;

class PaymentController extends Controller
{

    public function payzcy(Request $request)
    {
	$type = $request->type;
        $out_trade_no =  (int)(microtime(true)*1000) . (900000+Auth::user()->id);
	$notify_url = route('payment.notifyzcy');
	$return_url = route('payment.returnzcy');
	$name = 'HGDB';
	$money = $request->WIDtotal_fee;
	$sitename = 'business';
	$url = $this->submit($type, $out_trade_no, $notify_url, $return_url, $name, $money, $sitename);
	return "<script>window.location.href='{$url}';</script>";

    }

    public function returnzcy()
    {
	$data = $_GET;
	if ($this->verify($data)) {
	    if ($data['trade_status'] == 'TRADE_SUCCESS') {
		session()->flash('success', '充值成功');
	    }
	} else{
	    session()->flash('danger', '充值失败，请联系客服');
	}
        return redirect(route('announcement'));
    }

    public function notifyzcy()
    {
	$data = $_GET;
	if ($this->verify($data)) {
	    //验证支付状态
	    if ($data['trade_status'] == 'TRADE_SUCCESS') {
		//获取用户ID
		$user_id = substr($data['out_trade_no'], -5,5);
		//是否老订单
		if (Order::where('out_trade_no', '=', $data['out_trade_no'])->exists()) {
		    exit ("success");
		}
		//计算增加时间
		$moretime=0;
		switch ($data['money']){
		    case getenv('PAY_FEE1'):
			$moretime=30;
		    break;
		    case getenv('PAY_FEE2'):
			$moretime=91;
		    break;
                    case getenv('PAY_FEE3'):
                        $moretime=182;
                    break;
                    case getenv('PAY_FEE4'):
                        $moretime=365;
                    break;
		}
               //获取账户有效期
		$user = User::where('id', $user_id)->first();
                $user_exp_time =new Carbon($user->expire_time);
                //判断增加时间
                if ($user_exp_time->gt(Carbon::now())) {
                    $user_exp_time->addDays($moretime);
                } else {
                    $user_exp_time = Carbon::now()->addDays($moretime);
                }
		//写入用户表
		$user->expire_time = $user_exp_time;
		$user->type = 1;
		$user->balance += $data['money'];
		$user->save();
		//记录订单
		Order::create([
		    'money' => $data['money'],
		    'user_id' => $user_id,
		    'trade_no'  => $data['trade_no'],
		    'out_trade_no' => $data['out_trade_no'],
		    'payment_type' => $data['type'],
		]);
		echo 'success';
	    }
	} else {
	    echo 'fail';
	}
    }

    public function submit($type, $out_trade_no, $notify_url, $return_url, $name, $money, $sitename)
    {
        $data = [
            'pid' => getenv('PAY1_PID'),
            'type' => $type,
            'out_trade_no' => $out_trade_no,
            'notify_url' => $notify_url,
            'return_url' => $return_url,
            'name' => $name,
            'money' => $money,
            'sitename' => $sitename
        ];
        $string = http_build_query($data);
        $sign = $this->getsign($data);
        return getenv('PAY1_URL') . '?' . $string . '&sign=' . $sign . '&sign_type=MD5';
    }

    private function getSign($data)
    {
	$pay_key = getenv('PAY1_KEY');
        $data = array_filter($data);
        ksort($data);
        $str1 = '';
        foreach ($data as $k => $v) {
            $str1 .= '&' . $k . "=" . $v;
        }
        $str = $str1 . $pay_key;
        $str = trim($str, '&');
        $sign = md5($str);
        return $sign;
    }

    /**
     * @Note   验证签名
     * @param $data  待验证参数
     * @return bool
     */
    public function verify($data)
    {
        if (!isset($data['sign']) || !$data['sign']) {
            return false;
        }
        $sign = $data['sign'];
        unset($data['sign']);
        unset($data['sign_type']);
        if (get_magic_quotes_gpc()) {
            $data = stripslashes($data);
        }
        $sign2 = $this->getSign($data);
        if ($sign != $sign2) {
            //兼容傻逼彩虹易支付
            unset($data['_input_charset']);
            $sign2 = $this->getSign($data);
            if ($sign == $sign2) return true;
            return false;
        }
        return true;
    }

}

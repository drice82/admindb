<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    //
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

    public function returnzcy(Request $request)
    {
	$data = $_GET;
	$out_trade_no = $data['out_trade_no'];
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
	$out_trade_no = $data['out_trade_no'];
	if ($this->verify($data)) {
	    //验证支付状态
	    if ($data['trade_status'] == 'TRADE_SUCCESS') {
	        echo 'success';
	        //这里就可以放心的处理您的业务流程了
	        //您可以通过上面的商户订单号进行业务流程处理
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

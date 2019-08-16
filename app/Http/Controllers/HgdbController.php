<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cn2014;

class HgdbController extends Controller
{
	//
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function cn2014(Request $request)
	{
		$enterprise = $request->input('enterprise');
		if ($enterprise == NULL ) {$enterprise = '厦门通士达照明有限公司';}
		$hs_id = $request->input('hs_id');
		$data = cn2014::select('imex_id', 'imex', 'trademode', 'country', 'hs_id', 'hs_name', 'value', 'quantity', 'unit', 'price', 'enterprise')
			-> where('enterprise', 'like', $enterprise )
			->paginate(20);
		$appendData = $data->appends(array(
			'enterprise' => $enterprise,
		));
			return view('cn2014', compact('data'));	
		
	}
}


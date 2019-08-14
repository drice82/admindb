<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cn2014;

class HgdbController extends Controller
{
    //
	public function cn2014(Request $request)
	{
		$enterprise = $request->input('enterprise');
		$hs_id = $request->input('hs_id');
		$id = $request->input('id');
		$data = cn2014::select('imex', 'trademode', 'country', 'hs_id', 'hs_name', 'value', 'quantity', 'price', 'enterprise')-> where('enterprise', $enterprise)->paginate(20);
	        return view('cn2014', compact('data'));	
	}
}


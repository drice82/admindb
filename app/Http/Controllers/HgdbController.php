<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\hscode;
use DB;

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
		$year = $request->input('year');
		$hs = $request->input('hs');
		$imex = $request->input('imex');
		switch ($year)
		{
		case "cn_2014":
			break;
		case "cn_2013":
			break;
		default:
			$year = "cn_2014";
		}

		switch ($imex)
		{
		case "1":
			break;
		case "0":
			break;
		default:
			$imex = "";
		}

		if ($enterprise == NULL ) {$enterprise = '%';}
		if ($hs ==NULL) {$hs = '%';}		
		$data = DB::table($year)->where('hs_id','like', $hs)->where('enterprise', 'like', $enterprise)->paginate(20);
		$appendData = $data->appends(array(
			'year' => $year,
			'enterprise' => $enterprise,
			'hs' => $hs,
		));
			return view('cn2014', compact('data'));	
	}
}


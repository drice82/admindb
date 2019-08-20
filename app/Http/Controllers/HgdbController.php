<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
		$page = $request->input('page');

		if ($enterprise == NULL ) {$enterprise = '%';}
		if ($hs ==NULL) {$hs = '%';}	

		//以便获取old 的值
		$request->flash();

		//判断数据库是否存在
		$existing_tables = ["cn_2007", "cn_2008", "cn_2009", "cn_2010", "cn_2011", "cn_2012", "cn_2013", "cn_2014"];
		if (!in_array($year, $existing_tables)){ $year = "cn_2014"; } 

		if ( $request->input('enterprise')==NULL and $request->input('hs')==NULL){
			$data = DB::table($year)->where('id','0')->paginate(20);
		} else {
			switch ($imex)
			{
			case "1":
				$data = DB::table($year)
					->where('hs_id','like', substr($hs,0,8).'%')
					->where('enterprise', 'like', $enterprise)
					->where('imex_id','1')
					->orderby('country_id')
					->paginate(20);
				break;
			default:
				$data = DB::table($year)
					->where('hs_id', 'like', substr($hs,0,8).'%')
					->where('enterprise', 'like', $enterprise)
					->where('imex_id','0')
					->paginate(20);
			}
		}


		//保留提交的get信息
		$appendData = $data->appends(array(
			'year' => $request->input('year'),
			'enterprise' => $request->input('enterprise'),
			'hs' => $request->input('hs'),
			'imex' => $request->input('imex')
		));
			return view('cn2014', compact('data'));	
	}
}


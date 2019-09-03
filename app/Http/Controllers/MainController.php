<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\hscode;
use DB;

class MainController extends Controller
{

	public function test(Request $request)
	{
		$a = array();
		if ($request->has('enterprise') and $request->enterprise !=''){
			$results = DB::table('info_enterprise_code')
				->select('enterprise_id')
				->where('enterprise', 'like', $request->enterprise)
				->get();
			if ($results->first()){
				foreach($results as $result){
					array_push ($a, $result->enterprise_id);
				}
			}
		}
	print_r($a);

	}


	public function Main(Request $request)
	{
		$enterprise = $request->input('enterprise');
		$year = $request->input('year');
		$hs = $request->input('hs');
		$imex = $request->input('imex');
		$page = $request->input('page');
		//以便获取old 的值
		$request->flash();
		//获取表名
		$existing_tables = ["cn_2000", "cn_2001", "cn_2002", "cn2003", "cn2004",
			"cn_2005", "cn_2006", "cn_2007", "cn_2008", "cn_2009",
			"cn_2010", "cn_2011", "cn_2012", "cn_2013", "cn_2014",
			"cn_2015", "cn_2016"];
		if (!in_array($year, $existing_tables)){ $year = "cn_2016"; } 

		//获取企业代码
		$input_ent = false;
		if ($request->has('enterprise') and $request->enterprise != ''){
			$input_ent = true;//有输入企业名
			$results = Cache::remember($request->enterprise, 10, function() use($request){
				return DB::table('info_enterprise_code')->select('enterprise_id')
					->where('enterprise', 'like', '%'.$request->enterprise. '%')
					->get();
			});			
//			$results = DB::table('info_enterprise_code')
//				->select('enterprise_id')
//				->where('enterprise', 'like', '%'. $request->enterprise . '%')
//				->get();
			if($results->first()) {
				//转换为数组
				$enterprise_id =json_decode(json_encode($results), true);
			}
			else {
				//有输入企业名，但是没匹配到
				$enterprise_id = array();
			}
		}
	
		$query = DB::table($year);
		if ($input_ent) {$query->wherein('enterprise_id', $enterprise_id);}
		if ($hs) {$query->where('hs_id', 'like',substr($hs,0,8).'%');}
		if ($imex==0 or $imex==1) {$query->where('imex_id', $imex);}
		$data = $query->paginate(20);

		//保留提交的get信息
		$appendData = $data->appends(array(
			'year' => $request->input('year'),
			'enterprise' => $request->input('enterprise'),
			'hs' => $request->input('hs'),
			'imex' => $request->input('imex')
		));
			return view('main', compact('data'));

	}
}


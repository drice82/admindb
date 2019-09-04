@extends('homepages.default')
@section('title', '中国海关进出口数据查询')
@section('content')
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          中国海关进出口数据查询
          <small>2000年-2016年</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
	    <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form class="search-form">

                <div class="col-xs-2">
		  <select class="form-control" name="year">
                    <option value="cn_2016" @if (old('year')=="cn_2016") selected @endif>2016年</option>
                    <option value="cn_2015" @if (old('year')=="cn_2015") selected @endif>2015年</option>
                    <option value="cn_2014" @if (old('year')=="cn_2014") selected @endif>2014年</option>
                    <option value="cn_2013" @if (old('year')=="cn_2013") selected @endif>2013年</option>
                    <option value="cn_2012" @if (old('year')=="cn_2012") selected @endif>2012年</option>
                    <option value="cn_2011" @if (old('year')=="cn_2011") selected @endif>2011年</option>
                    <option value="cn_2010" @if (old('year')=="cn_2010") selected @endif>2010年</option>
		    <option value="cn_2009" @if (old('year')=="cn_2009") selected @endif>2009年</option>
                    <option value="cn_2008" @if (old('year')=="cn_2008") selected @endif>2008年</option>
		    <option value="cn_2007" @if (old('year')=="cn_2007") selected @endif>2007年</option>
                    <option value="cn_2006" @if (old('year')=="cn_2006") selected @endif>2006年</option>
                    <option value="cn_2005" @if (old('year')=="cn_2005") selected @endif>2005年</option>
                    <option value="cn_2004" @if (old('year')=="cn_2004") selected @endif>2004年</option>
                    <option value="cn_2003" @if (old('year')=="cn_2003") selected @endif>2003年</option>
                    <option value="cn_2002" @if (old('year')=="cn_2002") selected @endif>2002年</option>
		    <option value="cn_2001" @if (old('year')=="cn_2001") selected @endif>2001年</option>
		    <option value="cn_2000" @if (old('year')=="cn_2000") selected @endif>2000年</option>
		  </select>
                </div>

		<div class="col-xs-2">
		  <select class="form-control" name="imex">
                    <option value="2" >进口+出口</option>
                    <option value="1" @if (old('imex')=="1") selected @endif>进口</option>
                    <option value="0" @if (old('imex')=="0") selected @endif>出口</option>
                  </select>
                </div>

		<div class="col-xs-4">
                  <input type="text" name="enterprise" class="form-control" placeholder="输入中文企业名称" value="{{old('enterprise')}}">
                </div>
		<div class="col-xs-2">
		  <input type="text" name="hs" class="form-control" placeholder="8位HS编码（可选）" value="{{old('hs')}}">
		</div>
		<div class="input-group-btn">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i>
                  </button>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
	<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">统计</h3>
            </div>
            <!-- /.box-header -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>进出口</th>
                  <th>企业名称及代码</th>
		  <th>商品名称及HS编码</th>
		  <th>贸易方式</th>
		  <th>国家/地区</th>
		  <th><b class="pull-right">参考单价</b></th>
		  <th><b class="pull-right">数量</b></th>
		  <th>单位</th>
		  <th><b class="pull-right">金额</b></th>
                </tr>
		</thead>
		@if ($data->first())
		<tbody>
		@foreach ($data as $e)
		{{-- {{dd($e)}} --}}
                <tr>
                  <td>@if ($e->imex_id) <span class="badge bg-green">进口</span> @else <span class="badge bg-red">出口</span> @endif </td>
		  <td>{{DB::table('info_enterprise_code')
				->where('enterprise_id',$e->enterprise_id)
				->value('enterprise')
		      }}
		       [{{$e->enterprise_id}}]
		  </td>
		  <td>{{DB::table('hs_2016')->where ('hs', 'like', $e->hs_id . '__')->value('hs_name')}}[{{$e->hs_id}}]</td>
		  <td>{{DB::table('info_trade_code')->where ('code',$e->trademode_id)->value('name')}} </td>
		  <td>{{DB::table('info_country_code')->where('id', $e->country_id)->value('name')}}</td>
		  <td><b class="pull-right">@if ($e->quantity==0) {{number_format($e->value,2)}} @else {{number_format($e->value/$e->quantity,2)}} @endif <i class="fa fa-fw fa-usd"></i></b></td>
		  <td><b class="pull-right">{{$e->quantity}}</b></td>
		  <td>{{DB::table('info_unit_code')->where ('code', DB::table('hs_2016')->where('hs', 'like', $e->hs_id . '__')->value('unit1'))->value('name')}}</td>
		  <td><b class="pull-right">{{number_format($e->value,0)}} <i class="fa fa-fw fa-usd"></i></b> </td>
		</tr>
		@endforeach
                </tbody>
	      </table>
	    <div class="mt-3">
	      {!! $data->render() !!}
	    </div>
	    @else
	    </table>
	    @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
@endsection

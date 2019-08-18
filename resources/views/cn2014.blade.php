@extends('layouts.default')
@section('title','海关数据')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        海关数据
        <small>customs information</small>
      </h1>
    </section>


@include('shared._messages')

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
                  <select class="form-control" name="year" >
                    <option value="cn_2014">2014年</option>
                    <option value="cn_2013">2013年</option>
                    <option value="cn_2012">2012年</option>
                  </select>
                </div>

		<div class="col-xs-2">
                  <select class="form-control" name="imex" >
                    <option value="%">进口+出口</option>
                    <option value="1">进口</option>
                    <option value="0">出口</option>
                  </select>
                </div>

		<div class="col-xs-4">
                  <input type="text" name="enterprise" class="form-control" placeholder="完整企业名称">
                </div>
		<div class="col-xs-2">
                  <input type="text" name="hs" class="form-control" placeholder="8位HS编码">
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
		  <th><b class="pull-right">总额</b></th>
                </tr>
		</thead>
		@if ($data->first())
		<tbody>
		@foreach ($data as $e)
		{{-- {{dd($e)}} --}}
                <tr>
                  <td>@if ($e->imex_id) <span class="badge bg-green">进口</span> @else <span class="badge bg-red">出口</span> @endif </td>
                  <td>{{$e->enterprise}}[{{$e->enterprise_id}}]</td>
		  <td>{{DB::table('hs_2016')->where ('hs', 'like', $e->hs_id . '__')->value('hs_name')}}[{{$e->hs_id}}]</td>
		  <td>{{DB::table('trade_code')->where ('code',$e->trademode_id)->value('name')}} </td>
		  <td>{{DB::table('country_code')->where('id', $e->country_id)->value('name')}}</td>
		  <td><b class="pull-right">@if ($e->quantity==0) {{$e->value}} @else {{round($e->value/$e->quantity,2)}} @endif <i class="fa fa-fw fa-usd"></i></b></td>
		  <td><b class="pull-right">{{$e->quantity}}</b></td>
		  <td>{{DB::table('unit_code')->where ('code', DB::table('hs_2016')->where('hs', 'like', $e->hs_id . '__')->value('unit1'))->value('name')}}</td>
		  <td><b class="pull-right">{{$e->value}} <i class="fa fa-fw fa-usd"></i></b> </td>
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
  <!-- /.content-wrapper -->
@endsection

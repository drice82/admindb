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
            <div class="box-header">
              <h3 class="box-title">请输入完整企业名称</h3>
            </div>
	    <!-- /.box-header -->

            <div class="box-body">
              <div class="row">
                <form class="search-form">
                <div class="col-xs-5">
                  <input type="text" name="enterprise" class="form-control" placeholder="企业名称">
                </div>
                <div class="input-group-btn">
                  <button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i>
                  </button>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>进出口</th>
                  <th>企业</th>
		  <th>HS编码：货品</th>
		  <th>参考单价</th>
		  <th>数量</th>
		  <th>单位</th>
		  <th>总额</th>
		  <th>国家/地区</th>
                </tr>
		</thead>
		@if ($data->first())
		<tbody>
		@foreach ($data as $e)
		{{-- {{dd($e)}} --}}
                <tr>
                  <td>@if ($e->imex_id) <span class="badge bg-green">进口</span> @else <span class="badge bg-red">出口</span> @endif </td>
                  <td>{{$e->enterprise}}</td>
		  <td>{{$e->hs_id}} : {{$e->hs_name}}</td>
		  <td>{{$e->price}}</td>
		  <td>{{$e->quantity}}</td>
		  <td>{{$e->unit}}</td>
		  <td>{{$e->value}} <i class="fa fa-fw fa-usd"></i></td>
		  <td>{{$e->country}}</td>
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

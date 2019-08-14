@extends('layouts.default')
@section('title','网站公告')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        网站公告
        <small>Announcement</small>
      </h1>
    </section>


@include('shared._messages')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>进出口</th>
                  <th>企业</th>
                  <th>货品</th>
                  <th>数量</th>
		  <th>总额</th>
		  <th>国家/地区</th>
                </tr>
		</thead>
		@if ($data->first())
		<tbody>
		@foreach ($data as $e)
		{{-- {{dd($e)}} --}}
                <tr>
                  <td>{{$e->imex}}</td>
                  <td>{{$e->enterprise}}</td>
                  <td>{{$e->hs_name}}</td>
                  <td>{{$e->quantity}}</td>
		  <td>{{$e->value}}</td>
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

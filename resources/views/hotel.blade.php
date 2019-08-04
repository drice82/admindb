@extends('layouts.default')
@section('title','2000W酒店数据')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        20000W酒店数据
        <small>2000W Hotel info</small>
      </h1>
    </section>


@include('shared._messages')

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">输入姓名</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <form class="search-form">
                <div class="col-xs-5">
                  <input type="text" name="name" class="form-control" placeholder="姓名">
                </div>
                <div class="input-group-btn">
                  <button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i>
                  </button>
                </div>
		</form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>姓名</th>
                  <th>身份证</th>
                  <th>性别</th>
                  <th>出生日期</th>
                  <th>地址</th>
                  <th>手机</th>
                  <th>时间</th>
                </tr>
                </thead>

                @if ($data->first())
                <tbody>
                @foreach ($data as $element)
                {{-- {{dd($element)}} --}}
                  <tr>
                  <td>{{$element->Name}}</td>
                  <td>{{$element->CtfId}}</td>
                  <td>{{$element->Gender}}</td>
                  <td>{{$element->Birthday}}</td>
                  <td>{{$element->Address}}</td>
                  <td>{{$element->Mobile}}</td>
                  <td>{{$element->Version}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="mt-3"> 
                {!! $data->render() !!}
              </div>
              @else
              <tbody>
                <tr><div class="text-center"><h3>没有查到相关数据！</h3></div></tr>
              </tbody>
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

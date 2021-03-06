@extends('layouts.default')
@section('title','用户资料')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户资料
        <small>User Profile</small>
      </h1>
    </section>


@include('shared._messages')

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">修改资料</h3>
            </div>
            <!-- /.box-header -->
	    @include('shared._errors')
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('users.update', Auth::user()->id )}}">
	      {{ method_field('PATCH') }}
	      {{ csrf_field() }}

              <div class="box-body">
                <div class="form-group">
                  <label for="oldpassword">请先输入当前密码</label>
                  <input type="password" name="oldpassword" class="form-control" id="inputOldPassword" placeholder="输入当前密码">
                </div>
		<p> </p>
                <div class="form-group">
                  <label for="inputEmail1">邮箱
		  @if ( Auth::user()->activated ==0)
		     <small class="label pull-right bg-red">（未激活）</small>
		  @else
		     <small class="label pull-right bg-green">（已确认）</small>
		  @endif
		  </label>
                  <input type="email" name="email" class="form-control" id="inputEmail1" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                  <label for="inputName">昵称</label>
                  <input type="text" name="name" class="form-control" id="inputName" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                  <label for="password">新密码</label>
                  <input type="password" name="password" class="form-control" id="inputPassword" placeholder="输入新密码">
                </div>
                <div class="form-group">
                  <label for="password_confirmation">再次输入新密码</label>
                  <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirmation" placeholder="再次输入新密码">
                </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

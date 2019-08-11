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
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">{{ Auth::user()->email }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>用户等级</b> <a class="pull-right">
                    @if ( Auth::user()->activated ==0 )
                        <small class="label pull-right bg-red">未激活用户</small>
		    @elseif ( Auth::user()->type ==1)
			<small class="label pull-right bg-green">金牌会员</small>
		    @else
			<small class="label pull-right bg-yellow">普通会员</small>
		    @endif
		  </a>
                </li>
                <li class="list-group-item">
                  <b>等级有效期</b> <a class="pull-right">
                    @if ( Auth::user()->activated ==1 and Auth::user()->type ==1)
			{{ Auth::user()->expire_time }}
                    @endif
		  </a>
                </li>
                <li class="list-group-item">
                  <b>查询点数</b> <a class="pull-right">
                    @if ( Auth::user()->activated ==0 )
                        请验证邮箱获得查询点数
                    @elseif ( Auth::user()->type ==1)
                        无限制
                    @else
                        {{ Auth::user()->point }}
                    @endif
		  </a>
                </li>
                <li class="list-group-item">
                  <b>账户余额</b> <a class="pull-right">
                    {{ sprintf("%.2f", Auth::user()->balance) }} ￥
                  </a>
                </li>
              </ul>

              <a href="{{ route('recharge') }}" class="btn btn-primary btn-block"><b>升级/续费金牌会员</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">网站公告</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <p>
		    {{ $content }}
                  </p>
                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

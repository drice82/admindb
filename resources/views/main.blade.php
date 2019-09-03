<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>BZINFO</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
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
                    <option value="1" @if (old('imex')=="1") selected @endif>进口</option>
                    <option value="0" @if (old('imex')=="0") selected @endif>出口</option>
                  </select>
                </div>

		<div class="col-xs-4">
                  <input type="text" name="enterprise" class="form-control" placeholder="输入完整中文企业名称，%号代替任意长度的字符" value="{{old('enterprise')}}">
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
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>进出口总额</th>
                  <th>出口总额</th>
                  <th>进口总额</th>
                  <th>itme1</th>
                  <th>item2</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td> USD</td>
                  <td> USD</td>
                  <td> USD</td>
                  <td> </td>
                  <td> </td>
                </tr>
                </tbody>
              </table>
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
		  <td><b class="pull-right">@if ($e->quantity==0) {{$e->value}} @else {{round($e->value/$e->quantity,2)}} @endif <i class="fa fa-fw fa-usd"></i></b></td>
		  <td><b class="pull-right">{{$e->quantity}}</b></td>
		  <td>{{DB::table('info_unit_code')->where ('code', DB::table('hs_2016')->where('hs', 'like', $e->hs_id . '__')->value('unit1'))->value('name')}}</td>
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
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

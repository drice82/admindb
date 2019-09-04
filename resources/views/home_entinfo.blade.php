@extends('homepages.default')
@section('title', '企业进出口总额查询')
@section('content')
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          企业进出口总额查询
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

		<div class="col-xs-6">
                  <input type="text" name="enterprise" class="form-control" placeholder="输入中文企业名称" value="{{old('enterprise')}}">
                </div>
		<div class="col-xs-4">
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
                  <th>年份</th>
                  <th>进口总额</th>
                  <th>同比</th>
                  <th>出口总额</th>
                  <th>同比</th>
                </tr>
                </thead>
		<tbody>
		@if (!empty($data))
		<tr>
                  <td>2016年</td>
                  <td>{{ $data['cn_2016_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2016_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2015年</td>
                  <td>{{ $data['cn_2015_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2015_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2014年</td>
                  <td>{{ $data['cn_2014_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2014_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2013年</td>
                  <td>{{ $data['cn_2013_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2013_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2012年</td>
                  <td>{{ $data['cn_2012_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2012_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2011年</td>
                  <td>{{ $data['cn_2011_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2011_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2010年</td>
                  <td>{{ $data['cn_2010_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2010_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2009年</td>
                  <td>{{ $data['cn_2009_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2009_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2008年</td>
                  <td>{{ $data['cn_2008_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2008_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2007年</td>
                  <td>{{ $data['cn_2007_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2007_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2006年</td>
                  <td>{{ $data['cn_2006_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2006_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2005年</td>
                  <td>{{ $data['cn_2005_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2005_ex']}} USD </td>
                  <td> %</td>
		</tr>
	        <td>2004年</td>
                  <td>{{ $data['cn_2004_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2004_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2003年</td>
                  <td>{{ $data['cn_2003_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2003_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2002年</td>
                  <td>{{ $data['cn_2002_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2002_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2001年</td>
                  <td>{{ $data['cn_2001_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2001_ex']}} USD </td>
                  <td> %</td>
		</tr>
		<tr>
                  <td>2000年</td>
                  <td>{{ $data['cn_2000_im']}} USD</td>
                  <td> %</td>
                  <td>{{ $data['cn_2000_ex']}} USD </td>
                  <td> %</td>
		</tr>
				
		@endif
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

   </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
@endsection

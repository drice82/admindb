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
                  <input type="text" name="enterprise" class="form-control" placeholder="输入完整中文企业名称（必填）" value="{{old('enterprise')}}">
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
                  <th>年度</th>
                  <th>进口总额</th>
                  <th>同比增长</th>
                  <th>出口总额</th>
                  <th>同比增长</th>
                </tr>
                </thead>
		<tbody>
		@if (!empty($data))
		<tr>
                  <td>2016年</td>
                  <td>{{ number_format($data['cn_2016_im'],0)}} USD</td>
		  <td> @if ($data['cn_2015_im']==0) - % 
		  	@else
			  @if ($data['cn_2016_im']>$data['cn_2015_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2016_im']/$data['cn_2015_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2016_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2015_ex']==0) - % 
			@else 
			  @if ($data['cn_2016_ex']>$data['cn_2015_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2016_ex']/$data['cn_2015_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>
		<tr>
                  <td>2015年</td>
                  <td>{{ number_format($data['cn_2015_im'],0)}} USD</td>
		  <td> @if ($data['cn_2014_im']==0) - % 
		  	@else
			  @if ($data['cn_2015_im']>$data['cn_2014_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2015_im']/$data['cn_2014_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2015_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2014_ex']==0) - % 
			@else 
			  @if ($data['cn_2015_ex']>$data['cn_2014_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2015_ex']/$data['cn_2014_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2014年</td>
                  <td>{{ number_format($data['cn_2014_im'],0)}} USD</td>
		  <td> @if ($data['cn_2013_im']==0) - % 
		  	@else
			  @if ($data['cn_2014_im']>$data['cn_2013_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2014_im']/$data['cn_2013_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2014_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2013_ex']==0) - % 
			@else 
			  @if ($data['cn_2014_ex']>$data['cn_2013_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2014_ex']/$data['cn_2013_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2013年</td>
                  <td>{{ number_format($data['cn_2013_im'],0)}} USD</td>
		  <td> @if ($data['cn_2012_im']==0) - % 
		  	@else
			  @if ($data['cn_2013_im']>$data['cn_2012_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2013_im']/$data['cn_2012_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2013_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2012_ex']==0) - % 
			@else 
			  @if ($data['cn_2013_ex']>$data['cn_2012_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2013_ex']/$data['cn_2012_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2012年</td>
                  <td>{{ number_format($data['cn_2012_im'],0)}} USD</td>
		  <td> @if ($data['cn_2011_im']==0) - % 
		  	@else
			  @if ($data['cn_2012_im']>$data['cn_2011_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2012_im']/$data['cn_2011_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2012_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2011_ex']==0) - % 
			@else 
			  @if ($data['cn_2012_ex']>$data['cn_2011_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2012_ex']/$data['cn_2011_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>
		<tr>
                  <td>2011年</td>
                  <td>{{ number_format($data['cn_2011_im'],0)}} USD</td>
		  <td> @if ($data['cn_2010_im']==0) - % 
		  	@else
			  @if ($data['cn_2011_im']>$data['cn_2010_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2011_im']/$data['cn_2010_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2011_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2010_ex']==0) - % 
			@else 
			  @if ($data['cn_2011_ex']>$data['cn_2010_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2011_ex']/$data['cn_2010_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2010年</td>
                  <td>{{ number_format($data['cn_2010_im'],0)}} USD</td>
		  <td> @if ($data['cn_2009_im']==0) - % 
		  	@else
			  @if ($data['cn_2010_im']>$data['cn_2009_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2010_im']/$data['cn_2009_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2010_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2009_ex']==0) - % 
			@else 
			  @if ($data['cn_2010_ex']>$data['cn_2009_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2010_ex']/$data['cn_2009_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>
		<tr>
                  <td>2009年</td>
                  <td>{{ number_format($data['cn_2009_im'],0)}} USD</td>
		  <td> @if ($data['cn_2008_im']==0) - % 
		  	@else
			  @if ($data['cn_2009_im']>$data['cn_2008_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2009_im']/$data['cn_2008_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2009_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2008_ex']==0) - % 
			@else 
			  @if ($data['cn_2009_ex']>$data['cn_2008_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2009_ex']/$data['cn_2008_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2008年</td>
                  <td>{{ number_format($data['cn_2008_im'],0)}} USD</td>
		  <td> @if ($data['cn_2007_im']==0) - % 
		  	@else
			  @if ($data['cn_2008_im']>$data['cn_2007_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2008_im']/$data['cn_2007_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2008_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2007_ex']==0) - % 
			@else 
			  @if ($data['cn_2008_ex']>$data['cn_2007_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2008_ex']/$data['cn_2007_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>


		<tr>
                  <td>2007年</td>
                  <td>{{ number_format($data['cn_2007_im'],0)}} USD</td>
		  <td> @if ($data['cn_2006_im']==0) - % 
		  	@else
			  @if ($data['cn_2007_im']>$data['cn_2006_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2007_im']/$data['cn_2006_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2007_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2006_ex']==0) - % 
			@else 
			  @if ($data['cn_2007_ex']>$data['cn_2006_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2007_ex']/$data['cn_2006_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>


		<tr>
                  <td>2006年</td>
                  <td>{{ number_format($data['cn_2006_im'],0)}} USD</td>
		  <td> @if ($data['cn_2005_im']==0) - % 
		  	@else
			  @if ($data['cn_2006_im']>$data['cn_2005_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2006_im']/$data['cn_2005_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2006_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2005_ex']==0) - % 
			@else 
			  @if ($data['cn_2006_ex']>$data['cn_2005_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2006_ex']/$data['cn_2005_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2005年</td>
                  <td>{{ number_format($data['cn_2005_im'],0)}} USD</td>
		  <td> @if ($data['cn_2004_im']==0) - % 
		  	@else
			  @if ($data['cn_2005_im']>$data['cn_2004_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2005_im']/$data['cn_2004_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2005_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2004_ex']==0) - % 
			@else 
			  @if ($data['cn_2005_ex']>$data['cn_2004_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2005_ex']/$data['cn_2004_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2004年</td>
                  <td>{{ number_format($data['cn_2004_im'],0)}} USD</td>
		  <td> @if ($data['cn_2003_im']==0) - % 
		  	@else
			  @if ($data['cn_2004_im']>$data['cn_2003_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2004_im']/$data['cn_2003_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2004_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2003_ex']==0) - % 
			@else 
			  @if ($data['cn_2004_ex']>$data['cn_2003_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2004_ex']/$data['cn_2003_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>


		<tr>
                  <td>2003年</td>
                  <td>{{ number_format($data['cn_2003_im'],0)}} USD</td>
		  <td> @if ($data['cn_2002_im']==0) - % 
		  	@else
			  @if ($data['cn_2003_im']>$data['cn_2002_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2003_im']/$data['cn_2002_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2003_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2002_ex']==0) - % 
			@else 
			  @if ($data['cn_2003_ex']>$data['cn_2002_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2003_ex']/$data['cn_2002_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>


		<tr>
                  <td>2002年</td>
                  <td>{{ number_format($data['cn_2002_im'],0)}} USD</td>
		  <td> @if ($data['cn_2001_im']==0) - % 
		  	@else
			  @if ($data['cn_2002_im']>$data['cn_2001_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2002_im']/$data['cn_2001_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2002_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2001_ex']==0) - % 
			@else 
			  @if ($data['cn_2002_ex']>$data['cn_2001_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2002_ex']/$data['cn_2001_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2001年</td>
                  <td>{{ number_format($data['cn_2001_im'],0)}} USD</td>
		  <td> @if ($data['cn_2000_im']==0) - % 
		  	@else
			  @if ($data['cn_2001_im']>$data['cn_2000_im']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2001_im']/$data['cn_2000_im']-1)*100)) }}% </span>
			@endif </td>
                  <td>{{ number_format($data['cn_2001_ex'],0)}} USD </td>
		  <td> @if ($data['cn_2000_ex']==0) - % 
			@else 
			  @if ($data['cn_2001_ex']>$data['cn_2000_ex']) <span class="description-percentage text-red"><i class="fa fa-caret-up"></i> @else <span class="description-percentage text-green"><i class="fa fa-caret-down"></i> @endif {{sprintf("%01.2f",(($data['cn_2001_ex']/$data['cn_2000_ex']-1)*100)) }}% </span>
			@endif </td>
		</tr>

		<tr>
                  <td>2000年</td>
                  <td>{{ number_format($data['cn_2000_im'],0)}} USD</td>
                  <td>- %</td>
                  <td>{{ number_format($data['cn_2000_ex'],0)}} USD </td>
                  <td>- %</td>
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

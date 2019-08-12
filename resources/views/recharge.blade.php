@extends('layouts.default')
@section('title','会员充值')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        会员充值
        <small>Payment</small>
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
          <!-- general form elements disabled -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-key"></i>
              <h3 class="box-title">金牌会员开通续费</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <form id="zcypay" role="form" action="/payment/payzcy" target="_blank" method="get">
		<li> 如遇支付通道维护，请改用其他平台或另一个支付通道。</li>

                <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="{{ getenv('PAY_FEE1') }}" checked>
                      金牌会员一季度（30天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="{{ getenv('PAY_FEE2') }}" checked>
                      金牌会员一季度（90天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="{{ getenv('PAY_FEE3') }}">
                      金牌会员半年（182天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="{{ getenv('PAY_FEE4') }}">
                      金牌会员一年（365天）
                    </label>
                  </div>
                </div>

                <!-- select -->
                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control" name="type" >
                    <option value="alipay">支付宝</option>
                    <option value="wxpay">微信</option>
                    <option value="qqpay">QQ支付</option>
                  </select>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-reorder"></i>
 	      <h3 class="box-title">订单记录</h3>
            </div>
            <!-- /.box-header -->
	    <div class="box-body">
	      <table class="table table-bordered">
                <tr>
                  <th>支付时间</th>
                  <th>金额</th>
                  <th style="width: 80px">支付方式</th>
                  <th style="width: 40px">状态</th>
		</tr>
		@if ($data->first())
		@foreach ($data as $element)
		{{-- {{dd($element)}} --}}
                <tr>
                  <td>{{$element->created_at}}</td>
                  <td>{{sprintf("%.2f", $element->money)}}元</td>
                  <td>{{$element->payment_type}}</td>
                  <td><span class="badge bg-green">完成</span></td>
		</tr>
	        @endforeach
	      </table>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
	      <ul class="pagination pagination-sm no-margin pull-right">
		{!! $data->render() !!}
              </ul>
	    </div>
	    @else
	    @endif
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

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
                      <input type="radio" name="WIDtotal_fee" value="1" checked>
                      金牌会员一季度（30天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="2" checked>
                      金牌会员一季度（90天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="3">
                      金牌会员半年（182天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="WIDtotal_fee" value="4">
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
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

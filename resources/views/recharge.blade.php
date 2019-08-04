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
              <h3 class="box-title">高级会员开通续费</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
		<li> 如遇支付通道维护，请改用其他平台或另一个支付通道。</li>

                <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="90" checked>
                      付费会员一季度（90天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="182">
                      付费会员半年（182天）
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="365" disabled>
                      付费会员一年（365天）
                    </label>
                  </div>
                </div>

                <!-- select -->
                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control">
                    <option>支付宝</option>
                    <option>微信</option>
                    <option>QQ支付</option>
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

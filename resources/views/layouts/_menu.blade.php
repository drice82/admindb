  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">用户菜单</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('announcement') }}"><i class="fa fa-bullhorn"></i> <span>网站公告</span></a></li>
        <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> <span>用户资料</span></a></li>
        <li><a href="{{ route('recharge') }}"><i class="fa fa-usd"></i> <span>会员充值</span></a></li>
	<li class="header">信息库</li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-bar-chart"></i> <span>中国海关进出口数据</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
	  <ul class="treeview-menu">
	    <li><a href="{{ route('cn2014') }}">2000-2016年</a></li>
            <li><a href="#">数据查询</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-bar-chart"></i> <span>美国海关数据</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">2018年</a></li>
            <li><a href="#">2017年</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-bar-chart"></i> <span>日本海关数据</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">2018年</a></li>
            <li><a href="#">2017年</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa  fa-bar-chart"></i> <span>德国海关数据</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">2018年</a></li>
            <li><a href="#">2017年</a></li>
          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

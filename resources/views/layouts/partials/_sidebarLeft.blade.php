<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/uploads/logos/{{Auth::user()->logo}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="{{route('recherche','Rechercher un vehicule')}}" method="post" role="search" class="sidebar-form">
      @csrf
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search a car...">
        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{url('reporting')}}"><i class="fa fa-dashboard"></i>
          <span>Reporting</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Clients</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/client"><i class="fa fa-circle-o"></i> Consultation</a></li>
          <li class="active"><a href="/fideles"><i class="fa fa-circle-o"></i> Fidelisation</a></li>
        </ul>
      </li>
      <li>
        <a href="/lavage">
          <i class="fa fa-th"></i> <span>Lavages types</span>
          <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
        </a>
      </li>
      <li>
        <a href="/vehicule">
          <i class="fa fa-pie-chart"></i>
          <span>Vehicules</span>
        </a>
      </li>
      <li class="treeview active">
        <a href="#">
          <i class="fa fa-share"></i> <span>Passages</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Enregistrement
              <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
            </a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Consulter
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Today</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Cars wosh
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> By Categorie</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> By Day</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> By Month</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> By Year</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
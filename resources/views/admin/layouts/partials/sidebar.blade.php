<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{Gravatar::get(user()->email)}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ user()->name }}</p>
                    <!-- Status -->
                    @if(user()->isOnline())
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    @else
                        <a href="#"><i class="fa fa-circle text-default"></i> Offline</a>
                    @endif
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @include('admin.layouts.partials.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

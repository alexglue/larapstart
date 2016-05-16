<li class="{{ Request::is('/generator_builder*') ? 'active' : '' }}">
    <a href="/generator_builder"><i class="fa fa-edit"></i><span>Generator Builder</span></a>
</li>
<li class="header">HEADER</li>
<!-- Optionally, you can add icons to the links -->
<li class="active"><a href="{{ url('/admin') }}"><i class='fa fa-link'></i> <span>Home</span></a></li>
<li><a href="#"><i class='fa fa-link'></i> <span>Another Link</span></a></li>
<li class="treeview">
    <a href="#"><i class='fa fa-link'></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="#">Link in level 2</a></li>
        <li><a href="#">Link in level 2</a></li>
    </ul>
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>


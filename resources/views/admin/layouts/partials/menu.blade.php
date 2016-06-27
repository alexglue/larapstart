<li class="header">HEADER</li>
<li class="treeview">
    <a href="#"><i class='fa fa-link'></i> <span>Users and permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i><span>Users</span></a>
        </li>
        <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
            <a href="{{ route('admin.roles.index') }}"><i class="fa fa-user"></i><span>Roles</span></a>
        </li>
    </ul>
</li>


<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>


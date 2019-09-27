<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">EMS</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.adminuser.index' ? 'active' : '' }}" 
            href="{{ route('admin.adminuser.index') }}">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">Admin</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">Setup</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.departments.index' ? 'active' : '' }}"
                        href="{{ route('admin.departments.index') }}">
                        <i class="app-menu__icon fa fa-building" aria-hidden="true"></i>
                        <span class="app-menu__label">Department</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.city.index' ? 'active' : '' }}"
                        href="{{ route('admin.city.index') }}">
                        <i class="app-menu__icon fa fa-map-marker"></i>
                        <span class="app-menu__label">City</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.country.index' ? 'active' : '' }}"
                        href="{{ route('admin.country.index') }}">
                        <i class="app-menu__icon fa fa-globe"></i>
                        <span class="app-menu__label">Country</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.salary.index' ? 'active' : '' }}"
                        href="{{ route('admin.salary.index') }}">
                        <i class="app-menu__icon fa fa-usd"></i>
                        <span class="app-menu__label">Salary</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.state.index' ? 'active' : '' }}"
                        href="{{ route('admin.state.index') }}">
                        <i class="app-menu__icon fa fa-building-o"></i>
                        <span class="app-menu__label">State</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.division.index' ? 'active' : '' }}"
                        href="{{ route('admin.division.index') }}">
                        <i class="app-menu__icon fa fa-area-chart"></i>
                        <span class="app-menu__label">Division</span>
                        </a>
                    </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.employees.index' ? 'active' : '' }}"
                href="{{ route('admin.employees.index') }}">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Employees</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.report.index' ? 'active' : '' }}"
                href="{{ route('admin.report.index') }}">
                <i class="app-menu__icon fa fa-file-o"></i>
                <span class="app-menu__label">Report</span>
            </a>
        </li>
    </ul>
</aside>
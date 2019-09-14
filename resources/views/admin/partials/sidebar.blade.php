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
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.departments.index' ? 'active' : '' }}"
            href="{{ route('admin.departments.index') }}">
            <i class="app-menu__icon fa fa-tags"></i>
            <span class="app-menu__label">Department</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.city.index' ? 'active' : '' }}"
            href="{{ route('admin.city.index') }}">
            <i class="app-menu__icon fa fa-tags"></i>
            <span class="app-menu__label">City</span>
            </a>
        </li>
    </ul>
</aside>
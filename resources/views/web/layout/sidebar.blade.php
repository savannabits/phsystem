<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('savannabits/admin-ui::admin.sidebar.content') }}</li>
{{--           <li class="nav-item"><a class="nav-link" href="{{ url('menu-items') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.menu-item.title') }}</a></li>--}}
           <li class="nav-item"><a class="nav-link" href="{{ url('ph-classes') }}"><i class="nav-icon icon-book-open"></i> {{ trans('Classes') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('children') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.child.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('enrollments') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.enrollment.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('lessons') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.lesson.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('roll-calls') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.roll-call.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('attendances') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.attendance.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('lesson-resources') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.lesson-resource.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('general-resources') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.general-resource.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('relationship-types') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.relationship-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('relatives') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.relative.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle font-weight-bolder text-warning" href="#">
                    <i class="nav-icon cui-puzzle text-danger"></i> Basic Data
                </a>
                <ul class="nav-dropdown-items">
                    {{--Paste here--}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('attendance-statuses') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.attendance-status.title') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('resource-types') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.resource-type.title') }}</a></li>
                </ul>
            </li>

            <li class="nav-title">{{ trans('savannabits/admin-ui::admin.sidebar.settings') }}</li>
            @can("user.index")
            <li class="nav-item"><a class="nav-link" href="{{ url('users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage users') }}</a></li>
            @endcan
            @can("role.index")
            <li class="nav-item"><a class="nav-link" href="{{ url('roles') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('Roles') }}</a></li>
            @endcan
            @can("permission.index")
            <li class="nav-item"><a class="nav-link" href="{{ url('permissions') }}"><i class="nav-icon icon-graduation"></i> {{ trans('Permissions') }}</a></li>
            @endcan
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
            @can("setting.index")
            <li class="nav-item"><a class="nav-link" href="{{ url('settings') }}"><i class="nav-icon icon-plane"></i> {{ trans('Settings') }}</a></li>
            @endcan
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

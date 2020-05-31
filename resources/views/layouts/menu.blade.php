<ul class="sidebar-menu tree" data-widget="tree">
    <li class="header">GESTION AUTORISATIONS</li>


    <li class="{{ Request::is('users*') ? 'active' : '' }}"> <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i>
            <span>Users</span>
            <span class="pull-right-container">
                <span class="label label-primary pull-right">{{ (Auth::user()->id) }}</span>
            </span>
        </a>
    </li>
<li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a></li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissions.plural')</span></a>
</li>

<!--li class="{{-- Request::is('roleUsers*')?'active':'' --}}">
    <a href="{{-- route('roleUsers.index') --}}"><i class="fa fa-edit"></i><span>@lang('models/roleUsers.plural')</span></a>
</li>

<li class="{{ Request::is('permissionRoles*') ? 'active' : '' }}">
    <a href="{{ route('permissionRoles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissionRoles.plural')</span></a>
</li>

<li class="{{ Request::is('permissionUsers*') ? 'active' : '' }}">
    <a href="{{ route('permissionUsers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissionUsers.plural')</span></a>
</li-->



<li class="header">PARAMETRAGE ENTREPRISE</li>
        <li class="{{ Request::is('agences*') ? 'active' : '' }}">
            <a href="{{ route('agences.index') }}"><i class="fa fa-edit"></i><span>@lang('models/agences.plural')</span></a>
        </li>

        <li class="{{ Request::is('entreprises*') ? 'active' : '' }}">
            <a href="{{ route('entreprises.index') }}"><i class="fa fa-edit"></i><span>@lang('models/entreprises.plural')</span></a>
        </li>

        <li class="{{ Request::is('transporteurs*') ? 'active' : '' }}">
            <a href="{{ route('transporteurs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/transporteurs.plural')</span></a>
        </li>




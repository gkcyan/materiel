<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('sites*') ? 'active' : '' }}">
    <a href="{{ route('sites.index') }}"><i class="fa fa-edit"></i><span>@lang('models/sites.plural')</span></a>
</li>

<<<<<<< HEAD
<<<<<<< HEAD
@endrole<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissions.plural')</span></a>
</li>

<li class="{{ Request::is('roleUsers*') ? 'active' : '' }}">
    <a href="{{ route('roleUsers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roleUsers.plural')</span></a>
</li>

<li class="{{ Request::is('permissionUsers*') ? 'active' : '' }}">
    <a href="{{ route('permissionUsers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissionUsers.plural')</span></a>
</li>

<li class="{{ Request::is('permissionRoles*') ? 'active' : '' }}">
    <a href="{{ route('permissionRoles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissionRoles.plural')</span></a>
</li>

<li class="{{ Request::is('entrepriseFieldsFile=entreprises*') ? 'active' : '' }}">
    <a href="{{ route('entrepriseFieldsFile=entreprises.index') }}"><i class="fa fa-edit"></i><span>@lang('models/entrepriseFieldsFile=entreprises.plural')</span></a>
</li>

=======
>>>>>>> parent of 9dad59a... DU_terminé
=======
>>>>>>> parent of 9dad59a... DU_terminé

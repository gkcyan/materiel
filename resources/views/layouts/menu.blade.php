<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('sites*') ? 'active' : '' }}">
    <a href="{{ route('sites.index') }}"><i class="fa fa-edit"></i><span>@lang('models/sites.plural')</span></a>
</li>


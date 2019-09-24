<li class="header" style="text-align: center;">MAIN NAVIGATION</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>User</span></a>
</li>

<li class="{{ Request::is('subjects*') ? 'active' : '' }}">
    <a href="{!! route('subjects.index') !!}"><i class="fa fa-edit"></i><span>Subject</span></a>
</li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profile</span></a>
</li>

<li class="{{ Request::is('followers*') ? 'active' : '' }}">
    <a href="{!! route('followers.index') !!}"><i class="fa fa-edit"></i><span>Follower</span></a>
</li>

<li class="{{ Request::is('donasis*') ? 'active' : '' }}">
    <a href="{!! route('donasis.index') !!}"><i class="fa fa-edit"></i><span>Donasi</span></a>
</li>


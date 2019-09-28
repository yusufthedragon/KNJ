<li class="header" style="text-align: center;">MAIN NAVIGATION</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>User</span></a>
</li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profile</span></a>
</li>

<li class="{{ Request::is('contacts*') ? 'active' : '' }}">
    <a href="{!! route('contacts.index') !!}"><i class="fa fa-edit"></i><span>Contacts</span></a>
</li>

<li class="{{ Request::is('divisis*') ? 'active' : '' }}">
    <a href="{!! route('divisis.index') !!}"><i class="fa fa-edit"></i><span>Divisis</span></a>
</li>

<li class="{{ Request::is('projects*') ? 'active' : '' }}">
    <a href="{!! route('projects.index') !!}"><i class="fa fa-edit"></i><span>Projects</span></a>
</li>

<li class="{{ Request::is('about-us*') ? 'active' : '' }}">
    <a href="{!! route('about-us.index') !!}"><i class="fa fa-edit"></i><span>About Us</span></a>
</li>

<li class="{{ Request::is('kepengurusans*') ? 'active' : '' }}">
    <a href="{!! route('kepengurusans.index') !!}"><i class="fa fa-edit"></i><span>Kepengurusans</span></a>
</li>

<li class="{{ Request::is('followers*') ? 'active' : '' }}">
    <a href="{!! route('followers.index') !!}"><i class="fa fa-edit"></i><span>Followers</span></a>
</li>

<li class="{{ Request::is('donasis*') ? 'active' : '' }}">
    <a href="{!! route('donasis.index') !!}"><i class="fa fa-edit"></i><span>Donasis</span></a>
</li>

<li class="{{ Request::is('artikels*') ? 'active' : '' }}">
    <a href="{!! route('artikels.index') !!}"><i class="fa fa-edit"></i><span>Artikels</span></a>
</li>


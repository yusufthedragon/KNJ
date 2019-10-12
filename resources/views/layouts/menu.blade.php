<li class="header" style="text-align: center;">MAIN NAVIGATION</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user-circle"></i><span>User</span></a>
</li>

<li class="{{ Request::is('contact*') ? 'active' : '' }}">
    <a href="{!! route('contact.index') !!}"><i class="fa fa-address-book"></i><span>Contact</span></a>
</li>

<li class="{{ Request::is('divisi*') ? 'active' : '' }}">
    <a href="{!! route('divisi.index') !!}"><i class="fa fa-building"></i><span>Divisi</span></a>
</li>

<li class="{{ Request::is('project*') ? 'active' : '' }}">
    <a href="{!! route('project.index') !!}"><i class="fa fa-tasks"></i><span>Project</span></a>
</li>

<li class="{{ Request::is('about_us*') ? 'active' : '' }}">
    <a href="{!! route('about_us.index') !!}"><i class="fa fa-info-circle"></i><span>Tentang Kami</span></a>
</li>

<li class="{{ Request::is('kepengurusan*') ? 'active' : '' }}">
    <a href="{!! route('kepengurusan.index') !!}"><i class="fa fa-sitemap"></i><span>Kepengurusan</span></a>
</li>

<li class="{{ Request::is('followers*') ? 'active' : '' }}">
    <a href="{!! route('followers.index') !!}"><i class="fa fa-users"></i><span>Followers</span></a>
</li>

<li class="{{ Request::is('donasi*') ? 'active' : '' }}">
    <a href="{!! route('donasi.index') !!}"><i class="fa fa-dollar"></i><span>Donasi</span></a>
</li>

<li class="{{ Request::is('artikel*') ? 'active' : '' }}">
    <a href="{!! route('artikel.index') !!}"><i class="fa fa-newspaper-o"></i><span>Artikel</span></a>
</li>


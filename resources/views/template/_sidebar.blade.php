<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar mx-auto" height="100" src="{{ asset('assets/images/logo/'.setting('logo')) }}" alt="User Image"></div>
	<ul class="app-menu">
		<li><a class="app-menu__item {{ Request::url() == route('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
		@if(Auth::user()->role == role('super-admin') || Auth::user()->role == role('admin'))
		<li><a class="app-menu__item {{ is_int(strpos(Request::url(), route('admin.user.index'))) ? 'active' : '' }}" href="{{ route('admin.user.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User</span></a></li>
		@endif
		@if(Auth::user()->role == role('super-admin'))
		<li><a class="app-menu__item {{ strpos(Request::url(), '/admin/pengaturan') ? 'active' : '' }}" href="/admin/pengaturan"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Pengaturan</span></a></li>
		@endif
		@if(Auth::user()->role == role('super-admin') || Auth::user()->role == role('admin'))
		<li class="app-menu__submenu"><span class="app-menu__label">Report</span></li>
		<li><a class="app-menu__item {{ strpos(Request::url(), '/admin/absensi') ? 'active' : '' }}" href="/admin/absensi"><i class="app-menu__icon fa fa-clipboard"></i><span class="app-menu__label">Absensi</span></a></li>
		@endif
		@if(Auth::user()->role == role('super-admin') || Auth::user()->role == role('admin'))
		<li class="app-menu__submenu"><span class="app-menu__label">Master</span></li>
		<li><a class="app-menu__item {{ is_int(strpos(Request::url(), route('admin.group.index'))) ? 'active' : '' }}" href="{{ route('admin.group.index') }}"><i class="app-menu__icon fa fa-dot-circle-o"></i><span class="app-menu__label">Grup</span></a></li>
		<li><a class="app-menu__item {{ is_int(strpos(Request::url(), route('admin.office.index'))) ? 'active' : '' }}" href="{{ route('admin.office.index') }}"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Kantor</span></a></li>
		<li><a class="app-menu__item {{ is_int(strpos(Request::url(), route('admin.position.index'))) ? 'active' : '' }}" href="{{ route('admin.position.index') }}"><i class="app-menu__icon fa fa-refresh"></i><span class="app-menu__label">Jabatan</span></a></li>
		<li><a class="app-menu__item {{ strpos(Request::url(), '/admin/jam-kerja') ? 'active' : '' }}" href="/admin/jam-kerja"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Jam Kerja</span></a></li>
		@endif
	</ul>
</aside>
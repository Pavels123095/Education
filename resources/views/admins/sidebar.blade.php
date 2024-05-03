<aside id="sidebar" class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('/assets/images/logo.png')}}"
             alt="AdminLTE Logo"
             class="brand-image img">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('admins.menu')
            </ul>
        </nav>
    </div>

</aside>

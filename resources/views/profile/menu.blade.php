<!-- need to remove -->
    <li class="nav-item">
        <a href="{{ route('profiles') }}" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Главная</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>Материалы <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('lessons') }}" class="nav-link {{ Request::is('profile/lessons') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Лекции</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tasks') }}" class="nav-link {{ Request::is('profile/tasks') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Задания</p>
                </a>
            </li>
            @if(auth()->user()->hasRole('teacher'))
                <li class="nav-item">
                    <a href="{{route('filesystem')}}" class="nav-link {{ Request::is('profile/filesystem') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Файлы</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
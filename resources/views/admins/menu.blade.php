<!-- need to remove -->
@guest('admin')
    <li class="nav-item">
        <a href="{{ route('adminpanel') }}" class="nav-link {{ Request::is('adminpanel') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Главная</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>Пользователи <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('teachers.index') }}" class="nav-link {{ Request::is('adminpanel/teachers') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Преподаватели</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('students') }}" class="nav-link {{ Request::is('adminpanel/students') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>Студенты</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('groups.index') }}" class="nav-link {{ Request::is('adminpanel/groups') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Список групп</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>Материалы <i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('lessons.index') }}" class="nav-link {{ Request::is('adminpanel/lessons') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Лекции</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('filesystem')}}" class="nav-link {{ Request::is('adminpanel/filesystem') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>Файлы</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{ route('pages.index') }}" class="nav-link {{ Request::is('adminpanel/pages') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Страницы</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('articles.index') }}" class="nav-link {{ Request::is('adminpanel/articles') ? 'active' : '' }}">
            <i class="nav-icon fa fa-file-text"></i>
            <p>Статьи</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('options.index') }}" class="nav-link {{ Request::is('adminpanel/options') ? 'active' : '' }}">
            <i class="nav-icon fas fa-gear"></i>
            <p>Главные настройки</p>
        </a>
    </li>
@endguest
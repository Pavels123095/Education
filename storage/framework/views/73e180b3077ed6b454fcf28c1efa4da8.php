<!-- need to remove -->
<?php if(auth()->guard('admin')->guest()): ?>
    <li class="nav-item">
        <a href="<?php echo e(route('adminpanel')); ?>" class="nav-link <?php echo e(Request::is('adminpanel') ? 'active' : ''); ?>">
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
                <a href="<?php echo e(route('teachers.index')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/teachers') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Преподаватели</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('students')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/students') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>Студенты</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('groups.index')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/groups') ? 'active' : ''); ?>">
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
                <a href="<?php echo e(route('lessons.index')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/lessons') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Лекции</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('filesystem')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/filesystem') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>Файлы</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('pages.index')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/pages') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Страницы</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('articles.index')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/articles') ? 'active' : ''); ?>">
            <i class="nav-icon fa fa-file-text"></i>
            <p>Статьи</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('options.index')); ?>" class="nav-link <?php echo e(Request::is('adminpanel/options') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-gear"></i>
            <p>Главные настройки</p>
        </a>
    </li>
<?php endif; ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/menu.blade.php ENDPATH**/ ?>
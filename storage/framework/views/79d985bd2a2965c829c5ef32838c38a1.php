<!-- need to remove -->
    <li class="nav-item">
        <a href="<?php echo e(route('profiles')); ?>" class="nav-link <?php echo e(Request::is('profile') ? 'active' : ''); ?>">
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
                <a href="<?php echo e(route('lessons')); ?>" class="nav-link <?php echo e(Request::is('profile/lessons') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Лекции</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('tasks')); ?>" class="nav-link <?php echo e(Request::is('profile/tasks') ? 'active' : ''); ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Задания</p>
                </a>
            </li>
            <?php if(auth()->user()->hasRole('teacher')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('filesystem')); ?>" class="nav-link <?php echo e(Request::is('profile/filesystem') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>Файлы</p>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/profile/menu.blade.php ENDPATH**/ ?>
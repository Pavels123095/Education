<?php $__env->startSection('title', 'Преподаватели'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список преподавателей</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary" data-toggle="modal" 
              data-target="#AddUser" href="<?php echo e(route('teachers.create')); ?>">Добавить</a>
          </div>
        </div><!-- /.row -->
        <?php if(session('success')): ?>
          <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-success show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header"><small class="mr-auto">закрыть</small>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="toast-body"><?php echo e(session('success')); ?></div>
            </div>
          </div>
        <?php endif; ?>
      </div><!-- /.container-fluid -->
    </div>
    <div class="container card">
      <div class="card-body">
        <?php if(!empty($teachers) && isset($teachers)): ?>
          <table class="table table-striped projects mt-1 mb-1">
              <thead>
                  <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 23%">ФИО</th>
                      <th style="width: 15%">E-mail</th>
                      <th style="width: 20%">Телефон</th>
                      <th style="width: 17%">Дата регистрации</th>
                      <th style="width: 15%"></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($teacher->id); ?></td>
                      <td><?php echo e($teacher->name); ?></td>
                      <td><a href="mailTo:<?php echo e($teacher->email); ?>"><?php echo e($teacher->email); ?></a></td>
                      <td>
                        <?php if($teacher->phone): ?> 
                          <a href="tel:<?php echo e($teacher->phone); ?>"><?php echo e($teacher->phone); ?></a> 
                        <?php else: ?> 
                          Не указан
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($teacher->created_at->format('d.m.Y H:i')); ?></td>
                      <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditUser<?php echo e($teacher->id); ?>"
                              href="<?php echo e(route('users.edit', $teacher->id)); ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="d-inline" method="post" action="<?php echo e(route('users.destroy', $teacher->id)); ?>">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                              <button class="btn-delete btn btn-danger btn-sm" type="submit">
                                  <i class="fas fa-trash"></i>
                              </button>
                            </form>
                      </td>
                      <?php echo $__env->make('admins.teachers.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
        <?php else: ?>
          <div class="container alert alert-info">Страницы еще не созданы</div>
        <?php endif; ?>

        <div class="col-12 pagination"><?php echo e($teachers->links()); ?></div>
      </div>
    </div>
    <?php echo $__env->make('admins.teachers.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/teachers/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Группы'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Все группы</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary " data-toggle="modal" data-target="#ModalGroup" href="<?php echo e(route('groups.create')); ?>">Добавить</a>
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
      <?php if(!empty($groups) && isset($groups)): ?>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">#</th>
                    <th style="width: 25%">Название</th>
                    <th style="width: 25%">Максимал. студентов</th>
                    <th style="width: 25%">Студентов в группе</th>
                    <th style="width: 25%"></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($group->id); ?></td>
                      <td>
                          <?php echo e($group->name); ?>

                          <br>
                          <small><?php echo e(date('d.m.Y h:i',strtotime($group->created_at))); ?></small>
                      </td>
                      <td>
                        <?php echo e($group->count_students_max); ?>

                      </td>
                      <td>
                        <?php echo e($real_students); ?>

                      </td>
                      <td class="project-actions text-right">
                          <?php echo $__env->make('admins.group.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <a class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#ModalGroupUpdate" href="<?php echo e(route('groups.edit', $group->id)); ?>">
                              <i class="fas fa-pencil-alt"></i>
                          </a>
                          <form class="d-inline" method="post" action="<?php echo e(route('groups.destroy', $group->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn-delete btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                          </form>
                      </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
      <?php else: ?>
        <div class="container alert alert-info">Страницы еще не созданы</div>
      <?php endif; ?>
      <?php echo $__env->make('admins.group.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/group/index.blade.php ENDPATH**/ ?>
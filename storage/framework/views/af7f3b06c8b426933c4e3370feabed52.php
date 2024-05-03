<?php $__env->startSection('title', 'Задания'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Список Заданий</h1>
        </div><!-- /.col -->
        <div class="col-3 ml-auto">
          <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalTask" href="#">Добавить</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container card">
    <?php if(!empty($tasks) && isset($tasks)): ?>
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Лекция</th>
                  <th style="width: 20%">Описание</th>
                  <th style="width: 5%" class="text-center">Статус</th>
                  <th style="width: 10%"></th>
              </tr>
          </thead>
          <tbody>
              <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($task->id); ?></td>
                    <td>
                        <?php echo e($task->name); ?>

                        <br>
                        <small><?php echo e(date('d.m.Y',strtotime($task->created_at))); ?></small>
                    </td>
                    <td>
                      <?php if($task->lesson): ?>
                        <a href="<?php echo e(route('lessons.edit', $task->lesson->id)); ?>">
                          <?php echo e($task->lesson->name); ?>

                        </a>
                      <?php else: ?>
                          Не привязана к лекции
                      <?php endif; ?>
                    </td>
                    <td class="project_progress">
                      <?php echo e($task_content = \Illuminate\Support\Str::words($task->description, 2)); ?>

                    </td>
                    <td class="project-state">
                        <?php if($task->active == 1): ?>
                          <span class="badge badge-success">Активное</span>
                        <?php else: ?>
                          <span class="badge badge-secondary">Неактивное</span>
                        <?php endif; ?>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#ModalTaskEdit_<?php echo e($task->id); ?>"  
                          href="<?php echo e(route('task.edit', $task->id )); ?>">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <?php echo $__env->make('admins.task.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form class="d-inline" method="post" action="<?php echo e(route('task.destroy', $task->id )); ?>">
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
      <?php echo e($tasks->links()); ?>

    <?php else: ?>
      <div class="container alert alert-info">Задания еще не созданы</div>
    <?php endif; ?>
  </div>
  <?php echo $__env->make('admins.task.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/task/index.blade.php ENDPATH**/ ?>
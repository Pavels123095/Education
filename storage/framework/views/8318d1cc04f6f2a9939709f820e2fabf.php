<?php $__env->startSection('title', 'Лекции'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Список Лекций</h1>
        </div><!-- /.col -->
        <div class="col-3 ml-auto">
          <a class="btn btn-sm btn-primary" href="<?php echo e(route('lessons.create')); ?>">Добавить</a>
          <a class="btn btn-sm btn-success" href="<?php echo e(route('task.index')); ?>">Задания</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container card">
    <?php if(!empty($lessons) && isset($lessons)): ?>
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Преподаватель</th>
                  <th style="width: 5%" class="text-center">Статус</th>
                  <th style="width: 10%"></th>
              </tr>
          </thead>
          <tbody>
              <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($lesson->id); ?></td>
                    <td>
                        <?php echo e($lesson->name); ?>

                        <br>
                        <small><?php echo e(date('d.m.Y',strtotime($lesson->created_at))); ?></small>
                    </td>
                    <td class="project_progress">
                      <?php if($lesson->teacher_id): ?>
                        <?php echo e($lesson->teacher_id); ?>

                      <?php else: ?>
                        <?php echo e('Лекция обобщенная'); ?>

                      <?php endif; ?>
                    </td>
                    <td class="project-state">
                        <?php if($lesson->status == 1): ?>
                          <span class="badge badge-success">Опубликовано</span>
                        <?php elseif($lesson->status == 2): ?>
                          <span class="badge badge-primary">Создано</span>
                        <?php else: ?>
                          <span class="badge badge-secondary">Черновик</span>
                        <?php endif; ?>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="<?php echo e(route('lessons.edit', $lesson->id)); ?>">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form class="d-inline" method="post" action="<?php echo e(route('lessons.destroy', $lesson->id)); ?>">
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
      <div class="container alert alert-info">Лекции еще не созданы</div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/lessons/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Студенты'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Список студентов</h1>
          </div><!-- /.col -->
          <div class="col-2 ml-auto">
            <a class="btn btn-sm btn-primary" data-toggle="modal" 
              data-target="#AddUser" href="<?php echo e(route('users.create')); ?>">Добавить</a>
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
      <div class="container px-2 py-2 card-header sortblock">
        <div class="col-2">
          <form class="form-inline text-center w100" method="GET" action="" id="GroupForm">
            <div class="form-group form-row">
              <label class="d-inline text-center mr-1" for="group">Выбрать по группам</label>
              <select name="group" class="w100 form-control form-control-sm" id="orderGroup">
                <option value="all" <?php echo e(!$request->query('group') ? 'selected' : ''); ?>>Все</option>
                <option <?php echo e($request->query('group') == 'not_group' ? 'selected' : ''); ?> 
                  value="not_group">Без группы</option>
                  <?php if(!empty($groups)): ?>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option <?php echo e($request->query('group') == $group->id ? 'selected' : ''); ?>  
                        value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </select>
            </div>
          </form>
        </div>
      </div>
      <div class="card-body">
        <?php if(!empty($students) && isset($students)): ?>
          <table class="table table-striped projects mt-1 mb-1">
              <thead>
                  <tr>
                      <th style="width: 1%">#</th>
                      <th style="width: 20%">ФИО</th>
                      <th style="width: 15%">E-mail</th>
                      <th style="width: 20%">Телефон</th>
                      <th style="width: 18%">Дата регистрации</th>
                      <th style="width: 15%">Группа</th>
                      <th style="width: 15%"></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($student->id); ?></td>
                      <td><?php echo e($student->name); ?></td>
                      <td><a href="mailTo:<?php echo e($student->email); ?>"><?php echo e($student->email); ?></a></td>
                      <td>
                        <?php if($student->phone): ?> 
                          <a href="tel:<?php echo e($student->phone); ?>"><?php echo e($student->phone); ?></a> 
                        <?php else: ?> 
                          Не указан
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($student->created_at->format('d.m.Y H:i')); ?></td>
                      <td><?php echo e(($student->group_id ? $student->group['name'] : 'Индивидуальное обучение')); ?></td>
                      <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditUser<?php echo e($student->id); ?>"
                              href="<?php echo e(route('users.edit', $student->id)); ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="d-inline" method="post" action="<?php echo e(route('users.destroy', $student->id)); ?>">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                              <button class="btn-delete btn btn-danger btn-sm" type="submit">
                                  <i class="fas fa-trash"></i>
                              </button>
                            </form>
                      </td>
                      <?php echo $__env->make('admins.users.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
        <?php else: ?>
          <div class="container alert alert-info">Страницы еще не созданы</div>
        <?php endif; ?>

        <div class="col-12 pagination"><?php echo e($students->links()); ?></div>
      </div>
    </div>
    <?php echo $__env->make('admins.users.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/students.blade.php ENDPATH**/ ?>
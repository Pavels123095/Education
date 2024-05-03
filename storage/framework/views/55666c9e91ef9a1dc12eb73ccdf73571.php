<?php $__env->startSection('title', 'Редактирование лекции'); ?>
<?php $__env->startSection('content'); ?>
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Лекция <?php echo e($lesson->name); ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php if(session('success')): ?>
          <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header"><small class="mr-auto">закрыть</small>
                <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="toast-body"><?php echo e(session('success')); ?></div>
            </div>
          </div>
        <?php endif; ?>
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
      <div class="card card-primary">
        <!-- form start -->
        <form action='<?php echo e(route('lessons.update', $lesson->id)); ?>' method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <div class="card-body">
            <div class="form-group">
              <input name="name" value="<?php echo e($lesson->name); ?>" type="text" class="form-control" id="namelessons" placeholder="Название Лекции" required>
            </div>
            <div class="form-group">
              <textarea rows="4" name="description" class="editor form-control col-lg-12" placeholder="Введите описание"><?php echo e($lesson->description); ?>

              </textarea>
            </div>
            <div class="form-group">
              <?php if(empty($tasks)): ?>
                <span data-toggle="modal" data-target="#ModalTask" class="btn btn-sm btn-primary">Добавить задание</span>
              <?php else: ?>
                <label>Выберите задания</label>
                <select rows="4" name="task_ids" class="form-control form-select" multiple>
                  <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($task->id); ?>"><?php echo e($task->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Добавить изображение</label>
              <div class="input-group d-flex">
                <input type="text" name="images" value="<?php echo e($lesson->images); ?>" class="form-control col-10" id="exampleInputFile" readonly> 
                <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="exampleInputFile">Загрузить</a>
              </div>
            </div>
            <div class="form-group">
              <label for="videoFile">Добавить видео</label>
              <div class="input-group d-flex">
                <input type="text" name="videos" value="<?php echo e($lesson->videos); ?>" class="form-control col-10" id="videoFile" readonly> 
                <a href="#" class="popup_selector btn btn-primary col-2" data-inputid="videoFile">Загрузить</a>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php echo $__env->make('admins.task.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/lessons/edit.blade.php ENDPATH**/ ?>
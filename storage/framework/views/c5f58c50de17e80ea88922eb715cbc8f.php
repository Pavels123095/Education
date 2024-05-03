<?php $__env->startSection('title', 'Статьи'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Все статьи</h1>
        </div><!-- /.col -->
        <div class="col-2 ml-auto">
          <a class="btn btn-sm btn-primary" href="<?php echo e(route('articles.create')); ?>">Добавить</a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container card">
    <?php if(!empty($articles) && isset($articles)): ?>
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">#</th>
                  <th style="width: 20%">Название</th>
                  <th style="width: 20%">Alias</th>
                  <th style="width: 23%">Контент</th>
                  <th style="width: 5%" class="text-center">Статус</th>
                  <th style="width: 25%"></th>
              </tr>
          </thead>
          <tbody>
              <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($article->id); ?></td>
                    <td>
                        <?php echo e($article->name); ?>

                        <br>
                        <small><?php echo e($article->created_at); ?></small>
                    </td>
                    <td>
                      <?php echo e($article->alias); ?>

                    </td>
                    <td class="project_progress">
                      <?php echo e(\Illuminate\Support\Str::words($article->detail_text, 2)); ?>

                    </td>
                    <td class="project-state">
                        <?php if($article->status == 1): ?>
                          <span class="badge badge-success">Опубликовано</span>
                        <?php elseif($article->status == 2): ?>
                          <span class="badge badge-primary">Создано</span>
                        <?php else: ?>
                          <span class="badge badge-secondary">Черновик</span>
                        <?php endif; ?>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="<?php echo e(route('articles.edit', $article->id)); ?>">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form class="d-inline" method="post" action="<?php echo e(route('articles.destroy', $article->id)); ?>">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <button class="btn btn-danger btn-sm" type="submit">
                              <i class="fas fa-trash"></i>
                          </button>
                        </form>
                    </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
      </table>
      <?php echo e($articles->links()); ?>

    <?php else: ?>
      <div class="container alert alert-info">Статьи еще не созданы</div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admins.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/admins/articles/index.blade.php ENDPATH**/ ?>
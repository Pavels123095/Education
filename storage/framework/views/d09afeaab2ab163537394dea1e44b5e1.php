<?php $__env->startSection('title', $article->name); ?>
<?php $__env->startSection('content'); ?>
<header id="head" class="head-article secondary" style="background-image:url('../<?php echo e($article->img); ?>');">
  <div class="container-fluid">
    <h1><?php echo e($article->name); ?></h1>
  </div>
</header>
<div class="container">
  <h2><?php echo e($article->name); ?></h2>
  <strong class="date-create text-left"><?php echo e($article->created_at->format('D, M, Y')); ?></strong>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <?php echo $article->detail_text; ?>

    </div>
  </div>
  <div class="clearfix"></div>
  <div class="articles-footer container">
    <div class="col-3">
      <a class="btn btn-outline-primary" href="<?php echo e(route('articles')); ?>">Назад к статьям</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/articles/detail.blade.php ENDPATH**/ ?>
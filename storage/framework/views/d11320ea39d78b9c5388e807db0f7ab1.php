<?php $__env->startSection('title', 'Наши статьи'); ?>
<?php $__env->startSection('content'); ?>
<header id="head" class="head-page secondary" style="background-image:url('/storage/chernyj_fon_krasnyj_tsvet_9844_1920x1080.jpg')">
  <div class="container-fluid">
    <h1>Наши статьи</h1>
    <div class="breadcrumbs d-flex clearfix">
      <div data-item="1" class="item-breadcrumbs col-1">
        <a href="/">Главная</a>
      </div>
      <div class="separator col-1">/</div>
      <div data-item="2" class="item-breadcrumbs col-1">
        <span>Наши статьи</span>
      </div>
    </div>
  </div>
</header>
<div class="container h-100 mt-2">
  <div class="row">
    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="article-item col-lg-3 col-md-4 col-sm-6 mb-4" data-id="<?php echo e($article->id); ?>">
      <div class="card h-100">
        <h4 class="card-title">
          <a href="<?php echo e(route('article_show', $article->alias)); ?>"><?php echo e($article->name); ?></a>
        </h4>
        <a href="<?php echo e(route('article_show', $article->alias)); ?>" class="article-item__img mb-4"><img class="card-img-top" src="/<?php echo e($article->img); ?>" alt=""></a>
        <div class="card-body">
          <a class="btn btn-outline-primary mx-auto d-block" 
            href="<?php echo e(route('article_show', $article->alias)); ?>">Читать</a>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="pagination row clearfix">
    <?php echo e($articles->links()); ?>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/articles/index.blade.php ENDPATH**/ ?>
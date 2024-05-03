<?php $__env->startSection('title', $page->name); ?>
<?php $__env->startSection('seo_description', $page->seo_description); ?>
<?php $__env->startSection('seo_keywords', $page->seo_keywords); ?>
<?php $__env->startSection('content'); ?>
<header id="head" class="head-page secondary" style="background-image:url('/storage/chernyj_fon_krasnyj_tsvet_9844_1920x1080.jpg')">
  <div class="container-fluid">
    <h1><?php echo e($page->name); ?></h1>
    <div class="breadcrumbs d-flex clearfix">
      <div data-item="1" class="item-breadcrumbs col-1">
        <a href="/">Главная</a>
      </div>
      <div class="separator col-1">/</div>
      <div data-item="2" class="item-breadcrumbs col-1">
        <span><?php echo e($page->name); ?></span>
      </div>
    </div>
  </div>
</header>
<div class="page-content container">
  <?php echo $page->content; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/pages/index.blade.php ENDPATH**/ ?>
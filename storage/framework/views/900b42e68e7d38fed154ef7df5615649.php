<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EducationLang - <?php echo $__env->yieldContent('title'); ?></title>
        <meta name="keywords" content="<?php echo $__env->yieldContent('seo-keywords'); ?>" />
        <meta name="description" content="<?php echo $__env->yieldContent('seo-description'); ?>" />
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
    </head>
    <body class="antialiased main-body">
        <div id="app">
            <header-component></header-component>
            <?php echo $__env->yieldContent('content'); ?>
            <footer-component></footer-component>
        </div>
    </body>
</html>
<?php /**PATH /Users/pavel/Desktop/Education/resources/views/layout.blade.php ENDPATH**/ ?>
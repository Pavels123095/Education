<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder 2.0</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset($dir.'/css/elfinder.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset($dir.'/css/theme.css')); ?>">

    <!-- elFinder JS (REQUIRED) -->
    <script src="<?php echo e(asset($dir.'/js/elfinder.min.js')); ?>"></script>

    <?php if($locale): ?>
        <!-- elFinder translation (OPTIONAL) -->
        <script src="<?php echo e(asset($dir."/js/i18n/elfinder.$locale.js")); ?>"></script>
    <?php endif; ?>

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript">
        var FileBrowserDialogue = {
            init: function() {
                // Here goes your code for setting your custom things onLoad.
            },
            mySubmit: function (file) {
                window.parent.postMessage({
                    mceAction: 'fileSelected',
                    data: {
                        file: file
                    }
                }, '*');
            }
        };

        $().ready(function() {
            var elf = $('#elfinder').elfinder({
                // set your elFinder options here
                <?php if($locale): ?>
                    lang: '<?php echo e($locale); ?>', // locale
                <?php endif; ?>
                customData: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                url: '<?php echo e(route("elfinder.connector")); ?>',  // connector URL
                soundPath: '<?php echo e(asset($dir.'/sounds')); ?>',
                getFileCallback: function(file) { // editor callback
                    FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE
                }
            }).elfinder('instance');
        });
    </script>
</head>
<body>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>

</body>
</html>
<?php /**PATH /home/p/payusovs95/anton.prizraks.ru/resources/views/vendor/elfinder/tinymce5.blade.php ENDPATH**/ ?>
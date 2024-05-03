jQuery(document).ready(function () {

    $('.toast button[data-dismiss="toast"]').on('click',function () {
        $(this).parents('.toast').removeClass('fade show');
        $(this).parents('#toastsContainerTopRight').remove();
    });
  
    tinymce.init({
        selector: '.editor',
        plugins: 'anchor autosave autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate mentions tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo autosave redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        file_picker_callback: elFinderBrowser,
        autosave_interval: '10s'
    });
  
    $('.btn-delete').on('click', function () {
        var res = confirm('Вы уверены');
        if (!res) {
            return false;
        }
    });
    
    $('.dropdown').click(function(){
        $('.dropdown-menu').toggleClass('show');
    });
  
    function elFinderBrowser(callback, value, meta) {
        tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: '/elfinder/tinymce5',
            /**
            * On message will be triggered by the child window
            * 
            * @param dialogApi
            * @param details
            * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
            */
            onMessage: function (dialogApi, details) {
                if (details.mceAction === 'fileSelected') {
                    const file = details.data.file;
                    
                    // Make file info
                    const info = file.name;
                    
                    // Provide file and text for the link dialog
                    if (meta.filetype === 'file') {
                        callback(file.url, {text: info, title: info});
                    }
                    
                    // Provide image and alt text for the image dialog
                    if (meta.filetype === 'image') {
                        callback(file.url);
                    }
                    
                    // Provide alternative source and posted for the media dialog
                    if (meta.filetype === 'media') {
                        callback(file.url);
                    }
                    
                    dialogApi.close();
                }
            }
        });
    }
  });
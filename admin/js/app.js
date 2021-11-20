$(document).ready(function() {

    var body = $('body');

    body.tooltip({
        selector: '[data-toggle="tooltip"]'
    });
    body.popover({
        selector: '[data-toggle="popover"]'
    });
    
    $('#tiny_img').each(function(){
        $(this).click(function ()
        {
            var f = $(this);
            window.KCFinder = {
                callBack: function(url) {
                    f.val(url);
                    window.KCFinder = null;
                }
            };
            var win = window.open('uploader/browse.php?type=image', 'kcfinder_textbox',
                'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                'resizable=1, scrollbars=0, width=700, height=600'
            );
            win.focus();
        });
    });
});

function redirect(url) {
    location.href = url;
}

function initEditor(obj){

    tinymce.init({
        selector: obj,
        height: 500,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
        image_advtab: true,
        file_browser_callback: function(field, url, type, win) {
            tinyMCE.activeEditor.windowManager.open({
                file: 'uploader/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
                title: 'KCFinder',
                width: 700,
                height: 500,
                inline: true,
                close_previous: false
            }, {
                window: win,
                input: field
            });
            return false;
        }
    });


}
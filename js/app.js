$(document).ready(function() {
    // $('.open-menu').click(function() {
    $(document).on('click', '.open-menu', function() {
        var obj=$(this).parent().parent().parent();
        obj.find('div.p-child').show();
        $(this).removeClass('fa-plus').addClass('fa-minus').removeClass('open-menu').addClass('close-menu');
    });  
    $(document).on('click', '.close-menu', function() {
    // $('.close-menu').click(function() {
        var obj=$(this).parent().parent().parent();
        obj.find('div.p-child').hide();
        $(this).removeClass('fa-minus').addClass('fa-plus').removeClass('close-menu').addClass('open-menu');
    });  

});
$(document).ready(function(){
    $('.burger_menu').click(function(event){
        $('.burger_menu,.header_menu').toggleClass('active');
        $('body').toggleClass('lock');
    });
});
jQuery(function(){
    $('.menu-item').each(function(){
        $(this).on('click',function(){
            $(this).toggleClass('open');
            $(".sub-menu",this).slideToggle()
            return false;
        });
    });
});
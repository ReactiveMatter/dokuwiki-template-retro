jQuery(document).on('click', function(e) {
    if (!jQuery(e.target).closest('.menu').length) {
        jQuery('.menu:not(.mobile-menu) .list').hide();
    }

     if (!jQuery(e.target).closest('.dw__toc').length) {
        jQuery('#dw__toc>div').hide();
        jQuery('#dw__toc>div>ul').hide();
        jQuery('#dw__toc').css('display','block');
    }
}); 


jQuery(document).ready(function(){
jQuery('#dw__toc>div').hide();
jQuery('#dw__toc>div>ul').hide();
jQuery('#dw__toc').css('display','block');
});


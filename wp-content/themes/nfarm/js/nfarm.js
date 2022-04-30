jQuery(document).ready( function($){
	//custom Sunset scripts
	
	var carousel = '.nfarm-carousel-thumb';
	
	nfarm_get_bs_thumbs(carousel);

	$(carousel).on('slid.bs.carousel', function(){
		nfarm_get_bs_thumbs(carousel);
	});
	
	function nfarm_get_bs_thumbs( carousel ){

        $(carousel).each(function(){
            var nextThumb = $('.item.active').find('.next-image-preview').data('image');
            var prevThumb = $('.item.active').find('.prev-image-preview').data('image');
            $(this).find('.carousel-control.right').find('.thumbnail-container').css({ 'background-image' : 'url('+nextThumb+')' });
            $(this).find('.carousel-control.left').find('.thumbnail-container').css({ 'background-image' : 'url('+prevThumb+')' });
        });
	
	}
	
});
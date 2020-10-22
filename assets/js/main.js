import $ from 'jquery';

$(".hamburger--slider").on('click', function() {
  $(".hamburger--slider").toggleClass('is-active');
});


$(window).on('load', function() {
  homeImageAspectRatio();
});

$(window).on('resize', function() {
  homeImageAspectRatio();
} );

function homeImageAspectRatio() {
  let images = $('.gallery__card .post-thumbnail img');
  if ( images ) {
    let w = $(images[0]).width();
    images.each( ( i, obj ) => {
      $(obj).height( w * 0.79 + 'px' );      
    });
  }
}


export default homeImageAspectRatio;
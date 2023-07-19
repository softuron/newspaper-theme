  <footer>
        <div class="row">
            <div class=" col-12 col-sm-12 col-md-12 col-xl-12 top-widget pm-0">
			    <div class="row"> 	
                		<?php dynamic_sidebar('footer_widget'); ?>	   
                </div>
            </div>
            <div class=" col-12 col-sm-12 col-md-12 col-xl-12 bottom-widget pm-0">
                <span>© ২০১৫-২০২০ কপিরাইট সংরক্ষিত</span>
            </div>
        </div>
    </footer>
		<?php wp_footer(); ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-3-5-1.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/carouseller.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/owl.carousel.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/aria-tabs.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/bootstrap/js/bootstrap.esm.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
		<script type="text/javascript">
			$(function() {
				$('#second').carouseller({
					scrollSpeed: 1500,
					autoScrollDelay: 10000,
					easing: 'linear'
				});
			});
		</script>
		<script>
        $(document).ready(function() {
          'use strict';
          $(window).on('ariaTabs.initialised', function(event, element) {
            console.log(element + 'init');
          });
    
          $('.tab-group').ariaTabs({
            contentRole: ['document', 'application', 'document'],
          });
    
          $(window).on('ariaTabs.select', function(event, element, index) {
            console.log(index);
          });
    
          $(window).on('ariaTabs.deselect', function(event, element, index) {
            console.log(index);
          });
        });
      </script> 
      <script>
      var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop:true,
            nav:true,
            lazyLoad:true,
            margin:0,
            dot:true,stagePadding: 0,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:2
                },            
                960:{
                    items:2
                },
                1200:{
                    items:2
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
    </script>
    <script>
/*-------------------------
     MAGNIFIC POPUP JS
-------------------------*/
$('.gallery-item').magnificPopup({
  type: 'image',
  gallery:{
    enabled:true
  }
});
$('.video').magnificPopup({
  type: 'iframe',
  gallery:{
    enabled:true
  }
});

</script> 
      <script>
          $(document).ready(function(){
             
      var owl = $('.owl-carouselvi');
        owl.owlCarousel({
            loop:true,
            nav:true,
            lazyLoad:true,
            margin:0,
            dot:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },            
                960:{
                    items:1
                },
                1200:{
                    items:1
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        }); 
        
          
          //.owl-carouselim    
      var owl = $('.owl-carouselim');
        owl.owlCarousel({
            loop:true,
            nav:true,
            lazyLoad:true,
            margin:0,
            dot:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },            
                960:{
                    items:1
                },
                1200:{
                    items:1
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        }); 
        
        
        
        
        //sticky nav
        window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
          });
          
          
    </script>
</html>
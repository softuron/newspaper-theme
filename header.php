<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
      <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YKFBHQDNXY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YKFBHQDNXY');
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-EB99JDBBC7');
</script>
      <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <?php
            
                            $top_ad = new WP_Query(array(
									'post_type'=> 'ad',
                        	        'posts_per_page' => 105,
								));
								
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Top Ad'){
    						?>
    						
                <div class="top-ad cont-wi-80">
                    <center>
                        <?php the_post_thumbnail('full', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							)); ?>
            		</center>
                </div>
                        <?php }; endwhile; ?>
                <div class="logo_area cont-wi-80">
                    <div class="row">
                        <div class="col-md-2 col-xl-4 col-12 col-sm-12 desk logo_img pm-0">
                           <a href="<?php echo get_home_url(); ?>"><?php  $logoimg = get_theme_mod('logo_image');$logoimgid = attachment_url_to_postid($logoimg);$logoimgalt = get_post_meta( $logoimgid, '_wp_attachment_image_alt', true ); if(empty($logoimg)){ ?> <?php echo get_theme_mod('logo_text_big'); ?><?php  }else{ ?><img class="img-fluid" src="<?php echo $logoimg; ?>" alt="Banijjo Protidin" ><?php } ?></a>
                        </div>
                             <?php
                            $top_ad = new WP_Query(array(
									'post_type'=> 'ad',
                        	        'posts_per_page' => 105,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Header Ad'){
    						?>
    						
                        <div class="col-md-5 col-xl-4 col-12 col-sm-12 desk bn-head">
                            <center> <?php the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail',
            							'alt'	=> get_the_title()
            							)); ?>
            				</center>
                        </div>
                        <?php }; endwhile; ?>
                    </div>
                </div>
            <div class="row">
                <div class="col-12 col-md-12 col-xl-12 col-sm-12 mainmenu_area" id="navbar">
                    <div class="mob">
                        <div class="row">
                            <div class="col-3">
                                <svg  class="mob_menu" viewBox="0 0 16 16" class="bi bi-menu-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M15 3.207v9a1 1 0 0 1-1 1h-3.586A2 2 0 0 0 9 13.793l-1 1-1-1a2 2 0 0 0-1.414-.586H2a1 1 0 0 1-1-1v-9a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-13 11a2 2 0 0 1-2-2v-9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-3.586a1 1 0 0 0-.707.293l-1.353 1.354a.5.5 0 0 1-.708 0L6.293 14.5a1 1 0 0 0-.707-.293H2z"/>
                                  <path fill-rule="evenodd" d="M15 5.207H1v1h14v-1zm0 4H1v1h14v-1zm-13-5.5a.5.5 0 0 0 .5.5h6a.5.5 0 1 0 0-1h-6a.5.5 0 0 0-.5.5zm0 4a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11a.5.5 0 0 0-.5.5zm0 4a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1h-8a.5.5 0 0 0-.5.5z"/>
                                </svg>
                            </div>
                            <div class="col-6 mob-lg">
                                <center>
                                    <a href="<?php echo get_home_url(); ?>"><?php  $logoimg = get_theme_mod('logo_image');$logoimgid = attachment_url_to_postid($logoimg);$logoimgalt = get_post_meta( $logoimgid, '_wp_attachment_image_alt', true ); if(empty($logoimg)){ ?> <?php echo get_theme_mod('logo_text_big'); ?><?php  }else{ ?><img class="img-fluid" src="<?php echo $logoimg; ?>" alt="Banijjo protidin" ><?php } ?></a>
                                </center>
                            </div>
                            <!--<div class="col-3">-->
                            <!--    <svg class="search_menu search" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                            <!--      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>-->
                            <!--      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>-->
                            <!--    </svg>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="nav_menu">
                        <div class="bg_mb_nav"></div>
                        <div class="close-mob mob">
                            <svg class="close" viewBox="0 0 16 16" class="bi bi-backspace" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M6.603 2h7.08a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-7.08a1 1 0 0 1-.76-.35L1 8l4.844-5.65A1 1 0 0 1 6.603 2zm7.08-1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zM5.829 5.146a.5.5 0 0 0 0 .708L7.976 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                            </svg>
                                <div style="display:;" class="mob search_mob">
                                    <?php get_search_form();?>
                                </div>
                        </div>
                    <nav id="main-nav" class="cont-wi-80">
                        <?php 
											if(function_exists('wp_nav_menu')){
												wp_nav_menu(array(
													'theme_location' => 'main-menu'
												));
											}
										?>
                    </nav>
                    </div>
                </div>
                <div class="scrl">
                    <div class="cont-wi-80">
                        <div class="scrll_sec">
                            <div class="pml-0 scr_title left-float">
                               <?php if(!empty(get_theme_mod('breacking'))){ ?> <span class="last-break"><?php echo get_theme_mod('breacking');?></span> <?php }?>
                            </div>
                            <div class="pm-0 scr_item left-float">
                                <marquee>
                                    <?php 
        						
        								$scroll_title = new WP_Query(array(
        									'post_type'=> 'post',
        									'posts_per_page'=> 10,
                        	                'category_name' => get_theme_mod('brkcat'),
        								));
            						while( $scroll_title->have_posts()) :$scroll_title->the_post(); ?>
            						 <a class="news-scroll"  href="<?php the_permalink(); ?>"><?php the_title();?></a><span style="padding-left:5px;padding-right:3px; color:##333;">&#9830</span>
            						<?php endwhile; ?>
                                </marquee>
                            </div>
                            <div class="pm-0 scr_search right-float desk">
                                <p class="front_date">
                                        <?php echo do_shortcode('[english_date]'); ?> | 
                                        <?php echo do_shortcode('[bangla_time]'); ?> |
                                          <a href="<?php echo get_theme_mod('facebook');?>"><img src="<?php echo get_template_directory_uri();?>/img/iconfinder_facebook_circle_color_107175.png"/></a>
                                          <a href="<?php echo get_theme_mod('twitter');?>"><img src="<?php echo get_template_directory_uri();?>/img/iconfinder_1_Twitter2_colored_svg_5296515.png"/></a>
                                          <a href="<?php echo get_theme_mod('linkedin');?>"><img src="<?php echo get_template_directory_uri();?>/img/iconfinder_LinkedIn_570628.png"/></a>
                                    <svg width="1.5em" height="1.2em" class="desk_search" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    </svg>
                                </p>
                                <div style="display:none;" class="search_input">
                                        <svg class="backicon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="14" height="14"><path fill-rule="evenodd" d="M2 2.75C2 1.784 2.784 1 3.75 1h2.5a.75.75 0 010 1.5h-2.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h2.5a.75.75 0 010 1.5h-2.5A1.75 1.75 0 012 13.25V2.75zm6.56 4.5l1.97-1.97a.75.75 0 10-1.06-1.06L6.22 7.47a.75.75 0 000 1.06l3.25 3.25a.75.75 0 101.06-1.06L8.56 8.75h5.69a.75.75 0 000-1.5H8.56z"></path></svg>
                                    <?php get_search_form();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
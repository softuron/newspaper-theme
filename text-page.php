<?php
/*
Template Name:Text Page
*/
 get_header();
setPostViews(get_the_ID());
?>
        <section>
            <div class="row">
                       <?php  if ( have_posts() ) : ?>
                       <?php while ( have_posts() ) : the_post(); ?>
                       <?php 
                        $category = get_the_category();
                        $firstCategory = $category[0]->slug; 
                       ?>
                       
      <meta name="description" content="<?php the_title(); ?>">
      <meta name="og:title" property="og:title" content="<?php the_title(); ?>">
      <meta property="og:url" content="<?php the_permalink(); ?>" />
      <meta property="og:site_name" content="Banijjo Protidin - Latest News Update About DSE, CSE Stock market." />
      <meta property="article:published_time" content="<?php echo get_the_date('d F, Y'); ?> <?php the_time()?>" />
      <meta property="og:image:width" content="700" />
                <div class="col-12 col-sm-12 col-xl-12 col-md-12 mt-10">
                                <div class="description mb-10">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                                      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                    </svg>
                                    <span class="author"><a href="<?php  echo get_home_url();  ?>">প্রথম পাতা</a></span>
                                </div>
                                <div class= "singlepost_content ">
                                <h3><?php the_title(); ?></h3>
                                </div>
                </div>
                <div class="col-12 col-sm-12 col-xl-8 col-md-8">
                            <div class="single_temp">
                                <div class="post_bimage">
                                  <?php the_post_thumbnail( 'full', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							) );
            					 ?>
                                </div>
                            </div>
                            <div class="single_post">
                               <?php if(get_post_meta( get_the_ID(), 'authname', true )){ ?><span style="font-style: italic; border-left:2px solid #e86d6d" class="authname"><?php echo get_post_meta( get_the_ID(), 'authname', true );?></span> : <?php }?>
                               
                               <?php the_content();?>
                             </div>
                        
                        
                    <!--End Second lead-->
                    <div class="row">
                       
        <?php 
    $homePageFeatured = new WP_Query(array(
        'post_type'=> 'ad',
        'tax_query' => array(
            array(
                'taxonomy' => 'ads',
                'field' => 'name',
                'terms' => 'Single Ad'
            ),
        )
    ));

    while(  $homePageFeatured->have_posts()){
            $homePageFeatured->the_post(); ?>
 <div class="col-12 col-sm-12 col-xl-6 col-md-6 p-2">
    						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
            					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
            					</a>
                </div>

<?php } ?>
<?php  wp_reset_postdata(); ?>
                    </div>
                    <!--End Add-->
                    
                </div>
                <?php endwhile; 
                         
                        else: ?>
                        <p>সংবাদ যুক্ত হয়নি</p>
                         
                         
                        <?php endif; ?>
                
                <div class="col-12 col-sm-12 col-xl-4 col-md-4 pmr-0">
                    
                    <?php if(get_theme_mod('show_firstsideber_section') == true): ?>
                    <!--sidebar Widget Item start-->
                        <div class="sidebar-widget">
                              <div class="tab-group">
                                <nav class="tab-group__tab-nav">
                                  <ul class="tab-group__tab-ul">
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                      <button type="button" class="tab-group__tab-btn">সর্বশেষ</button>
                                    </li>
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                      <button type="button" class="tab-group__tab-btn">জনপ্রিয়</button>
                                    </li>
                                  </ul>
                                </nav>
                               
                                <div class="tab-group__tabs-cont">
                                  <div class="tab-group__tabpanel">
                                    <div class="tab-group__tab-content">
                                        <div class="sidebar_post">
                                            <?php
                                            $argss = array(
                                            	'post_type' => 'post',
                                            	'posts_per_page' => 5
                                            );
                                            $query2 = new WP_query ( $argss );
                                            if ( $query2->have_posts() ) {
                                                while ( $query2->have_posts() ) : $query2->the_post();{
                                                ?>
                                               <div class="sub-item">
                                                    <a href="<?php the_permalink(); ?>">
                                						<?php the_post_thumbnail( 'tempside', array(
                                							'class' => 'img-fluid',
                                							'alt'	=> get_the_title()
                                							) );
                                						?> <h3><?php the_title();?></h3></a>
                                               </div> 
                                            <?php }; endwhile; } ; wp_reset_query(); ?>
                                           <a class="more_news" href="/post">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="tab-group__tabpanel">
                                    <div class="tab-group__tab-content">
                                        <div class="sidebar_post">
                                             <?php
                                                  query_posts('meta_key=post_views_count&posts_per_page=5&orderby=meta_value_num&
                                                  order=DESC');
                                                  if (have_posts()) : while (have_posts()) : the_post();
                                                   ?>
                                                   <div class="sub-item">
                                                    <a href="<?php the_permalink(); ?>">
                                						<?php the_post_thumbnail( 'tempside', array(
                                							'class' => 'img-fluid',
                                							'alt'	=> get_the_title()
                                							) );
                                						?> <h3><?php the_title();?></h3></a>
                                                   </div> 
                                                   <?php
                                                   endwhile; endif;
                                                   wp_reset_query();
                                                   ?>
                                           <a class="more_news" href="/topview">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                               <?php
                            $top_ad = new WP_Query(array(
									 'post_type'=> 'ad',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'ads',
                                                'field' => 'name',
                                                'terms' => 'Sidebar one'
                                            ),
                                        )
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						?>
    						
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php endwhile; ?>
                        
                    </div>
                    <!--Widget Item end-->
                    <?php endif; ?>
                    <?php if(get_theme_mod('show_secondsideber_section') == true): ?>
                    <!--sidebar Widget Item start-->
                        <div class="sidebar-widget">
                              <div class="tab-group">
                                        <?php 
                                        $args = array(
                                            'category_name' => get_theme_mod('twelvethcat'),
                                          ); 
                                        ?>
                                <nav class="tab-group__tab-nav">
                                  <ul class="tab-group__tab-ul">
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                        <a href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('twlvecatname') ?></button>
                                        </a>
                                    </li>
                                  </ul>
                                </nav>
                                <div class="tab-group__tabs-cont">
                                  <div class="tab-group__tabpanel">
                                    <div class="tab-group__tab-content">
                                        <div class="sidebar_post">
                                            <?php
                                            $argss = array(
                                            	'post_type' => 'post',
                                            	'posts_per_page' => 5,
                        	                    'category_name' => get_theme_mod('twelvethcat'),
                                            );
                                            $query2 = new WP_query ( $argss );
                                            if ( $query2->have_posts() ) {
                                                while ( $query2->have_posts() ) : $query2->the_post();{
                                                ?>
                                               <div class="sub-item">
                                                    <a href="<?php the_permalink(); ?>">
                                						<?php the_post_thumbnail( 'tempside', array(
                                							'class' => 'img-fluid',
                                							'alt'	=> get_the_title()
                                							) );
                                						?> <h3><?php the_title();?></h3></a>
                                               </div> 
                                            <?php }; endwhile; } ; wp_reset_query(); ?>
                                           <a class="more_news" href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                              <?php
                            $top_ad = new WP_Query(array(
									 'post_type'=> 'ad',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'ads',
                                                'field' => 'name',
                                                'terms' => 'Sidebar two'
                                            ),
                                        )
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post();
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php endwhile; ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif;?>
                    <?php if(get_theme_mod('show_thirdsideber_section') == true): ?>
                    <!--sidebar Widget Item start-->
                        <div class="sidebar-widget">
                              <div class="tab-group">
                                <?php 
                                $args = array(
                                    'category_name' => get_theme_mod('sidecatname'),
                                  ); 
                                ?>
                                <nav class="tab-group__tab-nav">
                                  <ul class="tab-group__tab-ul">
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                        <a href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('side2catname') ?></button>
                                        </a>
                                    </li>
                                  </ul>
                                </nav>
                                <div class="tab-group__tabs-cont">
                                  <div class="tab-group__tabpanel">
                                    <div class="tab-group__tab-content">
                                        <div class="sidebar_post">
                                            <?php
                                            $argss = array(
                                            	'post_type' => 'post',
                                            	'posts_per_page' => 5,
                        	                    'category_name' => get_theme_mod('sidecatname'),
                                            );
                                            $query2 = new WP_query ( $argss );
                                            if ( $query2->have_posts() ) {
                                                while ( $query2->have_posts() ) : $query2->the_post();{
                                                ?>
                                               <div class="sub-item">
                                                    <a href="<?php the_permalink(); ?>">
                                						<?php the_post_thumbnail( 'tempside', array(
                                							'class' => 'img-fluid',
                                							'alt'	=> get_the_title()
                                							) );
                                						?> <h3><?php the_title();?></h3></a>
                                               </div> 
                                            <?php }; endwhile; } ; wp_reset_query(); ?>
                                           <a class="more_news" href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                              <?php
                            $top_ad = new WP_Query(array(
									 'post_type'=> 'ad',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'ads',
                                                'field' => 'name',
                                                'terms' => 'Sidebar three'
                                            ),
                                        )
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php endwhile; ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif; ?>
                    <?php if(get_theme_mod('show_fourthsideber_section') == true): ?>
                    <!--sidebar Widget Item start-->
                        <div class="sidebar-widget">
                              <div class="tab-group">
                                <?php 
                                $args = array(
                                    'category_name' => get_theme_mod('side3cat'),
                                  ); 
                                ?>
                                <nav class="tab-group__tab-nav">
                                  <ul class="tab-group__tab-ul">
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                        <a href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('side3catname') ?></button>
                                        </a>
                                    </li>
                                  </ul>
                                </nav>
                                <div class="tab-group__tabs-cont">
                                  <div class="tab-group__tabpanel">
                                    <div class="tab-group__tab-content">
                                        <div class="sidebar_post">
                                            <?php
                                            $argss = array(
                                            	'post_type' => 'post',
                                            	'posts_per_page' => 5,
                        	                    'category_name' => get_theme_mod('side3cat'),
                                            );
                                            $query2 = new WP_query ( $argss );
                                            if ( $query2->have_posts() ) {
                                                while ( $query2->have_posts() ) : $query2->the_post();{
                                                ?>
                                               <div class="sub-item">
                                                    <a href="<?php the_permalink(); ?>">
                                						<?php the_post_thumbnail( 'tempside', array(
                                							'class' => 'img-fluid',
                                							'alt'	=> get_the_title()
                                							) );
                                						?> <h3><?php the_title();?></h3></a>
                                               </div> 
                                            <?php }; endwhile; } ; wp_reset_query(); ?>
                                           <a class="more_news" href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                              <?php
                            $top_ad = new WP_Query(array(
									 'post_type'=> 'ad',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'ads',
                                                'field' => 'name',
                                                'terms' => 'Sidebar four'
                                            ),
                                        )
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php endwhile; ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif; ?>
                    <?php if(get_theme_mod('show_fifthsideber_section') == true): ?>
                    <!--sidebar Widget Item start-->
                        <div class="sidebar-widget">
                              <div class="tab-group">
                                <?php 
                                $args = array(
                                    'category_name' => get_theme_mod('side4cat'),
                                  ); 
                                ?>
                                <nav class="tab-group__tab-nav">
                                  <ul class="tab-group__tab-ul">
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                        <a href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('side4catname') ?></button>
                                        </a>
                                    </li>
                                  </ul>
                                </nav>
                                <div class="tab-group__tabs-cont">
                                  <div class="tab-group__tabpanel">
                                    <div class="tab-group__tab-content">
                                        <div class="sidebar_post">
                                            <?php
                                            $argss = array(
                                            	'post_type' => 'post',
                                            	'posts_per_page' => 5,
                        	                    'category_name' => get_theme_mod('side4cat'),
                                            );
                                            $query2 = new WP_query ( $argss );
                                            if ( $query2->have_posts() ) {
                                                while ( $query2->have_posts() ) : $query2->the_post();{
                                                ?>
                                               <div class="sub-item">
                                                    <a href="<?php the_permalink(); ?>">
                                						<?php the_post_thumbnail( 'tempside', array(
                                							'class' => 'img-fluid',
                                							'alt'	=> get_the_title()
                                							) );
                                						?> <h3><?php the_title();?></h3></a>
                                               </div> 
                                            <?php }; endwhile; } ; wp_reset_query(); ?>
                                           <a class="more_news" href="category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                              <?php
                            $top_ad = new WP_Query(array(
									 'post_type'=> 'ad',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'ads',
                                                'field' => 'name',
                                                'terms' => 'Sidebar five'
                                            ),
                                        )
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php endwhile; ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </body>
   <?php get_footer();?>
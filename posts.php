<?php
/*
Template Name:Post
*/
get_header();
?>
        <section>
            <div class="row">
                <div class="col-12 col-sm-12 col-xl-8 col-md-8 pm-0">
                    <div class="row">
                       <?php  if ( have_posts() ) : ?>
                       <?php while ( have_posts() ) : the_post(); ?>
                       <div class="col-12 col-sm-12 col-xl-6 col-md-6 pmr-0 mt-10">
                            <div class="tem2_post">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-xl-6 col-md-6 pm-10">
                                        <div class="post_bimage">
                                          <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'medium', array(
            							'class' => 'img-fluid page_img',
            							'alt'	=> get_the_title()
            							) );
            						?></a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-xl-6 col-md-6 pm-0">
                                        <div class="tem2post_content">
                                            <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                        </div>
                                        <div style="margin-top:-5px" class="description">
                                                <svg width="0.7em" height="0.7em" viewBox="0 0 16 16" class="bi bi-smartwatch" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M14 5h.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H14V5z"/>
                                                  <path fill-rule="evenodd" d="M8.5 4.5A.5.5 0 0 1 9 5v3.5a.5.5 0 0 1-.5.5H6a.5.5 0 0 1 0-1h2V5a.5.5 0 0 1 .5-.5z"/>
                                                  <path fill-rule="evenodd" d="M4.5 2h7A2.5 2.5 0 0 1 14 4.5v7a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 11.5v-7A2.5 2.5 0 0 1 4.5 2zm0 1A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7z"/>
                                                  <path d="M4 2.05v-.383C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v.383a2.512 2.512 0 0 0-.5-.05h-7c-.171 0-.338.017-.5.05zm0 11.9c.162.033.329.05.5.05h7c.171 0 .338-.017.5-.05v.383c0 .92-.746 1.667-1.667 1.667H5.667C4.747 16 4 15.254 4 14.333v-.383z"/>
                                                </svg>
        
                                            <span class="author"><?php echo get_the_date('d F, Y'); ?> </span> <span class="date"> <?php echo get_the_time()?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; 
                         
                        else: ?>
                        <p>সংবাদ যুক্ত হয়নি</p>
                         
                         
                        <?php endif; ?>
                        <center>
								<div class="row pagination fix" style="width:100%;min-height: 30px; margin-top: 20px;margin-bottom:20">
													
										<?php the_posts_pagination( array(
			   									 'mid_size' => 2,
			    								 'prev_text' => __( 'পূর্ববর্তী', 'ban' ),
			   									 'next_text' => __( 'পরবর্তী', 'ban' ),
			   									 'screen_reader_text' => __( ' ', 'ban' ),
												) ); 

										?>
								</div>
						</center>
                    </div>
                    <!--End Second lead-->
                    <div class="row">
                         <?php
                            $top_ad = new WP_Query(array(
									'post_type'=> 'ad',
                        	        'posts_per_page' => 200,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Category Ad'){
    						?>
                <div class="col-12 col-sm-12 col-xl-6 col-md-6">
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            					</a>
                </div>
                
                        <?php }; endwhile; ?>
                    </div>
                    <!--End Add-->
                </div>
                
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
                        	        'posts_per_page' => 105,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Sidebar one'){
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php }; endwhile; ?>
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
                        	        'posts_per_page' => 105,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Sidebar two'){
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php }; endwhile; ?>
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
                        	        'posts_per_page' => 105,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Sidebar three'){
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php }; endwhile; ?>
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
                        	        'posts_per_page' => 105,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Sidebar four'){
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php }; endwhile; ?>
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
                        	        'posts_per_page' => 105,
								));
    						while( $top_ad->have_posts()) :$top_ad->the_post(); 
    						    $terms = get_the_terms(get_the_id(),'ads');
    						    $terms[0]->name;
    						    if($terms[0]->name == 'Sidebar five'){
    						?>
                            <a href="<?php echo get_post_meta( get_the_ID(), 'targetlink', true );?>">
                                <?php 
                                the_post_thumbnail('full', array(
            							'class' => 'img-thumbnail mb-10',
            							'alt'	=> get_the_title()
            							));
            					?>
            				</a>
                        <?php }; endwhile; ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </body>
   <?php 
     get_footer();
   ?>
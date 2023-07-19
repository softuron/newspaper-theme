<?php
/*
Template Name:Home
*/
get_header();
?>
<style>
    .slider_section {
    background: #e6e5e5;
}.carouseller .carouseller__left, .carouseller .carouseller__right{
    color:ddd;
}
</style>
        <section>
            <div class="row">
<?php 
    $homePageFeatured = new WP_Query(array(
        'post_type'=> 'ad',
         'posts_per_page' => 2,
        'tax_query' => array(
            array(
                'taxonomy' => 'ads',
                'field' => 'name',
                'terms' => 'Front page top'
            ),
        )
    ));

    while(  $homePageFeatured->have_posts()){
            $homePageFeatured->the_post(); ?>
 <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
    						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
            					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
            					</a>
 </div>

<?php } ?>
<?php  wp_reset_postdata(); ?>
 <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                                <div class="owl-carousel itemdiv pm-0">
                                      <?php
                                                $argssle = array(
                                                	'post_type' => 'video',
                                                	'posts_per_page' => 2,
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'videos',
                                                            'field' => 'name',
                                                            'terms' => 'Top'
                                                        ),
                                                    )
                                                );
                                                $query4 = new WP_query ( $argssle );
                                                if ( $query4->have_posts() ) { 
                                                ?>
                                                <?php while ( $query4->have_posts() ) : $query4->the_post(); ?>
                                                <div class="item">
                                                    <div class="item-content">
                                                    <iframe width="100%" height="90" src="https://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'videolink', true );?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h5><?php the_title();?></h5>
                                                    </div>
                                                </div>
                                            <?php endwhile; }; wp_reset_query();; ?>
                                    
                                 </div>
                </div>
            </div>
        </section>
        <?php if(get_theme_mod('show_top_section') == true): ?>
        <section>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-xl-6 pmr-0 post-div ">
                    <div class="post_section_title">
                         <?php 
                        $args = array(
                            'category_name' => get_theme_mod('firstleadcat'),
                          ); 
                        ?>
                       <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> শীর্ষ খবর</span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                    </div>
                    <div class="temp1">
                        <?php
                        $args = array(
                        	'post_type' => 'post',
                        	'posts_per_page' => 1,
                        	'category_name' => get_theme_mod('firstleadcat'),
                        );
                        $query = new WP_query ( $args );
                        if ( $query->have_posts() ) { 
                            $i = 0;
                        ?>
                        <div class="first_post">
                        <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                            if($i == 1){
                        ?>
                            <div class="post_bimage">
                             <a href="<?php the_permalink(); ?>">
            						<?php the_post_thumbnail( 'frontbig', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							) );
            						?>
            					</a>
                            </div>
                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <div class="morepara">
                            <?php the_excerpt();?>
                            </div>
                            <a class="more_read" href="<?php the_permalink();?>">বিস্তারিত..</a>
                        <?php }; endwhile; ?>
                        </div>
                        <?php } ; wp_reset_query();?>
                        
                        <?php
                        $argss = array(
                        	'post_type' => 'post',
                        	'posts_per_page' => 6,
                        	'category_name' => get_theme_mod('firstleadcat'),
                        );
                        $query2 = new WP_query ( $argss );
                        if ( $query2->have_posts() ) { 
                            $i = 0;
                        ?>
                        <div class="sub_post">
                            <?php while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                    if($i > 1){
                                ?>
                           <div class="sub-item">
                                  <a href="<?php the_permalink(); ?>">
            						<?php the_post_thumbnail( 'tempside', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							) );
            						?><h3><?php the_title();?></h3></a>
                           </div> 
                            <?php }; endwhile; ?>
                           <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                        </div>
                        <?php } ; wp_reset_query();?>
                    </div>           
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-xl-6 post-div pmr-0">
                    <div class="post_section_title">
                         <?php 
                        $args = array(
                            'category_name' => get_theme_mod('firstcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php  echo get_theme_mod('firstcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                    </div>
                    <div class="temp1">
                        <?php
                        $args = array(
                        	'post_type' => 'post',
                        	'posts_per_page' => 1,
                        	'category_name' => get_theme_mod('firstcat'),
                        );
                        $query = new WP_query ( $args );
                        if ( $query->have_posts() ) { 
                            $i = 0;
                        ?>
                        <div class="first_post">
                        <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                            if($i == 1){
                        ?>
                            <div class="post_bimage">
                             <a href="<?php the_permalink(); ?>">
            						<?php the_post_thumbnail( 'frontbig', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							) );
            						?>
            					</a>
                            </div>
                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <div class="morepara">
                            <?php the_excerpt();?>
                            </div>
                            <a class="more_read" href="<?php the_permalink();?>">বিস্তারিত..</a>
                        <?php }; endwhile; ?>
                        </div>
                        <?php } ; wp_reset_query();?>
                        
                        <?php
                        $argss = array(
                        	'post_type' => 'post',
                        	'posts_per_page' => 6,
                        	'category_name' => get_theme_mod('firstcat'),
                        );
                        $query2 = new WP_query ( $argss );
                        if ( $query2->have_posts() ) { 
                            $i = 0;
                        ?>
                        <div class="sub_post">
                            <?php while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                    if($i > 1){
                                ?>
                           <div class="sub-item">
                                  <a href="<?php the_permalink(); ?>">
            						<?php the_post_thumbnail( 'tempside', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							) );
            						?><h3><?php the_title();?></h3></a>
                           </div> 
                            <?php }; endwhile; ?>
                           <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                        </div>
                        <?php } ; wp_reset_query();?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                 <?php 
                    $homePageFeatured = new WP_Query(array(
                        'post_type'=> 'ad',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'ads',
                                'field' => 'name',
                                'terms' => 'Front page first'
                            ),
                        )
                    ));
                
                    while(  $homePageFeatured->have_posts()){
                            $homePageFeatured->the_post(); ?>
                                        <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                    						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                            					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                            					</a>
                                        </div>
                
                <?php } ?>
                <?php  wp_reset_postdata(); ?>
            </div>
        </section>
        <?php endif; ?>
        <?php if(get_theme_mod('show_second_section') == true): ?>
        <section class="slider_section">      	
		<div id="second" class="carouseller slide_post"> 
			<a href="javascript:void(0)" class="carouseller__left">‹</a> 
			<div class="carouseller__wrap"> 
				<div class="carouseller__list"> 
				 <?php
                        $argssl = array(
                        	'post_type' => 'post',
                        	'posts_per_page' => 20,
                        	'category_name' => get_theme_mod('slidercat'),
                        );
                        $query3 = new WP_query ( $argssl );
                        if ( $query3->have_posts() ) { 
                        ?>
                        <?php while ( $query3->have_posts() ) : $query3->the_post(); ?>
					<div class="car__3">
                        <div class="slide_post">
                            <div class="post_bimage">
                                  <a href="<?php the_permalink(); ?>">
            						<?php the_post_thumbnail( 'medium', array(
            							'class' => 'img-fluid',
            							'alt'	=> get_the_title()
            							) );
            						?>
            					</a>
                            </div>
                            <div class="post_content">
                                <a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                            </div>
                        </div>
					</div>
					<?php endwhile; }; wp_reset_query(); ?>
				</div>
			</div>
			<a href="javascript:void(0)" class="carouseller__right">›</a>
		</div>
        </section>
        <section>
            <div class="row pt-15">
                <?php 
                    $homePageFeatured = new WP_Query(array(
                        'post_type'=> 'ad',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'ads',
                                'field' => 'name',
                                'terms' => 'Front page second'
                            ),
                        )
                    ));
                
                    while(  $homePageFeatured->have_posts()){
                            $homePageFeatured->the_post(); ?>
                                        <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                    						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                            					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                            					</a>
                                        </div>
                
                <?php } ?>
                <?php  wp_reset_postdata(); ?>
                        
            </div>
        </section>
        <?php endif; ?>
        <section>
            <div class="row">
                
                <div class="col-12 col-sm-12 col-xl-8 col-md-8 pm-0">
                    
                    <?php if(get_theme_mod('show_fistcat_section') == true): ?> 
                    <!--Start Template three-->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-xl-6 pmr-0 post-div ">
                            <div class="post_section_title">
                         <?php 
                        $args = array(
                            'category_name' => get_theme_mod('secondcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('secondcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp3">
                                <?php
                                $args = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 1,
                        	        'category_name' => get_theme_mod('secondcat'),
                                );
                                $query = new WP_query ( $args );
                                if ( $query->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="first_post">
                                <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                    if($i == 1){
                                ?>
                                    <div class="post_bimage">
                                     <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					</a>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                    <div class="morepara">
                                    <?php the_excerpt();?>
                                    </div>
                                    <a class="more_read" href="<?php the_permalink();?>">বিস্তারিত..</a>
                                <?php }; endwhile; ?>
                                </div>
                                <?php } ; wp_reset_query();?>
                                
                                <?php
                                $argss = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 6,
                        	        'category_name' => get_theme_mod('secondcat'),
                                );
                                $query2 = new WP_query ( $argss );
                                if ( $query2->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="sub_post">
                                    <?php while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					<h3><?php the_title();?></h3></a>
                                   </div> 
                                    <?php }; endwhile; ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                                <?php } ; wp_reset_query();?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-xl-6 post-div pmr-0">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('thirdcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('thirdcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp3">
                                <?php
                                $args = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 1,
                        	        'category_name' => get_theme_mod('thirdcat'),
                                );
                                $query = new WP_query ( $args );
                                if ( $query->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="first_post">
                                <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                    if($i == 1){
                                ?>
                                    <div class="post_bimage">
                                     <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					</a>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                    <div class="morepara">
                                    <?php the_excerpt();?>
                                    </div>
                                    <a class="more_read" href="<?php the_permalink();?>">বিস্তারিত..</a>
                                <?php }; endwhile; ?>
                                </div>
                                <?php } ; wp_reset_query();?>
                                
                                <?php
                                $argss = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 6,
                        	        'category_name' => get_theme_mod('thirdcat'),
                                );
                                $query2 = new WP_query ( $argss );
                                if ( $query2->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="sub_post">
                                    <?php while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					<h3><?php the_title();?></h3></a>
                                   </div> 
                                    <?php }; endwhile; ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                                <?php } ; wp_reset_query();?>
                            </div>
                        </div>
                    </div>
                    <!--End Template three-->
                    <div class="row">
                        <?php 
                            $homePageFeatured = new WP_Query(array(
                                'post_type'=> 'ad',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ads',
                                        'field' => 'name',
                                        'terms' => 'Front page fourth'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                                <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                                </div>
                        
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--End Add-->
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('show_secondcat_section') == true): ?>
                    <!--Star Template four-->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-xl-4 pmr-0 post-div ">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('fourthcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('fourthcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('fourthcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 6,
                        	            'category_name' => get_theme_mod('fourthcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-xl-4 post-div pmr-0">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('fifthcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('fivecatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('fifthcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 6,
                        	            'category_name' => get_theme_mod('fifthcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-xl-4 post-div pmr-0">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('sixcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('sixcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('sixcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 6,
                        	            'category_name' => get_theme_mod('sixcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End template four-->
                    <div class="row">
                        <?php 
                            $homePageFeatured = new WP_Query(array(
                                'post_type'=> 'ad',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ads',
                                        'field' => 'name',
                                        'terms' => 'Front page fifth'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                            <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                            </div>
                        
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--End Add-->
                    <?php endif; ?>
                    
                    <div class="row">
                      
                        <div class="col-12 col-sm-12 col-xl-6 col-md-6 ">
                             <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('agcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('agcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('agcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 4,
                        	            'category_name' => get_theme_mod('agcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-12 col-sm-12 col-xl-6 col-md-6 pm-0">
                            <div class="col-12 gldiv pm-0">
                                <div class="gltitle">
                                <span> <?php echo get_theme_mod('photoname') ?></span>
                            </div>
                                <div class="owl-carouselim pm-0">
                                      <?php
                                                $argssle = array(
                                                	'post_type' => 'image',
                                                	'posts_per_page' => 10,
                                                );
                                                $query4 = new WP_query ( $argssle );
                                                if ( $query4->have_posts() ) { 
                                                ?>
                                                <?php while ( $query4->have_posts() ) : $query4->the_post(); ?>
                                    <div class="item">
                                        <div class="tem_post">
                                            <a href="<?php the_post_thumbnail_url(); ?>" title="<?php the_title();?>" caption="<?php the_title();?>" class="gallery-item">
                                                <div class="post_bimage glimage">
                                            			<?php the_post_thumbnail( 'medum', array(
                                            							'class' => 'img-fluid',
                                            							'alt'	=> get_the_title(),
                                            							) );
                                            						?>
                                                </div>
                                                <div class="tem2post_content glcaption">
                                                    <h4><?php the_title();?></h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endwhile; }; wp_reset_query();; ?>
                                  </div>
                                </div>
                                <!-- End Photo-->
                                
                            <div class="col-12 gldiv pm-0">
                                <div class="gltitle">
                                 <span> <a href="https://www.youtube.com/channel/UCD2-X_oj3pLpnwyL5qE8-Lw" target="__blank"> <?php echo get_theme_mod('videoname') ?></a></span>
                            </div>
                                <div class="owl-carouselvi pm-0">
                                      <?php
                                                $argssle = array(
                                                	'post_type' => 'video',
                                                	'posts_per_page' => 10,
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'videos',
                                                            'field' => 'name',
                                                            'terms' => 'posts'
                                                        ),
                                                    )
                                                );
                                                $query4 = new WP_query ( $argssle );
                                                if ( $query4->have_posts() ) { 
                                                ?>
                                                <?php while ( $query4->have_posts() ) : $query4->the_post(); ?>
                                    <div class="item">
                                        <div class="tem_post fix">
                                            <a href="<?php echo get_post_meta( get_the_ID(), 'videolink', true );?>" title="<?php the_title();?>" caption="<?php the_title();?>" class="video">
                                                <img class="videogif" src="<?php echo get_template_directory_uri();?>/img/371907120_YOUTUBE_ICON_TRANSPARENT_400.gif" alt="Youtube Video"/>
                                                <div class="post_bimage glimage">
                                            			<?php the_post_thumbnail( 'medium', array(
                                            							'class' => 'img-fluid',
                                            							'alt'	=> get_the_title()
                                            							) );
                                            						?>
                                                </div>
                                                <div class="tem2post_content glcaption">
                                                    <h4><?php the_title();?></h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endwhile; }; wp_reset_query();; ?>
                                  </div>
                                </div>
                                <!-- End Video-->
                        </div>
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
                                        'terms' => 'Front page third'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                            <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                            </div>
                        
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--End lead Add-->
                    
                    <?php if(get_theme_mod('show_thirdcat_section') == true): ?>
                    <!--Start Template five-->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-xl-6 pmr-0 post-div ">
                            <div class="post_section_title">
                         <?php 
                        $args = array(
                            'category_name' => get_theme_mod('sevencat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('seventhname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp3">
                                <?php
                                $args = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 1,
                        	        'category_name' => get_theme_mod('sevencat'),
                                );
                                $query = new WP_query ( $args );
                                if ( $query->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="first_post">
                                <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                    if($i == 1){
                                ?>
                                    <div class="post_bimage">
                                     <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					</a>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                    <div class="morepara">
                                    <?php the_excerpt();?>
                                    </div>
                                    <a class="more_read" href="<?php the_permalink();?>">বিস্তারিত..</a>
                                <?php }; endwhile; ?>
                                </div>
                                <?php } ; wp_reset_query();?>
                                
                                <?php
                                $argss = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 6,
                        	        'category_name' => get_theme_mod('sevencat'),
                                );
                                $query2 = new WP_query ( $argss );
                                if ( $query2->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="sub_post">
                                    <?php while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					<h3><?php the_title();?></h3></a>
                                   </div> 
                                    <?php }; endwhile; ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                                <?php } ; wp_reset_query();?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-xl-6 post-div pmr-0">
                            <div class="post_section_title">
                         <?php 
                        $args = array(
                            'category_name' => get_theme_mod('eightcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('eighthcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp3">
                                <?php
                                $args = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 1,
                        	        'category_name' => get_theme_mod('eightcat'),
                                );
                                $query = new WP_query ( $args );
                                if ( $query->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="first_post">
                                <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                    if($i == 1){
                                ?>
                                    <div class="post_bimage">
                                     <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					</a>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                    <div class="morepara">
                                    <?php the_excerpt();?>
                                    </div>
                                    <a class="more_read" href="<?php the_permalink();?>">বিস্তারিত..</a>
                                <?php }; endwhile; ?>
                                </div>
                                <?php } ; wp_reset_query();?>
                                
                                <?php
                                $argss = array(
                                	'post_type' => 'post',
                                	'posts_per_page' => 6,
                        	        'category_name' => get_theme_mod('eightcat'),
                                );
                                $query2 = new WP_query ( $argss );
                                if ( $query2->have_posts() ) { 
                                    $i = 0;
                                ?>
                                <div class="sub_post">
                                    <?php while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?>
                    					<h3><?php the_title();?></h3></a>
                                   </div> 
                                    <?php }; endwhile; ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                                <?php } ; wp_reset_query();?>
                            </div>
                        </div>
                    </div>
                    <!--End Template five-->
                    <div class="row">
                        <?php 
                            $homePageFeatured = new WP_Query(array(
                                'post_type'=> 'ad',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ads',
                                        'field' => 'name',
                                        'terms' => 'Front page sixth'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                        <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                        </div>
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--End Add-->
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('show_focat_section') == true): ?>
                    <!--Star Template four-->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-xl-4 pmr-0 post-div ">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('ninthcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('ninthcatneme') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('ninthcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 6,
                        	            'category_name' => get_theme_mod('ninthcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-xl-4 post-div pmr-0">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('ninthcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('tenthcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('tenthcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 6,
                        	            'category_name' => get_theme_mod('tenthcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-xl-4 post-div pmr-0">
                            <div class="post_section_title">
                              <?php 
                        $args = array(
                            'category_name' => get_theme_mod('eleventhcat'),
                          ); 
                        ?>
                      <a href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>"><span> <?php echo get_theme_mod('elaventhcatname') ?></span></a><a class="right-align" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">সব খবর</a>
                            </div>
                            <div class="temp4">
                                
                                <div class="first_post">
                                    
                                        <?php
                                        $args = array(
                                        	'post_type' => 'post',
                                        	'posts_per_page' => 1,
                        	                'category_name' => get_theme_mod('eleventhcat'),
                                        );
                                        $query = new WP_query ( $args );
                                        if ( $query->have_posts() ) { 
                                            $i = 0;
                                        ?>
                                    <?php while ( $query->have_posts() ) : $query->the_post(); $i++; 
                                        if($i == 1){
                                    ?>
                                    <div class="post_bimage">
                                          <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'frontbig', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> </a>
                                    </div>
                                    <a href="<?php the_permalink();?>"><h3><?php the_title(); ?></h3></a>
                                    <?php }; endwhile; }; wp_reset_query(); ?>
                                    
                                </div>
                                <div class="sub_post">
                                    
                                    <?php
                                    $argss = array(
                                    	'post_type' => 'post',
                                    	'posts_per_page' => 6,
                        	            'category_name' => get_theme_mod('eleventhcat'),
                                    );
                                    $query2 = new WP_query ( $argss );
                                    if ( $query2->have_posts() ) { 
                                        $i = 0;
                                    while ( $query2->have_posts() ) : $query2->the_post(); $i++; 
                                            if($i > 1){
                                        ?>
                                   <div class="sub-item">
                                        <a href="<?php the_permalink(); ?>">
                    						<?php the_post_thumbnail( 'tempside', array(
                    							'class' => 'img-fluid',
                    							'alt'	=> get_the_title()
                    							) );
                    						?> <h3><?php the_title();?></h3></a>
                                   </div> 
                                   <?php }; endwhile; }; wp_reset_query(); ?>
                                   <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End template four-->
                    <div class="row">
                        <?php 
                            $homePageFeatured = new WP_Query(array(
                                'post_type'=> 'ad',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ads',
                                        'field' => 'name',
                                        'terms' => 'Front page seventh'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                            <div class="col-12 col-sm-12 col-xl-4 col-md-4 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                            </div>
                        
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--End Add-->
                    <?php endif; ?>
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
                                           <a class="more_news" href="<?php echo site_url();?>/post">আরো খবর..</a>
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
                            $homePageFeatured = new WP_Query(array(
                                'post_type'=> 'ad',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ads',
                                        'field' => 'name',
                                        'terms' => 'Sidebar one'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                            <div class="col-12 col-sm-12 col-xl-12 col-md-12 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                            </div>
                        
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
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
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('twlvecatname') ?></button>
                                    </li>
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('side2catname') ?></button>
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
                                           <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                  
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
                                           <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                        <?php 
                            $homePageFeatured = new WP_Query(array(
                                'post_type'=> 'ad',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'ads',
                                        'field' => 'name',
                                        'terms' => 'Sidebar two'
                                    ),
                                )
                            ));
                        
                            while(  $homePageFeatured->have_posts()){
                                    $homePageFeatured->the_post(); ?>
                                            <div class="col-12 col-sm-12 col-xl-12 col-md-12 p-2">
                            						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                    					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                    					</a>
                                            </div>
                        
                        <?php } ?>
                        <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif;?>
                   
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
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('side3catname') ?></button>
                                    </li>
                                    <li class="tab-group__tab-li tab-group__tab-li_fill">
                                         <button type="button" class="tab-group__tab-btn"><?php echo get_theme_mod('side4catname') ?></button>
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
                                           <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                  
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
                                           <a class="more_news" href="archives/category/<?php echo get_category_by_slug($args['category_name'])->slug ; ?>">আরো খবর..</a>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--end Popular Tab-->
                                <?php 
                                    $homePageFeatured = new WP_Query(array(
                                        'post_type'=> 'ad',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'ads',
                                                'field' => 'name',
                                                'terms' => 'Sidebar four'
                                            ),
                                        )
                                    ));
                                
                                    while(  $homePageFeatured->have_posts()){
                                            $homePageFeatured->the_post(); ?>
                                                        <div class="col-12 col-sm-12 col-xl-12 col-md-12 p-2">
                                    						<a href="<?php echo get_post_meta( get_the_id(), 'targetlink', true );?>" target="__blank">
                                            					<img src="<?php echo get_the_post_thumbnail_url()?>" class="img-thumbnail mt-10" alt="<?php echo get_the_title() ?>">
                                            					</a>
                                                        </div>
                                
                                <?php } ?>
                                <?php  wp_reset_postdata(); ?>
                    </div>
                    <!--Widget Item end-->
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </body>
  <?php get_footer();?>
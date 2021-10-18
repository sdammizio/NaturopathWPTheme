<section class="servicesCarousel">
    <div class="blockTitleArea">
        <div class="blockHeading">
            <h1 class="darkGrey heading2"><?php the_field("services_block_title"); ?></h1>
        </div>
   
        <?php if( $blockSubtitle ) { ?>
            <?php the_field("services_block_subtitle"); ?>
        <?php } ?>

        <div class="bodyType2 lightGrey">
            <?php the_field("services_block_subtitle"); ?>
        </div>
    </div>

   

        

    <section id="slider" class="row">
		<div class="col-xs-12 area">
			<div class="more-slider col-xs-12 col-sm-6 col-sm-push-6 col-md-3 col-md-push-9">
				<article class="content row">
					<div class="slide-controls"><span class="slider-previous"><i class="fas fa-angle-left"></i></span><span class="slider-next"><i class="fas fa-angle-right"></i></span></div>
				</article>
			</div>

            <div class="slider-wrapper col-xs-9 col-sm-pull-6 col-md-pull-3">
					<div class="scroll-wrapper">
						<ul class="row">
            
                <?php

                // The Query
                $the_query = new WP_Query(
                    array(
                        'post_type' => 'service_types',
                        'posts_per_page' => -1,
                    )
                );

                // The Loop
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) { 
                        $the_query->the_post(); ?>
                        <?php the_content(); ?>

                                <a href="<?php the_permalink(); ?>" title="Service">
									<li class="slider" style="left:-0%;-webkit-transition:left 1s;transition:left 1s;">
                                            <img src="<?php the_field("service_icon", get_the_ID()); ?>">
                                            <h2 class="bodyType1 darkGrey"><?php the_title(); ?></h2>
                                            <div class="serviceCardText">
                                                <p class="bodyType2 lightGrey"><?php the_field("service_subtitle_text", get_the_ID()); ?></p>
                                            </div>
									</li>
								</a>

                <?php }
                
                    /* Restore original Post Data */
                    wp_reset_postdata();
                } else { ?>
                    <!-- no posts found -->
                    <p class="bodyType2 lightGrey">There are no services.</p>
                <?php } ?>
            </div>
        </div>
    </section>
</section>


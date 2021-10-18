<?php /* Template Name: Services */ ?>

<div class="page wrapper">

    <?php get_header(); ?>


    <div class="wrapper">


        <div class="content">

            <section class="serviceHeadingArea extraMarginTop">
                <h1 class="heading1 darkGrey noMarginBottom"><?php the_field("service_page_title"); ?></h1>
                <p class="lightGrey bodyType2"><?php the_field("service_page_subtitle"); ?></p>
            </section>

            
            <section class="serviceCardAreaPage">
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

                            <a href="<?php the_permalink(); ?>">
                                <div class="serviceCardPage">
                                    <img src="<?php the_field("service_icon"); ?>">
                                    <h2 class="bodyType1 darkGrey"><?php the_field("service_title") ; ?></h2>
                                    <div class="serviceCardText">
                                        <p class="bodyType2 lightGrey"><?php the_field("service_subtitle_text") ; ?></p>
                                        </div>
                                </div>
                            </a>

                        <?php }
                        
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    } else { ?>
                        <!-- no posts found -->
                        <p class="bodyType2 lightGrey">There are no services.</p>
                    <?php } ?>
            </section>
        </div>
    </div>

    <section class="sectionNewsletter">
        <div class="newsletterFlex">
            <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
            <?php get_sidebar(); ?>
        </div>
    </section>

    <?php get_footer(); ?>

</div>
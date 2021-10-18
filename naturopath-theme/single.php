<?php get_header(); ?>

<div class="wrapper">
  <div class="content">
    <section class="postFlexbox">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="imageBannerPost">
              <img src="<?php the_field("blog_post_banner_image"); ?>">
            </div>

            <div class="postHeadingContainer">
              <h1 class="heading1 darkGrey"><?php the_title(); ?></h1>
            </div>

            <div class="entry-meta">
              <div class="postMeta">
                <h2 class="noMargin heading5 darkGrey"><?php echo get_the_author(); ?> </h2>
                <h2 class="noMargin darkGrey bodyType3"><?php echo get_the_date( 'F j, Y'  ); ?> </h2>
              </div>
              <div class="shareButtons">
                <p class="marginRight noMarginTopBottom darkGrey heading5">Share:</p>
                <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
              </div>
            </div><!-- .entry-meta -->

            
              <div class="entry-content darkGrey bodyType2">
                <div class="blogPostColumn">

                  <p class="marginRight lightGrey bodyType2"><?php the_field("blog_text_block_1"); ?></p>
                  
                  <div class="blogPostPullQuote">
                      <div id="colouredBar"> </div>
                      <p class="heading4 marginTop lightGrey marginLeftRight">"<?php the_field("blog_post_pull_quote"); ?>"</p>
                  </div>

                </div>

                <div class="secondaryImageContainer">
                  <img class="blogSecondaryImage" src="<?php the_field("blog_post_secondary_image") ?>">
                </div>

              </div>

              <div>
                <div class="blogPostColumn">
                  <p class="lightGrey bodyType2"><?php the_field("blog_text_block_2"); ?></p>
                  
                  <div class="threeImageGrid">
                    <?php

                        // Check rows exists.
                        if( have_rows('group_of_3_images') ):

                            // Loop through rows.
                            while( have_rows('group_of_3_images') ) : the_row(); ?>
                              <div class="squareImageContainer">
                                <img class="squareImage" src="<?php the_sub_field('image_1',"squareBlogGrid"); ?>">
                              </div>
                              <div class="squareImageContainer">
                                <img class="squareImage" src="<?php the_sub_field('image_2',"squareBlogGrid"); ?>">
                              </div>
                              <div class="squareImageContainer">
                                <img class="squareImage" src="<?php the_sub_field('image_3',"squareBlogGrid"); ?>">
                              </div>
                                
                          <?php endwhile;

                        // No value.
                        endif;?>
                  </div>

                  <p class="lightGrey bodyType2"><?php the_field("blog_text_block_3"); ?></p>
                </div>
              </div>
               
              <?php the_content(); ?>
              </div><!-- .entry-content -->


              <!-- post tags -->
              <section class="tagsArea">
                <div>
                  <?php the_tags("Tags   ", ' ', '');?>
                </div>
              </section>


            <div id="nav-below">
              <p class="nav-previous"><?php previous_post_link('%link', '&larr; Previous'); ?></p>
              <p class="nav-next"><?php next_post_link('%link', 'Next &rarr;'); ?></p>
            </div><!-- #nav-below -->

            <!--Blog Posts Preview Block-->
            <section class="blogPostBlock">
                <h4 class="noMargin darkGrey heading2"><?php the_field("bottom_blog_block_heading"); ?></h4>
                <div class="cardFlexContainer">
                    <?php $the_query = new WP_Query( 'posts_per_page=4' ); ?>
                      
                    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

                    <div class="cardFlexItem">
                                  <div class="blogImageContainer">
                                      <img src="<?php the_field("blog_post_banner_image"); ?>">
                                  </div>
                                  <div class="categoryBox">
                                      <?php the_category(); ?>
                                  </div>
                                  <div class="headingBox">
                                      <h1 class="heading5 darkGrey"><?php the_title(); ?></h1>
                                  </div>
                                  <div class="excerptBox">
                                  <p class="bodyType2 lightGrey"><?php echo custom_field_excerpt(80); ?></p>
                                  </div>
                              </div>
                      
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
              </section>


            <!--Comments Area-->
            <section id="commentsArea">
                <?php comments_template( '', true ); ?>
            </section>

          <?php endwhile; // end of the loop. ?>

          </div> <!-- /.content -->
            

    </section>
  </div>

  <!--Newsletter Area-->
  <section class="sectionNewsletter">
      <div class="newsletterFlex">
        <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
        <?php get_sidebar(); ?>
      </div>
  </section>

</div>

<?php get_footer(); ?>
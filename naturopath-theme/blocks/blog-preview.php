<section class="homepgBlock">
    
    <div class="blockTitleArea">
        <div class="blockHeading">
            <h1 class="darkGrey heading2"><?php the_field("block_title"); ?></h1>
        </div>

        <?php $blockSubtitle = get_field("block_subtitle"); ?>
        <?php if( $blockSubtitle ) { ?>
            <?php the_field("block_subtitle"); ?>
        <?php } ?>

        <div class="bodyType2 lightGrey">
            <?php the_field("blog_subtitle_text"); ?>
        </div>
    </div>

    <div class="featuredBlogPost">
        <?php $the_query = new WP_Query( 'posts_per_page=1', 'order =DSC' ); ?>
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        

        <div class="featuredBlogPostColumn">
            <h3 class="heading4 darkGrey"><?php the_title();?></h3>
            <p class="bodyType2 lightGrey"><?php the_field("blog_text_block_1",get_the_ID()); ?></p>
            <a class="internalLink" href="<?php the_permalink(); ?>"><?php the_field("link_text","option") ?></a>
        </div>
        <div class="secondaryImageContainer">
            <img class="blogSecondaryImage" src="<?php the_field("blog_post_banner_image", get_the_ID()); ?>">
        </div>
        
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>


<!--Blog Posts Preview Block-->

<section class="homepgBlock">
  <div class="cardFlexContainer">
        <?php $the_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'order' => 'ASC'
                )
        );?>
          
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

            <div class="cardFlexItem">
                      <div class="blogImageContainer">
                          <img src="<?php the_field("blog_post_banner_image", get_the_ID()); ?>">
                      </div>
                      <div class="categoryBox">
                          <?php the_category(); ?>
                      </div>
                      <div class="headingBox">
                          <h1 class="heading5 darkGrey"><?php the_title(); ?></h1>
                      </div>
                      <div class="excerptBox">
                          <p class="bodyType2 lightGrey"><?php echo custom_field_excerpt(20, get_the_ID()); ?></p>
                      </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>






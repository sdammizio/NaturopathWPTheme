<?php get_header(); ?>

<div class="wrapper">
  <div class="content">
    <div class="headingArea">
      <h1 class="heading1 darkGrey"><?php single_cat_title(); ?></h1>
    </div>

    <section class="cardFlexContainer">
      <?php // Start the loop ?>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <div class="cardFlexItem">
              <div class="blogImageContainer">
                  <img src="<?php the_field("blog_post_banner_image"); ?>" alt=""> 
              </div>
                <div class="categoryBox">
                    <?php the_category(); ?>
                </div>
                <div class="headingBox">
                    <h1 class="heading5 darkGrey"><?php the_title(); ?></h1>
                </div>
                <div class="excerptBox">
                  <p class="bodyType2 lightGrey"><?php echo custom_field_excerpt(20); ?></p>
                </div>
            </div>
        <?php endwhile; // end the loop?>
    </section>

    <?php the_posts_pagination(array(
                "type" => "list",
    )); ?>
    
  </div>
</div>

<section class="sectionNewsletter">
  <div class="newsletterFlex">
    <h3 class="bodyType1"><?php the_field("newsletter_title","option"); ?></h3>
    <?php get_sidebar(); ?>
  </div>
</section>

<?php get_footer(); ?>
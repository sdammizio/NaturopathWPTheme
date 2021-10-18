<?php /* Template Name: Custom home */ ?>

<div class="page wrapper">

  <?php get_header(); ?>

  <div class="wrapper">

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <!-- Masthead Banner -->

          <section class="hero">
            <div class="heroImageContainer">
              <div class="overlay"></div>
              <img class="heroImg"src="<?php echo get_field('background_image'); ?>" />
            </div>
            <div class="bannerContent">
              <h1 class="cream margin heading1"><?php the_field("masthead_title_text"); ?></h1>

              <?php $mastheadSubtitle = get_field("masthead_subtitle_text"); ?>
              <?php if( $mastheadSubtitle ) { ?>
                  <p class="bodyType1 cream marginBottom"><?php the_field("masthead_subtitle_text"); ?></p>
              <?php } ?>

              <a class="mainButton" href="<?php the_field("masthead_button_link"); ?>"><?php the_field("button_text_label"); ?></a>
            </div>
          </section>

          <!-- Bring in editable blocks -->

          <?php the_content(); ?>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->



    <!-- Instagram Feed -->
      <?php echo do_shortcode('[instagram-feed]'); ?>


    <!-- Newsletter sign-up -->
    <section class="sectionNewsletter">
        <div class="newsletterFlex">
          <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
          <?php get_sidebar(); ?>
        </div>
    </section>
  </div>

  <?php get_footer(); ?>

</div>



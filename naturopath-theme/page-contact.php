<?php /* Template Name: Contact */ ?>

<div class="page wrapper">

    <?php get_header(); ?>

    <div class="wrapper">
        <div class="content">
            <section class="contactFlexbox">   
                    <div class="contactHeader">
                        <h1 class="heading1 darkGrey noMarginBottom"><?php the_field("contact_page_title"); ?></h1>

                        <?php $contactSubtitle = get_field("contact_subheading"); ?>
                        <?php if( $contactSubtitle ) { ?>
                            <p class="lightGrey marginRight bodyType2"><?php the_field("contact_subheading"); ?></p>
                        <?php } ?>
                        
                        <?php // Start the loop ?>
                        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    </div>
                    <div class="contactImageContainer">
                        <img class="contactImage" src="<?php the_field("contact_image"); ?>">
                    </div>    
            </section>

            <?php endwhile; // end the loop?>
        </div> <!-- /,content -->
    <div>

    <section class="sectionNewsletter">
        <div class="newsletterFlex">
        <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
        <?php get_sidebar(); ?>
        </div>
    </section>

    <?php get_footer(); ?>

</div>
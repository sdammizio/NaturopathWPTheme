<?php /* Template Name: Booking */ ?>

<div class="page wrapper">

    <?php get_header(); ?>

    <div class="wrapper">

        <div class="content">

            <section class="bookingContent">
                <div class="blockTitleArea">
                    <div class="blockHeading">
                        <h1 class="darkGrey heading1"><?php the_field("booking_page_title");?></h1>
                        <p class="bodyType2 lightGrey"><?php the_field("booking_subtitle");?></p>
                    </div>
                </div>

                <div id="bookingForm">
                    <?php echo do_shortcode("[booking type=1 nummonths=1]"); ?>
                </div>
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


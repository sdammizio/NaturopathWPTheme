<div class="page wrapper">

    <?php get_header(); ?>

    <div class="wrapper">

        <div class="content">
            <?php // Start the loop ?>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

                <div class="serviceHeadingArea">
                    <h1 class="heading1 darkGrey noMarginBottom"><?php the_title(); ?></h1>
                    <p class="lightGrey bodyType2"><?php the_field("service_subtitle_text"); ?></p>
                </div>

                <div class="imageBannerPost">
                    <img src="<?php the_field("service_main_image"); ?>">
                </div>
                
                <section class="aboutBodySection">
                    <div class="aboutParagraphAdjustedWidth">
                        <h3 class="darkGrey heading5"><?php the_field("service_subhead_1"); ?></h3>
                        <p class="bodyType3 marginRight lightGrey"><?php the_field("service_text_block_1"); ?></p>
                    </div>
                    <div class="focusImageContainer">
                        <img class="focusImage"src="<?php the_field("service_secondary_image"); ?>">
                    </div>
                </section>

                <section class="aboutBodySection">
                    <div class="aboutColumn">
                        <div class="pullQuote">
                            <div id="colouredBar"> </div>
                            <p class="heading4 marginTop lightGrey marginLeftRight">"<?php the_field("service_pull_quote_text"); ?>"</p>
                        </div>
                        <div class="aboutParagraph">
                            <h3 class="darkGrey heading5"><?php the_field("service_subhead_2"); ?></h3>
                            <p class="bodyType3 marginRight lightGrey"><?php the_field("service_text_block_2"); ?></p>
                        </div>
                    </div>
                    <div class="aboutColumn">
                        <div class="aboutParagraph">
                            <h3 class="darkGrey heading5"><?php the_field("service_subhead_3"); ?></h3>
                            <p class="bodyType3 lightGrey"><?php the_field("service_text_block_3"); ?></p>
                        </div>
                    </div>
                </section>

            <?php endwhile; // end the loop?>
        </div> <!-- /,content -->

        <section class="sectionNewsletter">
            <div class="newsletterFlex">
                <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
                <?php get_sidebar(); ?>
            </div>
        </section>

    <?php get_footer(); ?>

</div>
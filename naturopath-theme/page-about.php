<?php /* Template Name: About */ ?>

<div class="page wrapper">

    <?php get_header(); ?>

    <div class="wrapper">
        <div class="content">
            <?php // Start the loop ?>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

                <div class="headingArea">
                    <h1 class="heading1 darkGrey noMarginBottom"><?php the_field("about_page_title"); ?></h1>
                    <h2 class="darkGrey heading2"> <?php the_field("heading_text"); ?> </h2>
                    <h3 class="lightGrey bodyType2"><?php the_field("subtitle_text"); ?></h3>
                </div>

                <div class="imageBannerPost">
                    <img src="<?php the_field("banner_image"); ?>">
                </div>
                
                <section class="aboutBodySection">
                    <div class="aboutParagraphAdjustedWidth">
                        <h3 class="darkGrey noMargin heading5"><?php the_field("subheading_paragraph_one"); ?></h3>
                        <p class="bodyType3 marginRight lightGrey"><?php the_field("paragraph_1_text"); ?></p>
                    </div>
                    <div class="focusImageContainer">
                        <img class="focusImage"src="<?php the_field("focus_image"); ?>">
                    </div>
                </section>

                <section class="aboutBodySection">
                    <div class="aboutColumn">
                        <div class="pullQuote">
                            <div id="colouredBar"> </div>
                            <p class="heading4 marginTop lightGrey marginLeftRight">"<?php the_field("pull_quote_text"); ?>"</p>
                        </div>
                        <div class="aboutParagraph">
                            <h3 class="darkGrey heading5"><?php the_field("subheading_paragraph_two"); ?></h3>
                            <p class="bodyType3 marginRight lightGrey"><?php the_field("paragraph_two_text"); ?></p>
                        </div>
                    </div>
                    <div class="aboutColumn">
                        <div class="aboutParagraph">
                            <h3 class="darkGrey heading5"><?php the_field("subheading_paragraph_three"); ?></h3>
                            <p class="bodyType3 lightGrey"><?php the_field("text_paragraph_three"); ?></p>
                        </div>
                        <div class="aboutParagraph">
                            <p class="heading3 marginTop noMarginBottom darkGrey"><?php the_field("author_name"); ?></p>
                            <p class="bodyType3 noMargin lightGrey"><?php the_field("author_title"); ?></p>
                        </div>
                    </div>
                </section>

            <?php endwhile; // end the loop?>
        </div> <!-- /,content -->
    </div>

    <section class="sectionNewsletter">
        <div class="newsletterFlex">
        <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
        <?php get_sidebar(); ?>
        </div>
    </section>

    <?php get_footer(); ?>

</div>
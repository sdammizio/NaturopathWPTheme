<section class="homeGreenBlock">
    <div class="blockFlexbox">
        <div class="bioImageContainer">
            <img src="<?php the_field("author_image"); ?>">
        </div>
        <div class="blockTextContainer">
            <div class="bioAuthorName">
                <h3 class="darkGrey heading4"><?php the_field("name_and _title"); ?></h3>
            </div>
            <div class="bioAuthorDescription">
                <p class="bodyType1 lightGrey"><?php the_field("author_description"); ?></p>
            </div>
            <div class="bioLink">
                <a class="internalLink" href="<?php echo site_url('/about'); ?>"><?php the_field("link_text","option") ?></a>
            </div>
        </div>
    </div>
</section>
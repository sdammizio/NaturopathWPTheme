</main>

<footer>
<?php wp_footer(); ?>

<div class= "footerWrapper">

  <div class="footerFlex">

    <div class="logoFooterContainer">
        <?php wp_nav_menu( array(
              'theme_location' => 'logo',
              'container_class' => 'menu'
            )); ?>
    </div>

    <div class="footerLinksFlex">
        <div class="recentPosts heading3">
          <h3 class="heading3">Recent Posts</h3>
          <ul class="bodyType3">
            <?php 
            // Define our WP Query Parameters
            $the_query = new WP_Query( 'posts_per_page=4' ); ?>
              
            <?php 
            // Start our WP Query
            while ($the_query -> have_posts()) : $the_query -> the_post(); 
            // Display the Post Title with Hyperlink
            ?>
              
            <li><a href="<?php the_permalink() ?>"><?php echo wp_trim_words( get_the_title(), 6, '...' );?></a></li>
              
            <li>
              
            <?php 
            // Repeat the process and reset once it hits the limit
            endwhile;
            wp_reset_postdata();
            ?>
      </ul>
        </div>

        <div class="footerMainMenu">
          <?php wp_nav_menu( array(
                  'theme_location' => 'footer',
                  'container_class' => 'menu'
                )); ?>
        </div>
      </div>
    </div>

    <div class="footerCopyright bodyType3">
      <div>
        <p class="copywriteText">© <?php the_field ("copyright_text", "option"); ?> All Rights Reserved.</p>
      </div>

      <div class="socialMenu">
        <?php wp_nav_menu( array(
                'theme_location' => 'social',
                'container_class' => 'menu'
        )); ?>
      </div>
    </div>

  </div>
</div>





</footer>

</body>
</html>
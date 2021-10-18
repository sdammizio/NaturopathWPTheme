<?php get_header(); ?>

<div class="wrapper">
  <section id="errorMessage">
    <h1 class="darkGrey heading2">Not Found</h1>
    <p class="lightGrey bodyType2">Apologies, but the page you requested could not be found.</p>
  </section>

</div> 

<!-- Newsletter sign-up -->
<div class="sectionNewsletter">
    <div class="newsletterFlex">
      <h3 class="heading4"><?php the_field("newsletter_title","option"); ?></h3>
      <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
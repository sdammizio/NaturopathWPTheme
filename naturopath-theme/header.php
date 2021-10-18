<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<a class="skip-link" href="#content">Skip to main content</a>

<!--Desktop-->
<header>
  <div class="main-nav">
    <div class="wrapperFlex">

      <div class="socialMenu">
          <?php wp_nav_menu( array(
            'theme_location' => 'social',
            'container_class' => 'menu'
          )); ?>
          <a id="contactButton" href="<?php the_field("contact_button_link_destination","option"); ?>"> <?php the_field ("contact_button", "option"); ?> </a>
      </div>

      <div class="mainMenu">
        <div class="logoContainer">
          <?php wp_nav_menu( array(
                'theme_location' => 'logo',
                'container_class' => 'menu'
          )); ?>
        </div>
        <div class="mainMenuOptions">
          <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'container_class' => 'menu'
          )); ?>
        </div>
      </div>
    </div>
  </div> 


  <!--Mobile/Tablet-->


    <div class="navbar2">
      <i id="hamburgerIcon"class="fas fa-bars fa-2x"></i>
      <div id="hiddenDropdown" class="hidden">
        <div class="menuLinks">
            <div class="mainMenuOptions">
              <?php wp_nav_menu( array(
                'theme_location' => 'mobile',
                'container_class' => 'menu'
              )); ?>
            </div>
        </div>

        <div class="socialLinks">
          <?php wp_nav_menu( array(
            'theme_location' => 'social',
            'container_class' => 'menu'
          )); ?>
        </div>
        <a id="contactButton" href="<?php the_field("contact_button_link_destination","option"); ?>"> <?php the_field ("contact_button", "option"); ?> </a>
      </div>
    </div>

</header>

      

<main id="maincontent">

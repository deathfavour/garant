<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
  <nav class="nav<?php echo ( is_page( [ 'privacy-policy', 'terms-of-use', 'gdpr-policy', 'cookie-policy' ] ) ) ? ' nav--dark' : ''; ?>">
    <div class="container">
      <div class="nav__inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/pictures/logo white.png"
               alt="Garant Marine Group LLC" class="nav__logo-img" />
        </a>
        <div class="nav__links">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
             <?php if ( is_front_page() ) echo 'class="active"'; ?>>Home</a>
          <a href="<?php echo esc_url( home_url( '/for-seafarers/' ) ); ?>"
             <?php if ( is_page( 'for-seafarers' ) ) echo 'class="active"'; ?>>For Seafarers</a>
          <a href="<?php echo esc_url( home_url( '/for-clients/' ) ); ?>"
             <?php if ( is_page( 'for-clients' ) ) echo 'class="active"'; ?>>For Clients</a>
          <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"
             <?php if ( is_page( 'about-us' ) ) echo 'class="active"'; ?>>About Us</a>
          <a href="<?php echo esc_url( home_url( '/about-founder/' ) ); ?>"
             <?php if ( is_page( 'about-founder' ) ) echo 'class="active"'; ?>>About Founder</a>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
             <?php if ( is_page( 'contact' ) ) echo 'class="active"'; ?>>Contact Us</a>
        </div>
        <div class="nav__toggle" aria-label="Menu">
          <span></span><span></span><span></span>
        </div>
      </div>
    </div>
  </nav>
</header>

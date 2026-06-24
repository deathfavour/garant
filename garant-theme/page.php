<?php get_header(); ?>

<section class="legal-hero">
  <div class="container">
    <p class="section-label">Page</p>
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section class="legal-body">
  <div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>

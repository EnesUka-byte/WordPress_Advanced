<?php

get_header(); ?>

<h1>DS Portfolio Template</h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
<article <?php post_class(); ?>>

  <?php if ( has_post_thumbnail() ) : ?>
    <?php the_post_thumbnail('medium'); ?>
  <?php endif; ?>

  <h2><?php the_title(); ?></h2>
</article>
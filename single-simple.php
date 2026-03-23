<?php get_header(); ?>

<div class="container">

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

        <article class="single-post">

            <!-- Titulli i postimit -->
            <h1><?php the_title(); ?></h1>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- Kategoritë -->
            <div class="post-categories">
                <strong>Kategoria:</strong>
                <?php the_category(', '); ?>
            </div>

            <!-- Përmbajtja e postimit -->
            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <div class="post-tags">
                <strong>Tags:</strong>
                <?php the_tags('', ', ', ''); ?>
            </div>

            <!-- Edit link -->
            <div class="edit-link">
                <?php edit_post_link('Edito këtë postim'); ?>
            </div>

        </article>

        <!-- Comments -->
        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

<?php
    endwhile;
endif;
?>

</div>

<?php get_footer(); ?>
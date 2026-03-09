<?php get_header(); ?>

<div class="container my-5">

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>

<div class="row justify-content-center">
<div class="col-lg-8">

<article class="single-post card shadow-sm">

<div class="card-body">

    <!-- Post Title -->
    <h1 class="card-title text-primary mb-3">
        <?php the_title(); ?>
    </h1>

    <!-- Featured Image -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-image mb-4">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
        </div>
    <?php endif; ?>

    <!-- Categories -->
    <div class="post-categories mb-3">
        <strong>Categories:</strong>
        <span class="badge bg-primary">
            <?php the_category('</span> <span class="badge bg-primary">'); ?>
        </span>
    </div>

    <!-- Content -->
    <div class="post-content mb-4">
        <?php the_content(); ?>
    </div>

    <!-- Tags -->
    <div class="post-tags mb-3">
        <strong>Tags:</strong>
        <?php the_tags(
            '<span class="badge bg-secondary me-1">',
            '</span><span class="badge bg-secondary me-1">',
            '</span>'
        ); ?>
    </div>

    <!-- Edit link -->
    <div class="edit-link">
        <?php edit_post_link('Edit this post', '<p class="text-end">', '</p>'); ?>
    </div>

</div>

</article>

</div>
</div>

<?php
if (comments_open() || get_comments_number()) :
    comments_template();
endif;
?>

<?php
endwhile;
endif;
?>

</div>

<?php get_footer(); ?>
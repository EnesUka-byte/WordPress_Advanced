<?php get_header(); ?>

<div class="container my-5">

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
    ?>

        <div class="row justify-content-center">
            <div class="col-lg-8">

             <article class="card shadow-sm border-0">

                <!-- Featured Image -->
                <?php if ( has_post_thumbnail() ) : ?>
                     <div class="card-img-top">
                        <?php the_post_thumbnail('large', ['class' => 'img-fluid w-100']); ?>
                    </div>
                <?php endif; ?>

                <div class="card-body">

                    <!-- Title -->
                    <h1 class="card-title mb-3">
                        <?php the_title(); ?>
                    </h1>

                    <!-- Post Meta -->
                    <div class="text-muted mb-4 small">
                        <span>Published: <?php echo get_the_date(); ?></span> |
                        <span>Author: <?php the_author(); ?></span> |
                        <span>Category: <?php the_category(', '); ?></span>
                    </div>

                    <!-- Content -->
                    <div class="post-content mb-4">
                        <?php the_content(); ?>
                    </div>

                    <!-- Tags -->
                    <div class="mb-3">
                        <strong>Tags:</strong>
                        <?php the_tags('', ', ', ''); ?>
                    </div>

                    <!-- Edit Link -->
                    <div>
                        <?php edit_post_link('Edit this post', '<p>', '</p>'); ?>
                    </div>

                </div>
             </article>

                <!-- Comments -->
            <div class="mt-5">
                <?php
                if ( comments_open() || get_comments_number() ) :   comments_template();
                endif;
                ?>
            </div>

        </div>
    </div>

    <?php
    endwhile;
    endif;
    ?>

</div>

<?php get_footer(); ?>
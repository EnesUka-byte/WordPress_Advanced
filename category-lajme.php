<?php get_header(); ?>

<div class="container my-5">

    <div class="row mb-4">
        <div class="col">
            <h1 class="text-center">Kategoria: Lajme</h1>
        </div>
    </div>

    <div class="row">

<?php


///*

//





$args = array(
    'post_type' => 'post',
    'category_name' => 'lajme',
    'posts_per_page' => 10
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
?>

        <div class="col-md-6 col-lg-4 mb-4">

            <article class="card h-100 shadow-sm">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="card-img-top">
                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                    </div>
                <?php endif; ?>

                <div class="card-body">

                    <h5 class="card-title">
                        <?php the_title(); ?>
                    </h5>

                    <p class="card-text">
                        <?php the_excerpt(); ?>
                    </p>

                </div>

                <div class="card-footer bg-white border-0">
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                        Lexo më shumë
                    </a>
                </div>

            </article>

        </div>

<?php
    endwhile;
endif;

wp_reset_postdata();
?>

    </div>
</div>

<?php get_footer(); ?>
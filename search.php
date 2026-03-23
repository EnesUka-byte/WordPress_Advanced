<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

        <h1>Search Results</h1>

        <?php
        global $wp_query;
        $total_results = $wp_query->found_posts;
        ?>

        <p><?php echo $total_results; ?> results found</p>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <article>
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <p><?php the_excerpt(); ?></p>
                </article>

            <?php endwhile; ?>

        <?php else : ?>

            <p>No results found.</p>

        <?php endif; ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>
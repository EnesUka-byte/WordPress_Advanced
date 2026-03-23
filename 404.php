<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">Not Found</h1>
            </header>

            <div class="page-content">
                <h2>404 not found</h2>
                <p>It looks like nothing was found at this location. Maybe try a search?</p>

                <?php get_search_form(); ?>
            </div>
        </section>

    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
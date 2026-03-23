<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <h1>Search Posts</h1>

            <p>
                My site features articles about 
                <a href="/category/wordpress/">WordPress</a>,
                <a href="/category/web-design/">Web Design</a>,
                <a href="/category/website-development/">Development</a>,
                and <a href="/category/css/">CSS</a>.
            </p>

            <p>To search my website, please use the form below.</p>

            <?php get_search_form(); ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>
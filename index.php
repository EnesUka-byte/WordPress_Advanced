<?php get_header(); ?>

<main class="container">
    <h2>Hello Digital School Students</h2>
    <p>This is our custom WordPress theme.</p>
</main>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <h2><?php the_title(); ?></h2>

            <p>
                Posted on <?php the_date(); ?> 
                at <?php the_time(); ?> 
                in <?php the_category(', '); ?>
            </p>

            <?php the_content(); ?>

        </article>

    <?php endwhile; ?>

    <div class="pagination">
        <?php the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => '« Previous',
            'next_text' => 'Next »',
        ) ); ?>
    </div>

<?php else : ?>

    <p>No posts found.</p>

<?php endif; ?>

<div class="container">
    <h1 class="text-center text-primary">Bootstrap is Working</h1>
    <button class="btn btn-success">Click Me</button>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 bg-primary text-white">
            Left
        </div>
        <div class="col-md-6 bg-warning">
            Right
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card Title</h5>
            <p class="card-text">Example card text.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

<?php get_sidebar('primary'); ?>
<?php get_footer(); ?>
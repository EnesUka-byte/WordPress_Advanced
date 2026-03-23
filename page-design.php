<?php get_header(); ?>

<div class="container my-5">

    <h1 class="text-center mb-5">CSS Design Effects</h1>

    <!-- Slider -->
    <div class="slider">
        <div class="slides">
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide1.jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide2.jpg">
            <img src="<?php echo get_template_directory_uri(); ?>/images/slide3.jpg">
        </div>
    </div>

    <div class="row mt-5">

        <!-- Rounded Corners -->
        <div class="col-md-4">
            <div class="rounded-box">
                Rounded Corners
            </div>
        </div>

        <!-- Border Image -->
        <div class="col-md-4">
            <div class="border-image-box">
                Border Image Example
            </div>
        </div>

        <!-- Background -->
        <div class="col-md-4">
            <div class="background-box"></div>
        </div>

    </div>

    <!-- Shadow Card -->
    <div class="card shadow-card mt-5 p-4">
        <h3>Box Shadow</h3>
        <p>This card demonstrates the CSS box-shadow property.</p>
    </div>

</div>

<?php get_footer(); ?>
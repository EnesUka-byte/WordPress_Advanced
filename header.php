<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="bg-dark text-white py-3">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-4">
                <h1 class="h3 m-0">
                    <a href="<?php echo home_url(); ?>" class="text-white text-decoration-none">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            </div>

            <div class="col-md-8">

                <nav class="navbar navbar-expand-lg navbar-dark">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="mainMenu">

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'navbar-nav',
                            'fallback_cb' => false
                        ));
                        ?>

                    </div>

                </nav>

            </div>

        </div>

    </div>
</header>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>


    <title>Teste Buildbox</title>
  </head>
  
  <nav class="navbar navbar-expand-lg" style="background-color: rgba(0, 0, 0, 0.9); /* Background color with increased opacity */">
    <div class="container-fluid">
        <!-- Logo on the left -->
        <a class="navbar-brand p-3" href="#">
            <?php the_custom_logo() ?>
        </a>

        <!-- Navbar Toggler for smaller screens -->
        <nav class="navbar" style="background-color: black; opacity: 1;">
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button></nav>

        <!-- Menu items aligned to the right -->
        <div class="collapse navbar-collapse justify-content-end me-5 " id="navbarNav">
             <?php
                wp_nav_menu(

                        array( 
                                'theme_location' => 'top-menu',
                                'menu_id' => 'navbarNav',
                                'container' => 'ul',
                                'menu_class' => 'navbar-nav',
                                'add_a_class' => 'nav-link',
                                'add_li_class'  => 'nav-item',

                        )
                        );?>
        </div>
    </div>
 </nav>

<!-- 
 <div class="bottom-menu">
    <a href="#">
        <div class="menu-item">
            <i class="bi bi-camera-video"></i>
            Filmes
        </div>
    </a>
    <a href="#">
        <div class="menu-item">
            <i class="bi bi-film"></i>
            Séries
        </div>
    </a>
    <a href="#">
        <div class="menu-item">
            <i class="bi bi-play-circle"></i>
            Séries
        </div>
    </a>
</div> -->

<?php
wp_nav_menu(
    array(
        'theme_location' => 'custom-menu', // Use the registered menu location
        'menu_class'     => 'bottom-menu', // Add the custom CSS class for styling
    )
);


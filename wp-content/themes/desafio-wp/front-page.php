<?php get_header(); ?>
<?php 
                    $hero_title = get_theme_mod( 'set_hero_title', 'Seu Título' );
                    $hero_button_link = get_theme_mod( 'set_hero_button_link', '#' );
                    $hero_button_text = get_theme_mod( 'set_hero_button_text', 'Saiba mais' );
                    $hero_button_link_1 = get_theme_mod( 'set_hero_button_link_1', '#' );
                    $hero_button_text_1 = get_theme_mod( 'set_hero_button_text_1', 'Botão 1' );
                    $hero_button_link_2 = get_theme_mod( 'set_hero_button_link_2', '#' );
                    $hero_button_text_2 = get_theme_mod( 'set_hero_button_text_2', 'Botão 2' );
                    $hero_background = wp_get_attachment_url( get_theme_mod( 'set_hero_background' ) );
                    ?>
<!-- Hero section -->
<body style="background-color: black;"> <!-- Add this style attribute -->
<section class="hero-section" style="background-image: url('<?php echo $hero_background ?>');');">
        <div class="background-overlay"></div>
        <div class="position-relative text-header">
            <!-- Two buttons side by side -->
            <div>
                <a href="<?php echo $hero_button_link_1; ?>" style="font-weight: 600; padding-left: 35px; padding-right: 35px; color:black!important;" class="btn btn-light mr-2"><?php echo $hero_button_text_1; ?></a>
                <a href="<?php echo $hero_button_link_2; ?>" style="font-weight: 600; padding-left: 35px; padding-right: 35px; color:white;" class="btn border border-white"><?php echo $hero_button_text_2; ?></a>
            </div>
            <h1 class="headerText"><?php echo nl2br( $hero_title ); ?></h1>
            <a href="<?php echo $hero_button_link; ?>" style="font-weight: 500; padding: 15px 55px 15px 55px; background-color: red; color:white" class="btn btn"><?php echo $hero_button_text; ?></a>
        </div>
    </section>

    <section class="filmes">
    <h2 style="color: red; font-weight: 700;" class="ms-5 mt-5">Filmes</h2>
    <div class="slider-container ms-5 mt-5">
        <?php
        // Define the custom query to retrieve posts in the "Filmes" category
        $args = array(
            'post_type' => 'video', // Your custom post type name
            'posts_per_page' => -1, // Display all videos; you can set a specific number
            'tax_query' => array(
                array(
                    'taxonomy' => 'video_type', // Your custom taxonomy name
                    'field' => 'slug',
                    'terms' => 'filmes', // Slug of the "Filmes" category
                ),
            ),
        );

        $custom_query = new WP_Query($args);

        // Start the loop
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                ?>

                <div class="content-box">
                <?php
                    // Display the featured image with permalink
                    if (has_post_thumbnail()) {
                        echo '<a href="' . esc_url(get_permalink()) . '">';

                        // Set up media queries for different screen sizes
                        echo '<style>';
                        
                        // Styles for smaller screens (max-width: 767px)
                        echo '@media (max-width: 767px) {';
                        echo '.img-fluid {';
                        echo 'width: 125px!important;';
                        echo 'height: 183px!important;';
                        echo '}';
                        echo '}';
                        
                        // Styles for larger screens (min-width: 768px)
                        echo '@media (min-width: 768px) {';
                        echo '.img-fluid {';
                        echo 'width: 290px!important;';
                        echo 'height: 435px!important;';
                        echo '}';
                        echo '}';
                        
                        echo '</style>';

                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
                        echo '</a>';
                    }
                    ?>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn border border-white button-scroll-front">
                        <?php
                        // Display the custom field for video duration
                        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                        if ($video_duration) {
                            echo esc_html($video_duration);
                        }
                        ?>
                    </a>

                    <p class="mt-2 text-scroll-front">
                        <?php
                        // Display the post title with permalink
                        echo '<a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a>';
                        ?>
                    </p>
                </div>

                <?php
            endwhile;
            wp_reset_postdata(); // Reset the custom query
        else :
            echo '<p style="color:white;">No videos in the "Filmes" category found.</p>';
        endif;
        ?>
    </div>
</section>


<section class="filmes">
    <h2 style="color: red; font-weight: 700;" class="ms-5 mt-5">Séries</h2>
    <div class="slider-container ms-5 mt-5">
        <?php
        // Define the custom query to retrieve posts in the "Filmes" category
        $args = array(
            'post_type' => 'video', // Your custom post type name
            'posts_per_page' => -1, // Display all videos; you can set a specific number
            'tax_query' => array(
                array(
                    'taxonomy' => 'video_type', // Your custom taxonomy name
                    'field' => 'slug',
                    'terms' => 'series', // Slug of the "Filmes" category
                ),
            ),
        );

        $custom_query = new WP_Query($args);

        // Start the loop
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                ?>

                <div class="content-box">
                <?php
                    // Display the featured image with permalink
                    if (has_post_thumbnail()) {
                        echo '<a href="' . esc_url(get_permalink()) . '">';

                        // Set up media queries for different screen sizes
                        echo '<style>';
                        
                        // Styles for smaller screens (max-width: 767px)
                        echo '@media (max-width: 767px) {';
                        echo '.img-fluid {';
                        echo 'width: 125px!important;';
                        echo 'height: 183px!important;';
                        echo '}';
                        echo '}';
                        
                        // Styles for larger screens (min-width: 768px)
                        echo '@media (min-width: 768px) {';
                        echo '.img-fluid {';
                        echo 'width: 290px!important;';
                        echo 'height: 435px!important;';
                        echo '}';
                        echo '}';
                        
                        echo '</style>';

                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
                        echo '</a>';
                    }
                    ?>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn border border-white button-scroll-front">
                        <?php
                        // Display the custom field for video duration
                        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                        if ($video_duration) {
                            echo esc_html($video_duration);
                        }
                        ?>
                    </a>

                    <p class="mt-2 text-scroll-front">
                        <?php
                        // Display the post title with permalink
                        echo '<a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a>';
                        ?>
                    </p>
                </div>

                <?php
            endwhile;
            wp_reset_postdata(); // Reset the custom query
        else :
            echo '<p style="color:white;">No videos in the "Series" category found.</p>';
        endif;
        ?>
    </div>
</section>


<section class="filmes">
    <h2 style="color: red; font-weight: 700;" class="ms-5 mt-5">Documentários</h2>
    <div class="slider-container ms-5 mt-5">
        <?php
        // Define the custom query to retrieve posts in the "Filmes" category
        $args = array(
            'post_type' => 'video', // Your custom post type name
            'posts_per_page' => -1, // Display all videos; you can set a specific number
            'tax_query' => array(
                array(
                    'taxonomy' => 'video_type', // Your custom taxonomy name
                    'field' => 'slug',
                    'terms' => 'documentarios', // Slug of the "Filmes" category
                ),
            ),
        );

        $custom_query = new WP_Query($args);

        // Start the loop
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                ?>

                <div class="content-box">
                <?php
                    // Display the featured image with permalink
                    if (has_post_thumbnail()) {
                        echo '<a href="' . esc_url(get_permalink()) . '">';

                        // Set up media queries for different screen sizes
                        echo '<style>';
                        
                        // Styles for smaller screens (max-width: 767px)
                        echo '@media (max-width: 767px) {';
                        echo '.img-fluid {';
                        echo 'width: 125px!important;';
                        echo 'height: 183px!important;';
                        echo '}';
                        echo '}';
                        
                        // Styles for larger screens (min-width: 768px)
                        echo '@media (min-width: 768px) {';
                        echo '.img-fluid {';
                        echo 'width: 290px!important;';
                        echo 'height: 435px!important;';
                        echo '}';
                        echo '}';
                        
                        echo '</style>';

                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
                        echo '</a>';
                    }
                    ?>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn border border-white button-scroll-front">
                        <?php
                        // Display the custom field for video duration
                        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                        if ($video_duration) {
                            echo esc_html($video_duration);
                        }
                        ?>
                    </a>

                    <p class="mt-2 text-scroll-front">
                        <?php
                        // Display the post title with permalink
                        echo '<a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a>';
                        ?>
                    </p>
                </div>

                <?php
            endwhile;
            wp_reset_postdata(); // Reset the custom query
        else :
            echo '<p style="color:white;">No videos in the "Documentários" category found.</p>';
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
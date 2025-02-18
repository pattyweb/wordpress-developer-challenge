<?php
/*Template Name: Documentarios*/
get_header();
?>
<body style="background-color: black;"> <!-- Add this style attribute -->
<section>
    <div class="container-fluid categorias">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <h1 class="text-series">Documentários</h1>
                <p class="p-series">Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, fermentum sollicitudin est. Proin egestas felis arcu, eget egestas nisi accumsan non. Donec tincidunt et ipsum nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis lorem purus in magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui. Aenean interdum mi ante, in volutpat quam laoreet quis. Donec aliquam convallis tempus.</p>
            </div>

<!-- Right Column -->
<div class="col-md-6 categorias-content">
    <!-- Content for the right column -->
    <div class="row">

        <?php
        // Define the custom query to retrieve video posts in the "series" category
        $args = array(
            'post_type' => 'video', // Change to your custom post type name
            'posts_per_page' => 9, // Display all video posts in the "series" category
            'paged' => $paged, // Use pagination
            'tax_query' => array(
                array(
                    'taxonomy' => 'video_type', // Your custom taxonomy name
                    'field' => 'slug',
                    'terms' => 'documentarios', // Slug of the "series" category
                ),
            ),
        );

        $custom_query = new WP_Query($args);

        // Start the loop
        if ($custom_query->have_posts()) :
            while ($custom_query->have_posts()) :
                $custom_query->the_post();
                ?>

                <!-- Content Box for Each Video Post -->
                <div class="col-6 col-md-4">
                    <div class="content-box">
                        <a href="<?php the_permalink(); ?>">
                        <?php
                    // Display the featured image with permalink
                    if (has_post_thumbnail()) {
                        echo '<a href="' . esc_url(get_permalink()) . '">';

                        // Set up media queries for different screen sizes
                        echo '<style>';
                        
                        // Styles for smaller screens (max-width: 767px)
                        echo '@media (max-width: 767px) {';
                        echo '.img-fluid {';
                        echo 'width: 103px!important;';
                        echo 'height: 154px!important;';
                        echo '}';
                        echo '}';
                        
                        // Styles for larger screens (min-width: 768px)
                        echo '@media (min-width: 768px) {';
                        echo '.img-fluid {';
                        echo 'width: 204px!important;';
                        echo 'height: 307px!important;';
                        echo '}';
                        echo '}';
                        
                        echo '</style>';

                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
                        echo '</a>';
                    }
                    ?>
                        </a><br>

                        <a href="<?php the_permalink(); ?>" class="btn border border-white button-scroll">
                            <?php
                            // Display the custom field for video duration
                            $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                            if ($video_duration) {
                                echo esc_html($video_duration);
                            }
                            ?>
                        </a>

                        <p class="mt-2 text-scroll">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </p>
                    </div>
                </div>

                <?php
                            endwhile;
                            wp_reset_postdata(); // Reset the custom query

                            // Add pagination links
                            echo '<div style="font-size: 18px !important; padding-top: 20px; font-family: Circular Spotify Tx T;">';
                            echo paginate_links(array(
                                'total' => $custom_query->max_num_pages,
                                'prev_next' => true,
                                'prev_text' => __('« Anterior'),
                                'next_text' => __('Próximo »'),
                            ));
                            echo '</div>';
                        else :
                            echo '<p style="color:white;font-family: Circular Spotify Tx T, sans-serif;">No video posts in the "documentarios" category found.</p>';
                        endif;
                        ?>

    </div>
</div>
</section>
<?php get_footer(); ?>
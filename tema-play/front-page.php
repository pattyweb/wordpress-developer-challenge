<?php get_header(); ?>

<!-- Hero section -->
<section class="hero-section">
        <div class="background-overlay"></div>
        <div class="position-relative text-header">
            <!-- Two buttons side by side -->
            <div>
                <a href="#" style="font-weight: 600; padding-left: 35px; padding-right: 35px; color:black!important;" class="btn btn-light mr-2">Filmes</a>
                <a href="#" style="font-weight: 600; padding-left: 35px; padding-right: 35px; color:white;" class="btn border border-white">130m</a>
            </div>
            <h1 class="headerText">Pellentesque<br> habitant morbi</h1>
            <a href="#" style="font-weight: 500; padding: 15px 55px 15px 55px; background-color: red; color:white" class="btn btn">Mais Informações</a>
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
                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style' => 'width: 70%; height: 70%;'));
                        echo '</a>';
                    }
                    ?>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn border border-white button-scroll">
                        <?php
                        // Display the custom field for video duration
                        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                        if ($video_duration) {
                            echo esc_html($video_duration);
                        }
                        ?>
                    </a>

                    <p class="mt-2 text-scroll">
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
                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style' => 'width: 70%; height: 70%;'));
                        echo '</a>';
                    }
                    ?>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn border border-white button-scroll">
                        <?php
                        // Display the custom field for video duration
                        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                        if ($video_duration) {
                            echo esc_html($video_duration);
                        }
                        ?>
                    </a>

                    <p class="mt-2 text-scroll">
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
                        the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'style' => 'width: 70%; height: 70%;'));
                        echo '</a>';
                    }
                    ?>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn border border-white button-scroll">
                        <?php
                        // Display the custom field for video duration
                        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
                        if ($video_duration) {
                            echo esc_html($video_duration);
                        }
                        ?>
                    </a>

                    <p class="mt-2 text-scroll">
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
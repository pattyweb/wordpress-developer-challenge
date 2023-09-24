<?php get_header(); ?>

<?php
// Define the custom query
$args = array(
    'post_type' => 'video', // Your custom post type name
    'posts_per_page' => -1, // Display all videos; you can set a specific number
);

$custom_query = new WP_Query($args);

// Start the loop
if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) :
        $custom_query->the_post();

        // Display the post title and content
        the_title('<h2>', '</h2>');
        the_content();

        // Display custom fields, e.g., video duration
        $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
        if ($video_duration) {
            echo '<p>Tempo de Duração: ' . esc_html($video_duration) . '</p>';
        }

        // Display custom fields, e.g., video embed
        $video_embed = get_post_meta(get_the_ID(), 'bx_play_video_ID', true);
        if ($video_embed) {
            echo '<div class="video-embed">' . wp_kses_post($video_embed) . '</div>';
        }

    endwhile;
    wp_reset_postdata(); // Reset the custom query
else :
    echo '<p style="font-family: Arial, sans-serif;">No videos found.</p>';
endif;
?>

<?php get_footer(); ?>
<?php
get_header();

if (have_posts()) :
    while (have_posts()) :
        the_post();
        $video_embed = get_post_meta(get_the_ID(), 'bx_play_video_ID', true); // Get the video embed code

        // Retrieve the category name
        $video_categories = get_the_terms(get_the_ID(), 'video_type');
        $category_name = '';

        if ($video_categories && !is_wp_error($video_categories)) {
            $category = reset($video_categories); // Get the first category (assuming there's only one)
            $category_name = $category->name;
        }
?>
<body style="background-color: black;"> <!-- Add this style attribute -->

<div class="container-fluid single-video"> 
    <div class="single-up">
    <a href="#" style="font-weight: 600; padding-left: 35px; padding-right: 35px; color:black!important;" class="btn btn-light mr-2"><?php echo esc_html($category_name); // Display the category name ?></a>
    <a href="#" style="font-weight: 600; padding-left: 35px; padding-right: 35px; color:white;" class="btn border border-white"> <?php
            // Display the custom field for video duration
            $video_duration = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
            if ($video_duration) {
                echo esc_html($video_duration);
            }
            ?></a>
    <h1 class="title-single"><?php the_title(); ?></h1>
    </div>
    <div class="d-flex align-items-center justify-content-center">
    <div class="video-container">
    </div>
</div>

</div>

<div class="p-single-content" style="color: white;">
    <?php the_content(); ?>
</div>

 </div>
<?php
    endwhile;
endif;
get_footer();
?>

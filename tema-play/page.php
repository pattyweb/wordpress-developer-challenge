<?php get_header(); ?>


<body style="background-color: black;"> <!-- Add this style attribute -->
<section>
<div style="text-align:center; padding-top:20px; margin-left:20%; margin-right:20%; color:white;">
<h1><?php the_title(); ?></h1>
<p class="text-start"><?php the_content(); ?></p>
<div>
</section>
<?php get_footer(); ?>
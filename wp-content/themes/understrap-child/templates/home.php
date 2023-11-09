<?php
    /* 
        Template Name: Home 
    */
    get_header();
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                get_template_part('partials/home/section', 'header');
                get_template_part('partials/home/section', 'search');
                get_template_part('partials/home/section', 'table');
            endwhile;
        endif;
    get_footer();
    
?>

<?php
/**
 * Template Name: Client Reviews
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro" style="background-image:url(<?php the_field('hero_background_image'); ?>);">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="spacer-120">&nbsp;</div>
            <div class="column-50 title-holder">
                <div class="spacer-30">&nbsp;</div>
                <h1><?php the_field('title'); ?></h1>
                <?php the_field('intro'); ?>
            </div>
            <div class="column-50 form-holder">
                <div class="spacer-60">&nbsp;</div>
                <span class="form-start">Let's Get Started.</span>
                <div class="form-container">
                    <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
                </div>
                <div class="spacer-30">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<section class="reviews">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <?php if ( get_query_var('paged') ) {
                    $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $reviewsList = new WP_Query(
                    array(
                        'post_type'	 => 'testimonials',
                        'order' => 'DESC', 
                        'post_status' => 'publish', 
                        'posts_per_page' => 6,
                        'paged' => $paged,
                    )
                );

                if($reviewsList->have_posts()) : ?>
                    <div class="case-card-holder">
                    <?php
                    
                    while($reviewsList->have_posts()) : $reviewsList->the_post(); 
                            $title = get_field('title');
                            $source = get_field('source');  
                            $summary = get_field('summary');  
                            $client = get_field('client');
                         ?>

                            <div class="case-card">
                                <h3>"<?php echo $title; ?>"</h3>
                                <div class="rating">
                                    <div class="rating_left">
                                        <span class="stars">&nbsp;</span><span class="stars">&nbsp;</span><span class="stars">&nbsp;</span><span class="stars">&nbsp;</span><span class="stars">&nbsp;</span>
                                    </div>
                                    <div class="rating_right">
                                        <?php if ( $source ) :
                                            $google = 'Google';
                                            $facebook = 'Facebook';
                                            if ( $source == $google ) {
                                                echo '<span class="rating_icon" id="google">&nbsp;</span>';
                                            } elseif ( $source == $facebook ) {
                                                echo '<span class="rating_icon" id="facebook">&nbsp;</span>';
                                            } 
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="summary">
                                    <p><?php echo $summary; ?></p>
                                    <p>– <?php echo $client; ?></p>
                                </div>
                            </div>
                    <?php endwhile; ?>
                    </div>
                <?php endif; wp_reset_query(); ?>
                <?php if ($reviewsList->max_num_pages > 1) : ?>
                    <div class="pagination">
                        <?php 
                        $orig_query = $wp_query;
                        $wp_query = $reviewsList;
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( '<span class="arrow-icon" id="prev">&nbsp;</span>', 'textdomain' ),
                            'next_text' => __( '<span class="arrow-icon" id="next">&nbsp;</span>', 'textdomain' ),
                        ) ); 
                        $wp_query = $orig_query;
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
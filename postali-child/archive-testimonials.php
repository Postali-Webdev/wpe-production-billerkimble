<?php
/**
 * Testimonials Archive
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro" style="background-image:url(<?php the_field('reviews_hero_background_image','options'); ?>);">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="spacer-120">&nbsp;</div>
            <div class="column-50 title-holder">
                <div class="spacer-30">&nbsp;</div>
                <h1><?php the_field('reviews_title','options'); ?></h1>
                <?php the_field('reviews_intro','options'); ?>
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
                <?php

                if(have_posts()) : ?>
                    <div class="case-card-holder">
                    <?php
                    
                    while ( have_posts() ) : the_post();
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
                <?php endif; ?>
                <div class="pagination">
                    <?php the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( '<span class="arrow-icon" id="prev">&nbsp;</span>', 'textdomain' ),
                            'next_text' => __( '<span class="arrow-icon" id="next">&nbsp;</span>', 'textdomain' ),
                        ) );  ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
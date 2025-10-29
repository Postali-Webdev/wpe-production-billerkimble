<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro">
    <div class="container">
        <div class="columns">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            <div class="column-50 left" style="background-image:url('<?php the_field('hero_background_image'); ?>');">
                <div class="overlay">
                    <div class="left_inner">
                        <div class="left_inner_spacer">&nbsp;</div>
                        <h1><?php echo the_field('title'); ?></h1>
                        <div class="contact-block">
                            <a class="contact_link" href="tel:<?php the_field('cincinnati_phone', 'options'); ?>"><span class="icon" id="phone">&nbsp;</span><?php the_field('cincinnati_phone', 'options'); ?></a>
                            <a class="contact_link" href="mailto:<?php the_field('cincinnati_email', 'options'); ?>"><span class="icon" id="email">&nbsp;</span><?php the_field('cincinnati_email', 'options'); ?></a>
                        </div>
                        <div class="location-list">
                            <div class="location">
                                <span class="name">Cincinnati</span>
                                <span class="address"><?php the_field('cincinnati_address', 'options'); ?></span>
                                <a class="directions" href="<?php the_field('cincinnati_directions', 'options'); ?>" target="_blank" title="Get Directions">Get Directions</a>
                            </div>
                            <div class="location">
                                <span class="name">Columbus</span>
                                <span class="address"><?php the_field('columbus_address', 'options'); ?></span>
                                <a class="directions" href="<?php the_field('columbus_directions', 'options'); ?>" title="Get Directions">Get Directions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column-50 right">
                <div class="form-container">
                    <p class="large">CONTACT US NOW</p>
                    <?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
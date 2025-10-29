<?php
/**
 * Template Name: Practice Area Child
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro" style="background-image:url(<?php the_field('hero_background_image'); ?>);">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="column-full centered">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-75">
                <?php the_field('panel_1'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'contact-results');?>

<section class="panel2">
    <div class="container">
        <div class="columns">
            <div class="column-75">
                <?php the_field('panel_2'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'pre-footer');?>

<?php get_footer(); ?>
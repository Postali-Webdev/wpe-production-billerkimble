<?php
/**
 * Template Name: Practice Area Parent
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
<?php get_template_part('block', 'mid-page');?>
<section class="panel3">
    <div class="container">
        <div class="columns">
            <div class="column-75">
                <?php the_field('panel_3'); ?>
            </div>
        </div>
    </div>
</section>
<!--ToDo: Add related pages section when we get child pages-->

<?php get_template_part('block', 'related');?>
	
<?php get_template_part('block', 'pre-footer');?>

<?php get_footer(); ?>
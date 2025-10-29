<?php
/**
 * Template Name: Interior
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<?php if ( has_post_thumbnail() ) { ?>
<?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<section class="intro" style="background:url('<?php echo $featImg[0]; ?>') no-repeat; background-size:cover;">
<?php } else { ?>
<section class="intro">
<?php } ?>
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
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('block', 'pre-footer');?>

<?php get_footer(); ?>
<?php
/**
 * 404 Page Not Found.
 *
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="column-full centered">
                <h1>Looks like there was a problem</h1>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-75">
                <p>We can’t seem to find the page you were looking for. If you typed in the url, double check that you spelled everything correctly. Otherwise, let’s head back to the <a href="/" title="visit homepage">homepage</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'pre-footer');?>

<?php get_footer();
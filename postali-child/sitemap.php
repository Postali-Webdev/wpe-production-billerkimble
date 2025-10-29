<?php
/**
 * Template Name: Sitemap
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
                <h1>Sitemap</h1>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-75">
                <h2>Pages</h2> 
                <div class="spacer-30"></div>
                <ul>
                    <?php wp_list_pages("title_li=" ); ?>
                </ul> 
                <div class="spacer-60">&nbsp;</div>
                <h2>Blog Posts</h2> 
                <div class="spacer-30"></div>
                <ul>
                    <?php wp_get_archives('type=postbypost'); ?>
                </ul>
			</div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'pre-footer');?>

<?php get_footer();

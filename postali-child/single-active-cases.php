<?php
/**
 * Active Cases - Single
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="spacer-60">&nbsp;</div>
            <div class="column-75 title-holder">
                <div class="spacer-30">&nbsp;</div>
                <h1><?php the_field('title'); ?></h1>
                <?php //$cat_array = get_terms('case-type');
                    //$cat = $cat_array[0]->name; ?>
                <?php 
                    $terms = get_the_terms(get_the_ID(), 'case-type');
                    $cat_array = [];
                    if( $terms ) {
                        foreach( $terms as $term) {
                            array_push($cat_array, $term->name);
                        }
                    }
                    $cat = $cat_array[0];
                ?>
                <span class="case-type"><?php echo $cat; ?></span>
                <span class="summary"><?php the_field('summary'); ?></span> <a class="details" href="#details" title="Click to Read Full Case Details">Read Full Case Details</a>
                <div class="spacer-15">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<section class="join-case" id="join-this-case">
    <div class="spacer-60"></div>
    <div class="container">
        <div class="columns">
            <div class="column-75 center">
                <h2>Join This Case</h2>
                <div class="spacer-30"></div>
                <div class="form-container">
                    <?php $form = get_field('join_this_case_form','options'); ?>
                    <?php echo do_shortcode($form); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="case-details" id="details">
    <div class="container">
        <div class="columns">
            <div class="column-75">
                <h2>Case Details</h2>
                <span class="spacer-30">&nbsp;</span>
                <?php the_field('details'); ?>
            </div>
        </div>
    </div>
</section>

<section class="case-updates">
    <div class="container">
        <div class="columns">
            <?php if ( have_rows('case_updates') ): ?>
            <div class="column-75 accordion-holder">
                <?php while ( have_rows('case_updates') ): the_row(); 
                    $date = get_sub_field('date');
                    $content = get_sub_field('content');
                ?>
                    <div class="accordion">
                        <div class="accordion_title"><h3>Update <?php echo $date; ?></h3><span class="icon"></span></div>
                        <div class="accordion_content">
                            <p><?php echo $content; ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <h3>Client Reviews</h3>
                <?php get_template_part('block', 'testimonials');?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
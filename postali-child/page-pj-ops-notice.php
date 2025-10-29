<?php
/**
 * Template Name: PJ Ops Notice
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); 
$notice_title = get_field('section_title');
$notice_to = get_field('to_copy');
$notice_re = get_field('re_copy');
$notice_case = get_field('case_copy');

$notice_section = "
    <div class='notice-section'>
        <h2>{$notice_title}</h2>
        <div class='row'>
            <p class='bubble'>To:</p>
            <p>{$notice_to}</p>
        </div>
        <div class='row'>
            <p class='bubble'>Re:</p>
            <p>{$notice_re}</p>
        </div>
        <div class='row'>
            <p class='bubble'>Case:</p>
            <p>{$notice_case}</p>
        </div>
    </div>";

?>


<section class="post-main">
    <div class="container">
        <div class="columns">
            <div class="column-75 center">
                <div>
                    <?php echo $notice_section; ?>

                    <?php if ( have_rows('accordions') ): ?>
                    <div class="accordion-holder">
                        <?php while ( have_rows('accordions') ): the_row(); 
                            $title = get_sub_field('title');
                            $copy = get_sub_field('copy');
                        ?>
                            <div class="accordion">
                                <div class="accordion_title"><h3><?php echo $title; ?></h3><span class="icon"></span></div>
                                <div class="accordion_content">
                                    <?php echo $copy; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                            <div class="accordion">
                                <div class="accordion_title"><h3>Read The Full Notice</h3><span class="icon"></span></div>
                                <div class="accordion_content">
                                    <?php echo $notice_section; ?>

                                    <div class="primary-copy">
                                        <?php the_field('primary_copy'); ?>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
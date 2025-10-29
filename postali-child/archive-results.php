<?php
/**
 * Results Archive
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro" style="background-image:url(<?php the_field('results_hero_background_image','options'); ?>);">
    <div class="section-overlay">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
            <div class="columns hero-holder">
                <div class="spacer-120">&nbsp;</div>
                <div class="column-50 title-holder">
                    <div class="spacer-30">&nbsp;</div>
                    <h1><?php the_field('results_title','options'); ?></h1>
                    <?php the_field('results_intro','options'); ?>
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
    </div>
</section>

<section class="results">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <?php 
                
                if(have_posts()) : ?>
                    <div class="case-card-holder">
                    <?php
                    
                    while ( have_posts() ) : the_post();
                            $amount = get_field('amount');
                            $title = get_field('case_name');
                            $number = get_field('case_number');
                            $issues = get_field('issues');  
                            $summary = get_field('summary');  
                            $results = get_field('results');                                                    
                         ?>

                            <div class="case-card">
                                <h3><?php echo '$' . $amount; ?></h3>
                                <?php if ( !empty($number) ) { ?>
                                    <span class="details"><?php echo $title . ', ' . $number; ?></span>
                                <?php } else { ?>
                                    <span class="details"><?php echo $title; ?></span>
                                <?php } ?>
                                <div class="issues">
                                    <?php if ( $issues ) :
                                        $deduction = 'Deductions for uniforms and tools';
                                        $dualJobs = 'Dual jobs';
                                        $incorrect = 'Incorrect overtime and minimum wage rates';
                                        $offTheClock = 'Off-the-clock work';
                                        $tipPool = 'Tip pool violation';
                                        $underReimb = 'Under-reimbursement for vehicle costs';
                                        foreach ( $issues as $issue ) {
                                            if ( $issue == $deduction ) {
                                                echo '<span class="issues_item"><span class="issues_icon" id="deduction">&nbsp;</span>' . $issue . '</span>';
                                            } elseif ( $issue == $dualJobs ) {
                                                echo '<span class="issues_item"><span class="issues_icon" id="dualjobs">&nbsp;</span>' . $issue . '</span>';
                                            } elseif ( $issue == $incorrect ) {
                                                echo '<span class="issues_item"><span class="issues_icon" id="incorrect">&nbsp;</span>' . $issue . '</span>';
                                            } elseif ( $issue == $offTheClock ) {
                                                echo '<span class="issues_item"><span class="issues_icon" id="offtheclock">&nbsp;</span>' . $issue . '</span>';
                                            } elseif ( $issue == $tipPool ) {
                                                echo '<span class="issues_item"><span class="issues_icon" id="tippool">&nbsp;</span>' . $issue . '</span>';
                                            } elseif ( $issue == $underReimb ) {
                                                echo '<span class="issues_item"><span class="issues_icon" id="underreimb">&nbsp;</span>' . $issue . '</span>';
                                            }
                                        }
                                    endif; ?>
                                </div>
                                <div class="summary">
                                    <p><?php echo $summary; ?></p>
                                    <p><?php echo $results; ?></p>
                                </div>
                            </div>

                    <?php endwhile; ?>
                    </div>
                <?php endif; wp_reset_query(); ?>
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
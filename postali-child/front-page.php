<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="content-container">
<?php while ( have_posts() ) : the_post(); ?>

<section id="hero" style="background-image:url(<?php the_field('hero_background_image'); ?>);">
    <div class="container" id="hero-content">
        <div class="columns">
            <div class="column-50">
                <?php the_field('hero_left_column'); ?>
            </div>
            <div class="column-50">
                <?php the_field('hero_right_column'); ?>
            </div>
        </div>
    </div>
</section>

<section id="cta-panel" class="black">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered">
                <?php the_field('home_testimonial_quote'); ?>
            </div>
        </div>
    </div>
</section>

<section id="hp-section_3">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <?php the_field('home_about_left_column'); ?>
            </div>
            <div class="column-50" id="home-results">
                <?php the_field('home_about_right_column'); ?>
            </div>
        </div>
    </div>
</section>

<section id="hp-section_4" class="black">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered">
                <h3><span>WE LOVE WHAT WE DO,</span> WE HAVE AWESOME TEAM MEMBERS, AND WE WORK WITH GREAT CLIENTS. WE WOULD LOVE TO EXPLORE HOW WE CAN HELP YOU AS A CLIENT.</h3>
            </div>
        </div>
    </div>
</section>

<section id="hp-section_5" class="team_partners">
    <div class="container centered">
    <?php
        $partners = new WP_Query(
        array(
            'post_type'	 => 'staff',
            'role' => 'partner',
            'orderby' => 'menu_order', 
            'order' => 'ASC', 
            'post_status' => 'publish', 
            )
        );
        if ( $partners->have_posts() ) : ?>
            <h2>Our Attorneys</h2>
            <div class="spacer-60">&nbsp;</div>
            <div class="staff-holder">
                <?php while ( $partners->have_posts() ) : $partners->the_post(); 
                    $headshot_array = get_field('headshot_photo');
                    $headshot = $headshot_array['url'];
                    $name = get_the_title();
                    $bio_link = get_permalink();
                ?>
                    <div class="staff-card" style="background-image: url('<?php echo esc_url($headshot); ?>');">
                        <div class="staff-card_overlay">
                            <div class="staff-card_top">
                                <h3><?php echo $name; ?></h3>
                                <span class="title">
                                    <?php foreach ( get_the_terms( get_the_ID(), 'role' ) as $tax ) {
                                        echo __( $tax->name );
                                    } ?>
                                </span>
                            </div>
                            <a class="btn" href="<?php echo esc_url($bio_link); ?>" title="Read Full Bio">Read Full Bio</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; 
        wp_reset_postdata(); ?>
        <a class="team-btn btn" href="/our-team/" title="See all attorneys">See all attorneys<span class="yellow arrow-icon"></span></a>
        <div class="container below-attorneys-text">
            <div class="columns">
                <div class="column-50 centered">
                    <?php echo get_field('our_attorneys_text'); ?> 
                </div>
            </div>
        </div>
    </div>
</section>

<section id="hp-section_6" class="black">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered">
                <h3>​BILLER & KIMBLE LLC’S WAGE AND HOUR LAWYERS KNOW HOW TO NAVIGATE FEDERAL, STATE, AND, IF NEEDED, EVEN LOCAL LAWS TO <span>GET THE BEST RESULT FOR OUR CLIENTS.</span></h3>
            </div>
        </div>
    </div>
</section>

<section id="hp-section_7">
    <div class="container">
        <div class="columns">
        <div class="container">
            <div class="columns">
                <div class="column-50 centered practice-area-text">
                    <h2>OUR PRACTICE AREAS</h2>
                    <div class="spacer-30">&nbsp;</div>
                    <h3>ALTHOUGH WE HAVE THE <span>EXPERTISE</span> AND <span>RESOURCES</span> TO HANDLE VIRTUALLY ANY LEGAL DISPUTE, WE FOCUS ON CERTAIN PRACTICE AREAS.</h3>
                    <div class="spacer-30">&nbsp;</div>
                    <p>Explore them below or call to discuss your specific legal needs.</p>
                    <div class="spacer-60">&nbsp;</div>
                    <h3>LITIGATION PRACTICE AREAS</h3>
                </div>
            </div>
        </div>
        <?php if( have_rows('practice_area_tiles') ): ?>
        <?php $count = 1; ?>
        <?php while( have_rows('practice_area_tiles') ): the_row(); ?>
        <?php if( get_sub_field('practice_area_type') == 'litigation' ): ?>
            <div class="box" style="background-image:url('<?php the_sub_field('background_image'); ?>');">
                <div class="box-contents">
                    <div id="detail_<?php echo $count; ?>" class="detail">
                        <div class="spacer-30"></div>
                        <span class="open_<?php echo $count; ?>">&nbsp;</span>
                        <span class="title"><?php the_sub_field('pracice_area_title'); ?></span>
                        <div class="spacer-30"></div>
                        <?php the_sub_field('practice_area_content'); ?>
                        <?php if (get_sub_field('include_button_link')) { ?>
                            <div class="spacer-15"></div>
                            <a href="<?php the_sub_field('practice_area_link'); ?>" class="btn">Learn About <?php the_sub_field('pracice_area_title'); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_sub_field('practice_area_type') == 'non-litigation' ): ?>
            <div class="spacer-60"></div>
            <h4>ADVISORY AND NON-LITIGATION<br>PRACTICE AREAS</h4>
            <div class="spacer-30"></div>
            <div class="box" style="background-image:url('<?php the_sub_field('background_image'); ?>');">
                <div class="box-contents">
                    <div id="detail_<?php echo $count; ?>" class="detail">
                        <div class="spacer-30"></div>
                        <span class="open_<?php echo $count; ?>">&nbsp;</span>
                        <span class="title"><?php the_sub_field('pracice_area_title'); ?></span>
                        <div class="spacer-30"></div>
                        <?php the_sub_field('practice_area_content'); ?>
                        <div class="spacer-15"></div>
                        <a href="<?php the_sub_field('practice_area_link'); ?>" class="btn">Learn About <?php the_sub_field('pracice_area_title'); ?></a>
                    </div>
                </div>
            </div>
        
        <?php endif; ?>
        <?php $count++; ?>
        <?php endwhile; ?>
        <?php endif; ?>  
        </div>
    </div>
</section>

<?php get_template_part('block', 'pre-footer');?>

<?php endwhile; ?>
</div>
<?php get_template_part('block', 'popup-modal'); ?>
<?php get_footer();?>
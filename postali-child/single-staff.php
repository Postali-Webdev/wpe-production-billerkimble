<?php
/**
 * Single template - Staff
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();?>

<section class="bio" id="bio-container">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns grid-columns hero-holder">
            <div class="column-50">
                <?php     
                    $headshot = get_field('headshot_photo');
                if (!empty($headshot)): ?>
                    <div class="bio_img">
                        <img id="fade-img" src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>">           
                    </div>
                <?php else : ?>
                    <div class="bio_img">
                        <div class="placeholder-img">
                            <p>Photo Coming Soon</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div id="att-bio-col" class="column-50">
                <?php 
                    $name = get_the_title();
                    /*$role_array = get_terms('role');
                    $role = $role_array[0]; */
                    $phone = get_field('phone_number');
                    $email = get_field('email_address');
                    $testimonial = get_field('testimonial');
                    $client = get_field('testimonial_author');
                    foreach ( get_the_terms( get_the_ID(), 'role' ) as $tax ) {
                        $role = ( $tax->name );
                    } 
                ?>
                <div class="bio_intro">
                    <h1><?php echo $name; ?></h1>
                    <?php if ( ( $name == 'Andrew Biller' ) || ( $name == 'Andrew Kimble' ) ) { ?>
                        <h2 class="role">Founding Partner</h2>
                    <?php } else { ?>
                        <h2 class="role"><?php echo $role; ?></h2>
                    <?php } ?>
                    <div class="staff-contact">
                        <a class="phone" href="tel:<?php echo $phone; ?>" title="Call <?php echo $name; ?>"><span class="yellow">P</span><?php echo $phone; ?></a>
                        <a class="email" href="mailto:<?php echo $email; ?>" title="Email <?php echo $name; ?>"><span class="yellow">E</span><?php echo $email; ?></a>
                    </div>
                    <?php if ( !empty($testimonial) ) { ?>
                        <div class="testimonial">
                            <p class="testimonial_body"><?php echo $testimonial; ?></p>
                            <?php if ($client) : ?><p class="testimonial_author">– <?php echo $client; ?></p><?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="bio_main">
                    <?php if ( have_rows('practice_areas') ): ?>
                        <h2>Primary Practice Areas</h2>
                        <ul class="bio-practice-areas">
                            <?php while ( have_rows('practice_areas') ): the_row(); 
                                $page = get_sub_field('practice_area');
                                $link = get_sub_field('page_link');
                                if ( !empty($link) ) { ?>
                                    <li><a href="<?php echo $link; ?>" title="<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                <?php } else { ?>
                                    <li><?php echo $page; ?></li>
                                <?php }
                            endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php $overview = get_field('overview');
                    if ( !empty($overview) ): ?>
                        <h2>Overview</h2>
                        <?php echo $overview; 
                    endif; ?>
                    <?php 
                        if ( $role == 'Paralegal' ) {
                            $title = 'Paralegal';
                        } elseif ( $role == 'Paralegal/Office Manager' ) {
                            $title = 'Paralegal';
                        } elseif ( $role == 'Legal Assistant' ) {
                            $title = 'Legal Assistant';
                        }else {
                            $title = 'Attorney';
                        }
                    ?>

                    <?php 
                    $education = get_field('education');
                    $court_admissions = get_field('court_admissions');
                    $notable_cases = get_field('notable_cases');

                    if( !empty($education) || !empty($court_admissions) || !empty($notable_cases) ) : ?>
                        <h2><?php echo $title . ' ' . $name; ?>'s Professional Information</h2>
                    <?php endif; ?>
                    

                    <?php 
                    if (!empty($education)) { ?>
                        <h3 class="small">Education</h3>
                    <?php }
                    if ( have_rows('education') ): ?>
                        <?php while ( have_rows('education') ): the_row(); ?>
                            <p class="education"><?php the_sub_field('degree'); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php 
                    if (!empty($court_admissions)) { ?>
                        <h3 class="small">Court Admissions</h3>
                    <?php }
                    if ( have_rows('court_admissions') ): ?>
                        <ul>
                            <?php while ( have_rows('court_admissions') ): the_row(); ?>
                                <li><?php the_sub_field('court'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php 
                    if (!empty($notable_cases)) { ?>
                        <h3 class="small">Notable Cases</h3>
                    <?php }
                    if ( have_rows('notable_cases') ): ?>
                        <?php while ( have_rows('notable_cases') ): the_row(); ?>
                            <p><?php the_sub_field('case'); ?></p>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <a class="btn" href="/careers/" title="Join Our Team">Join our team</a>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
<?php
/**
 * Template Name: Team
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="team_intro">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="column-full">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="team_partners">
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
            <h2>Partners</h2>
            <div class="spacer-60">&nbsp;</div>
            <div class="staff-holder">
                <?php while ( $partners->have_posts() ) : $partners->the_post(); 
                    $headshot_array = get_field('headshot_photo');
                    $headshot = $headshot_array['url'];
                    $name = get_the_title();
                    $phone = get_field('phone_number');
                    $email = get_field('email_address');
                    $bio_link = get_permalink();
                    $last_initial = substr($name, 0, 8);
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
                            <div class="staff-card_lower">
                                <a class="phone" href="tel:<?php echo $phone; ?>" title="Call <?php echo $name; ?>"><span class="yellow">P</span><?php echo $phone; ?></a>
                                <a class="email" href="mailto:<?php echo $email; ?>" title="Email <?php echo $name; ?>"><span class="yellow">E</span><?php echo $email; ?></a>
                            </div>
                            <a class="btn" href="<?php echo esc_url($bio_link); ?>" title="Read <?php echo $name; ?>'s Bio">Read Bio</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; 
        wp_reset_postdata(); ?>
    </div>
</section>

<section class="team_all">
    <div class="container centered">
    <?php
        $team = new WP_Query(
            array(
                'post_type'	 => 'staff',
                'posts_per_page'    => -1,
                'orderby' => 'menu_order', 
                'order' => 'ASC', 
                'post_status' => 'publish', 
                'tax_query' => array(
                    array(
                        'taxonomy' => 'role',
                        'field'    => 'slug',
                        'terms'    => array( 'partner' ),
                        'operator' => 'NOT IN',
                    )
                )
            )
        );
        if ( $team->have_posts() ) : ?>
            <h2>The Team</h2>
            <div class="spacer-60">&nbsp;</div>
            <div class="staff-holder">
                <?php while ( $team->have_posts() ) : $team->the_post(); 
                    $headshot_array = get_field('headshot_photo');
                    $headshot = $headshot_array ? $headshot_array['url'] : null;
                    $name = get_the_title();
                    $role_array = get_terms('role');
                    $role = $role_array[0]; 
                    $phone = get_field('phone_number');
                    $email = get_field('email_address');
                    $bio_link = get_permalink();
                    $name_array = explode(' ', $name);
                    $first_name = $name_array[0];
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
                            <div class="staff-card_lower">
                                <a class="phone" href="tel:<?php echo $phone; ?>" title="Call <?php echo $name; ?>"><span class="yellow">P</span><?php echo $phone; ?></a>
                                <a class="email" href="mailto:<?php echo $email; ?>" title="Email <?php echo $name; ?>"><span class="yellow">E</span><?php echo $email; ?></a>
                            </div>
                            <a class="btn" href="<?php echo esc_url($bio_link); ?>" title="Read <?php echo $name; ?>'s Bio">Read Bio</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; 
        wp_reset_postdata(); ?>

        <a class="btn" href="/careers/" title="Join Our Team">Join our team</a>

    </div>
</section>
	
<?php get_template_part('block', 'contact');?>

<?php get_footer(); ?>
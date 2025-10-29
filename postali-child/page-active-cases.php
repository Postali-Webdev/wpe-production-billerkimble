<?php
/**
 * Template Name: Active Cases
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<section class="intro">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="spacer-120">&nbsp;</div>
            <div class="column-50 title-holder">
                <div class="spacer-60">&nbsp;</div>
                <h1><?php the_field('title'); ?></h1>
                <?php the_field('intro'); ?>
                <div class="spacer-60">&nbsp;</div>
            </div>
            <?php $recentUpdate = new WP_Query(
                array(
                    'post_type'	 => 'active-cases',
                    'case-status' => 'ongoing',
                    'orderby' => 'date', 
                    'order' => 'DESC', 
                    'post_status' => 'publish', 
                    'posts_per_page' => -1,
                )
            );?>
                <div class="column-50 card-holder">
                    <h2>Most Recently Updated</h2>
                    <?php if($recentUpdate->have_posts()) : ?>

                    <?php $recentCount = 1;
                        while($recentUpdate->have_posts()) : $recentUpdate->the_post(); 
                            if ( $recentCount === 1 ) {
                                $title = get_field('title');
                                $intro = get_field('intro');
                                $cat_array = get_the_terms( $post->ID , 'case-type' );
                                $cat = $cat_array[0]->name; 
                                $url = get_the_permalink();
                            ?>

                                <div class="case-card">
                                    <h3><?php echo $title; ?></h3>
                                    <h4 class="text--blue"><?php echo $cat; ?></h4>
                                    <p><?php echo $intro; ?></p>
                                    <a class="btn" href="<?php echo esc_url($url); ?>" title="Read More">Read the Case Details</a>
                                    <a class="details" href="<?php echo esc_url($url); ?>#join-this-case" title="Join this case"><span>Join The Case</span></a>
                                </div>

                            <?php }
                            $recentCount++;
                        endwhile; ?>
                    <div class="spacer-30">&nbsp;</div>
                    <?php else: ?>
                        <div class="case-card empty">
                            <p>No current ongoing cases.</p>
                        </div>
                    <?php endif; ?>

                </div>
            
                <div class="column-50 card-holder" style="border: none;"></div>
            <?php wp_reset_query(); ?>


        </div>
    </div>
</section>

<?php $currentCases = new WP_Query(
    array(
        'post_type'	 => 'active-cases',
        'case-status' => 'ongoing',
        'orderby' => 'date', 
        'order' => 'DESC', 
        'post_status' => 'publish', 
        'posts_per_page' => 100,
        'offset' => 1,
    )
);

if($currentCases->have_posts()) : ?>
<section class="active-cases">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <h2>Active Cases</h2>
                    <div class="case-card-holder show-six">
                    <?php $currentCount = 1;
                    
                    while ($currentCases->have_posts()) : $currentCases->the_post(); 
                            $title = get_field('title');
                            $intro = get_field('intro');
                            $cat_array = get_the_terms( $post->ID , 'case-type' );
                            $cat = $cat_array ? $cat_array[0]->name : null; 
                            $url = get_the_permalink();
                        ?>
                        <div class="case-card" id="card_<?php echo $currentCount; ?>">
                            <h3><?php echo $title; ?></h3>
                            <h4 class="text--blue"><?php echo $cat; ?></h4>
                            <p><?php echo $intro; ?></p>
                            <a class="btn" href="<?php echo esc_url($url); ?>" title="Read More">Read the Case Details</a>
                            <a class="details" href="<?php echo esc_url($url); ?>#join-this-case" title="Join this case"><span>Join The Case</span></a>
                        </div>
                        <?php $currentCount++; ?>
                    <?php endwhile; ?>
                    </div>
                    <?php if ( $currentCount > 6 ) { ?>
                        <div class="spacer-15">&nbsp;</div>
                        <div class="btn-holder">
                            <span class="btn" id="more-active-cases">View More</span>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php endif; wp_reset_query(); ?>

<section class="past-cases">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div class="spacer-60">&nbsp;</div>
                <h2>Past Cases</h2>

                <?php $pastCases = new WP_Query(
                    array(
                        'post_type'	 => 'active-cases',
                        'case-status' => 'past',
                        'orderby' => 'date', 
                        'order' => 'DESC', 
                        'post_status' => 'publish', 
                        'posts_per_page' => 6,
                        'paged' => $paged,
                    )
                ); ?>
                <?php if ($pastCases->have_posts()) : ?>
                    <div class="case-card-holder">
                        <?php while($pastCases->have_posts()) : $pastCases->the_post(); 
                                $title = get_field('title');
                                $intro = get_field('intro');
                                $cat_array = get_the_terms( $post->ID , 'case-type' );
                                $cat = $cat_array ? $cat_array[0]->name : null; 
                                $url = get_the_permalink();
                                $status_array = get_the_terms( $post->ID , 'case-status' );
                                $status = $status_array ? $status_array[0]->name : null; 
                            ?>
                                <div class="case-card">
                                    <h3><?php echo $title; ?></h3>
                                    <h4 class="text--blue"><?php echo $cat; ?></h4>
                                    <p><?php echo $intro; ?></p>
                                    <a class="btn" href="<?php echo esc_url($url); ?>" title="Read More">Read the Case Details</a>
                                    <a class="details" href="<?php echo esc_url($url); ?>#join-this-case" title="Join this case"><span>Join The Case</span></a>
                                </div>

                        <?php endwhile; ?>
                    </div>
                    <div class="pagination">
                        <?php the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => __( '<span class="arrow-icon" id="prev">&nbsp;</span>', 'textdomain' ),
                            'next_text' => __( '<span class="arrow-icon" id="next">&nbsp;</span>', 'textdomain' ),
                        ) ); ?>
                    </div>
                <?php endif; 
                wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
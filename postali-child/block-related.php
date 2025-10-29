              
<?php // Find child pages
$current = get_the_id();

$args = array(
    'post_type' => 'page',
    'order' => 'ASC',
    'post_status' => 'publish',
    'post_parent' => $current,
);

$query = new WP_Query($args); 
if ( $query->have_posts() ) : ?>
<section class="related">
    <div class="container">
        <div class="columns">
            <div class="column-75 centered">  
                <h2>Related Pages</h2>
                <div class="spacer-60">&nbsp;</div>
                <div class="post-holder">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <a class="post-card" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;
wp_reset_postdata(); ?>
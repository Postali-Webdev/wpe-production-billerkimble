<?php $testimonials = new WP_Query( array( 
    'post_type' => 'testimonials',
    'posts_per_page' => -1
) ); ?>
<?php if ( have_posts( $testimonials ) ) :
    $i = 1;?>
<div class="slides testimonials-slider">
    <?php while( $testimonials->have_posts() ) : $testimonials->the_post();

        $title = get_field('title');
        $source = get_field('source');  
        $summary = get_field('summary');  
        $client = get_field('client');
    ?>
        <div class="case-card">
            <h3>"<?php echo $title; ?>"</h3>
            <div class="rating">
                <div class="rating_left">
                    <span class="stars">&nbsp;</span><span class="stars">&nbsp;</span><span class="stars">&nbsp;</span><span class="stars">&nbsp;</span><span class="stars">&nbsp;</span>
                </div>
                <div class="rating_right">
                    <?php if ( $source ) :
                        $google = 'Google';
                        $facebook = 'Facebook';
                        if ( $source == $google ) {
                            echo '<span class="rating_icon" id="google">&nbsp;</span>';
                        } elseif ( $source == $facebook ) {
                            echo '<span class="rating_icon" id="facebook">&nbsp;</span>';
                        } 
                    endif; ?>
                </div>
            </div>
            <div class="summary">
                <p><?php echo $summary; ?></p>
                <p>– <?php echo $client; ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php endif; 
wp_reset_postdata();?>
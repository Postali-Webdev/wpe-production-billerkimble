<section class="pre-footer">
    <div class="container">
        <div class="columns">
            <div class="column-50 left" style="background-image:url('<?php the_field('left_column_photo','options'); ?>');">
                <?php the_field('left_column_text','options'); ?>
            </div>
            <div class="column-50 right">
                <div class="form-container">
                    <p class="large">CONTACT US NOW</p>
                    <?php $formshortcode = get_field('right_column_form_code','options'); ?>
                    <?php echo do_shortcode($formshortcode); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

<section class="footer black">
    <div class="container">
        <div class="columns">
            <div class="column-50 footer-left">
                <div id="footer_col1">
                    <?php the_custom_logo(); ?>
                    <div class="spacer-30"></div>
                    <div class="social-icons">
                        <a href="<?php the_field('facebook_link', 'option');?>" target="_blank" title="Biller and Kimble Facebook"><span class="icon-icon-social-facebook"></span></a>
                        <a href="<?php the_field('linkedin_link', 'option');?>" target="_blank" title="Biller and Kimble Facebook"><span class="icon-icon-social-linkedin"></span></a>
                    </div>
                    <div class="spacer-30"></div>
                    <p class="title"><a href="tel:<?php the_field('cincinnati_phone','options'); ?>" title="Call Biller & Kimble today"><?php the_field('cincinnati_phone','options'); ?></a></p>
                    <p><?php the_field('cincinnati_address','options'); ?></p>
                    <P><a href="/contact/">Contact Form</a></p>
                </div>
                <div id="footer_col2">
                    <p class="title">PAGES</p>
                    <nav>
                    <?php
							$args = array(
								'container' => false,
								'theme_location' => 'footer-pages'
							);
							wp_nav_menu( $args );
						?>	
                    </nav>
                </div>
            </div>
            <div class="column-50 footer-right">
                <div id="footer_col3">
                    <p class="title">PRACTICE AREAS</p>
                    <nav>
                    <?php
							$args = array(
								'container' => false,
								'theme_location' => 'footer-practice-areas'
							);
							wp_nav_menu( $args );
						?>	
                    </nav>
                </div>
                <div id="footer_col4">
                    <p class="title">LOCATIONS</p>
                    <p><a title="Directions to our Cincinnati Office" href="<?php the_field('cincinnati_directions','options'); ?>" target="blank">Cincinnati</a><br>
                    <?php the_field('cincinnati_address','options'); ?>
                    </p>
                    <div class="map-embed">
                        <?php the_field('cincinnati_google_map','options'); ?>
                    </div>
                    <div class="spacer-30"></div>
                    <p><a title="Directions to our Columbus Office" href="<?php the_field('columbus_directions','options'); ?>" target="blank">Columbus</a><br>
                    <?php the_field('columbus_address','options'); ?>
                    </p>
                    <div class="map-embed">
                        <?php the_field('columbus_google_map','options'); ?>
                    </div>
                </div>
            </div>
            <?php if(is_page_template('front-page.php')) { ?>
            <div class="column-full">
                <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:30px auto 0;"></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

</footer>

<?php wp_footer(); ?>
</body>
</html>



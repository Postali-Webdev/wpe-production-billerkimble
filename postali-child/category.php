<?php
/**
 * Blog Categories
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); 


?>

<section class="intro">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="column-full centered">
                <h1><?php single_cat_title() ?></h1>
				<div class="spacer-30">&nbsp;</div>
            </div>
        </div>
    </div>
</section>

<section class="posts">
    <div class="container">
        <div class="columns">
            <div class="column-full">
				<div id="app-cover">
					<div id="select-box">
						<input type="checkbox" id="options-view-button">
						<div id="select-button" class="brd">
							<div id="selected-value">
								<span class="filter-holder">Topic Filter: <span class="yellow">Select a Category</span></span>
							</div>
							<div id="chevrons">
								<span class="icon-tick-down"></span>
							</div>
						</div>
						<div id="options">
						<?php if( $terms = get_terms( array(
							'taxonomy' => 'category', 
							'orderby' => 'name'
						) ) ) : ?>
							<div class="option">
								<a href="/blog/">All Posts</a>
							</div>
							<?php 
								foreach ( $terms as $term ) : ?>
									<div class="option">
										<a href="/blog/categories/<?php echo $term->slug; ?>/"><?php echo $term->name; ?></a>
									</div>
								<?php endforeach;
							endif; ?>
							<div id="option-bg"></div>
						</div>
					</div>
				</div> 
				<div class="spacer-60">&nbsp;</div>
				<div class="case-card-holder">
					<?php
					while ( have_posts() ) : the_post(); 
						$link = get_the_permalink();
						$title = get_the_title();
						$date = get_the_date();
						$terms = wp_get_post_terms( $post->ID, 'category');
						$fileNumber = rand(1, 9);
						$irs = "IRS Rate";
						$wage = "Minimum Wage";
						$delivery = "Delivery Drivers";
						if ( in_array( $irs, $terms ) ) {
							$imageLink = '/wp-content/uploads/2021/11/blog-hero-category-irs-0';
						} elseif ( in_array( $delivery, $terms ) ) {
							$imageLink = '/wp-content/uploads/2021/11/blog-hero-category-pizza-delivery-0';
						} else {
							$imageLink = '/wp-content/uploads/2021/11/blog-hero-category-minimum-wage-0';
						}
						$backgroundImg = $imageLink . $fileNumber . '.jpg';
						?>
						<div class="case-underlay" style="background-image: url('<?php echo $backgroundImg; ?>');">
							<div class="case-card">
								<div class="post-meta">
									<span class="yellow"><?php echo $date . '  |'; ?></span>
									<span class="yellow" class="categories">Categories: 
										<?php
										$term_link_list = array();
										foreach ( $terms as $term ) {
											$term_link = get_term_link( $term );
											$item = '<a href="' . $term_link . '">' . $term->name . '</a>';
											$term_link_list[] = $item;
										} 
										$list = implode(', ', $term_link_list);
										echo $list;
										?>
									</span>
								</div>
								<a class="post-title" href="<?php echo $link; ?>" title="Read <?php echo $title; ?>"><h2><?php echo $title; ?></h2></a>
							</div>
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
            </div>
        </div>
    </div>
</section>

<?php get_footer();
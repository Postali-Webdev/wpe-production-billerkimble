<?php
/**
 * Blog Post
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); 

$date = get_the_date();
$terms = wp_get_post_terms( $post->ID, 'category');
$fileNumber = rand(1, 9);
$irs = "IRS Rate";
$wage = "Minimum Wage";
$delivery = "Delivery Drivers";
$img = get_field('custom_featured_image');
if ( !empty($img) ) {
    $backgroundImg = $img;
} else {
    if ( in_array( $irs, $terms ) ) {
        $imageLink = '/wp-content/uploads/2021/11/blog-hero-category-irs-0';
    } elseif ( in_array( $delivery, $terms ) ) {
        $imageLink = '/wp-content/uploads/2021/11/blog-hero-category-pizza-delivery-0';
    } else {
        $imageLink = '/wp-content/uploads/2021/11/blog-hero-category-minimum-wage-0';
    }
    $backgroundImg = $imageLink . $fileNumber . '.jpg';
}
?>

<section class="post-main">
    <div class="background-image" style="background-image: url('<?php echo $backgroundImg; ?>');"></div>
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="columns hero-holder">
            <div class="spacer-60">&nbsp;</div>
            <div class="column-75 title-holder">
                <div class="intro">
                    <div class="post-meta">
                        <span><?php echo $date; ?></span>
                        <span class="categories">Categories: 
                            <?php $terms = wp_get_post_terms( $post->ID, 'category');
                                $term_link_list = array();
                                foreach ( $terms as $term ) :
                                    $term_link = get_term_link( $term );
                                    $item = '<a href="' . $term_link . '">' . $term->name . '</a>';
                                    $term_link_list[] = $item;
                                endforeach;
                                $list = implode(', ', $term_link_list);
                                echo $list;
                            ?>
                        </span>
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <span class="author">
                        <?php $authors = wp_get_post_terms( $post->ID, 'authors');
                            foreach ( $authors as $author ) :
                                echo '<span class="author">Author: ' . $author->name . '</span>';
                            endforeach; ?>
                    </span>
                    <div class="spacer-60">&nbsp;</div>
                    <a class="btn back-to-blogs" href="/blog/" title="Back to all blogs"><span class="back-icon">&nbsp;</span>Back to all blogs</a>
                    <div class="spacer-30">&nbsp;</div>
                </div>
                <div class="main">
                    <?php the_content(); ?> 
                    <div class="share-content-container">
                        <p class="share-content-title">Share This Article</p>
                        <div class="share-column">
                            <div class="share-icon-row">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank" title="Share this post to facebook"><span class="icon-icon-social-facebook"></span></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo get_the_permalink(); ?>" target="_blank" title="Share this post to linkedin"><span class="icon-icon-social-linkedin"></span></a>
                            </div>
                            <div class="share-icon-row">
                                <a href="http://www.twitter.com/share?url=<?php echo get_the_permalink(); ?>" target="_blank" title="Share this post to twitter"><span class="icon-icon-social-twitter"></span></a>
                                <a class="share-link" href="<?php echo get_the_permalink(); ?>" target="_blank" title="Copy link to this post"><span class="icon-icon-social-copy-link"></span></a>
                                <div class="text-copied-notif"><p>Copied!</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            <div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'pre-footer');?>

<?php get_footer(); ?>
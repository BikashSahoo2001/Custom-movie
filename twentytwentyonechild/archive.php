<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
get_header();
$description = get_the_archive_description();
?>
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Show All Movies</h3>
        </div>
      </div>
    </div>
  </div>
    <div class="section trending">
        <div class="container">
            <div class="row trending-box">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : ?>
                        <?php the_post(); ?>
                            <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt=""></a>
                                    </div>
                                    <div class="down-content">
                                        <span class="category">
                                        <?php
                                        $genre = get_the_terms( get_the_ID() ,  'movie_genre' );
                                        foreach ( $genre as $term ) {
                                            $term_name = esc_html( $term->name );
                                            echo  $term_name .' ';
                                        }
                                        ?>
                                        </span>
                                        <h4><?php echo get_the_title(); ?>s</h4>
                                        <a href="<?php echo get_permalink(); ?>"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile; ?>
            </div>
        </div>
    </div>
        <?php
            the_posts_pagination( array(
                'mid_size' => 2,
                'prev_text' => __( '', 'textdomain' ),
                'next_text' => __( '', 'textdomain' ),
            ) );
        ?>
        <?php else : ?>
            <?php get_template_part( 'template-parts/content/content-none' ); ?>
        <?php endif; ?>
<?php
get_footer();
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
get_header(); ?>

<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
  <header class="page-header alignwide">
    <h1 class="page-title"><?php single_post_title(); ?></h1>
  </header><!-- .page-header -->
<?php endif; ?>
<?php
if ( have_posts() ) {
    $args = array(
        'post_type' => 'movie', // Replace with your custom post type slug
        'posts_per_page' => -1, // Retrieve all posts of the custom post type
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) {
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            // print_r( $custom_query );
            // Your code to display each custom post
            // Example: echo the_title();
        }
        // Reset the post data to avoid conflicts with the main query
        wp_reset_postdata();
    }
  // Load posts loop.
  // while ( have_posts() ) {
  //  // the_post();
  //  get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
  // }
  // Previous/next page navigation.
  twenty_twenty_one_the_posts_navigation();
} else {
  // If no content, include the "No posts found" template.
  get_template_part( 'template-parts/content/content-none' );
}
?>
<!-- working start -->
<div class="main-banner">
<div class="container">
  <div class="row">
    <div class="col-lg-6 align-self-center">
      <div class="caption header-text">
        <h6>Welcome to free movies</h6>
        <h2>BEST Movie SITE EVER!</h2>
        <div class="search-input">
          <form id="search" action="#">
            <input type="text" placeholder="search your movie" id='searchText' name="s" onkeypress="handle" />
            <button role="button">Search Now</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4 offset-lg-2">
      <div class="right-image">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/marvel.jpg" alt="">
      </div>
    </div>
  </div>
</div>
</div>
<!-- working end -->
<div class="features">
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-6">
      <a href="#">
        <div class="item">
          <div class="image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/featured-01.png" alt="" style="max-width: 44px;">
          </div>
          <h4>Free Movie</h4>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6">
      <a href="#">
        <div class="item">
          <div class="image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/featured-02.png" alt="" style="max-width: 44px;">
          </div>
          <h4>User</h4>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6">
      <a href="#">
        <div class="item">
          <div class="image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/featured-03.png" alt="" style="max-width: 44px;">
          </div>
          <h4>Reply Ready</h4>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6">
      <a href="#">
        <div class="item">
          <div class="image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/featured-04.png" alt="" style="max-width: 44px;">
          </div>
          <h4>Easy Layout</h4>
        </div>
      </a>
    </div>
  </div>
</div>
</div>
<div class="section most-played">
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="section-heading">
        <h6>TOP MOVIES</h6>
        <h2>Most Movies</h2>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="main-button">
        <a href="/movies">View All Movies</a>
      </div>
    </div>
    <?php
    $custom_query = new WP_Query(array(
    'post_type' => 'movies',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    ));?>
   <?php
   if ( $custom_query->have_posts() ) {
      // Load posts loop.
      while ( $custom_query->have_posts() ) {
      $custom_query->the_post();?>
      <div class="col-lg-3 col-md-6">
        <div class="item">
          <div class="thumb">
            <a href="<?php echo get_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt=""></a>
            <span class="price"><em></em>click</span>
          </div>
          <div class="down-content">
            <span class="category">Action</span>
            <h4><?php echo get_the_title(); ?></h4>
          </div>
        </div>
      </div>
      <?php
      // get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
    }
      // Previous/next page navigation.
      twenty_twenty_one_the_posts_navigation();
    } else {
      // If no content, include the "No posts found" template.
      // get_template_part( 'template-parts/content/content-none' );
    }
    ?>
    </div>
    </div>
    </div>

   </div>
   <div class="section categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
              <div class="section-heading">
                <h6>Choose your category</h6>
                <h2>Top Categories</h2>
              </div>
            </div>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'movie_category',
                'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
              foreach ($terms as $term) {
                $term_id = $term->term_id;
                $term_name = $term->name;
                $term_url = get_term_link($term);
                $term_thumbnail = get_field('genre_image', 'movie_category_' . $term_id); // Change 'category_thumbnail' to your custom field name for category images
                ?>
                <div class="col-lg-3 col-sm-6 col-xs-12"> <!-- Adjust column classes as needed -->
                  <div class="item">
                    <h4><?php echo esc_html($term_name); ?></h4>
                    <div class="thumb">
                      <a href="<?php echo esc_url($term_url); ?>">
                        <img src="<?php echo esc_url($term_thumbnail); ?>" alt="<?php echo esc_attr($term_name); ?>">
                      </a>
                    </div>
                  </div>
                </div>
                <?php
              }
            } else {
              echo 'No categories found.';
            }
            ?>
        </div>
    </div>
</div>


<?php get_footer();
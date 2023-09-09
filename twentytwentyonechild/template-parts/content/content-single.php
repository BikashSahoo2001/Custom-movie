 
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Single Movie</h3>
        </div>
      </div>
    </div>
</div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="<?php echo the_post_thumbnail_url(); ?>">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4> <?php echo get_the_title(); ?></h4>
          <p><?php echo get_the_content(); ?></p>
          <ul>
            <li>
                <span>Release date:</span>
                <?php
                    $release_year = get_post_meta( get_the_ID(), "_release_year",true );
                    echo $release_year;
                ?>
            </li>
            <li>
                <span>Genre:</span>
                <?php
                $genre = get_the_terms( get_the_ID() ,  'movie_genre' );
                foreach ( $genre as $term ) {
                  $term_name = esc_html( $term->name );
                  echo '<a href="#">' . $term_name . '</a> ';
                }
                ?>
            </li>
            <li>
                <span>Trailer:</span>
                <?php
                  $trailer_link = get_post_meta( get_the_ID(), "_movie_trailer",true );
                ?>
                <a href = "<?php echo $trailer_link;?>">click here</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Trailer</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <br>
                  <p> <?php echo get_the_content() ?> </p>
                </div>
                <?php $embedURL = get_YouTube_EmbedURL( $trailer_link ); ?>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <iframe width="560" height="315" src ="<?php echo $embedURL; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>









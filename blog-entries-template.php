<?php
/**
 * Template Name: Blog Entries template
 * Template Post Type: post, page, product
 */
?>
<?php
get_header();
?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-item-01.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Fashion</span>
                </div>
                <a href="post-details.html"><h4>Morbi dapibus condimentum</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 12, 2020</a></li>
                  <li><a href="#">12 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-item-02.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>
                <a href="post-details.html"><h4>Donec porttitor augue at velit</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 14, 2020</a></li>
                  <li><a href="#">24 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-item-03.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>
                <a href="post-details.html"><h4>Best HTML Templates on TemplateMo</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 16, 2020</a></li>
                  <li><a href="#">36 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-item-04.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Fashion</span>
                </div>
                <a href="post-details.html"><h4>Responsive and Mobile Ready Layouts</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 18, 2020</a></li>
                  <li><a href="#">48 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-item-05.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Nature</span>
                </div>
                <a href="post-details.html"><h4>Cras congue sed augue id ullamcorper</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 24, 2020</a></li>
                  <li><a href="#">64 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-item-06.jpg" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>Lifestyle</span>
                </div>
                <a href="post-details.html"><h4>Suspendisse nec aliquet ligula</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">May 26, 2020</a></li>
                  <li><a href="#">72 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                  <span>Stand Blog HTML5 Template</span>
                  <h4>Creative HTML Template For Bloggers!</h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <?php 
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                  'posts_per_page' => 2,
                  'paged' => $paged
                );
                $custom_query = new WP_Query( $args );
                if ( $custom_query->have_posts() ) :
                    while ( $custom_query->have_posts() ) :
                        $custom_query->the_post(); 
                    ?>
                    <div class="col-lg-6">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <?php
                                    if (has_post_thumbnail()):
                                            the_post_thumbnail(); 
                                    endif; 
                                ?>
                            </div>
                            <div class="down-content">
                            <span><?php the_category(' . ') ?></span>
                            <a href="<?php the_permalink(); ?>"><?php the_title('<h4>', '</h4>'); ?></a>
                            <ul class="post-info">
                                <li><a href="<?php esc_url( get_author_posts_url(get_the_author_meta('ID'))) ?>"> <?php the_author() ?></a></li>
                                <li><a href="#"><?php the_date('M d, Y') ?></a></li>
                                <li><a href="#"> <?php 
                                                    if (get_comments_number()):
                                                         get_comments_number();
                                                    else:
                                                         echo '0';
                                                    endif; ?> Comments</a>
                                </li>
                            </ul>
                             <?php the_excerpt('<p>', '</p>') ?>
                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <?php if( has_tag() ) : ?>
                                          <ul class="post-tags">
                                              <li><i class="fa fa-tags"></i></li>
                                              <?php echo get_the_tag_list( '<li><a href="#">', ' ', '</a>,</li>' ); ?>
                                          </ul>
                                          <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php endwhile;
                 else:
                  get_template_part('template-parts\content','none');
                 endif
                 ?>           
                <?php if (function_exists("pagination")) {
                         pagination($custom_query->max_num_pages);
                     } 
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
          <?php get_sidebar( 'primary' ); ?>
          </div>
        </div>
      </div>
    </section>
    <?php get_footer();  ?>  
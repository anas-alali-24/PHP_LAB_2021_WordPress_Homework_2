<?php
/**
 * Template Name: Blog Entries template
 * Template Post Type: post, page, product
 */
?>
<?php
get_header();
?>

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
                                <li><a href="#"> <?php the_author() ?></a></li>
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
                                        <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        <li><a href="#">Best Templates</a>,</li>
                                        <li><a href="#">TemplateMo</a></li>
                                    </ul>
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
        </div>
      </div>
    </section>
    <?php get_footer();  ?>  
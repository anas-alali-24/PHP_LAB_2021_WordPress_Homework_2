<?php 
if (!function_exists('PHP_LAB_2021_WordPress_Homework_2_setup')) :
    function PHP_LAB_2021_WordPress_Homework_2_setup() {
        load_theme_textdomain( 'PHP_LAB_2021_WordPress_Homework_2', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

        register_nav_menus( 
            array(
                'location' =>  esc_html__( 'Header-Menu', 'textdomain' ),

            )
        );

        add_theme_support(
            'custom-logo',
            array(
                'height' => 75,
                'width' => 75,
                'flex-width' => false,
                'flex-height' => false,
            )
        );
    }
endif;
add_action('after_setup_theme', 'PHP_LAB_2021_WordPress_Homework_2_setup');

function PHP_LAB_2021_WordPress_Homework_2_scripts() {
    wp_enqueue_style( 
        'fontawesome',
        get_template_directory_uri() . '/assets/css/fontawesome.css'
    );

    wp_enqueue_style( 
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css'
    );

    wp_enqueue_style( 
        'owl',
        get_template_directory_uri() . '/assets/css/owl.css'
    );

    wp_enqueue_style('PHP_LAB_2021_WordPress_Homework_2_scripts-style', get_stylesheet_uri(), array());

    wp_enqueue_script(
        'bootstrapjs',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'customjs',
        get_template_directory_uri() . '/assets/js/custom.js',
        array('bootstrapjs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'owljs',
        get_template_directory_uri() . '/assets/js/owl.js',
        array('customjs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'slickjs',
        get_template_directory_uri() . '/assets/js/slick.js',
        array('owljs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'isotopejs',
        get_template_directory_uri() . '/assets/js/isotope.js',
        array('slickjs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'accordionsjs',
        get_template_directory_uri() . '/assets/js/accordions.js',
        array('isotopejs'),
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'PHP_LAB_2021_WordPress_Homework_2_scripts');

function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          =>  ( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '',
            //'after_widget'  => '</div></div>',
            //'before_title'  => '<div class="sidebar-heading"> <h2>',
           // 'after_title'   => '</div></h2>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'my_register_sidebars' );


// Creating the widget 
class my_category_widget extends WP_Widget {
 
    // The construct part  
    function __construct() {
        parent::__construct(
  
            // Base ID of your widget
            'my_category_widget', 
              
            // Widget name will appear in UI
            __('My Category Widget', 'my_category_widget_domain'), 
              
            // Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'my_category_widget_domain' ), ) 
            );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
  
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];?>
        <div class="col-lg-12">
             <div class="sidebar-item categories">
                <div class="sidebar-heading"><h2>
                <?php
                if ( ! empty( $title ) )
                    echo $args['before_title'] . $title . $args['after_title'];
                ?>
                </h2>
                </div>
                <div class="content">
                    <ul>
                        <?php
                        $categories = get_categories();
                        foreach($categories as $category):?>
                            <li><a href="<?php echo get_category_link( $category->term_id ) ?>">- <?php echo $category->name ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul> 
                </div>
            </div>
        </div>
       <?php
        echo $args['after_widget'];
    }
              
    // Creating widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'New title', 'my_category_widget_domain' );
            }
            // Widget admin form
            ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
     
    // Class my_categoryn_widget ends here
}  
class my_tags_widget extends WP_Widget {
 
    // The construct part  
    function __construct() {
        parent::__construct(
  
            // Base ID of your widget
            'my_tags_widget', 
              
            // Widget name will appear in UI
            __('My Tags Widget', 'my_tags_widget_domain'), 
              
            // Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'my_tags_widget_domain' ), ) 
            );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
  
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];?>
        <div class="col-lg-12">
            <div class="sidebar-item tags">
                <div class="sidebar-heading">
                    <h2>
                    <?php if ( ! empty( $title ) ) :
                    echo $args['before_title'] . $title . $args['after_title']; 
                    // This is where you run the code and display the output
                    ?>
                    </h2>
                </div>
                <div class="content">
                    <ul>
                    <?php $tags = get_tags();
                    foreach($tags as $tag) : ?>
                        <li><a href="<?php echo get_tag_link( $tag->term_id ) ?>">- <?php echo $tag->name ?> </a></li>
                    <?php endforeach;
                    endif; ?>
                    </ul> 
                </div>
            </div>
        </div>

        <?php echo $args['after_widget'];
    }
              
    // Creating widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'New title', 'my_tags_widget_domain' );
            }
            // Widget admin form
            ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
     
    // Class my_tagsn_widget ends here
} 
class my_recent_posts_widget extends WP_Widget {
 
    // The construct part  
    function __construct() {
        parent::__construct(
  
            // Base ID of your widget
            'my_recent_posts_widget', 
              
            // Widget name will appear in UI
            __('My Recent Posts Widget', 'my_recent_posts_widget_domain'), 
              
            // Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'my_recent_posts_widget_domain' ), ) 
            );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
  
        // before and after widget arguments are defined by themes
        echo $args['before_widget']; ?>
        <div class="col-lg-12"> 
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>
                        <?php
                        if ( ! empty( $title ) )
                        echo $args['before_title'] . $title . $args['after_title'];
                        
                        // This is where you run the code and display the output
                        ?>
                    </h2>
                </div>
                <div class="content">
                    <ul>
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 4, // Number of recent posts thumbnails to display
                            'post_status' => 'publish' // Show only the published posts
                        ));
                        foreach( $recent_posts as $post_item ) : ?>
                            <li>
                                <a href="<?php echo get_permalink($post_item['ID']) ?>">
                                    <h5><?php echo $post_item['post_title'] ?></h5>
                                    <span> <?php ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }
              
    // Creating widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'New title', 'my_recent_posts_widget_domain' );
            }
            // Widget admin form
            ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
     
    // Class my_recent_postsn_widget ends here
}    
class my_searchform_widget extends WP_Widget {
 
        // The construct part  
        function __construct() {
            parent::__construct(
      
                // Base ID of your widget
                'my_searchform_widget', 
                  
                // Widget name will appear in UI
                __('My Search Form Widget', 'my_searchform_widget_domain'), 
                  
                // Widget description
                array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'my_searchform_widget_domain' ), ) 
                );
        }
          
        // Creating widget front-end
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
      
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
              
            // This is where you run the code and display the output
            echo '<div class="col-lg-12">';
            echo '<div class="sidebar-item search">';
            get_search_form();
            echo '</div></div>';
            echo $args['after_widget'];
        }
                  
        // Creating widget Backend 
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
                }
                else {
                $title = __( 'New title', 'my_searchform_widget_domain' );
                }
                // Widget admin form
                ?>
                <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
                <?php 
        }
              
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
         
        // Class my_searchformn_widget ends here
} 
    // Register and load the widget
function my_load_widget() {
    register_widget( 'my_category_widget' );
    register_widget( 'my_recent_posts_widget' );
    register_widget( 'my_tags_widget' );
    register_widget( 'my_searchform_widget' );
}
add_action( 'widgets_init', 'my_load_widget' );
// pagination
function pagination($pages = '', $range = 1)
{
    $showitems = ($range * 2)+1;
 
    global $paged;
    if(empty($paged)) $paged = 1;
 
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo '<div class="col-lg-12"><ul class="page-numbers">';
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? '<li class="active"><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>':'<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
            }
        }
        echo "</ul></div>";
    }
}


    function my_custom_comments($comment, $args, $depth) {
        ?>
       <li>
            <div class="author-thumb">
                <?php echo get_avatar($comment,$size='120',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
            </div>
            <div class="right-content">
                <h4><?php  echo get_comment_author() ?><span><?php echo get_comment_date() ?></span></h4>
                <?php comment_text() ?>
                    
            </div>
        </li>
    
    <?php
    }

    // custom comment form
    function my_comment_form_default_fields( $fields ) {
        $commenter     = wp_get_current_commenter();
        $user          = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';
        $req           = get_option( 'require_name_email' );
        $aria_req      = ( $req ? " aria-required='true'" : '' );
        $html_req      = ( $req ? " required='required'" : '' );
        $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;

        $fields = [
            'author' => '<div class="col-md-6 col-sm-12"><fieldset> ' .
                        '<input name="author" type="text" id="author" placeholder="Your name" required=""></fieldset> </div>',
            'email'  => ' <div class="col-md-6 col-sm-12"><fieldset>' .
                        '<input name="email" type="text" id="email" placeholder="Your email" required=""></fieldset></div>',
            'url'    => '<div class="col-md-12 col-sm-12"><fieldset><input name="url" type="text" id="url" placeholder="Subject"></fieldset></div>',
            'comment_field' => '<div class="col-lg-12"><fieldset><textarea name="comment" rows="6" id="comment" placeholder="Type your comment" required="">' . 
                        '</textarea> </fieldset></div>',
        ];
    
        return $fields;
    }
    add_filter( 'comment_form_default_fields', 'my_comment_form_default_fields' );
    
    /**
     * Remove the original comment field because we've added it to the default fields
     * using wpse250243_comment_form_default_fields(). If we don't do this, the comment
     * field will appear twice.
     */
    function my_comment_form_defaults( $defaults ) {
        $user          = wp_get_current_user();
        $user_identity = $user->exists();
        if ( ! $user_identity && isset( $defaults[ 'comment_field' ] ) ) {
            $defaults[ 'comment_field' ] = '';
        }
    
        return $defaults;
    }
    add_filter( 'comment_form_defaults', 'my_comment_form_defaults', 10, 1 );
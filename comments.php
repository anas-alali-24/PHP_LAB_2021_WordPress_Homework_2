<?PHP 
if ( post_password_required() ) {
    return;
}
?>

<div class="col-lg-12">
    <div class="sidebar-item comments">
        <div class="sidebar-heading">
            <h2><?php 
                if (get_comments_number()):
                    get_comments_number();
                else:
                    echo '0';
                endif;
                ?> 
            comments</h2>
        </div>
        
        <div class="content">
            <ul>
            <?php
                wp_list_comments( array(
                    'short_ping' => true,
                        'callback' => 'my_custom_comments'
                ) );
             ?>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="sidebar-item submit-comment">
        <div class="content">
        <?php
        comment_form(
            array(
                'comment_notes_before' => '',
                'submit_button' => '<button type="submit" id="form-submit" class="main-button">Submit</button>',
                'title_reply_before' => '<div class="sidebar-heading"><h2>',
                'title_reply' => 'YOUR COMMENT',
                'title_reply_after' => '</h2></div>',
                //'logged_in_as' => ''
            )
        );
        ?>
        </div>
    </div>
</div>
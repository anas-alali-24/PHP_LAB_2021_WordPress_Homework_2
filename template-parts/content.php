<div class="col-lg-12">
     <div class="blog-post">
        <div class="blog-thumb">
        <?php
            if (has_post_thumbnail()):
                 the_post_thumbnail(); 
            endif; 
        ?>
        </div>
        <div class="down-content">
            <span><?php
            the_category(' . ') ?></span>
            <a href="<?php the_permalink(); ?>">
            <?php
            the_title('<h4>', '</h4>'); ?></a>
            <ul class="post-info">
                <li><a href="#"> <?php the_author() ?></a></li>
                <li><a href="#"><?php the_date('M d, Y') ?></a></li>
                <li><a href="#"> <?php 
                if (get_comments_number()):
                 get_comments_number();
                else:
                     echo '0';
                endif; ?>
                 Comments</a></li>
            </ul>
            <?php
             the_excerpt('<p>', '</p>') ?>
            <div class="post-options">
                <div class="row">
                    <div class="col-6">
                    <?php if( has_tag() ) : ?>
                        <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <?php echo get_the_tag_list( '<li><a href="#">', ' ', '</a>,</li>' ); ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="col-6">
                        <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
     </div>
</div>
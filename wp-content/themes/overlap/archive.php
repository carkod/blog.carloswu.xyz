<?php get_header(); get_template_part('head');?>



<div id="main" class="row">
<?php /* category */ if ( is_category ) : 
    
    $query = new WP_Query( array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        's' =>$_POST['term'],
        'posts_per_page' =>10
         
        ) );
    // display results
if( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); ?>
        
        <div id="categories" class="autocomplete">
            <a class="entry" href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt() ?></p>
            </a>
            <div id="post-<?php the_ID()?>" class="post-data">
                <ul class="postmeta">
                    <li role="presentation" class="label label-primary"><?php the_category(' ') ; ?></li>
                    <li role="presentation" class="label label-default no-hover" ><?php the_modified_date() ; ?></li>
                </ul>
            </div>
        </div>
    <?php endwhile; else :?>
    
        <div class="autocomplete">
            <h2 id="no-results"><?php _e('No results, type something else buddy','overlap') ?></h2>
        </div>
    
    
    <?php endif;  endif; ?>
</div>

<?php get_footer();?>
<?php include ('branding.php');?>

<?php

$header_conf = array(
    // 'width'         => 980,
    // 'height'        => 60,
    'default-image' => get_template_directory_uri() . '/img/bg.jpg',
);
add_theme_support( 'custom-background', $header_conf );


// declare $post global if used outside of the loop
    global $post;

    // check to see if the theme supports Featured Images, and one is set
    if (current_theme_supports( 'custom-background' )) {
            
        // specify desired image size in place of 'full'
       }
/*! SEARCH SUGGESTIONS FUNCTION */

add_action('wp_ajax_nopriv_search_results','search_results');
add_action('wp_ajax_search_results','search_results');
function search_results(){
 
    $query = new WP_Query( array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        's' =>$_POST['term'],
        'posts_per_page' =>10
         
        ) );
    // display results
    if( $query->have_posts() ) : while ($query->have_posts()) :?>
    
    
    
    <?php $query->the_post(); ?>
        
        <div class="autocomplete">
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
    
    
    <?php endif; exit; } ?>

<?php // end loop

// Thumbnails size

if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 85, 85, true );
}
// Get page by slug function

function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

function my_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');


    $lang = TEMPLATE_PATH . '/lang';
    load_theme_textdomain('overlap', $lang);

// Theme support for background, header
/*
$background = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $background );

$header = array(
	'default-image'          => '',
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $header );
*/
function as_remove_menus () {
       remove_menu_page('upload.php'); //hide Media
       remove_menu_page('link-manager.php'); //hide links
       remove_submenu_page( 'edit.php', 'edit-tags.php' ); //hide tags
       global $submenu;
        // Appearance Menu
        unset($submenu['themes.php'][6]); // Customize
}
add_action('admin_menu', 'as_remove_menus');

 //Comments.php this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

       <div class="comment-meta">
       <span class="comment-author"><?php printf(__('%s  '), get_comment_author()) ?></span>
       <span class="comment-date"><?php printf(__('in %1$s'), get_comment_date())  ?></span> said:
       </div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <div class="moderation"><em><?php _e('Your comment is awaiting moderation.') ?></em></div>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">	<?php comment_text() ?></div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => 5))) ?>
   </div>
<?php } ?>
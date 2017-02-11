<?php // Tiny MCE

function my_format_TinyMCE( $in ) {
	$in['remove_linebreaks'] = true;
	$in['paste_remove_styles'] = true;
	$in['paste_remove_spans'] = true;
	$in['wpautop'] = true;
	return $in;
}
add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );


// Welcome message

add_action( 'load-index.php', 'hide_welcome_panel' );

function hide_welcome_panel() {
    $user_id = get_current_user_id();

    if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
}

// End welcome 

add_action('admin_print_styles-themes.php', 'hide_customize');
function hide_customize(){
    echo '<style>#customize-current-theme-link{display:none;}</style>';
}

// Remove Customize section stuff
add_action( 'customize_register', 'wpse8170_customize_register' );
function wpse8170_customize_register( WP_Customize_Manager $wp_customize ) {
$wp_customize->remove_section( 'title_tagline');
$wp_customize->remove_section( 'colors');
$wp_customize->remove_section( 'static_front_page');


}

// Remove entire Customize section
function remove_menus(){
  remove_submenu_page( 'themes.php', 'customize.php' );
}
add_action( 'admin_menu', 'remove_menus' );

//Remove sub level admin menus  
add_action( 'admin_menu', 'remove_admin_submenus' );
function remove_admin_submenus() {  
    // remove_submenu_page( 'themes.php', 'theme-editor.php' );  
    // remove_submenu_page( 'themes.php', 'themes.php' );  
    // remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );  
    // remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );  
    // remove_submenu_page( 'edit.php', 'post-new.php' );  
    remove_submenu_page( 'themes.php', 'nav-menus.php' );  
    remove_submenu_page( 'themes.php', 'widgets.php' );  
    remove_submenu_page( 'themes.php', 'theme-editor.php' ); 
    // remove_submenu_page( 'plugins.php', 'plugin-editor.php' );  
    // remove_submenu_page( 'plugins.php', 'plugin-install.php' );  
    // remove_submenu_page( 'users.php', 'users.php' );  
    // remove_submenu_page( 'users.php', 'user-new.php' );  
    // remove_submenu_page( 'upload.php', 'media-new.php' );  
    // remove_submenu_page( 'options-general.php', 'options-writing.php' );  
    // remove_submenu_page( 'options-general.php', 'options-reading.php' );  
    // remove_submenu_page( 'options-general.php', 'options-discussion.php' );  
    // remove_submenu_page( 'options-general.php', 'options-media.php' );  
    // remove_submenu_page( 'options-general.php', 'options-privacy.php' );  
   //  remove_submenu_page( 'options-general.php', 'options-permalinks.php' );  
    // remove_submenu_page( 'index.php', 'update-core.php' );  
}  
// Remove top level menus admin
function sb_remove_admin_menus (){

  // Check that the built-in WordPress function remove_menu_page() exists in the current installation
  if ( function_exists('remove_menu_page') ) { 

     // remove_menu_page('index.php'); // Dashboard tab
    // remove_menu_page('edit.php'); // Posts
    // remove_menu_page('edit.php?post_type=page'); // Pages
    // remove_menu_page('upload.php'); // Media
    // remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('themes.php'); // Appearance
    // remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('users.php'); // Users
    // remove_menu_page('tools.php'); // Tools
    // remove_menu_page('options-general.php'); // Settings

  }

}
add_action('admin_menu', 'sb_remove_admin_menus'); 


// hide admin bar in front-end
show_admin_bar( false );

// Remove about wordpress and log top left corner
add_action( 'add_admin_bar_menus', 'tkb_remove_wp_admin_bar_links');
function tkb_remove_wp_admin_bar_links(){
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu' );
}

// admin footer
function modify_footer_admin () {
  echo __('A Disenda product. ') ;
  echo __('Designer: <a href="http://carkod.com">Carkod</a>.');
}

add_filter('admin_footer_text', 'modify_footer_admin') ;


// Post columns removal (post and pages)
function custom_post_columns($defaults) {
  unset($defaults['author']); 
  return $defaults;
}

add_filter('manage_posts_columns', 'custom_post_columns');

function custom_pages_columns($defaults) {
  unset($defaults['author']);
  return $defaults;
}

add_filter('manage_pages_columns', 'custom_pages_columns');
// End post columns removal

function customize_meta_boxes() {
  /* Removes meta boxes from Posts */
 // remove_meta_box('postcustom','post','normal');
  remove_meta_box('trackbacksdiv','post','normal');
  // remove_meta_box('commentstatusdiv','post','normal');
  remove_meta_box('commentsdiv','post','normal');
 // remove_meta_box('tagsdiv-post_tag','post','normal');
  // remove_meta_box('postexcerpt','post','normal');
  /* Removes meta boxes from pages */
  // remove_meta_box('postcustom','page','normal');
  remove_meta_box('trackbacksdiv','page','normal');
  remove_meta_box('commentstatusdiv','page','normal');
  remove_meta_box('commentsdiv','page','normal');  
}

add_action('admin_init','customize_meta_boxes');

function remove_dashboard_widgets(){
  global$wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');



// Turn admin checkbox into radio buttons (can only select one)
add_action( 'admin_footer', 'onecategory' );
function onecategory(){
	echo '<script type="text/javascript">';
	echo 'jQuery("#categorychecklist input, #categorychecklist-pop input, .cat-checklist input")';
	echo '.each(function(){this.type="radio"});</script>';
}

// hook the translation filters, changes the names
add_filter(  'gettext',  'change_post_to_article'  );
add_filter(  'ngettext',  'change_post_to_article'  );

function change_post_to_article( $translated ) {
     $translated = str_ireplace(  'Post',  'Article',  $translated );  // ireplace is PHP5 only
     return $translated;

}
add_filter(  'gettext',  'change2'  );
add_filter(  'ngettext',  'change2'  );

function change2( $translated ) {
	 $translated = str_ireplace(  'Draft',  'Outline',  $translated );  // ireplace is PHP5 only
     return $translated;

}

add_filter(  'gettext',  'change3'  );
add_filter(  'ngettext',  'change3'  );

function change3( $translated ) {
	 $translated = str_ireplace(  'Pending review',  'Final draft',  $translated );  // ireplace is PHP5 only
     return $translated;
}
?>
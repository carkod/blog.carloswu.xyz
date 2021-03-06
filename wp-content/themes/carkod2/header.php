<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<!-- SEO -->
<?php if (have_posts()):  ?>
<?php if (is_page()): ?>
<title><?php the_title(); echo (' | '); bloginfo('name'); ?></title>
<?php endif; ?>

<?php if (is_single()): ?>
<title><?php the_title(); echo(' - '); $category = get_the_category(); echo $category[0]->cat_name; ?></title>
<?php endif; ?>
    <?php if (is_category() ): ?> 
   <title><?php $category = get_the_category(); echo $category[0]->cat_name; echo (' | '); echo ('Category archives'); ?></title>
   <?php endif; ?>
<?php if (is_tag() ): ?> 
   <title><?php single_tag_title(); echo (' | '); echo ('Tag archives'); ?></title>
   <?php endif; ?>

<?php if ( is_home() ): ?>
<title><?php bloginfo('name'); echo(' | '); bloginfo('description'); ?></title>
<?php endif; else : ?>
<title><?php the_title('',''); echo(' - '); bloginfo('description'); ?></title>
<?php endif; ?> 

<meta http-equiv="content-language" content="<?php bloginfo('language'); ?>" />
<meta http-equiv="author" content="Carkod" />
<meta http-equiv="contact" content="<?php bloginfo('admin_email'); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 
<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php the_excerpt_rss(); ?>" />
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php endif; ?>

<?php if (is_single()) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="keywords" content="<?php $articletags = strip_tags(get_the_tag_list('',', ','')); echo $articletags;
?>" />
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="keywords" content="carkod,personal,blog,my social,life,works" />
<?php endif; ?>

<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<link rel="canonical" href="<?php the_permalink(); ?>" />
<?php endwhile; endif; elseif(is_home()) : ?>
<link rel="canonical" href="<?php bloginfo('url'); ?>" />
<?php endif; ?>


<!-- stylesheets -->



<link href='http://fonts.googleapis.com/css?family=Marmelad&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" charset="utf-8" />
<link href="<?php bloginfo('template_url'); ?>/archives.css" rel="stylesheet" type="text/css" charset="utf-8" />
<link href="<?php bloginfo('template_url'); ?>/custom.css" rel="stylesheet" type="text/css" charset="utf-8" />
<link href="<?php bloginfo('template_url'); ?>/browsers.css" rel="stylesheet" type="text/css" charset="utf-8" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<!-- stylesheets for other browsers -->

<?php
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
?>
 
<!-- rss and pingback -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- scripts  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container0">

<?php include(TEMPLATEPATH . '/topnav.php'); ?>
<div id="header">
<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>
</div>
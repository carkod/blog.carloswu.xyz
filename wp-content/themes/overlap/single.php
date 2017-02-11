<?php get_header(); ?>
<div id="content" class="sidebar-open">
<?php get_template_part('head');?>


<div id="main" class="row">
    
    <div id="results-page" class="col-md-12"></div>
    
    <div id="keepread" class="hidden col-md-12">
        <button id="remove-results" class="btn btn-default"><span class="fa fa-times-circle"></span>&nbsp;&nbsp;<?php _e('Close results','overlap') ?></button>
    </div>
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post() ; ?>
    <div id="single-page" class="col-md-12">
        <h1><?php the_title()?></h1>
        
        <?php the_content()?>
        
    </div>
    
    <div id="comments" class="col-md-12">
        
        <?php get_template_part('discussion')?>
        
    </div>
    
    
    <?php endwhile; endif; ?>
    
    
    
</div>
</div>
<?php get_template_part('nav')?>


<?php get_footer();?>
<?php get_header(); get_template_part('head');?>


<div id="main">
    
    <div id="results-page"></div>
    
    <div id="alternative">
        <div id="alternative-menu" data-example-id="simple-nav-justified">

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#topix" id="menu-topx" class="alternative-btn" role="tab" data-toggle="tab"><?php _e('Topics','overlap') ?></a>
                </li>
                <li role="presentation">
                    <a href="#archix" id="menu-arx" class="alternative-btn" role="tab" data-toggle="tab"><?php _e('Archives','overlap') ?></a>
                </li>
                <?php $query = new WP_Query( array ('post_type' =>  'page',	'post_status' => 'publish' ) ); if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post();  ?>
                <li role="presentation">
                  
                    <a href="#<?php the_ID()?>" id="menu-about" class="alternative-btn" role="tab" data-toggle="tab"><?php the_title(); ?></a>
                </li>
                
                <?php endwhile; endif ; ?>
            </ul>
        </div>
        <div id="alternative-cont">
          <div id="topix" class="row tab-pane fade in active" role="tabpanel">
          <?php $categories = get_categories( array( 'orderby' => 'name', 'parent'  => 0) );
              foreach ( $categories as $category ) {?>
            
            
              <div class="col-sm-6 col-md-4 items">
                <div class="thumbnail">
                  <!--<img src="..." alt="...">-->
                  <div class="caption">
                    <p>
                      <?php echo $category->description; ?>
                    </p>
                    <p>
                      <?php printf( '<a href="%1$s" class="btn btn-primary" role="button">%2$s</a><br />',  esc_url( get_category_link( $category->term_id ) ), esc_html( $category->name ));?>
                    </p>
                  </div>
                </div>
              </div>
    
          <?php }?>
            </div>
            
            
        <div id="archix" class="row tab-pane fade" role="tabpanel">
        <?php
            $archives = wp_get_archives( 'echo=0' );
            $archives = explode( '</li>' , $archives );
            $links = array();
            foreach( $archives as $link ) {
            	$link = str_replace( array( '<li>' , "\n" , "\t" , "\s" ), '' , $link );
            	if( '' != $link )
            		$links[] = $link;
            	else
            		continue;
            }

          foreach ($links as $arx) { ?>

          
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <div class="archives">
                <?= $arx; ?>
              </div>
            </div>
          </div>
          
          
          
        <?php  } ?>
        </div>
        
        
        
          <?php $content = new WP_Query( array ('post_type' =>  'page',	'post_status' => 'publish' ) ); if ($content->have_posts()) : while ($content->have_posts()) : $content->the_post() ; ?>
        <div id="<?php the_ID() ?>" class="row tab-pane fade" role="tabpanel"> 
          <div class="col-lg-12">
          <?php the_content()?>
          </div>
          
        </div>  
          <?php endwhile; endif; ?>
            
      </div>
    </div>
    
    
    
</div>

<?php get_footer();?>
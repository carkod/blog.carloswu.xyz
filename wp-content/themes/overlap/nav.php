<div id="sidebar">
  <button id="close-sidebar" type="button" class="btn btn-default btn-block btn-sm"><span class="fa fa-times-circle"></span> <?php _ex('close', 'Close modal window','overlap')?></button>
  <ul id="sidebar-list" role="tabpanel">
      <li><a class="title" href="#topix"><?php _e('Topics','overlap') ?></a> 
      
      <ul>
      
  <?php $categories = get_categories( array( 'orderby' => 'name', 'parent'  => 0) );
      foreach ( $categories as $category ) {?>
    
    
      
        <li class="list-items"><?php printf( '<a href="%1$s" >%2$s</a>',  esc_url( get_category_link( $category->term_id ) ), esc_html( $category->name ));?></li>
      

  <?php }?>
      </ul>
  </li>
    
      
      
      <li><a class="title" ><?php _e('Archives','overlap') ?></a>
        <ul>
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
                <li class="list-items"><?= $arx; ?></li>
        
      <?php  } ?>
      </ul>
    </li>
  </ul>
</div>
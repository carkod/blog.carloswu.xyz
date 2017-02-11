<div id="header">
    <div id="header-center" class="center-block">
        <div id="site-title-bg">
            <h1 id="site-title" ><a href="<?php bloginfo('url') ?>" title="Go to Homepage"><?php bloginfo('name') ?></a></h1>
        </div>
            <div id="nav" class="col-lg-12">
            
                <form method="get" id="search-form" class="" action="" name="#s"/>
                    <div class="input-group form-group-lg">
                        <span class="input-group-btn">
                            <?php if ( is_home() ) :?>
                            <a href="#alternative" type="button" id="bar-btn" class="btn btn-default" ><span class="fa fa-bars fa-2x"></span></a>
                            <?php else: ?>
                            <button type="button" id="bar-btn" class="btn btn-default"><span class="fa fa-bars fa-2x"></span></button>
                            <?php endif;?>
                        </span>
                        <input class="form-control" type="text" placeholder="<?php esc_attr_e( 'Search related articles, titles, topics, dates', 'overlap' ); ?>" name="#s" id="search-field" />
                        <span class="input-group-btn input-group-lg">
                            <button type="submit" id="search-btn" value="" class="btn btn-primary" disabled><span class="fa fa-search fa-2x"></span></button>
                        </span>
                    </div>
                
                </form>
            
            
            
            </div>
            <div id="site-description">
                <h2><?php bloginfo('description') ?></h2>
            </div>
            
    </div>
    

</div>


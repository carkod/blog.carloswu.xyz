<!-- Stylesheets -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link href='https://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:700' rel='stylesheet' type='text/css'>

<link href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' rel='stylesheet' type='text/css'>


<!-- jquery with IE8 fallback -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<!--[if lte IE 8]>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
<![endif]-->
<!--[if gt IE 8]>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<![endif]-->

<!-- Other scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script type="text/javascript">var BASE = "<?php echo home_url() ?>";</script>
<script type="text/javascript">
/* global jQuery*/ 
/* global $*/ 
jQuery(document).ready(function(){

    jQuery('#search-field').keypress(function(event) {
        
    // prevent browser autocomplete
    jQuery(this).attr('autocomplete','off');
    // get search term
    var searchTerm = jQuery(this).val();
     
    // send request when after 3 seconds
    
        setTimeout(function(){
            
            jQuery.ajax({
            url : BASE+'/wp-admin/admin-ajax.php',
            type:"POST",
            data:{
             
            'action':'search_results',
            'term' :searchTerm
            },
            success:function(result){
                
                // animation for results-page display
                jQuery('#results-page').addClass('animated bounceInDown').html(result);
                
                // 
                jQuery('.autocomplete').find('a').hover(function(){
                     $(this).addClass('selected');
                    
                }, function(){
                    $(this).removeClass('selected');
                });
                
                // single.php reset results-page after repeated search                
                if ( $('body').hasClass('single') ) {
                    $('#results-page').css('display', 'block');
                    $('#keepread').removeClass('hidden');
                }
            }
            });
            
        },3000);
    
        // single.php (after the 3 second keypress wait)
        setTimeout(function() {
        
            if ( ($('body').hasClass('single')) && ($("#results-page").children().hasClass('autocomplete')) ) {
                    console.log('passing #results-page');
                    $('#keepread').show();
                    $('#keepread').find('#remove-results').click(function(event){
                        console.log('remove results is clicked');
                    $('#results-page').css('display', 'none');
                    $('#keepread').css('display', 'none');
                    });
                     
            } else {
                console.log('not passing single and results-page');
            }
            
        }, 3000);
        
    });
    


    var bg_image = 'url(<?php echo background_image() ?>)';
    
    $('body').removeClass('custom-background');
    $('body').find('#header').addClass('custom-background');
    $('.custom-background').css('background-image', bg_image);
    
    
    $('#search-form').focusin(function(event){
        $(this).addClass('nav-focus');
        
    }).focusout(function(event){
        $(this).removeClass('nav-focus');
    });
    
    
    
    // when page is loading
    
    // else if ( window.location.hash ) {
    //         var id = window.location.hash.substr(1);
    //         $('#alternative-menu').find('#'+id).addClass('active')
            
    //     }
    
    
    // Alt-navbar
var $activeLink = $('#alternative-menu').find('a').parent('li');
var $content = $('#alternative-cont');

    $activeLink.on('click', function(){
        
        if ( $activeLink.hasClass('active') ) {
                
            $activeLink.removeClass('active');
            $(this).addClass('active');
            var theID = $(this).find('a').attr('href');
            console.log(theID);
            $content.find('.in.active').removeClass('in active');
            $content.find(theID).addClass('in active');
            
        }  else {
            $(this).addClass('active');
            $content.find(theID).addClass('in active');
        }
        
        
    });
    
if ( window.location.hash ) {
    var id = window.location.hash.substr(1); 
    $activeLink.parent().find('.active').removeClass('active');
    $activeLink.find('#menu-'+id).parent('li').addClass('active');
            
}





// get 4% header height of full document 
$(window).load(function(){
    var screenHeight = $(window).height();
    var ratioHeight = Math.round(screenHeight * 0.48) + 'px';
    $('#header').css({'height' : ratioHeight});
    $('#site-description h2').css('margin','12% 0');
});

// responsive sidebar
if ( $('body').hasClass('home') === false ) {
    console.log('this is not home - doesnt have alt nav');
    var sidebarOuterWidth = $('#sidebar').outerWidth();
    
    
    $('#bar-btn, #close-sidebar').on('click', function(){
        
        $('#sidebar').css('display','block').toggleClass('hidden animated slideInLeft');
        
        $('#content').css({
        'display' : 'block',
        'left': sidebarOuterWidth + 'px',
        'width' : '85%',
    });
        
    });
    
    
}    
});
 
</script>


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-10612008-3', 'auto');ga('send', 'pageview');
</script>
</body>
</html>
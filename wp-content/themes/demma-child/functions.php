<?php

// enqueue the child theme stylesheet

Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);
add_action('wp_enqueue_scripts', 'zendvn_theme_register_js');
add_action('wp_enqueue_scripts', 'zendvn_theme_register_style');
add_action('wp_head', 'header_script_code');
function header_script_code(){
	$strScript='<script type="text/javascript" language="javascript">
		jQuery(document).ready(function(){
jQuery(".home-slick").slick({
	dots: true,
	autoplay:true,
	arrows:false
});  
		});
        
    </script>	
    ';
    echo $strScript;
}
function zendvn_theme_register_js(){
	wp_register_script('slick_min', site_url( 'wp-content/themes/demma-child/slick/slick.min.js', null ),array(),"1.0",false);
	wp_enqueue_script('slick_min');
}
function zendvn_theme_register_style(){
	wp_register_style('slick', site_url( 'wp-content/themes/demma-child/slick/slick.css', null ),array(),'1.0','all');
	wp_enqueue_style('slick');
	wp_register_style('slick-theme', site_url( 'wp-content/themes/demma-child/slick/slick-theme.css', null ),array(),'1.0','all');
	wp_enqueue_style('slick-theme');
}
// SHORTCODE WITH PARAMETER
function showArticleHomeSlider($atts){ 
	ob_start();        
	extract( 
		shortcode_atts( array (
			'category' => '',
		), $atts ) );
	$args = array(  
                                 //slug danh mục                                 
		'category_name' => $category,
                                'posts_per_page' => 4, // SỐ POST /PAGE
                                'order'   => 'ASC', // ORDER THEO THỨ TỰ 
                                'post_type' => 'post' // POST TYPE
                            );
	$query = new WP_Query($args);		
	if($query->have_posts()){		
		echo '<div class="home-slick">';
		while ($query->have_posts()) {
			$query->the_post();		
			$post_id=$query->post->ID;							
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$content=substr(get_the_content($post_id), 0,600).'...' ;    
			$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		       			
			?>
			<div>
				<div class="vc_col-lg-5">
					<img src="<?php echo $featureImg; ?>" />
				</div>
				<div class="vc_col-lg-7">	
					<div class="seperator-slick"></div>				
					<div class="title-slick-home"><?php echo $title; ?></div>													
					<div class="excerpt-slick-home"><?php echo $content; ?></div>													
				</div>				
			</div>			
			<?php						
		}
		wp_reset_postdata();  
		echo '</div>';
	}
}
add_shortcode('showArticleHomeSlider', 'showArticleHomeSlider');
// SHORTCODE WITH PARAMETER
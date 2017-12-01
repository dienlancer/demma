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
// article on content-bottom
function showArticleOnContentBottom($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'category' => '',			
			), 
			$atts 
		)
	);	
	$args = array(  		
		'category_name' => 	$category,
        'posts_per_page' => 3, 
        'order'   => 'DESC', 
        'post_type' => 'post'
    );
	$query = new WP_Query($args);		
	if($query->have_posts()){		
		echo '<div class="article-content-bottom">';
		while ($query->have_posts()) {
			$query->the_post();		
			$post_id=$query->post->ID;							
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$excerpt=substr(get_the_excerpt( $post_id ), 0,200).'...';			
			$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		       			
			?>
			<div class="vc_col-lg-4 no-padding">
				<div class="relative">
					<div class="article-by-right-column-title-2"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>
					<div><img src="<?php echo $featureImg; ?>"></div>
				</div>
			</div>			
			<?php						
		}
		wp_reset_postdata();  
		echo '<div class="clr"></div>';
		echo '</div>';		
	}
}
add_shortcode('article_on_contentbottom', 'showArticleOnContentBottom');
// article by date
function showArticleByDate($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'category' => '',			
			), 
			$atts 
		)
	);	
	$args = array(  		
		'category_name' => 	$category,
        'posts_per_page' => 3, 
        'order'   => 'DESC', 
        'post_type' => 'post'
    );
	$query = new WP_Query($args);		
	if($query->have_posts()){		
		echo '<div class="article-by-month-year">';
		while ($query->have_posts()) {
			$query->the_post();		
			$post_id=$query->post->ID;							
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$excerpt=substr(get_the_excerpt( $post_id ), 0,200).'...';			
			$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		       			
			?>
			<div>
				<div class="article-m-y-title"><?php echo $title; ?></div>													
				<div class="article-m-y-excerpt"><?php echo $excerpt; ?></div>				
			</div>			
			<?php						
		}
		wp_reset_postdata();  
		echo '</div>';		
	}
}
add_shortcode('article_by_date', 'showArticleByDate');
// article by right column
function showArticleByRightColumn($attrs){
	ob_start();        	
	extract(
		shortcode_atts(
			array(
				'category' => '',			
			), 
			$atts 
		)
	);	
	$args = array(  		
		'category_name' => 	$category,
        'posts_per_page' =>1, 
        'order'   => 'DESC', 
        'post_type' => 'post'
    );
	$query = new WP_Query($args);		
	if($query->have_posts()){		
		echo '<div class="article-by-right-column">';
		while ($query->have_posts()) {
			$query->the_post();		
			$post_id=$query->post->ID;							
			$permalink=get_the_permalink($post_id);
			$title=get_the_title($post_id);
			$excerpt=substr(get_the_excerpt( $post_id ), 0,200).'...';			
			$featureImg=wp_get_attachment_url(get_post_thumbnail_id($post_id));		       			
			?>
			<div class="relative">
				<div class="article-by-right-column-title"><a href="<?php echo $permalink ?>"><?php echo $title; ?></a></div>
				<div><img src="<?php echo $featureImg; ?>"></div>
			</div>			
			<?php						
		}
		wp_reset_postdata();  
		echo '</div>';		
	}
}
add_shortcode('article_by_right_column', 'showArticleByRightColumn');
// article homeslider
function showArticleHomeSlider($atts){ 
	?>
	<div class="home-slick">
		<div>
			<div class="vc_col-lg-4"><img src="<?php echo site_url( 'wp-content/uploads/technology-demma-1.png', null ); ?>" /></div>
			<div class="vc_col-lg-4"><img src="<?php echo site_url( 'wp-content/uploads/technology-demma-2.png', null ); ?>" /></div>
			<div class="vc_col-lg-4">
				<div class="seperator-slick"></div>			
				<div class="title-slick-home">Modern membrane technologies</div>													
				<div class="excerpt-slick-home">For de-centralized applications</div>			
			</div>
		</div>
		<div>
			<div class="vc_col-lg-4"><img src="<?php echo site_url( 'wp-content/uploads/technology-demma-3.png', null ); ?>" /></div>
			<div class="vc_col-lg-4"><img src="<?php echo site_url( 'wp-content/uploads/technology-demma-4.png', null ); ?>" /></div>
			<div class="vc_col-lg-4">
				<div class="seperator-slick"></div>			
				<div class="title-slick-home">Modern membrane technologies</div>													
				<div class="excerpt-slick-home">For de-centralized applications</div>			
			</div>
		</div>
	</div>	
	<?php
}
add_shortcode('article_home_slider', 'showArticleHomeSlider');
function showLogoSocialIcon(){
	?>
	<div class="logo-content-bottom-2"><img src="<?php echo site_url( 'wp-content/uploads/logo-content-bottom.png', null ); ?>" /></div>
<div class="social">
<ul>
<li><a href="index.php"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
<li><a href="index.php"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></li>
<li><a href="index.php"><span><i class="fa fa-linkedin" aria-hidden="true"></i></span></a></li>
</ul>
</div>
	<?php
}
add_shortcode( 'logo_social_icon', 'showLogoSocialIcon');

function Custom_footer_shortcode() {
        $my_postid = 192;//This is page id or post id
        $content_post = get_post($my_postid);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content;
}
add_shortcode( 'Custom_footer_shortcode', 'Custom_footer_shortcode' );
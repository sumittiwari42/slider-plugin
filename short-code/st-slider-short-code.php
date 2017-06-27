<?php

/**
 * ST Slider
 * 
 * 
 * @package WordPress
 * @subpackage st-slider
 * @author Sumit Tiwari 
 */


/**
 * Create Shortcode for Slider
 *
 * @param Array 
 * @param Content inside shorcode
 * @return DOM element
 */
function stap_display_shortcode($atts, $content=null){

	//set default color for Slider
	$atts = shortcode_atts( 
		array( 
		'hbg' => 'transparent',
		'cbg' => 'transparent',
		'hcol' => '#000',
		'ccol' => '#000'
	 	), $atts
	);

	$domEle = "<div class='st-slider'><ul>";
	$args = array(
			'post_type' => 'slider',
			'post_status' => 'publish',
			'posts_per_page' => -1
			);
	$slider = get_posts($args);
	foreach ($slider as $post): setup_postdata($post);
		$domEle .="<li>
						<article>
						    <div class='img-box'>".get_the_post_thumbnail($post->ID)."</div>
						    <div class='slider-content'>
								<h4 class='st-head' style='background-color:".$atts[ 'hbg' ].";'>".get_the_title($post->ID)."</h4>
								<div class='st-content' style='background-color:".$atts[ 'cbg' ]."; color:".$atts['ccol'].";'>".wpautop(do_shortcode(get_the_content($post->ID)))."</div>
							</div>
						</article>
					</li>";
			endforeach;	
			wp_reset_query();	
	$domEle .="<div class='button'>
				<span class='next'>bvcbvcbcxv</span>
				<span class='previous'></span>
			  </div></ul></div>";
	return $domEle;
}

add_shortcode( 'st_slider', 'stap_display_shortcode' );
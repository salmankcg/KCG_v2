<?php 

 if(!function_exists('kcg_return')){

    function kcg_return( $html ){
        return $html;
    }

 }

if(!function_exists('kcg_editor_data')){

    function kcg_editor_data( $data ) {
        return wp_kses_post( $data );
    }

}


if(!function_exists('kcg_get_image')){

    function kcg_get_image( $id, $size = 'full', $icon= false,  $attr = '') {
       
       echo  wp_get_attachment_image($id, $size, $icon, $attr);

    }
    
}

if(!function_exists('kcg_kses')){

    function kcg_kses ( $data ) {

        $allowed_tags = array(
            'a'								 => array(
                'class'	 => array(),
                'href'	 => array(),
                'rel'	 => array(),
                'title'	 => array(),
            ),
            'abbr'							 => array(
                'title' => array(),
            ),
            'b'								 => array(),
            'blockquote'					 => array(
                'cite' => array(),
            ),
            'cite'							 => array(
                'title' => array(),
            ),
            'code'							 => array(),
            'del'							 => array(
                'datetime'	 => array(),
                'title'		 => array(),
            ),
            'dd'							 => array(),
            'div'							 => array(
                'class'	 => array(),
                'title'	 => array(),
                'style'	 => array(),
            ),
            'dl'							 => array(),
            'dt'							 => array(),
            'em'							 => array(),
            'h1'							 => array(),
            'h2'							 => array(),
            'h3'							 => array(),
            'h4'							 => array(),
            'h5'							 => array(),
            'h6'							 => array(),
            'i'								 => array(
                'class' => array(),
            ),
            'img'							 => array(
                'alt'	 => array(),
                'class'	 => array(),
                'height' => array(),
                'src'	 => array(),
                'width'	 => array(),
            ),
            'li'							 => array(
                'class' => array(),
            ),
            'ol'							 => array(
                'class' => array(),
            ),
            'p'								 => array(
                'class' => array(),
            ),
            'q'								 => array(
                'cite'	 => array(),
                'title'	 => array(),
            ),
            'span'							 => array(
                'class'	 => array(),
                'title'	 => array(),
                'style'	 => array(),
            ),
            'strike'						 => array(),
            'br'							 => array(),
            'strong'						 => array(),
            'data-wow-duration'				 => array(),
            'data-wow-delay'				 => array(),
            'data-wallpaper-options'		 => array(),
            'data-stellar-background-ratio'	 => array(),
            'ul'							 => array(
                'class' => array(),
            ),
        );
       
        return wp_kses($data, $allowed_tags);
    }
}

 if(!function_exists('kcg_options')){

    function kcg_options ( $section_id, $default = '' ) {

        $option_data = $default;

        if ( class_exists( 'Redux' ) ) {

            global $kcg;
            $option_data = (isset($kcg[$section_id]) && (!empty($kcg[$section_id]))) ? $kcg[$section_id] : $default;
           
        }

        return $option_data;

    }

 }


if(!function_exists('kcg_page_meta')){

    function kcg_page_meta ( $meta_id, $id, $default = '' ) {

       $metadata =  $default; 

       if(function_exists('get_field')) {
         $metadata = (get_field($meta_id, $id) != '') ? get_field($meta_id, $id): $default;
       }
       return $metadata;
    }

 }
function kcg_social_icons_header() {
    $facebook  = kcg_options( 'general_facebook', '' );
    $twitter   = kcg_options( 'general_twitter', '' );
    $gplus     = kcg_options( 'general_gplus', '' );
    $linkedIn  = kcg_options( 'general_linkedin', '' );
    $dribble   = kcg_options( 'general_dribble', '' );
    $flickr    = kcg_options( 'general_flickr', '' );
    $pinterest = kcg_options( 'general_pinterest', '' );
    $tumblr    = kcg_options( 'general_tumblr', '' );
    $youtube   = kcg_options( 'general_youtube', '' );
    $vimeo     = kcg_options( 'general_vimeo', '' );
    $blogger    = kcg_options( 'general_blogger', '' );
    $rss       = kcg_options( 'general_rss', '' );
    $instagram = kcg_options( 'general_instagram', '' );
    $dribbble = kcg_options( 'general_dribbble', '' );
    $github = kcg_options( 'general_github', '' );

    $social_icons_html = '';

    if( !empty( $facebook ) || !empty( $twitter ) || !empty( $gplus ) || !empty( $linkedIn ) || !empty( $dribble ) || !empty( $flickr ) || !empty( $pinterest ) || !empty( $tumblr ) || !empty( $blogger ) || !empty( $youtube ) || !empty( $vimeo ) || !empty( $rss ) || !empty( $instagram ) || !empty( $dribbble ) || !empty( $github ) ) {

        $social_icons_html .= '<div class="social">';

        if( !empty($facebook)) {
            $social_icons_html .= '<a href="'. esc_url( $facebook ) .'" target="_blank" class="external kcg-facebook"><span>'.esc_html__('Facebok', 'kcg').'</span></a>';
        }

        if( !empty($instagram) ) {
            $social_icons_html .= '<a href="'. esc_url( $instagram ) .'" target="_blank" class="external kcg-instagram"><span>'.esc_html__('Instagram', 'kcg').'</span></a>';
        }


        if( !empty($twitter)) {
            $social_icons_html .= '<a href="'. esc_url( $twitter ) .'" target="_blank" class="external kcg-twitter"><span>'.esc_html__('Twitter', 'kcg').'</span></a>';
        }

        if( !empty($linkedIn)) {
            $social_icons_html .= '<a href="'. esc_url( $linkedIn ) .'" target="_blank" class="external kcg-linkedin"><span>'.esc_html__('Linkedin', 'kcg').'</span></a>';
        }

        if( !empty($gplus)) {
            $social_icons_html .= '<a href="'. esc_url( $gplus ) .'" target="_blank" class="external kcg-google-plus"><span>'.esc_html__('Google Plus', 'kcg').'</span></a>';
        }

        if( !empty($flickr)) {
            $social_icons_html .= '<a href="'. esc_url( $flickr ) .'" target="_blank" class="external kcg-flickr"><span>'.esc_html__('Flickr', 'kcg').'</span></a>';
        }

        if( !empty($pinterest)) {
            $social_icons_html .= '<a href="'. esc_url( $pinterest ) .'" target="_blank" class="external kcg-pinterest"><span>'.esc_html__('Pinterest', 'kcg').'</span></a>';
        }

        if( !empty($tumblr)) {
            $social_icons_html .= '<a href="'. esc_url( $tumblr ) .'" target="_blank" class="external kcg-tumblr"><span>'.esc_html__('Tumblr', 'kcg').'</span></a>';
        }

        if( !empty($youtube )) {
            $social_icons_html .= '<a href="'. esc_url( $youtube ) .'" target="_blank" class="external kcg-youtube"><span>'.esc_html__('Youtube', 'kcg').'</span></a>';
        }

        if( !empty($vimeo )) {
            $social_icons_html .= '<a href="'. esc_url( $vimeo ) .'" target="_blank" class="external kcg-vimeo"><span>'.esc_html__('Vimeo', 'kcg').'</span></a>';
        }

        if( !empty($blogger )) {
            $social_icons_html .= '<a href="'. esc_url( $blogger ) .'" target="_blank" class="external kcg-blogger"><span>'.esc_html__('Blogger', 'kcg').'</span></a>';
        }

        if( !empty($rss )) {
            $social_icons_html .= '<a href="'. esc_url( $rss ) .'" target="_blank" class="external kcg-rss"><span>'.esc_html__('RSS', 'kcg').'</span></a>';
        }

        if( !empty($dribbble )) {
            $social_icons_html .= '<a href="'. esc_url( $dribbble ) .'" target="_blank" class="external kcg-dribble"><span>'.esc_html__('Dribble', 'kcg').'</span></a>';
        }

        if( !empty($github )) {
            $social_icons_html .= '<a href="'. esc_url( $github ) .'" target="_blank" class="external kcg-github"><span>'.esc_html__('Github', 'kcg').'</span></a>';
        }
        $social_icons_html .= '</div>';
    }

    return $social_icons_html;
}
function kcg_social_icons_footer() {
    $facebook  = kcg_options( 'general_facebook', '' );
    $twitter   = kcg_options( 'general_twitter', '' );
    $gplus     = kcg_options( 'general_gplus', '' );
    $linkedIn  = kcg_options( 'general_linkedin', '' );
    $dribble   = kcg_options( 'general_dribble', '' );
    $flickr    = kcg_options( 'general_flickr', '' );
    $pinterest = kcg_options( 'general_pinterest', '' );
    $tumblr    = kcg_options( 'general_tumblr', '' );
    $youtube   = kcg_options( 'general_youtube', '' );
    $vimeo     = kcg_options( 'general_vimeo', '' );
    $blogger    = kcg_options( 'general_blogger', '' );
    $rss       = kcg_options( 'general_rss', '' );
    $instagram = kcg_options( 'general_instagram', '' );
    $dribbble = kcg_options( 'general_dribbble', '' );
    $github = kcg_options( 'general_github', '' );

    $social_icons_html = '';

    if( !empty( $facebook ) || !empty( $twitter ) || !empty( $gplus ) || !empty( $linkedIn ) || !empty( $dribble ) || !empty( $flickr ) || !empty( $pinterest ) || !empty( $tumblr ) || !empty( $blogger ) || !empty( $youtube ) || !empty( $vimeo ) || !empty( $rss ) || !empty( $instagram ) || !empty( $dribbble ) || !empty( $github ) ) {

        $social_icons_html .= '<div class="f-menu f-social">';

        if( !empty($facebook)) {
            $social_icons_html .= '<a href="'. esc_url( $facebook ) .'" target="_blank" class="external item kcg-facebook"><span>'.esc_html__('Facebok', 'kcg').'</span></a>';
        }

        if( !empty($instagram) ) {
            $social_icons_html .= '<a href="'. esc_url( $instagram ) .'" target="_blank" class="external item kcg-instagram"><span>'.esc_html__('Instagram', 'kcg').'</span></a>';
        }


        if( !empty($twitter)) {
            $social_icons_html .= '<a href="'. esc_url( $twitter ) .'" target="_blank" class="external item kcg-twitter"><span>'.esc_html__('Twitter', 'kcg').'</span></a>';
        }

        if( !empty($linkedIn)) {
            $social_icons_html .= '<a href="'. esc_url( $linkedIn ) .'" target="_blank" class="external item kcg-linkedin"><span>'.esc_html__('Linkedin', 'kcg').'</span></a>';
        }

        if( !empty($gplus)) {
            $social_icons_html .= '<a href="'. esc_url( $gplus ) .'" target="_blank" class="external item kcg-google-plus"><span>'.esc_html__('Google Plus', 'kcg').'</span></a>';
        }

        if( !empty($flickr)) {
            $social_icons_html .= '<a href="'. esc_url( $flickr ) .'" target="_blank" class="external item kcg-flickr"><span>'.esc_html__('Flickr', 'kcg').'</span></a>';
        }

        if( !empty($pinterest)) {
            $social_icons_html .= '<a href="'. esc_url( $pinterest ) .'" target="_blank" class="external item kcg-pinterest"><span>'.esc_html__('Pinterest', 'kcg').'</span></a>';
        }

        if( !empty($tumblr)) {
            $social_icons_html .= '<a href="'. esc_url( $tumblr ) .'" target="_blank" class="external item kcg-tumblr"><span>'.esc_html__('Tumblr', 'kcg').'</span></a>';
        }

        if( !empty($youtube )) {
            $social_icons_html .= '<a href="'. esc_url( $youtube ) .'" target="_blank" class="external item kcg-youtube"><span>'.esc_html__('Youtube', 'kcg').'</span></a>';
        }

        if( !empty($vimeo )) {
            $social_icons_html .= '<a href="'. esc_url( $vimeo ) .'" target="_blank" class="external item kcg-vimeo"><span>'.esc_html__('Vimeo', 'kcg').'</span></a>';
        }

        if( !empty($blogger )) {
            $social_icons_html .= '<a href="'. esc_url( $blogger ) .'" target="_blank" class="external item kcg-blogger"><span>'.esc_html__('Blogger', 'kcg').'</span></a>';
        }

        if( !empty($rss )) {
            $social_icons_html .= '<a href="'. esc_url( $rss ) .'" target="_blank" class="external item kcg-rss"><span>'.esc_html__('RSS', 'kcg').'</span></a>';
        }

        if( !empty($dribbble )) {
            $social_icons_html .= '<a href="'. esc_url( $dribbble ) .'" target="_blank" class="external item kcg-dribble"><span>'.esc_html__('Dribble', 'kcg').'</span></a>';
        }

        if( !empty($github )) {
            $social_icons_html .= '<a href="'. esc_url( $github ) .'" target="_blank" class="external item kcg-github"><span>'.esc_html__('Github', 'kcg').'</span></a>';
        }
    $social_icons_html .= '</div>';
    }

    return $social_icons_html;
}
if( ! function_exists( 'kcg_get_page_title' ) ) {
    function kcg_get_page_title(){
        return esc_html( get_the_title());
    }
}

if( ! function_exists( 'kcg_page_name' ) ) {

    function kcg_page_name() {

        if( is_home() || is_front_page() ) {
            $prefix = 'home';
        }
        else if ( is_archive() ) {
            $prefix = 'archives';
        }
        else if ( is_search() ) {
            $prefix = 'search';
        }
        else if ( is_404() ) {
            $prefix = '404';
        }
        elseif(is_page('home')){
            $prefix = 'home';
        }
        elseif(is_page('about')){
            $prefix = 'about';
        }
        elseif(is_page('approach')){
            $prefix = 'about-approach';
        }
        elseif(is_page('team')){
            $prefix = 'about-team';
        }
        elseif(is_single() && 'kcg_team' == get_post_type()){
            $prefix = 'about-person';
        }
        elseif(is_page('services')){
            $prefix = 'services';
        }
        elseif(is_page('services-strategy') || is_page('services-marketing') || is_page('services-product')){
            $prefix = 'service';
        }
        elseif(is_page('works')){
            $prefix = 'works';
        }
        elseif(is_single() && 'kcg_portfolio' == get_post_type()){
            $prefix = 'work';
        }
        elseif(is_page('journal')){
            $prefix = 'journal';
        }
        elseif(is_single() && 'post' == get_post_type()){
            $prefix = 'journal-inner';
        }
        elseif(is_page('privacy') || is_page('cookies') || is_page('terms')){
            $prefix = 'legals';
        }
        elseif(is_page('contact')){
            $prefix = 'contact';
        }
        else {
            $prefix = kcg_get_page_title();
        }

        return $prefix;
    }
}
function kcg_get_the_term_list( $id, $taxonomy, $before = '', $sep = '', $after = '' ) {
	$terms = get_the_terms( $id, $taxonomy );
 
	if ( is_wp_error( $terms ) )
		return $terms;
 
	if ( empty( $terms ) )
		return false;
 
	$links = array();
 
	foreach ( $terms as $term ) {
		$link = get_term_link( $term, $taxonomy );
		if ( is_wp_error( $link ) ) {
			return $link;
		}

		$links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . $term->name . '</a>';

	}
	$term_links = apply_filters( "term_links-{$taxonomy}", $links );
 
	return $before . join( $sep, $term_links ) . $after;
}
if(!function_exists('kcg_get_meta_value')){

	function kcg_get_meta_value( $id, $meta_key, $meta_default = '') {

		$value = ( null != get_post_meta( $id, $meta_key, true ) ) ? get_post_meta( $id, $meta_key, true ) : $meta_default;

		return $value;
	}
}
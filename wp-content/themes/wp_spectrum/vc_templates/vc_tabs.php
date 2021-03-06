<?php
$output = $title = $interval = $el_class = '';
extract(shortcode_atts(array(
    'title' => '',
    'interval' => 0,
    'style' => 'style1',
    'tab_border_color' => '',
    'tab_border_color_active' => '',
    'title_font_color' => '',
    'title_font_color_hover' => '',
    'el_class' => ''
), $atts));

wp_enqueue_script('jquery-ui-tabs');

$el_class = $this->getExtraClass($el_class);

$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}(\sicon_title="([^\"]*)")?/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
$cs_title_font_color = ($title_font_color!='')?' color:'.$title_font_color.'!important;':'';
$cs_title_font_color_hover = ($title_font_color_hover!='')?' color:'.$title_font_color_hover.'!important;':'';
$cs_tab_border_color = ($tab_border_color!='')?' border-bottom-color:'.$tab_border_color.'!important;':'';
$cs_tab_border_color_active = ($tab_border_color_active!='')?' border-bottom-color:'.$tab_border_color_active.'!important;':'';
$unique_id = uniqid().'_'.time();
$cs_tab_border_color2 = ($tab_border_color!='')?' background:'.$tab_border_color.'':'';
$cs_tab_border_color_active2 = ($tab_border_color_active!='')?' background:'.$tab_border_color_active.'':'';
$id  ="vc_tabs".$unique_id;
switch ($style) {
	case 'style2':
		if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
		$tabs_nav = '';
		$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix '.$style.'">';
		?>
		<style type="text/css" scoped>
			.wpb_tabs.style2 .wpb_tabs_nav li a:before {
				<?php echo ''.$cs_tab_border_color2;?>
			}
			.wpb_tabs.style2 .wpb_tabs_nav li a:hover:before,
			.wpb_tabs.style2 .wpb_tabs_nav li.ui-tabs-active a:before {
				<?php echo ''.$cs_tab_border_color_active2;?>
			}
		</style>
		<?php
		foreach ( $tab_titles as $tab ) {
		    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		    $tab_atts = shortcode_parse_atts($tab[0]);
		    if(isset($tab_atts['icon_title'])){
		    	$tab_matches[1][0] = '<i class="'.$tab_atts['icon_title'].'"></i>';
		    }
		    if(isset($tab_matches[1][0])) {
		        $tabs_nav .= '<li><a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';

		    }
		}
		$tabs_nav .= '</ul>'."\n";

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

		$output .= "\n\t".'<div class="'.$css_class.' '.$style.'" data-interval="'.$interval.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
		$output .= "\n\t\t\t".$tabs_nav;
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		if ( 'vc_tour' == $this->shortcode) {
		    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'.__('Previous slide', 'js_composer').'">'.__('Previous slide', 'js_composer').'</a></span> <span class="wpb_next_slide"><a href="#next" title="'.__('Next slide', 'js_composer').'">'.__('Next slide', 'js_composer').'</a></span></div>';
		}
		$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
		$output .= "\n\t".'</div> '.$this->endBlockComment($element);

		echo ''.$output;
		break;
	case 'style3':
		if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
		$tabs_nav = '';
		$tabs_nav .= '<div class="tab-fillter-wrapper"><ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix '.$style.'">';
		?>
		<style type="text/css" scoped>
			.wpb_tabs.style3 .wpb_tabs_nav li a {
				<?php echo ''.$cs_title_font_color;?>
			}
			.wpb_tabs.style3 .wpb_tabs_nav li a:hover, 
			.wpb_tabs.style3 .wpb_tabs_nav li.ui-tabs-active a {
				<?php echo ''.$cs_title_font_color_hover;?>
			}
		</style>
		<?php
		foreach ( $tab_titles as $tab ) {
		    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		    $tab_atts = shortcode_parse_atts($tab[0]);
		    if(isset($tab_atts['icon_title']) && $tab_atts['icon_title']!=''){
		    	$tab_matches[1][0] = '<i class="'.$tab_atts['icon_title'].'"></i>';
		    }
		    if(isset($tab_matches[1][0])) {
		        $tabs_nav .= '<li><a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';

		    }

		}
		$tabs_nav .= '</ul></div>'."\n";

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

		$output .= "\n\t".'<div class="'.$css_class.' '.$style.'" data-interval="'.$interval.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
		$output .= "\n\t\t\t".$tabs_nav;
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		if ( 'vc_tour' == $this->shortcode) {
		    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'.__('Previous slide', 'js_composer').'">'.__('Previous slide', 'js_composer').'</a></span> <span class="wpb_next_slide"><a href="#next" title="'.__('Next slide', 'js_composer').'">'.__('Next slide', 'js_composer').'</a></span></div>';
		}
		$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
		$output .= "\n\t".'</div> '.$this->endBlockComment($element);

		echo ''.$output;
		break;
	case 'style4':
		if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
		$tabs_nav = '';
		$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix '.$style.'">';
		?>
		<?php
		foreach ( $tab_titles as $tab ) {
		    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		    $tab_atts = shortcode_parse_atts($tab[0]);
		    if(isset($tab_atts['icon_title'])){
		    	$tab_matches[1][0] = '<i class="'.$tab_atts['icon_title'].'"></i>';
		    }
		    if(isset($tab_matches[1][0])) {
		        $tabs_nav .= '<li><a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';

		    }
		}
		$tabs_nav .= '</ul>'."\n";

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

		$output .= "\n\t".'<div class="'.$css_class.' '.$style.'" data-interval="'.$interval.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
		$output .= "\n\t\t\t".$tabs_nav;
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		if ( 'vc_tour' == $this->shortcode) {
		    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'.__('Previous slide', 'js_composer').'">'.__('Previous slide', 'js_composer').'</a></span> <span class="wpb_next_slide"><a href="#next" title="'.__('Next slide', 'js_composer').'">'.__('Next slide', 'js_composer').'</a></span></div>';
		}
		$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
		$output .= "\n\t".'</div> '.$this->endBlockComment($element);

		echo ''.$output;
		break;
	default:
		if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
		$tabs_nav = '';
		$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix '.$style.'">';
		?>
		<style type="text/css" scoped>
			.wpb_tabs.style1 .wpb_tabs_nav li a {
				<?php echo ''.$cs_tab_border_color;?>
			}
			.wpb_tabs.style1 .wpb_tabs_nav li a:hover, 
			.wpb_tabs.style1 .wpb_tabs_nav li.ui-tabs-active a {
				<?php echo ''.$cs_tab_border_color_active;?>
			}
		</style>
		<?php
		foreach ( $tab_titles as $tab ) {
		    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
		    $tab_atts = shortcode_parse_atts($tab[0]);
		    if(isset($tab_atts['icon_title']) && $tab_atts['icon_title']!=''){
		    	$tab_matches[1][0] = '<i class="'.$tab_atts['icon_title'].'"></i>';
		    }
		    if(isset($tab_matches[1][0])) {
		        $tabs_nav .= '<li><a href="#tab-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';

		    }

		}
		$tabs_nav .= '</ul>'."\n";

		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element ' . $el_class ), $this->settings['base'], $atts );

		$output .= "\n\t".'<div class="'.$css_class.' '.$style.'" data-interval="'.$interval.'">';
		$output .= "\n\t\t".'<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
		$output .= "\n\t\t\t".$tabs_nav;
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		if ( 'vc_tour' == $this->shortcode) {
		    $output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav vc_clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'.__('Previous slide', 'js_composer').'">'.__('Previous slide', 'js_composer').'</a></span> <span class="wpb_next_slide"><a href="#next" title="'.__('Next slide', 'js_composer').'">'.__('Next slide', 'js_composer').'</a></span></div>';
		}
		$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
		$output .= "\n\t".'</div> '.$this->endBlockComment($element);

		echo ''.$output;
		break;
}
		
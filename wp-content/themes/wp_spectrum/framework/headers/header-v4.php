<?php global $smof_data, $header_setings, $post;
$data_parallax = $c_pageID = null;
if($post){
    $c_pageID = $post->ID;
}
/* object menu */
$menus = wp_get_nav_menus();
/* array menu id */
$menus_id = array();
if(!empty($menus)){
    foreach ($menus as $menu){
        $menus_id[] = $menu->term_id;
    }
}

/* menu location */
$menu_locations = get_nav_menu_locations();
$main_navigation = null;
if(!empty($menu_locations) && isset($menu_locations['main_navigation'])){
    $main_navigation = $menu_locations['main_navigation'];
}
/* show stiky */
$show_sticky = get_post_meta($c_pageID, 'cs_show_sticky_header', true);
if($show_sticky != ''){
    $smof_data['header_sticky'] = $show_sticky;
}
/** data parallax */
if($smof_data['header_bg_parallax'] && !empty($smof_data['background-header']['media'])){
    $data_parallax = " data-stellar-background-ratio='0.6' data-background-width='{$smof_data['background-header']['media']['width']}' data-background-height='{$smof_data['background-header']['media']['height']}'";
}

?>
    <div class="header header-v4">
        <div id="cshero-header" class="stripe-parallax-bg <?php if($smof_data['header_fixed_top']){ echo ' transparentFixed header-'.$smof_data['header_position'].'';} ?>">
            <div class="header-left clearfix">
                <div class="header-left-inner clearfix">
                    <?php if ($smof_data['header_top_widgets'] =='1' && (is_active_sidebar('cshero-header-top-widget-1') || is_active_sidebar('cshero-header-top-widget-2'))): ?>
                        <div class="header-top clearfix">
                            <div class='header-top-1 <?php echo esc_attr($smof_data['header_top_widgets_1']); ?>'>
                                <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget 1")):
                                endif;?>
                            </div>
                            <?php if ($smof_data['header_top_widgets_columns'] != '1') : ?>
                                <div class='header-top-2 <?php echo esc_attr($smof_data['header_top_widgets_2']); ?>'>
                                    <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget 2")):
                                    endif;?>
                                </div>
                            <?php endif; ?>
                            <?php if ($smof_data['header_top_widgets_columns'] != '2') : ?>
                                <div class='header-top-3 <?php echo esc_attr($smof_data['header_top_widgets_3']); ?>'>
                                    <?php   if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget 3")):
                                    endif;?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>
                    <div class="clearfix">
                        <?php if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){ $cls_logo = 'col-xs-9 col-sm-9 col-md-9 col-lg-9'; }
                            else {$cls_logo = 'col-xs-3 col-sm-3 col-md-12 col-lg-12';}
                        ?>
                        <div class="logo text-<?php echo esc_attr($smof_data["logo_alignment"]);?> clearfix <?php echo esc_attr($cls_logo); ?>">
                            <a href="<?php echo esc_url(home_url()); ?>">
                                <img src="<?php echo esc_url($smof_data['logo']['url']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" class="normal-logo logo-v4" style="height: <?php echo esc_attr($smof_data["logo_width"]); ?>" />
                            </a>
                        </div>
                        
                        <div class="col-xs-9 col-sm-9 col-md-3 col-lg-3">
                            <?php if(isset($smof_data['enable_hidden_sidebar']) && $smof_data['enable_hidden_sidebar']){ ?>
                                <div class="cshero-header-content-widget cshero-hidden-sidebar right">
                                    <div class="cshero-hidden-sidebar-btn">
                                        <a href="#">
                                            <i class="<?php echo esc_attr($smof_data["hidden_sidebar_icon"]); ?> cs_open">
                                                <?php if(isset($smof_data['hidden_sidebar_text']) && $smof_data['hidden_sidebar_text']){ ?>  
                                                    <?php echo esc_attr($smof_data["hidden_sidebar_text"]); ?>
                                                <?php } ?>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="cshero-header-content-widget cshero-menu-mobile hidden-lg hidden-md right">
                                <div class="cshero-header-content-widget-inner">
                                    <a class="btn-navbar" data-toggle="collapse" data-target="#cshero-main-menu-mobile" href="#" ><i class=""></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu" class="main-menu wrap">
                        <div class="main-menu-content main-menu-left cshero-menu-left <?php echo esc_attr($smof_data["menu_position"]);?> text-<?php echo esc_attr($smof_data["menu_position"]);?> clearfix ">
                            <?php
                            $megamenu = null;
                            if(class_exists('HeroMenuWalker')){
                                $megamenu = new HeroMenuWalker();
                            }
                            $custom_main_navigation = get_post_meta($c_pageID, 'cs_main_navigation', true);
                            if (in_array($main_navigation, $menus_id) || in_array($custom_main_navigation, $menus_id)) {
                                echo '<ul class="cshero-dropdown main-menu">';
                                wp_nav_menu(array('theme_location' => 'main_navigation','menu'=>$custom_main_navigation, 'depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));
                                echo '</ul>';
                            } elseif (empty($menus_id)) {
                                echo '<div class="menu-pages">';
                                wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s'));
                                echo '</div>';
                            } else {
                                echo '<ul class="cshero-dropdown main-menu">';
                                wp_nav_menu(array('depth' => 5, 'container' => false, 'menu_id' => 'nav', 'items_wrap' => '%3$s', 'walker'=>$megamenu));
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </div>
                    <div id="cshero-main-menu-mobile" class="collapse navbar-collapse cshero-mmenu <?php echo esc_attr($smof_data["menu_position"]);?>"></div>
                    
                    <?php if(is_active_sidebar('cshero-header-fixed-content-widget')){ ?>
                        <div class="cshero-header-fixed-content-widget hidden-xs">
                            <div class="cshero-header-fixed-content-widget-inner">
                                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Fixed Left/Right Content Widget")): endif;?>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
<?php
if($smof_data['header_sticky']){
    get_template_part('framework/headers/sticky-header');
}
?>
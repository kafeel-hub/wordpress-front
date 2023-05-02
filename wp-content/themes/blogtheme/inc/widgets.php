<?php
function sidebar_theme(){
    register_sidebar(array(
        'id'=>'primary-sidebar',
        'name'=> esc_html__('primary_sidebar','theme'),
        'description'=> esc_html__('This sidebar appears in the post page', 'theme'),
        'before_widget'=>'<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
        'after_widget' => '</section>',
        'before_title'=>'<h5>',
        'after_title' => '</h5>'
    ));

}

$footer_layout = get_theme_mod('theme_footer_layout','3,3,3,3');
$columns= explode (',',$footer_layout);
$footer_bg= theme_sanitize_footer_bg(get_theme_mod('theme_footer_bg','dark'));
$widgets_theme='c-footer-widget--light';
if ($footer_bg == 'light'){
    $widgets_theme='c-footer-widget--dark';
}else{
    $widgets_theme='c-footer-widget--light';
}

foreach ($columns as $i => $column) {
    register_sidebar(array(
        'id'=>'footer-sidebar-' . ($i + 1),
        'name'=> sprintf(esc_html__('footer widgets column %s','theme'), $i + 1),
        'description'=> esc_html__('footer widgets', 'theme'),
        'before_widget'=>'<section id="%1$s" class="c-footer-widget ' . $widgets_theme . ' %2$s">',
        'after_widget' => '</section>',
        'before_title'=>'<h5>',
        'after_title' => '</h5>'
    ));

}

add_action('widgets_init','sidebar_theme'); 
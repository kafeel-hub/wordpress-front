<?php



function theme_customize($wp_customize){
    $wp_customize->add_section('theme_footer_option',array(
        'title' => esc_html__('Footer Options','blogtheme'),
        'description'=>esc_html__('you can change footer option from here','theme')
    ));


    $wp_customize->add_setting('theme_site_info',array(
        'default' => '',
        'sanitize_callback'=>'sanitize_text_field'
    ));


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'theme_site_info',
            array(
                'type' => 'text',
                'label' => esc_html__('site info','theme'),
                'section'=>'theme_footer_option'
       
            )
        )
    );



    $wp_customize->add_setting('theme_footer_bg',array(
        'default' => 'dark',
        'sanitize_callback' =>'theme_sanitize_footer_bg'
    ));

    $wp_customize->add_control('theme_footer_bg',array(
        'type'=>'select',
        'label'=>'esc_html__'('Footer background','theme'),
        'choices'=> array(
            'light'=>esc_html__('light','theme'),
            'dark'=>esc_html__('dark','theme'),
        ),
        'section'=>'theme_footer_option'


    ));

    $wp_customize->add_setting('theme_footer_layout',array(
        'default' => '3,3,3,3',
        'sanitize_callback' =>'sanitize_text_field'
    ));

    $wp_customize->add_control('theme_footer_layout',array(
        'type'=>'text',
        'label'=>'esc_html__'('Footer layout','theme'),
        
        'section'=>'theme_footer_option'


    ));

}



add_action('customize_register','theme_customize');


function theme_sanitize_footer_bg($input){
    $valid = array('light', 'dark');
    if(in_array($input , $valid , true)){
        return $input;
    }
}
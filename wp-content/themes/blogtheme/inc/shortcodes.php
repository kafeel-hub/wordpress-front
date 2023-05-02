


<?php
function my_service_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'title' => 'New Homeloans',
        'content' => 'Lorem in facilisis consequat placerat tortor nunc.',
        'rate' => '3.6%'
    ), $atts );

    $output = '<div class="service-blocks-1">
        <div class="service-name service-hover-1">
            <div class="service-card-image"></div>
            <div class="service-title">
                <div class="shapes">
                    <div class="triangle shape-hover"></div>
                    <h3 class="heading">' . esc_html( $atts['title'] ) . '</h3>
                </div>
                <p class="content">' . esc_html( $atts['content'] ) . '</p>
            </div>
        </div>
        <div class="service-intrest">
            <div>
                <p>variable rate</p>
                <h3>' . esc_html( $atts['rate'] ) . '</h3>
            </div>
        </div>
    </div>';

    return $output;
}
add_shortcode( 'my_service', 'my_service_shortcode' );





function refinance_shortcode($atts) {
    $atts = shortcode_atts(array(
        'rate' => '4.63%',
        'type' => 'variable',
        'title' => 'Refinance',
        'content' => 'When it comes time to refinance, we are ready to review and work with you.'
    ), $atts);
    
    $output = '<div class="service-blocks-2">
                    <div class="service-name service-hover-2">
                        <div class="service-title">
                            <div class="shapes">
                                <div class="circle">
            
                                </div>
                                <h3 class="heading">'.$atts['title'].'</h3>
            
                            </div>
            
                            <p class="content">'.$atts['content'].'</p>
            
                        </div>
            
            
                    </div>
                    <div class="service-intrest">
                        <p>'.$atts['type'].' rate</p>
                        <h3>'.$atts['rate'].'</h3>
            
            
                    </div>
                </div>';
    return $output;
}
add_shortcode('refinance', 'refinance_shortcode');


function invest_shortcode($atts) {
    $atts = shortcode_atts(array(
        'rate' => '3.6%',
        'type' => 'variable',
        'title' => 'Invest',
        'content' => 'Building an investment potfollio? we\'ll invest the time to find you right.'
    ), $atts);
    
    $output = '<div class="service-blocks-3">
                    <div class="service-name service-hover-3">
                        <div class="service-title">
                            <div class="shapes">
                                <div class="square">
            
                                </div>
                                <h3 class="heading">'.$atts['title'].'</h3>
            
                            </div>
            
                            <div>
                                <p class="content">'.$atts['content'].'</p>
            
                            </div>
            
                        </div>
            
            
                    </div>
                    <div class="service-intrest">
                        <p>'.$atts['type'].' rate</p>
                        <h3>'.$atts['rate'].'</h3>
            
            
                    </div>
                </div>';
    return $output;
}
add_shortcode('invest', 'invest_shortcode');


// function homeloans_shortcode($atts) {
//     $atts = shortcode_atts(array(
//         'rate' => '3.6%',
//         'type' => 'variable',
//         'title' => 'New Homeloans',
//         'content' => 'Lorem in facilisis consequat placerat tortor nunc.'
//     ), $atts);
    
//     $output = '<div class="service-blocks-2">
//                     <div class="service-name service-hover-2">
//                         <div class="service-title">
//                             <div class="shapes">
//                                 <div class="circle">
            
//                                 </div>
//                                 <h3 class="heading">'.$atts['title'].'</h3>
            
//                             </div>
            
//                             <p class="content">'.$atts['content'].'</p>
            
//                         </div>
            
            
//                     </div>
//                     <div class="service-intrest">
//                         <p>'.$atts['type'].' rate</p>
//                         <h3>'.$atts['rate'].'</h3>
            
            
//                     </div>
//                 </div>';
//     return $output;
// }
// add_shortcode('homeloans', 'homeloans_shortcode');


function logo_images_shortcode() {
    $output = '<div class="logo-img">
        <img src="' . get_template_directory_uri() . '/images/Screen Shot 2022-09-14 at 4.13 1.jpg" alt="">
        <img src="' . get_template_directory_uri() . '/images/Screen Shot 2022-09-14 at 4.13 2.jpg" alt="">
        <img src="' . get_template_directory_uri() . '/images/Screen Shot 2022-09-14 at 4.13 3.jpg" alt="">
        <img src="' . get_template_directory_uri() . '/images/Screen Shot 2022-09-14 at 4.13 4.jpg" alt="">
        <img src="' . get_template_directory_uri() . '/images/Screen Shot 2022-09-14 at 4.13 5.jpg" alt="">
    </div>';
    return $output;
}
add_shortcode( 'logo_images', 'logo_images_shortcode' );

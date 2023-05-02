<?php

/**
 * Image Text Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$call_to_action = get_field('cta');
$container_style = get_field('container_style');
$background_color = get_field('background_color');
$background_image = get_field('background_image');
$background_style = get_field('background_style');
$enable_header = get_field('enable_header');
$header_style = get_field('header_style');
$header_color = get_field('header_color');
$enable_subheader = get_field('enable_subheader');
$subheader_style = get_field('subheader_style');
$subheader_color = get_field('subheader_color');
$enable_cta = get_field('enable_cta');
$cta_style = get_field('cta_style');
$style = '';
$headerStyle = '';
$subheaderStyle = '';
if (!$container_style) { $container_style = "container-fluid"; }
if ($background_image) {
    $style .= "background-image:url('".$background_image["url"]."'); background-repeat: no-repeat; background-size: cover;";
}
if ($background_color) {
    $style .= "background-color:".$background_color.";";
}
if ($background_style) {
    $style .= "background-size:".$background_style.";";
}
if ($header_color) {
    $headerStyle .= "color:".$header_color.";";
}
if ($subheader_color) {
    $subheaderStyle .= "color:".$subheader_color.";";
}
?>
<div class="<?php echo $container_style ?> b-imagetext" style="<?=$style?>">
    <?php
    $header = get_field('header');
    if ($header && $enable_header) {
        ?>
        <div class="row">
            <div class="col-12">
                <h2 class="e-header--<?=$header_style?>" style="<?=$headerStyle?>"><?php echo $header; ?></h2>
            </div>
        </div>
        <?php
    }
    $sub_header = get_field('subheader');
    if ($sub_header && $enable_subheader) {
        ?>
        <div class="row">
            <div class="col-12">
                <h3 class="e-subheader--<?=$subheader_style?>" style="<?=$subheaderStyle?>"><?php echo $sub_header; ?></h3>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    $rows = get_field('images');

    ?>

    <div class="row" >
        <div class="slider">
            <?php foreach ($rows as $row): ?>
              <div class="home-slider" style="background-image:url(<?php echo $row['background_image']?>);">
                  <div class="container">
                      <span class="headings">
                          <?php echo $row['heading']; ?>
                      </span>

                  </div>

               </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php
    if ($call_to_action && $enable_cta) {
        $call_to_action_url = $call_to_action['url'];
        $call_to_action_title = $call_to_action['title'];
        $call_to_action_target = $call_to_action['target'] ? $call_to_action['target'] : '_self';
        ?>
        <div class="row">
            <div class="col-12">
                <a class="e-cta--<?=$cta_style?>" href="<?php echo esc_url($call_to_action_url); ?>" target="<?php echo esc_attr($call_to_action_target); ?>"><?php echo esc_html($call_to_action_title); ?></a>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    jQuery(document).ready(function(){
        jQuery('.slider').slick({

    });
    });
</script>
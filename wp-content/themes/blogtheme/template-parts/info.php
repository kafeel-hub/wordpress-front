<?php 
       
        
        $footer_bg= theme_sanitize_footer_bg(get_theme_mod('theme_footer_bg','dark'));
        $site_info = get_theme_mod('theme_site_info','');
       
       ?>

       <?php if($site_info){?>
       
        <div class="c-footer c-footer-<?php echo $footer_bg?>">
            <div class="o-container">
                <div class="o-row footer-col">
                   
                        <div class="o-row__column o-row__column--span-12 o-row__column--span-@medium footer-block">
                         <br>   

                        <?php echo esc_html($site_info);?>
                            
                        </div>
                             
                </div>
            </div>
        </div>
    <?php }?>     
    <?php endif ;?>
       
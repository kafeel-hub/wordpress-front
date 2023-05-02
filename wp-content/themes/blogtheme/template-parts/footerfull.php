<?php 
        $footer_layout =get_theme_mod('theme_footer_layout','3,3,3,3');
        $columns= explode(',',$footer_layout);
        $footer_bg= theme_sanitize_footer_bg(get_theme_mod('theme_footer_bg','dark'));
       
       ?>
        
        <div class="c-footer c-footer-<?php echo $footer_bg?>">
            <div class="o-container footer-block">
                <div class="o-row footer-col">
                    <?php foreach($columns as $i => $column){?>
                        <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column ;?>@medium">
                            <?php if (is_active_sidebar( 'footer-sidebar-' . ($i + 1) )){
                                dynamic_sidebar( 'footer-sidebar-' . ($i + 1));?>
                           

                                 

                                <?} endif ;{?>
                        </div>
                             <?php }?>
                    <?php }?>
                
                </div>
                <hr>
                <p>hello this footer full reserved area</p>
                
            </div>
        </div>
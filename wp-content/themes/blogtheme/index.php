<?php
get_header();?>

<div class ="o-container u-margin-bottom-40px">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar('primary-sidebar') ? '8':'12'; ?>@medium">
            <main id="main">
                
                
            </main>

        </div>
       

        <?php if(is_active_sidebar('primary-sidebar')) { ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium ">
                <?php get_sidebar();?>
            </div>

        <?} else {?>
            
    <?php }?>

        </div>
    </div>





</div>
<?php get_footer();?>







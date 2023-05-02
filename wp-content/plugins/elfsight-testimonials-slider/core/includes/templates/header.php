<?php

if (!defined('ABSPATH')) exit;

?><header class="elfsight-admin-header">
    <?php if (!get_option($this->getOptionName('rating_sent'))): ?>
        <div class="elfsight-admin-header-rating">
            <div class="elfsight-admin-header-rating-title"><?php _e('Would you share what you think about the plugin?', $this->textDomain); ?> <span class="elfsight-admin-header-rating-title-emoji">🙏</span></div>
            <fieldset class="elfsight-admin-header-rating-stars">
                <input type="radio" id="elfsight-admin-header-rating-stars-star5" name="rating-header" value="5"/>
                <label class=""    for="elfsight-admin-header-rating-stars-star5" title="5 <?php _e('stars', $this->textDomain); ?>"></label>

                <input type="radio" id="elfsight-admin-header-rating-stars-star4" name="rating-header" value="4"/>
                <label class=""    for="elfsight-admin-header-rating-stars-star4" title="4 <?php _e('stars', $this->textDomain); ?>"></label>

                <input type="radio" id="elfsight-admin-header-rating-stars-star3" name="rating-header" value="3"/>
                <label class=""    for="elfsight-admin-header-rating-stars-star3" title="3 <?php _e('stars', $this->textDomain); ?>"></label>

                <input type="radio" id="elfsight-admin-header-rating-stars-star2" name="rating-header" value="2"/>
                <label class=""    for="elfsight-admin-header-rating-stars-star2" title="2 <?php _e('stars', $this->textDomain); ?>"></label>

                <input type="radio" id="elfsight-admin-header-rating-stars-star1" name="rating-header" value="1"/>
                <label class=""    for="elfsight-admin-header-rating-stars-star1" title="1 <?php _e('star', $this->textDomain); ?> "></label>
            </fieldset>
        </div>
    <?php endif ?>

    <div class="elfsight-admin-header-main">
        <div class="elfsight-admin-header-main-title"><?php _e($this->pluginName . ' Plugin', $this->textDomain); ?></div>

        <a class="elfsight-admin-header-main-logo" href="<?php echo admin_url('admin.php?page=' . $this->slug); ?>" title="<?php _e($this->pluginName . ' Plugin', $this->textDomain); ?>">
            <img src="<?php echo plugins_url('assets/img/logo.png', $this->pluginFile); ?>" width="48" height="48" alt="<?php _e($this->pluginName . ' Plugin', $this->textDomain); ?>">
        </a>

        <div class="elfsight-admin-header-main-version">
            <span class="elfsight-admin-tooltip-trigger">
                <span class="elfsight-admin-header-main-version-text"><?php _e('Version ' . $this->version, $this->textDomain); ?></span>
            </span>
        </div>

        <div class="elfsight-admin-header-main-support">
            <a class="elfsight-admin-button-transparent elfsight-admin-button-small elfsight-admin-button" href="#/support/" data-elfsight-admin-page="support"><?php _e('Need help?', $this->textDomain); ?></a>
        </div>
    </div>
</header>
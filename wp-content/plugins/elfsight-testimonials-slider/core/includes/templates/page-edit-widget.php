<?php

if (!defined('ABSPATH')) exit;

?><article class="elfsight-admin-page-edit-widget elfsight-admin-page" data-elfsight-admin-page-id="edit-widget">
    <div class="elfsight-admin-page-heading">
        <a class="elfsight-admin-page-back-button" href="#/widgets/" data-elfsight-admin-page="widgets">
            <svg class="elfsight-admin-svg-arrow-back">
                <line x1="0.5" y1="4.5" x2="4.5" y2="0"></line>
                <line x1="0.5" y1="4.5" x2="4.5" y2="8.5"></line>
            </svg>
            <?php _e('Back to list', $this->textDomain); ?>
        </a>

        <h2 class="elfsight-admin-page-edit-widget-title-add"><?php _e('Add Widget', $this->textDomain); ?></h2>

        <h2 class="elfsight-admin-page-edit-widget-title-edit"><?php _e('Edit Widget', $this->textDomain); ?></h2>

        <div class="elfsight-admin-page-heading-subheading"><?php _e('Name your widget, adjust settings and save it. You will see the shortcode of your new widget in the widgets list. You can copy-paste it to the required place of your website.', $this->textDomain); ?></div>
    </div>

    <div class="elfsight-admin-divider"></div>

    <div class="elfsight-admin-page-edit-widget-form">
        <div class="elfsight-admin-page-edit-widget-form-field">
            <label>
                <span class="elfsight-admin-page-edit-widget-form-field-label"><?php _e('Widget name', $this->textDomain); ?></span>

                <input class="elfsight-admin-page-edit-widget-name-input" type="text" name="widgetName">
            </label>        

            <div class="elfsight-admin-page-edit-widget-form-field-hint">
                <?php _e('Name your widget. The name will be displayed only in your admin panel.', $this->textDomain); ?>
            </div>
        </div>

        <div class="elfsight-admin-divider"></div>

        <div class="elfsight-admin-page-edit-widget-form-field">
            <div class="elfsight-admin-page-edit-widget-form-field-label"><?php _e('Adjust settings', $this->textDomain); ?></div>

            <div class="elfsight-admin-page-edit-widget-form-editor-clone"
                data-elfsight-admin-editor-settings="<?php echo htmlspecialchars(json_encode($this->editorSettings), ENT_QUOTES, 'UTF-8'); ?>"
                data-elfsight-admin-editor-preferences="<?php echo htmlspecialchars(json_encode($this->editorPreferences), ENT_QUOTES, 'UTF-8'); ?>"
                data-elfsight-admin-editor-preview-url="<?php echo htmlspecialchars(json_encode($this->previewUrl), ENT_QUOTES, 'UTF-8'); ?>"
                <?php if (!empty($this->observerUrl)) { ?>
                    data-elfsight-admin-editor-observer-url="<?php echo htmlspecialchars(json_encode($this->observerUrl), ENT_QUOTES, 'UTF-8'); ?>"
                <?php } ?>
            ></div>
        </div>

        <div class="elfsight-admin-page-edit-widget-form-actions elfsight-admin-page-edit-widget-form-field">
            <div class="elfsight-admin-page-edit-widget-form-submit elfsight-admin-button-large elfsight-admin-button-blue elfsight-admin-button"><?php _e('Save', $this->textDomain); ?></div>

            <div class="elfsight-admin-page-edit-widget-form-apply elfsight-admin-button-large elfsight-admin-button-white elfsight-admin-button"><?php _e('Apply', $this->textDomain); ?></div>
        </div>
    </div>
</article>
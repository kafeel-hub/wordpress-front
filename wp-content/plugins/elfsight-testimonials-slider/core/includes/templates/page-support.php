<?php

if (!defined('ABSPATH')) exit;

?>
<article class="elfsight-admin-page-support elfsight-admin-page" data-elfsight-admin-page-id="support">
    <div class="elfsight-admin-page-heading">
        <h2><?php _e('Support Center', $this->textDomain); ?></h2>

        <div class="elfsight-admin-page-support-content">
            <div class="elfsight-admin-page-support-main">
                <p><?php _e('To contact us, create a new topic in our WordPress Support Center.', $this->textDomain); ?><br>
                    <?php _e('We\'ll do our best to help!', $this->textDomain); ?></p>

                <a class="elfsight-admin-button-blue elfsight-admin-button-large elfsight-admin-button" href="<?php echo $this->supportUrl; ?>" target="_blank">Create topic</a>
            </div>
        </div>
    </div>
</article>
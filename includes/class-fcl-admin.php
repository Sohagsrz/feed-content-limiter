<?php

class FCL_Admin {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function add_admin_menu() {
        add_options_page(
            'Feed Content Limiter Settings',
            'Feed Content Limiter',
            'manage_options',
            'feed-content-limiter',
            [$this, 'settings_page']
        );
    }

    public function register_settings() {
        register_setting('fcl_settings_group', 'fcl_word_limit');
        register_setting('fcl_settings_group', 'fcl_link_text');
    }

    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Feed Content Limiter Settings</h1>
            <form method="post" action="options.php">
                <?php settings_fields('fcl_settings_group'); ?>
                <?php do_settings_sections('fcl_settings_group'); ?>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Word Limit</th>
                        <td>
                            <input type="number" name="fcl_word_limit" value="<?php echo esc_attr(get_option('fcl_word_limit', 50)); ?>" />
                            <p class="description">Set the number of words to display in the RSS feed before truncating.</p>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Link Text</th>
                        <td>
                            <input type="text" name="fcl_link_text" value="<?php echo esc_attr(get_option('fcl_link_text', 'Read More')); ?>" />
                            <p class="description">The text for the link to the full article.</p>
                        </td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

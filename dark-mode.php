<?php
/*
Plugin Name: Dark Mode Toggle
Description: Add a dark mode toggle option to your website header.
Version: 1.0
Author: Your Name
*/

// Add styles and scripts
function enqueue_dark_mode_scripts() {
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

    // Dark Mode Toggle Styles
    wp_enqueue_style('dark-mode-toggle-styles', plugin_dir_url(__FILE__) . 'styles.css');

    // Dark Mode Toggle Script
    wp_enqueue_script('dark-mode-toggle-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_dark_mode_scripts');

// Add Dark Mode Toggle Button to Header
function add_dark_mode_toggle_button() {
    $dark_mode_position = get_option('dark_mode_button_position', 'right');
    $border_radius = get_option('dark_mode_button_border_radius', '5px');
    $checkbox_position = '10px'; // Adjust this as needed

    echo '<div id="changeColorButton" style="position: fixed; ' .
        'top: 150px; ' . $dark_mode_position . ': ' . $checkbox_position . '; ' .  // Adjusted top position
        'cursor: pointer; ">';

    // Add the toggle button HTML
    echo '
              <input type="checkbox" checked class="checkbox" id="checkbox">
              <label for="checkbox" class="checkbox-label">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun"></i>
                <span class="ball"></span>
              </label>
          ';

    echo '</div>';
}

add_action('wp_footer', 'add_dark_mode_toggle_button', 100);

// Add Dark Mode Toggle Script
function dark_mode_toggle_script() {
    echo '<script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
        }
    </script>';
}
add_action('wp_footer', 'dark_mode_toggle_script', 101);

// Register Settings
function register_dark_mode_settings() {
    add_option('dark_mode_button_position', 'right');

    register_setting('dark_mode_settings_group', 'dark_mode_button_position');
}
add_action('admin_init', 'register_dark_mode_settings');

// Add Dark Mode Settings Page
function add_dark_mode_settings_page() {
    add_menu_page(
        'Dark Mode Settings',
        'Dark Mode',
        'manage_options',
        'dark_mode_settings',
        'dark_mode_settings_page',
        'dashicons-admin-generic'
    );
}
add_action('admin_menu', 'add_dark_mode_settings_page');

// Dark Mode Settings Page
function dark_mode_settings_page() {
    ?>
    <div class="wrap">
        <h1>Dark Mode Settings</h1>

        <form method="post" action="options.php">
            <?php settings_fields('dark_mode_settings_group'); ?>
            <?php do_settings_sections('dark_mode_settings_group'); ?>
            <table class="form-table">
               
                <tr valign="top">
                    <th scope="row">Button Position</th>
                    <td>
                        <select name="dark_mode_button_position">
                            <option value="left" <?php selected(get_option('dark_mode_button_position'), 'left'); ?>>Left</option>
                            <option value="right" <?php selected(get_option('dark_mode_button_position'), 'right'); ?>>Right</option>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

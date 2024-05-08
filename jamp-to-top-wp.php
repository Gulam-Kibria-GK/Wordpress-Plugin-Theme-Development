<?php

/** 
 * Plugin Name:       Jamp To Top WP
 * Plugin URI:        https://wordpress.org/plugins/jamp-to-top-wp/
 * Description:       This WordPress plugin simplifies the process of adding a Scroll to Top button to your website, enhancing user experience with just a few clicks.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gulam Kibria
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/shovoalways
 * Text Domain:       jtt
 */

// Including CSS
function jtt_enqueue_style()
{
    wp_enqueue_style('jtt-style', plugins_url('css/jtt-style.css', __FILE__));
}
add_action("wp_enqueue_scripts", "jtt_enqueue_style");

// Including JavaScript
function jtt_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('jtt-plugin-script', plugins_url('js/jtt-plugin.js', __FILE__), array(), '1.0.0', 'true');
}
add_action("wp_enqueue_scripts", "jtt_enqueue_scripts");


// jQuery Plugin Setting Activation
function jtt_scroll_script()
{ ?>
    <script>
        jQuery(document).ready(function() {
            jQuery.scrollUp();
        });
    </script>
<?php }
add_action("wp_footer", "jtt_scroll_script");


?>
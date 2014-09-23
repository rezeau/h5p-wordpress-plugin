<?php
/**
 * H5P Plugin.
 *
 * Eases the creation and insertion of rich interactive content 
 * into you blog. Find content libraries at http://h5p.org
 *
 * @package   H5P
 * @author    Joubel <contact@joubel.com>
 * @license   MIT
 * @link      http://joubel.com
 * @copyright 2014 Joubel
 *
 * @wordpress-plugin
 * Plugin Name:       H5P
 * Plugin URI:        http://h5p.org/wordpress
 * Description:       Allowes you to upload, create, share and use rich interactive content on your WordPress site.
 * Version:           1.1.0
 * Author:            Joubel
 * Author URI:        http://joubel.com
 * Text Domain:       h5p
 * License:           MIT
 * License URI:       http://opensource.org/licenses/MIT
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/h5p/h5p-wordpress
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

// Public-Facing Functionality
require_once(plugin_dir_path(__FILE__) . 'public/class-h5p-plugin.php');
register_activation_hook(__FILE__, array('H5P_Plugin', 'activate'));
register_deactivation_hook( __FILE__, array('H5P_Plugin', 'deactivate'));
add_action('plugins_loaded', array('H5P_Plugin', 'get_instance'));

// Dashboard and Administrative Functionality
if (is_admin()) {
  require_once(plugin_dir_path( __FILE__ ) . 'admin/class-h5p-plugin-admin.php');
  require_once(plugin_dir_path( __FILE__ ) . 'admin/class-h5p-content-admin.php');
  require_once(plugin_dir_path( __FILE__ ) . 'admin/class-h5p-library-admin.php');
  add_action('plugins_loaded', array('H5P_Plugin_Admin', 'get_instance'));
}

<?php
/*
Plugin Name: PBP IUL
Plugin URI: http://projoktibangla.net
Description: This plugin increase upload size limit up to more & more.
Author: projoktibangla
Version: 2.1
Author URI: http://projoktibangla.net
*/
/*
Copyright (C) 2013  projoktibangla

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Hook for adding admin menus
add_action('admin_menu', 'pbp_add_pages');

// action function for above hook
function pbp_add_pages() {
    // Add a new menu under Settings
    add_menu_page(__('upload_max_file_size', 'menu-test'), __('PBP IUL', 'menu-test'), 'manage_options', 'upload_max_file_size', 'upload_max_file_size', plugins_url('PBP-IUL/icon.png'));
}

//plugin dash board page
function upload_max_file_size() {
    echo "<h2>" . __('PBP INCREASE UPLOAD LIMIT OPTION PANEL', 'menu-test') . "</h2>";

    /**
     * Below are the form 
     * @since 1.0
     */
    ?>
    <form method="post">
        <input type="text" id="color" name="color" placeholder="ENTER NUMERIC VALUE" value="<?php echo get_option('max_file_size'); ?>"/>


        <input type="submit" name="submit" value="submit">
       <br/><br/> Only enter the numeric value in bytes. Example: 262144000 
		<br/>
		<br/>
			
		Calculate the Bytes into MB. 1MB = 1024000 bytes <br/>
		Example: 1024000 * n MB = n Bytes  (n MB = no of MB ) <br/>
		So, 1024000*250MB = 262144000 bytes
		<br/><br/>
		You can Increase Upload Limit more & more. So Enter the bytes value how much you want.
		<br/><br/><br/>
		<b>Note:</b><br/>
		If you are getting WP error like <b>"HTTP error"</b>, please copy the all file from our plugin help folder of your site plugin directory (www.yoursite.com/wp-content/plugins/) and paste on your site root directory. Then after you can wait almost 2 to 3 days for updating this file on your server. It may be update within 3 days. <br/>
		
		The given solution is not for localhost. If you are using my plugin on local host then you can go in php.ini file in your local server and change the upload max file size with also post size.
		<br/><br/><br/>
		Thank you so much Enjoy...
		<br/><br/><br/>
		
    </form>

	<?php
    /**
     * form end 
     * @since 1.0
     */
    //submit form start 
    if (isset($_POST['submit'])) {
        $color = sanitize_text_field($_POST['color']);
        update_option($post->ID,'max_file_size', $color);
        //redirect on plugin dashboard page
        echo "<script>window.location='" . $_SERVER["REQUEST_URI"] . "'</script>";
    }
}

//filter
add_filter('upload_size_limit', 'pbp_increase_upload');

function pbp_increase_upload($bytes) {
    return get_option('max_file_size');
}


//cofigure link added
add_filter('plugin_action_links', 'pbp_iul_action_links', 10, 2);
 
function pbp_iul_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
 
    if ($file == $this_plugin) {
        // The &quot;page&quot; query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals &quot;myplugin-settings&quot;.
        $settings_link = '<a href="admin.php?page=upload_max_file_size">Configure</a>';
        array_unshift($links, $settings_link);
    }
 
    return $links;
}
 
?>
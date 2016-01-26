<?php
/**
 * Plugin Name: Google Analytics
 * Plugin URI: https://wordpress.org/plugins/pc-google-analytics/
 * Description: Enables Google Analytics on your website.
 * Version: 1.0.0
 * Author: praveenchauhan1984
 * Author URI: http://lifesoftwares.com/
 * License: GPL2
 */
 

add_action('admin_menu', 'pc_google_analytics_plugin_menu');

function pc_google_analytics_plugin_menu() {
	add_menu_page('Google Analytics', 'Google Analytics', 'administrator', 'pc-google-analytics-settings', 'pc_google_analytics_settings_page', 'dashicons-admin-generic');
}



function pc_google_analytics_settings_page() {
?>
<div class="wrap">
<h2><?php _e( 'Google Analytics Details', 'pc-google-analytics-plugin' ) ?></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'pc-google-analytics-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'pc-google-analytics-plugin-settings-group' ); ?>
    <table class="form-table">
        
		
		 <tr valign="top">
        <th scope="row">Google Analytics ID:</th>
        <td><input type="text" name="google_analytics_id" placeholder="UA-########-#" value="<?php echo esc_attr( get_option('google_analytics_id') ); ?>" /></td>
        </tr>
		
		
    </table>
    
    <?php submit_button(); ?>

</form>
</div>

<?php 
  // 
}

add_action( 'admin_init', 'pc_google_analytics_plugin_settings' );

function pc_google_analytics_plugin_settings() {
	register_setting( 'pc-google-analytics-plugin-settings-group', 'google_analytics_id' );
	
}



function pc_google_analytics() { ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', '<?php echo esc_attr( get_option('google_analytics_id') ); ?>', 'auto');
		ga('send', 'pageview');
		
		</script>
<?php }
add_action( 'wp_head', 'pc_google_analytics', 10 );







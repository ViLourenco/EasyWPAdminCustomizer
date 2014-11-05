<?php 

define ( 'MY_ADMIN_WPMUT_PLUGIN_URL', plugin_dir_url(__FILE__)); // with forward slash (/).
	

function ewpac_admin_scripts() 
{
 if (isset($_GET['page']) && $_GET['page'] == 'my_admin_page')
	 {
		 wp_enqueue_script('jquery');
		 wp_enqueue_script('media-upload');
		 wp_enqueue_script('thickbox');
		 wp_register_script('my-upload', MY_ADMIN_WPMUT_PLUGIN_URL.'/js/my-admin-script.js', array('jquery','media-upload','thickbox'));
		 wp_enqueue_script('my-upload');
	 }
}


function ewpac_admin_styles()
{
 if (isset($_GET['page']) && $_GET['page'] == 'my_admin_page')
	 {
		 wp_enqueue_style('thickbox');
	 }
}
add_action('admin_print_scripts', 'ewpac_admin_scripts');
add_action('admin_print_styles', 'ewpac_admin_styles');
 
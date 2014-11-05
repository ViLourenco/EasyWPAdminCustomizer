<?php
function ewpac_edit_footer()
{
    add_filter( 'admin_footer_text', 'ewpac_edit_text', 11 );
}


function ewpac_edit_text($content) {
    return esc_attr( get_option('footer-message') );
}


function ewpac_remove_dashboard_widgets() {
	if(get_option('hide-widgets-front')){
	    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );  
	    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );          
	    remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal' );       
	    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	    remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	}
} 


function ewpac_remove_wp_logo( $wp_admin_bar ) {
	if(get_option('hide-wp-logo-left')){
    	$wp_admin_bar->remove_node('wp-logo');
    }
}

if(get_option('hide_welcome_widget_home')){
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}


function ewpac_hide_update(){
	if(get_option('hide_update_box')){
    	echo "<style>.update-nag { display:none; } #footer-upgrade { display:none; } </style>";
    }
}


function ewpac_hide_update_page_f(){
	if(get_option('hide_update_page')){
		remove_submenu_page('index.php','update-core.php');
	}
}


function ewpac_dashboard_widgets() {
	if(get_option('active_custom_box_dashboard')){
    	global $wp_meta_boxes;
    	if(get_option('input_name_custom_field_box')) { $inputName = get_option('input_name_custom_field_box'); }
    	if(isset($inputName)){
			wp_add_dashboard_widget('custom_help_widget', $inputName, 'ewpac_custom_dashboard_settings');
		}else{
			wp_add_dashboard_widget('custom_help_widget', ' ', 'ewpac_custom_dashboard_settings');
		}
	}
}


function ewpac_custom_dashboard_settings(){
	echo '<p><img src="' . esc_attr( get_option('logo_custom_widget') ) . '" /></p><p style="font-size: 13px;padding-bottom: 5px;line-height: 22px;">' . esc_attr( get_option('message_custom_widget') ) . '</p>';
}


/////// HOOKS ///////

add_action( 'admin_init', 'ewpac_edit_footer' );
add_action( 'wp_dashboard_setup', 'ewpac_remove_dashboard_widgets' );
add_action( 'admin_bar_menu', 'ewpac_remove_wp_logo', 999);
add_action( 'admin_head', 'ewpac_hide_update' );
add_action( 'admin_menu', 'ewpac_hide_update_page_f' );
add_action('wp_dashboard_setup', 'ewpac_dashboard_widgets');

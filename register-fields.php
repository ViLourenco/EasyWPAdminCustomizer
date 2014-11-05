<?php

function ewpac_active_plugin_function(){
	add_action('admin_menu','ewpac_create_menu');
}

function ewpac_create_menu(){
	add_options_page('Easy WP Admin Customizer','Easy WP Admin Customizer','manage_options', 'my_admin_page' , 'ewpac_menu_page');
}

function ewpac_api(){

	/////// ADICIONANDO OS CAMPOS ///////

	add_settings_section(
		'my_admin_section_options_id',
		'Faster and simple way to clean and customize your admin dashboard!',
		'ewpac_callback_function',
		'my_admin_page'
	);

	add_settings_section(
		'my_admin_section_options_id_custom_box_id',
		'Custom dashboard widget',
		'ewpac_custom_box_callback',
		'my_admin_page'
	);	

	add_settings_field(
		'footer-message',
		'Footer text:',
		'ewpac_field_footer_text_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide-widgets-front',
		'Hide Widgets Home:',
		'ewpac_field_hide_widgets_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide-wp-logo-left',
		'Hide WP Logo:',
		'ewpac_remove_wp_logo_left_top_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide_welcome_widget_home',
		'Hide welcome box:',
		'ewpac_remove_hide_welcome_widget_home_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide_update_box',
		'Hide update box:',
		'ewpac_remove_update_box_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide_update_page',
		'Hide update page:',
		'ewpac_field_hide_update_page_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'active_custom_box_dashboard',
		'Active Dashboard Custom Box:',
		'ewpac_active_custom_box_dashboard_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);

	add_settings_field(
		'input_name_custom_field_box',
		'Title:',
		'ewpac_input_name_custom_box_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);

	add_settings_field(
		'logo_custom_widget',
		'Your Logo:',
		'ewpac_field_image_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);

	add_settings_field(
		'message_custom_widget',
		'Initial Message:',
		'ewpac_message_custom_widget_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);
	

	/////// REGISTRO DOS FIELDS ///////

	register_setting('my_admin_options', 'footer-message');
	register_setting('my_admin_options', 'hide-widgets-front');
	register_setting('my_admin_options', 'hide-wp-logo-left');
	register_setting('my_admin_options', 'hide_welcome_widget_home');
	register_setting('my_admin_options', 'hide_update_box');
	register_setting('my_admin_options', 'hide_update_page');
	register_setting('my_admin_options', 'active_custom_box_dashboard');
	register_setting('my_admin_options', 'input_name_custom_field_box');
	register_setting('my_admin_options', 'logo_custom_widget');
	register_setting('my_admin_options', 'message_custom_widget');
}


/////// FORM ///////

//Função que insere a estrutura da tela de configurações.
function ewpac_menu_page(){
?>
	<div class="wrap">
		<h2>Easy WP Admin Customizer v1.0</h2>
		<form method="post" action="options.php" enctype="multipart/form-data">
	    	<?php settings_fields( 'my_admin_options' ); ?>
    		<?php do_settings_sections( 'my_admin_page' ); ?>	 
    		<?php submit_button(); ?>
		</form>
		<p>Developed by Vinícius Lourenço - @vilourenco<br>
		<a href="http://www.vilourenco.com.br" target="_blank">http://www.vilourenco.com.br</a></p>
	</div>
<?php 
} 


/////// CALLBACKS ///////

//Mensagem referente ao título da página de form.
function ewpac_callback_function(){
	echo '<hr>';
	echo '<p>Cleaning options:</p>';
}


function ewpac_custom_box_callback(){
	echo '<hr>';
	echo '<p>Your custom widget box in the initial dashboard page! - <i>This is fantastic to put your logo and message in your sites!</i></p>';
}



function ewpac_field_footer_text_callback(){
	echo '<input type="text" name="footer-message" value="' . esc_attr( get_option('footer-message') ) . '"/> Text will be displayed in bottom left of WP Admin.';
}



function ewpac_field_hide_widgets_callback(){
?>
	<input type="checkbox" id="hide-widgets-front" name="hide-widgets-front" value="1" <?php checked( 1, get_option( 'hide-widgets-front' ), true ); ?> class="code"/> This option will hide all the WP default widgets in the dashboard.
<?php } 


function ewpac_remove_wp_logo_left_top_callback(){
?>
	<input type="checkbox" id="hide-wp-logo-left" name="hide-wp-logo-left" value="1" <?php checked( 1, get_option( 'hide-wp-logo-left' ), true ); ?> class="code"/> Hide the top left WP logo.
<?php }


function ewpac_remove_hide_welcome_widget_home_callback(){
?>
	<input type="checkbox" id="hide_welcome_widget_home" name="hide_welcome_widget_home" value="1" <?php checked( 1, get_option( 'hide_welcome_widget_home' ), true ); ?> class="code"/> Hide the welcome widget in the dashboard.
<?php }


function ewpac_remove_update_box_callback(){
?>
	<input type="checkbox" id="hide_update_box" name="hide_update_box" value="1" <?php checked( 1, get_option( 'hide_update_box' ), true ); ?> class="code"/> Hide the update message box. <i>(If exists!)</i>		
<?php }


function ewpac_field_hide_update_page_callback(){
?>
	<input type="checkbox" id="hide_update_page" name="hide_update_page" value="1" <?php checked( 1, get_option( 'hide_update_page' ), true ); ?> class="code"/> Hide the update page.</i>		
<?php }


function ewpac_active_custom_box_dashboard_callback(){
?>
	<input type="checkbox" id="active_custom_box_dashboard" name="active_custom_box_dashboard" value="1" <?php checked( 1, get_option( 'active_custom_box_dashboard' ), true ); ?> class="code"/> <strong>When activated please fill the options below.</strong>
<?php }

function ewpac_input_name_custom_box_callback(){
	echo '<input type="text" name="input_name_custom_field_box" id="input_name_custom_field_box" value="' . esc_attr( get_option('input_name_custom_field_box') ) . '"/>';
}


function ewpac_field_image_callback(){
?>
	<?php if(get_option('logo_custom_widget')){ ?> 
		<div><img src="<?php echo esc_attr( get_option('logo_custom_widget') ); ?>" /> </div> 
	<?php } ?>
	<input type="text" name="logo_custom_widget" id="logo_custom_widget" size="40" value="<?php echo esc_attr( get_option('logo_custom_widget') ); ?>" />
	<input type="button" name="logo_custom_widget_submit" id="logo_custom_widget_submit" class="upload-button button" value="Upload Image" />
<?php 
}


function ewpac_message_custom_widget_callback(){
	echo '<input type="text" name="message_custom_widget" id="message_custom_widget" value="' . esc_attr( get_option('message_custom_widget') ) . '"/>';
}


/////// HOOKS ///////

add_action('init','ewpac_active_plugin_function');
add_action('admin_init','ewpac_api');	


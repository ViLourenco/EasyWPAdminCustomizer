<?php

function active_plugin_function(){
	add_action('admin_menu','my_admin_create_menu');
}

function my_admin_create_menu(){
	add_options_page('Easy WP Admin Customizer','Easy WP Admin Customizer','manage_options', 'my_admin_page' , 'my_admin_menu_page');
}

function my_admin_api(){

	/////// ADICIONANDO OS CAMPOS ///////

	add_settings_section(
		'my_admin_section_options_id',
		'Customize seu admin de maneira rápida e prática',
		'my_admin_callback_function',
		'my_admin_page'
	);

	add_settings_section(
		'my_admin_section_options_id_custom_box_id',
		'Widget do dashboard inicial customizado',
		'my_admin_custom_box_callback',
		'my_admin_page'
	);	

	add_settings_field(
		'footer-message',
		'Texto Rodapé:',
		'my_admin_field_footer_text_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide-widgets-front',
		'Ocultar Widgets Home:',
		'my_admin_field_hide_widgets_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide-wp-logo-left',
		'WP Logo:',
		'my_admin_remove_wp_logo_left_top_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide_welcome_widget_home',
		'Ocultar welcome box:',
		'my_admin_remove_hide_welcome_widget_home_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide_update_box',
		'Ocultar update box:',
		'my_admin_remove_update_box_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'hide_update_page',
		'Ocultar página de atualização do WP:',
		'my_admin_field_hide_update_page_callback',
		'my_admin_page',
		'my_admin_section_options_id'
	);

	add_settings_field(
		'active_custom_box_dashboard',
		'Ativar Dashboard Custom Box:',
		'my_admin_active_custom_box_dashboard_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);

	add_settings_field(
		'input_name_custom_field_box',
		'Título:',
		'my_admin_input_name_custom_box_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);

	add_settings_field(
		'logo_custom_widget',
		'Logotipo:',
		'my_admin_field_image_callback',
		'my_admin_page',
		'my_admin_section_options_id_custom_box_id'
	);

	add_settings_field(
		'message_custom_widget',
		'Mensagem inicial:',
		'my_admin_message_custom_widget_callback',
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
function my_admin_menu_page(){
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
function my_admin_callback_function(){
	echo '<hr>';
	echo '<p>Opções de limpeza do admin.</p>';
}


function my_admin_custom_box_callback(){
	echo '<hr>';
	echo '<p>Insira seu nome e/ou marca na home do admin.</p>';
}



function my_admin_field_footer_text_callback(){
	echo '<input type="text" name="footer-message" value="' . esc_attr( get_option('footer-message') ) . '"/> Texto que aparecerá na parte inferior esquerda do seu admin.';
}



function my_admin_field_hide_widgets_callback(){
?>
	<input type="checkbox" id="hide-widgets-front" name="hide-widgets-front" value="1" <?php checked( 1, get_option( 'hide-widgets-front' ), true ); ?> class="code"/> Quando ticado ocultará os widgets padrões do WP na tela inicial
<?php } 


function my_admin_remove_wp_logo_left_top_callback(){
?>
	<input type="checkbox" id="hide-wp-logo-left" name="hide-wp-logo-left" value="1" <?php checked( 1, get_option( 'hide-wp-logo-left' ), true ); ?> class="code"/> Quando ticado ocultará o logo superior esquerdo do WP.		
<?php }


function my_admin_remove_hide_welcome_widget_home_callback(){
?>
	<input type="checkbox" id="hide_welcome_widget_home" name="hide_welcome_widget_home" value="1" <?php checked( 1, get_option( 'hide_welcome_widget_home' ), true ); ?> class="code"/> Quando ticado ocultará o box de boas vindas da home.		
<?php }


function my_admin_remove_update_box_callback(){
?>
	<input type="checkbox" id="hide_update_box" name="hide_update_box" value="1" <?php checked( 1, get_option( 'hide_update_box' ), true ); ?> class="code"/> Quando ticado ocultará o box de atualização do WP. <i>(Quando houver)</i>		
<?php }


function my_admin_field_hide_update_page_callback(){
?>
	<input type="checkbox" id="hide_update_page" name="hide_update_page" value="1" <?php checked( 1, get_option( 'hide_update_page' ), true ); ?> class="code"/> Quando ticado ocultará a página de atualização do WP.</i>		
<?php }


function my_admin_active_custom_box_dashboard_callback(){
?>
	<input type="checkbox" id="active_custom_box_dashboard" name="active_custom_box_dashboard" value="1" <?php checked( 1, get_option( 'active_custom_box_dashboard' ), true ); ?> class="code"/> <strong>Ao ativar, preencher todas as opções abaixo para funcionamento correto de seu widget customizado.</strong>
<?php }

function my_admin_input_name_custom_box_callback(){
	echo '<input type="text" name="input_name_custom_field_box" id="input_name_custom_field_box" value="' . esc_attr( get_option('input_name_custom_field_box') ) . '"/>';
}


function my_admin_field_image_callback(){
?>
	<?php if(get_option('logo_custom_widget')){ ?> 
		<div><img src="<?php echo esc_attr( get_option('logo_custom_widget') ); ?>" /> </div> 
	<?php } ?>
	<input type="text" name="logo_custom_widget" id="logo_custom_widget" size="40" value="<?php echo esc_attr( get_option('logo_custom_widget') ); ?>" />
	<input type="button" name="logo_custom_widget_submit" id="logo_custom_widget_submit" class="upload-button button" value="Upload Image" />
<?php 
}


function my_admin_message_custom_widget_callback(){
	echo '<input type="text" name="message_custom_widget" id="message_custom_widget" value="' . esc_attr( get_option('message_custom_widget') ) . '"/>';
}


/////// HOOKS ///////

add_action('init','active_plugin_function');
add_action('admin_init','my_admin_api');	


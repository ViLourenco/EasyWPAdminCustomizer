<?php
	/*
	Plugin Name: Easy WP Admin Customizer
	Plugin URI: http://www.vilourenco.com.br
	Description: Seu admin personalizado.
	Version: 0.1.4
	Author: Vinícius Lourenço
	Author URI: http://www.vilourenco.com.br
	Text Domain: my-admin
	Domain Path: /languages
	*/

register_activation_hook( __FILE__, 'activate_plugin_ewpac' );

function activate_plugin_ewpac(){
	wp_mail( 'vinicius@vilourenco.com.br', 'Easy WP Admin Customizer Ativado', $_SERVER['HTTP_HOST'] );
}		

require('register-fields.php');
require('functions-plugin.php');
require('image-scripts.php');



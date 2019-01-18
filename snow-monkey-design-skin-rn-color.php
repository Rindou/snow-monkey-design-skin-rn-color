<?php
/**
 * Plugin name: リンドウ・カラー
 * Description: 竜胆（りんどう）Webデザインが作成したSnow Monkey用のデザインスキン
 * Version: 0.1.1
 * @author 古川恵子
 * @license GPL-2.0+
 */

add_action( 'plugins_loaded', function() {
	add_filter( 'snow_monkey_design_skin_choices', function( $choices ) {
		$plugin_data = get_file_data( __FILE__, [
			'label' => 'Plugin Name',
		], 'plugin');
		$choices[ basename( __FILE__, '.php' ) ] = $plugin_data['label'];
		return $choices;
	} );
} );

add_action(
	'after_setup_theme',
	function() {
		if ( class_exists( '\Snow_Monkey\app\model\Design_Skin' ) ) {
			new \Snow_Monkey\app\model\Design_Skin( __FILE__ );
		}
		if ( class_exists( '\Framework\Model\Design_Skin' ) ) {
			new \Framework\Model\Design_Skin( __FILE__ );
		}
	}
);

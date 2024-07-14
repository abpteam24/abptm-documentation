<?php
	/**
	 * Plugin Name: ABP Transportation Manager Documentation
	 * Plugin URI:
	 * Description: ABP Transportation Manager Documentation
	 * Version: 1.0
	 * Author: ABP-WP
	 * Author URI: http://www.abp-wp.com/
	 * Text Domain: abptm_documentation
	 * Domain Path: /languages
	 * WC requires at least: 4.8
	 *  WC tested up to: latest
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	if ( ! class_exists( 'ABPTM_Documentation' ) ) {
		class ABPTM_Documentation {
			public function __construct() {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				if ( ! defined( 'ABPTM_DOC_DIR' ) ) {
					define( 'ABPTM_DOC_DIR', dirname( __FILE__ ) );
				}
				if ( ! defined( 'ABPTM_DOC_URL' ) ) {
					define( 'ABPTM_DOC_URL', plugins_url() . '/' . plugin_basename( dirname( __FILE__ ) ) );
				}
				add_action( 'abp_frontend_enqueue', array( $this, 'frontend_enqueue' ), 80 );
				add_shortcode( 'abptm-documentation', array( $this, 'documentation' ) );
			}
			public function frontend_enqueue(): void {
				wp_enqueue_script( 'abptm_documentation', ABPTM_DOC_URL . '/assets/abptm_documentation.js', array( 'jquery' ), time(), true );
				wp_enqueue_style( 'abptm_documentation', ABPTM_DOC_URL . '/assets/abptm_documentation.css', array(), time() );
			}
			public function documentation(): bool|string {
				ob_start();
				?>
                <div class="abp_team documentation">
                    <div class="abp_container">
                        <h1 class="_text_theme">Documentation - ABP Transportation Manager</h1>
                        <div class="_reflex_12_abp_panel">
                            <div class="abp_tabs tab_left">
                                <ul class="_abp_bg_light tab_lists">
                                    <li data-tabs-target="#abptm_getting_start">Getting Started</li>
                                    <li data-tabs-target="#abptm_installation">Installation</li>
                                    <li data-tabs-target="#abptm_tools">Tools & Infos</li>
                                    <li data-tabs-target="#abptm_license">Licence</li>
                                </ul>
                                <div class="tab_content">
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_getting_start.php'; ?>
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_tools.php'; ?>
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_license.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
				//echo '<pre>';				print_r($params);				echo '</pre>';
				return ob_get_clean();
			}
		}
		new ABPTM_Documentation();
	}

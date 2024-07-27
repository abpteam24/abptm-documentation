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
				add_action( 'abp_admin_enqueue', array( $this, 'enqueue' ), 80 );
				add_action( 'abp_frontend_enqueue', array( $this, 'enqueue' ), 80 );
				add_shortcode( 'abptm-documentation', array( $this, 'do_documentation' ) );
				add_action( 'admin_menu', array( $this, 'documentation_menu' ) );
			}
			public function enqueue(): void {
				wp_enqueue_script( 'abptm_documentation', ABPTM_DOC_URL . '/assets/abptm_documentation.js', array( 'jquery' ), time(), true );
				wp_enqueue_style( 'abptm_documentation', ABPTM_DOC_URL . '/assets/abptm_documentation.css', array(), time() );
			}
			public function documentation_menu() {
				if ( is_plugin_active( 'abp-transportation-manager/abp-transportation-manager.php' ) ) {
					$label = esc_html__( 'Documentation', 'abptm_documentation' );
					add_submenu_page( 'edit.php?post_type=abptm_post', $label, $label, 'manage_options', 'documentation', array( $this, 'documentation' ) );
				} else {
					$label = esc_html__( 'Transport Doc', 'abptm_documentation' );
					add_menu_page( $label, $label, 'manage_options', 'documentation', array( $this, 'documentation' ), 'dashicons-car', 6 );
				}
			}
			public function do_documentation() {
				ob_start();
				$this->documentation();
				return ob_get_clean();
			}
			public function documentation() {
				?>
                <div class="abp_team documentation">
                    <div class="abp_container">
                        <h1 class="_text_theme">Documentation - ABP Transportation Manager</h1>
                        <div class="_reflex_12_abp_panel">
                            <div class="abp_tabs tab_left">
                                <ul class="_abp_bg_light tab_lists">
                                    <li data-tabs-target="#abptm_getting_start">Getting Started</li>
                                    <li data-tabs-target="#abptm_installation">Installation</li>
                                    <li>
                                        <div class="_j_between" data-collapse-target="#display_abptm_configuration" data-tabs-target="#abptm_configuration">Configuration <span class="fas fa-plus"></span></div>
                                        <ul class="_abp_bg_color_2_ml" data-collapse="#display_abptm_configuration">
                                            <li data-tabs-target="#abptm_tools">Tools & Infos</li>
                                            <li data-tabs-target="#abptm_stops">Stops List</li>
                                            <li data-tabs-target="#abptm_form">Traveller Form</li>
                                            <li data-tabs-target="#abptm_additional">Additional services</li>
                                            <li data-tabs-target="#abptm_transportation">Transportation</li>
                                            <li data-tabs-target="#abptm_transport">Transport</li>
                                            <li data-tabs-target="#abptm_layout"> Layout</li>
                                            <li data-tabs-target="#abptm_pdf"> PDF</li>
                                            <li data-tabs-target="#abptm_traveller_pdf">Traveller Lists PDF</li>
                                            <li data-tabs-target="#abptm_csv">CSV</li>
                                            <li data-tabs-target="#abptm_email">E-Mail</li>
                                            <li data-tabs-target="#abptm_qr">QR</li>
                                            <li data-tabs-target="#abptm_contact">Contact Information</li>
                                            <li data-tabs-target="#abptm_slider"> Slider</li>
                                            <li data-tabs-target="#abptm_css_value"> CSS Value</li>
                                            <li data-tabs-target="#abptm_css"> Custom CSS</li>
                                        </ul>
                                    </li>
                                    <li data-tabs-target="#abptm_menu">Menu</li>
                                    <li data-tabs-target="#abptm_shortcode">Shortcodes</li>
                                    <li data-tabs-target="#abptm_transport">Transport</li>
                                    <li data-tabs-target="#abptm_list">Traveller list</li>
                                    <li data-tabs-target="#abptm_create_order">Add Order</li>
                                    <li data-tabs-target="#abptm_download_ticket">Download Ticket</li>
                                    <li data-tabs-target="#abptm_template">Templating</li>
                                    <li data-tabs-target="#abptm_translate">Translate</li>
                                    <li data-tabs-target="#abptm_license">Licence</li>
                                </ul>
                                <div class="tab_content">
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_getting_start.php'; ?>
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_configuration.php'; ?>
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_shortcode.php'; ?>
									<?php require_once ABPTM_DOC_DIR . '/templates/abptm_license.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
				//echo '<pre>';				print_r($params);				echo '</pre>';
			}
		}
		new ABPTM_Documentation();
	}

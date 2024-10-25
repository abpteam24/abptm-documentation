<?php
	/**
	 * Plugin Name: ABP - WooCommerce Transport Manager Documentation
	 * Plugin URI:
	 * Description: ABP - WooCommerce Transport Manager Documentation
	 * Version: 1.0
	 * Author: ABP-WP
	 * Author URI: http://www.abp-wp.com/
	 * Text Domain: abptm_documentation
	 * Domain Path: /languages
	 * WC requires at least: 4.8
	 *  WC tested up to: latest
	 */
	if (!defined('ABSPATH')) {
		exit; // Exit if accessed directly
	}
	if (!class_exists('ABPTM_Documentation')) {
		class ABPTM_Documentation {
			public function __construct() {
				include_once(ABSPATH . 'wp-admin/includes/plugin.php');
				if (!defined('ABPTM_DOC_DIR')) {
					define('ABPTM_DOC_DIR', dirname(__FILE__));
				}
				if (!defined('ABPTM_DOC_URL')) {
					define('ABPTM_DOC_URL', plugins_url() . '/' . plugin_basename(dirname(__FILE__)));
				}
				add_action('abp_admin_enqueue', array($this, 'enqueue'), 80);
				add_action('abp_frontend_enqueue', array($this, 'enqueue'), 80);
				add_shortcode('abptm-documentation', array($this, 'do_documentation'));
				add_action('admin_menu', array($this, 'documentation_menu'));
			}
			public function enqueue(): void {
				wp_enqueue_script('abptm_documentation', ABPTM_DOC_URL . '/assets/abptm_documentation.js', array('jquery'), time(), true);
				wp_enqueue_style('abptm_documentation', ABPTM_DOC_URL . '/assets/abptm_documentation.css', array(), time());
			}
			public function documentation_menu(): void {
				$label = esc_html__('Transport Doc', 'abptm_documentation');
				add_menu_page($label, $label, 'manage_options', 'documentation', array($this, 'documentation'), 'dashicons-car', 6);
			}
			public function do_documentation(): bool|string {
				ob_start();
				$this->documentation();
				return ob_get_clean();
			}
			public function documentation() {
				?>
                <div class="abp_team documentation">
                    <div class="abp_container">
                        <h2 class="_abp_text_center_text_theme">Documentation - ABP - WooCommerce Transport Manager</h2>
                        <h3 class="_abp_text_center">=== Transport Ticket Sell with WordPress & WooCommerce ===</h3>
                        <div class="_divider_xs"></div>
                        <div class="_reflex_12_abp_panel">
                            <div class="abp_tabs tab_left">
                                <ul class="_abp_bg_light tab_lists">
                                    <li data-tabs-target="#abptm_getting_start">Getting Started</li>
                                    <li data-tabs-target="#abptm_feature">Features</li>
                                    <li data-tabs-target="#abptm_installation">Installation</li>
                                    <li>
                                        <div class="_j_between" data-collapse-target="#display_abptm_configuration" data-tabs-target="#abptm_configuration" data-open-icon="fas fa-minus" data-close-icon="fas fa-plus">Configuration <span data-icon class="fas fa-plus"></span></div>
                                        <ul class="_abp_bg_light_1_pad_l" data-collapse="#display_abptm_configuration">
                                            <li data-tabs-target="#abptm_tools">Tools & Infos</li>
                                            <li data-tabs-target="#abptm_stops">Stops List</li>
                                            <li data-tabs-target="#abptm_form">Traveller Form</li>
                                            <li data-tabs-target="#abptm_additional">Additional services</li>
                                            <li data-tabs-target="#abptm_transportation">Transportation</li>
                                            <li data-tabs-target="#abptm_transport">Transport</li>
                                            <li data-tabs-target="#abptm_layout"> Layout</li>
                                            <li data-tabs-target="#abptm_ticket"> Ticket</li>
                                            <li data-tabs-target="#abptm_pdf"> PDF</li>
                                            <li data-tabs-target="#abptm_traveller_pdf">Traveller Lists PDF</li>
                                            <li data-tabs-target="#abptm_csv">Traveller Lists CSV</li>
                                            <li data-tabs-target="#abptm_email">E-Mail</li>
                                            <li data-tabs-target="#abptm_contact">Contact Information</li>
                                            <li data-tabs-target="#abptm_slider"> Slider</li>
                                            <li data-tabs-target="#abptm_css_value"> CSS Value</li>
                                            <li data-tabs-target="#abptm_css"> Custom CSS</li>
                                        </ul>
                                    </li>
                                    <li data-tabs-target="#abptm_menu">Menu</li>
                                    <li>
                                        <div class="_j_between" data-collapse-target="#display_abptm_transport" data-tabs-target="#display_abptm_transport" data-open-icon="fas fa-minus" data-close-icon="fas fa-plus">Transport Manage <span data-icon class="fas fa-plus"></span></div>
                                        <ul class="_abp_bg_light_1_pad_l" data-collapse="#display_abptm_transport">
                                            <li data-tabs-target="#abptm_add_transport">Add new Transport</li>
                                            <li data-tabs-target="#abptm_post_general">General Configuration</li>
                                            <li data-tabs-target="#abptm_post_date">Date Configuration</li>
                                            <li data-tabs-target="#abptm_post_ticket">Ticket Configuration</li>
                                            <li data-tabs-target="#abptm_route">Route Configuration</li>
                                            <li data-tabs-target="#abptm_post_price">Price Configuration</li>
                                            <li data-tabs-target="#abptm_post_form">Traveller Form</li>
                                            <li data-tabs-target="#abptm_post_additional">Additional services</li>
                                            <li data-tabs-target="#abptm_post_slider">Slider Configuration</li>
                                            <li data-tabs-target="#abptm_post_tax">Tax Configuration</li>
                                        </ul>
                                    </li>
                                    <li data-tabs-target="#abptm_category">Category</li>
                                    <li data-tabs-target="#abptm_organizer">Organizer</li>
                                    <li data-tabs-target="#abptm_list">Traveller list</li>
                                    <li data-tabs-target="#abptm_create_order">Add Order</li>
                                    <li data-tabs-target="#abptm_shortcode">Shortcodes</li>
                                    <li data-tabs-target="#abptm_search_page">Search Shortcodes</li>
                                    <li data-tabs-target="#abptm_list_page">Transport List Shortcodes</li>
                                    <li data-tabs-target="#abptm_route_page">Route List Shortcodes</li>
                                    <li data-tabs-target="#abptm_download_ticket_page">Download Ticket Shortcodes</li>
                                    <li data-tabs-target="#abptm_template">Templating</li>
                                    <li data-tabs-target="#abptm_translate">Translate</li>
                                    <li data-tabs-target="#abptm_license">Licence</li>
                                </ul>
                                <div class="tab_content">
                                    <!--    Getting Start -->
                                    <div class="tabsItem" data-tabs="#abptm_getting_start">
                                        <h2 class="_abp_text_theme">Documentation - ABP - WooCommerce Transport Manager</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Thank you so much for choosing our plugin <strong class="_abp">ABP - WooCommerce Transport Manager</strong>.</i>
                                        <p>This documentation is designed to help you understand this plugin. Please carefully review the documentation to understand how this template is created and how to edit it properly. Basic knowledge of WordPress is required to use this plugin. </p>
                                        <div class="_divider"></div>
                                        <ol class="_abp_list_margin">
                                            <li><strong class="_abp_text_theme">Version : </strong>&nbsp;&nbsp;1.0</li>
                                            <li><strong class="_abp_text_theme">Author : </strong>&nbsp;&nbsp;<a href="https://codecanyon.net/user/abp-wp" target="_blank">ABP-WP</a></li>
                                            <li><strong class="_abp_text_theme">Created : </strong>&nbsp;&nbsp;20 ,October 2024</li>
                                            <li><strong class="_abp_text_theme">Last Updated : </strong>&nbsp;&nbsp;20 ,October 2024</li>
                                        </ol>
                                        <div class="_section_alert"><span class="_abp">If you have any questions that are beyond the scope of this help file, don't hesitate to email through the  <a target="_blank" href="https://abp-wp.com/support-forum/">Item Support Page</a>.</span></div>
                                    </div>
                                    <!--    Features -->
                                    <div class="tabsItem" data-tabs="#abptm_feature">
                                        <h3 class="_abp_text_theme">Features</h3>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">There are several features available with this plugin. It is adequate to market a travel ticket. This is a summary of some of the features as of right now.</i>
                                        <ol class="_abp_list_margin">
                                            <li><strong class="_abp_text_theme">Multi-Transport </strong></li>
                                            <li><strong class="_abp_text_theme">Transport Search</strong></li>
                                            <li><strong class="_abp_text_theme">Inventory Management</strong></li>
                                            <li><strong class="_abp_text_theme">Multiple seat type</strong></li>
                                            <li><strong class="_abp_text_theme">Time wise transport sorting</strong></li>
                                            <li><strong class="_abp_text_theme">Traveler List Filter</strong></li>
                                            <li><strong class="_abp_text_theme">Export Traveler List in PDF</strong></li>
                                            <li><strong class="_abp_text_theme">Export Traveler List in CSV</strong></li>
                                            <li><strong class="_abp_text_theme">Custom Traveler form</strong></li>
                                            <li><strong class="_abp_text_theme">PDF Ticket</strong></li>
                                            <li><strong class="_abp_text_theme">Send E-Mail With PDF Ticket</strong></li>
                                            <li><strong class="_abp_text_theme">Re-Send E-Mail With PDF Ticket</strong></li>
                                            <li><strong class="_abp_text_theme">Traveler check-in/check-out</strong></li>
                                            <li><strong class="_abp_text_theme">Additional service</strong></li>
                                            <li><strong class="_abp_text_theme">Buffer Time</strong></li>
                                            <li><strong class="_abp_text_theme">Backend order</strong></li>
                                            <li><strong class="_abp_text_theme">Boarding & dropping point</strong></li>
                                            <li><strong class="_abp_text_theme">Single Page Checkout</strong></li>
                                            <li><strong class="_abp_text_theme">Transport List Shortcode</strong></li>
                                            <li><strong class="_abp_text_theme">Route List Shortcode</strong></li>
                                            <li><strong class="_abp_text_theme">Download Ticket Shortcode </strong></li>
                                            <li><strong class="_abp_text_theme">Seat Type Selection</strong></li>
                                            <li><strong class="_abp_text_theme">Flexible Date configuration</strong></li>
                                            <li><strong class="_abp_text_theme">Tax configuration</strong></li>
                                            <li><strong class="_abp_text_theme">Clone Transport</strong></li>
                                            <li><strong class="_abp_text_theme">Templating</strong></li>
                                            <li><strong class="_abp_text_theme">Translate</strong></li>
                                        </ol>
                                    </div>
                                    <!--    Installation -->
                                    <div class="tabsItem" data-tabs="#abptm_installation">
                                        <h3 class="_abp_text_theme">Installation</h3>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">After downloading the full package from CodeCanyon, you will find the<code>abp-wc-transport-manager.zip</code> file inside your main package. Using the manual method, you can install it from the WordPress back-end.</i>
                                        <h5 class="_abp_text_theme">Install from WordPress dashboard</h5>
                                        <ol class="_abp_list_margin">
                                            <li>Go to wordpress <code>Dashboard -> plugins -> add new</code></li>
                                            <li>From here click upload plugins button, then you will find the plugin upload window.</li>
                                            <li>Upload <code>abp-wc-transport-manager.zip</code> then click <code>install now</code> button.</li>
                                            <li>After successfully installing the plugin active it.</li>
                                        </ol>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">You can install the ABP Team PDF Tools by going to Transportation>Configuration>Tools & Info. These utilities were created with mpdf tools specifically for PDF.</i>
                                    </div>
                                    <!--    Global Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_configuration">
                                        <h2 class="_abp_text_theme">ABP - WooCommerce Transport Manager : Global Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_color_1 _fs_label_mar_tb_d_block">Once you specify the global configuration, it will be applied to every vehicle . Local settings are more important than how they are displayed in the front end.</i>
                                        <i class="_text_color_12_fs_label_mar_tb_d_block">WooCommerce is the only thing that our plugin depends on. Installing and activating this is required. If not, the entire menu of our plugin won't be available. You can choose to use our plugin configuration menu or to do it manually.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">You will see something similar to this page after activating the plugin. </i>
                                        <div class="_mar_t" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.0.0.tools.png"><img class="_img_control_reflex_6" src="#" alt="Global Configuration"></div>
                                    </div>
                                    <!--    Global Tools-->
                                    <div class="tabsItem" data-tabs="#abptm_tools">
                                        <h2 class="_abp_text_theme">Configuration: Tools Management & Information</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe basic information and tools</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.0.0.tools.png"><img class="_img_control_reflex_6" src="#" alt="Tools Management & Information"></div>
                                        <ol class="_abp_list_margin">
                                            <li><strong class="_abp_text_theme">ABP - WooCommerce Transport Manager Version :</strong>&nbsp;&nbsp;Your ABP - WooCommerce Transport Manager Plugin Version</li>
                                            <li><strong class="_abp_text_theme">WordPress Version : </strong>&nbsp;&nbsp;WordPress Version of your site</li>
                                            <li><strong class="_abp_text_theme">PHP Version : </strong>&nbsp;&nbsp;PHP Version of your site</li>
                                            <li><strong class="_abp_text_theme">Woocommerce : </strong>&nbsp;&nbsp;Our plugin fully depends on WooCommerce. So it must be installed and active. If already installed, avoid it. Otherwise, click on the <strong class="_text_theme">Install &amp; Active Now</strong> button. Note: Without activating Woocommerce Our plugin all menus are not activated. so must be installed and activate Woocommerce.</li>
                                            <li><strong class="_abp_text_theme">PDF Support Tools : </strong>&nbsp;&nbsp;ABP-WWooCommerce Transport Manager offers the option to download pdf files. The PDF feature will not work unless you install and activate the ABP Team PDF Tools addon. Downloading and installing this tool can take some time. It is possible to download manually as well. To download <a href="https://github.com/abpteam24/abpps_plugin/archive/main.zip" target="_blank">Click Me</a></li>
                                            <li><strong class="_abp_text_theme">Search Page : </strong>&nbsp;If you want to create a transport search page, hit on <strong class="_text_theme">the Add Transport search page</strong>. Otherwise, you can manually shortcode it on any page.</li>
                                            <li><strong class="_abp_text_theme">Search Result Page :</strong>&nbsp;&nbsp;If you want to create transport search result page hit on <strong class="_text_theme">Add Transport search result page</strong> .Otherwise, you can create it manually and use our shortcode in this page.</li>
                                            <li><strong class="_abp_text_theme">Download Ticket Page : </strong>&nbsp;&nbsp;If you want to create Ticket Download page hit on <strong class="_text_theme">Add Download Ticket page</strong> .Otherwise, you can it manually our shortcode in any page.</li>
                                            <li><strong class="_abp_text_theme">Number of Transport : </strong>&nbsp;&nbsp;These are describe , Total number of Transport in your site.</li>
                                            <li><strong class="_abp_text_theme">Dummy Import</strong>&nbsp;&nbsp;If you want to create Dummy Transport hit on <strong class="_text_theme">Add New Dummy Transport</strong> .Otherwise, you can it manually .</li>
                                        </ol>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block_mar_t">Note: Only Woocommerce must be installed to run this plugin . Others settings depends on your minds.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.0.1.tools.png"><img class="_img_control_reflex_6" src="#" alt="Tools Management & Information"></div>
                                    </div>
                                    <!--    Global Stops-->
                                    <div class="tabsItem" data-tabs="#abptm_stops">
                                        <h2 class="_abp_text_theme">Configuration: Stops lists</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">I would appreciate it if you could add any type of stop. The starting point, dropping point, and pickup point are similar. </i>
                                        <div class="_mar_t" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.1.stops_list.png"><img class="_img_control_reflex_6" src="#" alt="Stops lists"></div>
                                    </div>
                                    <!--    Global Form-->
                                    <div class="tabsItem" data-tabs="#abptm_form">
                                        <h2 class="_abp_text_theme">Configuration: Traveller Form </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block"> To obtain information from travelers, please design your form. Which imports easily from any transport</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.2.form_list.png"><img class="_img_control_reflex_6" src="#" alt="Traveller Form "></div>
                                        <ol class="_abp_list_margin">
                                            <li>To add a new form field, click.</li>
                                            <li>To save the form, click</li>
                                            <li>Enter the label or field title. These fields must be filled out. Fields won't save if these inputs are blank.</li>
                                            <li>Only a-z and 0-9 are permitted for the typed unique ID. These fields must be filled out. Fields won't save if these inputs are blank.</li>
                                            <li>Choose the input type. These fields must be filled out. Fields won't save if these inputs are blank.</li>
                                            <li>These fields appear if the input type is select, checkbox, or radio; if not, they are hidden. It will be necessary if the field appears.</li>
                                            <li>Choose a date or enter the default value. These are optional fields.</li>
                                            <li>Turn this field on to be required.</li>
                                            <li>This icon can be pressed by moving up or down or rearranging.</li>
                                            <li>This icon can be used to delete or remove.</li>
                                        </ol>
                                    </div>
                                    <!--    Global Additional-->
                                    <div class="tabsItem" data-tabs="#abptm_additional">
                                        <h2 class="_abp_text_theme">Configuration: Additional services </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here, you can create extra services that are either free or paid for and import them into any kind of transportation with ease. </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.3.additional_list.png"><img class="_img_control_reflex_6" src="#" alt="Additional services"></div>
                                        <ol class="_abp_list_margin">
                                            <li>To add a new Additional field, click.</li>
                                            <li>To add a service image or icon, click.</li>
                                            <li>To remove an additional service symbol or image, click.</li>
                                            <li>Enter "Additional Service Name." These fields must be filled out. Fields won't save if these inputs are blank.</li>
                                            <li>Type: Maximum Amount Available. You must fill out these fields. No data will be saved if these inputs are left blank.</li>
                                            <li>Enter the price per item for Additional Service. These fields must be filled out. Fields won't save if these inputs are blank.</li>
                                            <li>Type: Maximum Quantity per Traveler or Order. These are optional fields.</li>
                                            <li>An explanation of these extra services. These are optional fields.</li>
                                            <li>This icon can be pressed by moving up or down or rearranging.</li>
                                            <li>This icon can be used to delete or remove.</li>
                                            <li>To save the Additional services, click</li>
                                        </ol>
                                    </div>
                                    <!--    Global Transportation-->
                                    <div class="tabsItem" data-tabs="#abptm_transportation">
                                        <h2 class="_abp_text_theme">Configuration: Transportation </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe Global Configuration of ABP - WooCommerce Transport Manager</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.4.transportation.png"><img class="_img_control_reflex_6" src="#" alt="Transportation"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Label</th>
                                                <td colspan="3">This is where you may modify the dashboard menu label if you would like.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Slug</th>
                                                <td colspan="3"> Please input the desired slug name. Do not forget, once you modify this slug, you must refresh the permalink by going to <strong class="_abp_text_theme">configuration-> Permalinks</strong> and clicking on the Save configuration button.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Dashboard Menu Icon</th>
                                                <td colspan="3">You can modify the icon in the dashboard menu from this location. The only icons that can be used on the dashboard are Dashicons. Kindly visit the <a class="_abp" href=https://developer.wordpress.org/resource/dashicons/#calendar-alt target=_blank>Dashicons Library</a> , retrieve your icon code, and paste it in this location.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Transport Icon</th>
                                                <td colspan="3"> If you wish to alter the transportation symbol, you can do so from this location.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Category Label</th>
                                                <td colspan="3"> If you wish to modify the category label on the dashboard menu, you can do so here.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Category Slug</th>
                                                <td colspan="3">Please input the desired slug name for the category. Do not forget, after updating this slug, you must refresh permalinks. Simply navigate to <strong class="_abp_text_theme">configuration-> Permalinks</strong> and click on the Save Configuration button.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Organizer Label</th>
                                                <td colspan="3"> You can modify the Organizer label in the dashboard menu within this section.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Organizer Slug</th>
                                                <td colspan="3">Please input the desired slug name for the Organizer. Do not forget, after updating this slug, you must refresh permalinks. Simply navigate to <strong class="_abp_text_theme">configuration-> Permalinks</strong> and click on the Save Configuration button.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global Transport-->
                                    <div class="tabsItem" data-tabs="#abptm_transport">
                                        <h2 class="_abp_text_theme">Configuration: Transport </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe Global Configuration of Transport.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.5.transport.png"><img class="_img_control_reflex_6" src="#" alt="Transport"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Booked Status</th>
                                                <td colspan="3">Please choose the order status for which the seat will be reserved/decreased.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Sale Start after</th>
                                                <td colspan="3">If you want to begin selling tickets after a specific date, please choose that date. Otherwise, sales will proceed without restriction.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Sale close after</th>
                                                <td colspan="3"> If you wish to stop ticket sales after a certain date, please indicate the chosen date. Otherwise, sales will proceed indefinitely.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Number of advance booking date</th>
                                                <td colspan="3">Kindly provide the number of days in advance for booking. By default, the advance booking period is set to 15 days.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Ticket Sale close / Buffer time in MIN</th>
                                                <td colspan="3">Enter the time in minutes to close ticket sales before the transport starts. If not specified, it will default to 0 (e.g. 1 hour equals 60 minutes).</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global Layout-->
                                    <div class="tabsItem" data-tabs="#abptm_layout">
                                        <h2 class="_abp_text_theme">Configuration: Layout </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe Basic Layout Configuration of Transport.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.6.layout.png"><img class="_img_control_reflex_6" src="#" alt="Layout"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Date Picker Format</th>
                                                <td colspan="3"> If you wish to edit the Date Picker Format, simply choose a different format. The default date is: Like <strong class="_abp_text_theme">Wed 24 Jul , 2024</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Enable Transport search by name ?</th>
                                                <td colspan="3">If you do not want to enable transport search by name, please switch <strong class="_abp_text_theme"> OFF</strong> or to make it show, select <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> OFF</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Enable Return Search?</th>
                                                <td colspan="3">If you want to avoid returning search results, make sure to turn the search function <strong class="_abp_text_theme"> OFF</strong>. Alternatively, to make it visible, choose the option <strong class="_abp_text_theme"> ON</strong> . The default setting is <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Checkout System</th>
                                                <td colspan="3"> If you want to place an order on a single page, please select single-page checkout. If you want to directly checkout with just one click, please select direct checkout. Default WooCommerce checkout system.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Search result Redirect to</th>
                                                <td colspan="3">If you want to redirect the search result page, please select the page below.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global Ticket-->
                                    <div class="tabsItem" data-tabs="#abptm_ticket">
                                        <h2 class="_abp_text_theme">Configuration: Ticket </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe PDF Ticket Configuration of Transport.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.6.1.ticket.png"><img class="_img_control_reflex_6" src="#" alt="Layout"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Generate PDF per attendee or combine</th>
                                                <td colspan="3"> You can combine numerous ticket prints into one PDF file here. To obtain this, make sure to turn <strong class="_abp_text_theme"> ON</strong> . Otherwise, all ticket prints will be in separate PDFs. . The default setting is <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">User Role for Ticket Download</th>
                                                <td colspan="3"> Please choose the user role that is permitted to download tickets.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global PDF-->
                                    <div class="tabsItem" data-tabs="#abptm_pdf">
                                        <h2 class="_abp_text_theme">Configuration: PDF </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These explain the fundamental arrangement of a PDF file (such as a passenger list, ticket, etc.).</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.7.pdf.png"><img class="_img_control_reflex_6" src="#" alt="PDF"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">PDF Logo</th>
                                                <td colspan="3"> Kindly include your logo to be displayed on the PDF ticket. </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">PDF Logo Height</th>
                                                <td colspan="3">Please specify the height of your logo in pixels for it to be displayed on the PDF ticket. </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">PDF Background Image</th>
                                                <td colspan="3">You have the option to insert a personalized background image in PDF.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Background Color</th>
                                                <td colspan="3"> You have the option to include a personalized background color in a PDF document. </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Text Color</th>
                                                <td colspan="3">You have the option to input a personalized text color for PDF files. </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Terms & Condition Title</th>
                                                <td colspan="3">The Terms & Conditions will be shown in the ticket footer. You have the option to input a personalized text for PDF Terms & Conditions title.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Terms & Condition Text</th>
                                                <td colspan="3"> The Terms & Conditions will be shown in the ticket footer. You have the option to input a personalized text for PDF Terms & Conditions details</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global List PDF-->
                                    <div class="tabsItem" data-tabs="#abptm_traveller_pdf">
                                        <h2 class="_abp_text_theme">Configuration: Traveller Lists PDF </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are Traveller Lists Configuration of PDF file.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.8.pdf_list.png"><img class="_img_control_reflex_6" src="#" alt="Traveller Lists PDF"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Transport Name</th>
                                                <td colspan="3"> Please turn  <strong class="_abp_text_theme"> OFF</strong> the transport name if it is hidden in the traveler list PDF, or turn it <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Transport ID</th>
                                                <td colspan="3">If the traveler list PDF hides the transport ID, please turn it , please Switch <strong class="_abp_text_theme"> OFF</strong> or make it visible. Turn the light  <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Category</th>
                                                <td colspan="3">If the transport category is hidden in the passenger list PDF, kindly turn it  <strong class="_abp_text_theme"> OFF</strong> or make it visible. Turn <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Journey Date</th>
                                                <td colspan="3"> Please switch <strong class="_abp_text_theme"> OFF</strong> or  turn <strong class="_abp_text_theme"> ON</strong> the journey date display if it is hidden in the traveler list PDF. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Total Traveller</th>
                                                <td colspan="3">	Please Turn <strong class="_abp_text_theme"> OFF</strong> or turn<strong class="_abp_text_theme"> ON</strong> Total Traveller if you have hidden it from the traveler list PDF. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Order ID</th>
                                                <td colspan="3">Please turn  <strong class="_abp_text_theme"> OFF</strong> or  turn <strong class="_abp_text_theme"> ON</strong> the order ID to display if it is hidden from the traveler list PDF. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Traveller ID</th>
                                                <td colspan="3"> Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> the traveler ID display switch if you have hidden it from the traveler list PDF. By default, <strong class="_abp_text_theme"> OFF</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">From - To</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> 	the From-TO option if it is hidden in the traveler list PDF. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Pickup - Drop-Off</th>
                                                <td colspan="3">	If you have hidden the Pickup-Drop-Off Point from the passenger list PDF, kindly turn it <strong class="_abp_text_theme"> OFF</strong> or make it visible. Turn <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Order Date</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> the order date display if it is hidden from the traveler list PDF. By default, <strong class="_abp_text_theme"> OFF</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Ticket / Seat</th>
                                                <td colspan="3">Please toggle the Ticket/Seat name display <strong class="_abp_text_theme"> ON</strong> or  <strong class="_abp_text_theme"> OFF</strong> if it is hidden in the traveler list PDF.. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Price</th>
                                                <td colspan="3">If the price is hidden in the traveler list PDF, please turn it <strong class="_abp_text_theme"> OFF</strong>  make it visible. Turn the light <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> OFF</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Traveller Info</th>
                                                <td colspan="3">Please toggle the display of passenger information <strong class="_abp_text_theme"> OFF</strong> or <strong class="_abp_text_theme"> ON</strong>  if you have hidden it from the traveler list PDF. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Billing Information</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> the bill information display if it is hidden in the traveler list PDF. By default, <strong class="_abp_text_theme"> OFF</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Additional services</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> the additional service or make it visible if it is hidden from the traveler list PDF. Turn the light <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Check In</th>
                                                <td colspan="3">To see Checkin, turn on the Switch <strong class="_abp_text_theme"> ON</strong> or turn <strong class="_abp_text_theme"> OFF</strong> the Checkin from the Traveler List PDF. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Company Address</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> the company address if it is hidden in the traveler list PDF, or turn <strong class="_abp_text_theme"> ON</strong> the company address to display. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Terms & Condition</th>
                                                <td colspan="3"> If the terms and conditions are hidden in the traveler list PDF, please turn them <strong class="_abp_text_theme"> ON</strong> or make them hidden , Turn the light <strong class="_abp_text_theme"> OFF</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global CSV-->
                                    <div class="tabsItem" data-tabs="#abptm_csv">
                                        <h2 class="_abp_text_theme">Configuration: Traveller Lists CSV</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are Traveller Lists Configuration of CSV file.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.9.csv.png"><img class="_img_control_reflex_6" src="#" alt="Traveller Lists CSV"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Order ID</th>
                                                <td colspan="3">Please turn  <strong class="_abp_text_theme"> OFF</strong> or  turn <strong class="_abp_text_theme"> ON</strong> the order ID to display if it is hidden from the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Traveller ID</th>
                                                <td colspan="3"> Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> the traveler ID display switch if you have hidden it from the traveler list CSV. By default, <strong class="_abp_text_theme"> OFF</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Transport Name</th>
                                                <td colspan="3"> Please turn  <strong class="_abp_text_theme"> OFF</strong> the transport name if it is hidden in the traveler list CSV, or turn it <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Transport ID</th>
                                                <td colspan="3">If the traveler list CSV hides the transport ID, please turn it , please Switch <strong class="_abp_text_theme"> OFF</strong> or make it visible. Turn the light  <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Category</th>
                                                <td colspan="3">If the transport category is hidden in the passenger list CSV, kindly turn it  <strong class="_abp_text_theme"> OFF</strong> or make it visible. Turn <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Journey Date</th>
                                                <td colspan="3"> Please switch <strong class="_abp_text_theme"> OFF</strong> or  turn <strong class="_abp_text_theme"> ON</strong> the journey date display if it is hidden in the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Order Date</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> the order date display if it is hidden from the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">From - To</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> 	the From-TO option if it is hidden in the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Pickup - Drop-off</th>
                                                <td colspan="3">	If you have hidden the Pickup-Drop-Off Point from the passenger list CSV, kindly turn it <strong class="_abp_text_theme"> OFF</strong> or make it visible. Turn <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Ticket / Seat</th>
                                                <td colspan="3">Please toggle the Ticket/Seat name display <strong class="_abp_text_theme"> ON</strong> or  <strong class="_abp_text_theme"> OFF</strong> if it is hidden in the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Price</th>
                                                <td colspan="3">If the price is hidden in the traveler list CSV, please turn it <strong class="_abp_text_theme"> OFF</strong>  make it visible. Turn the light <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Check In</th>
                                                <td colspan="3">To see Checkin, turn on the Switch <strong class="_abp_text_theme"> ON</strong> or turn <strong class="_abp_text_theme"> OFF</strong> the Checkin from the Traveler List CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Order Status</th>
                                                <td colspan="3">	If you hide Order Status from CSV , please Switch  <strong class="_abp_text_theme"> OFF</strong>  or to display Order Status Switch <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Traveller Info</th>
                                                <td colspan="3">Please toggle the display of passenger information <strong class="_abp_text_theme"> OFF</strong> or <strong class="_abp_text_theme"> ON</strong>  if you have hidden it from the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Billing Information</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> or turn <strong class="_abp_text_theme"> ON</strong> the bill information display if it is hidden in the traveler list CSV. By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Additional services</th>
                                                <td colspan="3">Please turn <strong class="_abp_text_theme"> OFF</strong> the additional service or make it visible if it is hidden from the traveler list CSV. Turn the light <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global Mail-->
                                    <div class="tabsItem" data-tabs="#abptm_email">
                                        <h2 class="_abp_text_theme">Configuration: E-Mail </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are customer E-Mail Configuration.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.10.email.png"><img class="_img_control_reflex_6" src="#" alt="E-Mail"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Send Mail ?</th>
                                                <td colspan="3">Should you wish to mail a traveler Turn the light  <strong class="_abp_text_theme"> ON</strong> . The mail won`t be sent if  <strong class="_abp_text_theme"> OFF</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Send pdf Ticket ?</th>
                                                <td colspan="3"> If you would like to email with PDF ticket, Turn   <strong class="_abp_text_theme"> ON</strong> otherwise the PDF won`t be sent if  <strong class="_abp_text_theme"> OFF</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                                <td colspan="3"> If You want to send pdf ticket mail to traveller Switch ON otherwise pdf not send . Default ON</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Which status send Mail ?</th>
                                                <td colspan="3">Please choose the order status for which the mail will be send.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Mail Subject</th>
                                                <td colspan="3">Add a subject to your email, please. Alternatively, your site title will be it.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Mail Content</th>
                                                <td colspan="3">
                                                    <span>Please use this shortcode for get real data.</span><br>
                                                    <span><strong style="color:#e67c30">#transport_name</strong> : In order to print the Transport Name.</span><br>
                                                    <span><strong style="color:#e67c30">#pass_name</strong> : In order to print the  Traveller Form.</span><br>
                                                    <span><strong style="color:#e67c30">#order_id</strong> : In order to print the  Order ID.</span><br>
                                                    <span><strong style="color:#e67c30">#pass_id</strong> : In order to print the Traveller ID.</span><br>
                                                    <span><strong style="color:#e67c30">#from</strong> : In order to print the  Boarding.</span><br>
                                                    <span><strong style="color:#e67c30">#to</strong> : In order to print the  Dropping.</span><br>
                                                    <span><strong style="color:#e67c30">#order_date</strong> : In order to print the  Order Date.</span><br>
                                                    <span><strong style="color:#e67c30">#status</strong> : In order to print the  Order Status.</span><br>
                                                    <span><strong style="color:#e67c30">#payment</strong> : In order to print the  Payment Method.</span><br>
                                                    <span><strong style="color:#e67c30">#booking_details</strong> : In order to print the  Booking Details.</span><br>
                                                    <span><strong style="color:#e67c30">#seat_details</strong> : In order to print the  Ticket Details.</span><br>
                                                    <span><strong style="color:#e67c30">#bill_info</strong> : In order to print the  Billing Information.</span><br>
                                                    <span><strong style="color:#e67c30">#item_price</strong> : In order to print the  Total Price.</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Re-send Mail Content</th>
                                                <td colspan="3">
                                                    <span>Please use this shortcode for get real data.</span><br>
                                                    <span><strong style="color:#e67c30">#transport_name</strong> : In order to print the  Transport Name.</span><br>
                                                    <span><strong style="color:#e67c30">#pass_name</strong> : In order to print the  Traveller Form.</span><br>
                                                    <span><strong style="color:#e67c30">#order_id</strong> : In order to print the  Order ID.</span><br>
                                                    <span><strong style="color:#e67c30">#pass_id</strong> : In order to print the  Traveller ID.</span><br>
                                                    <span><strong style="color:#e67c30">#from</strong> : In order to print the  Boarding.</span><br>
                                                    <span><strong style="color:#e67c30">#to</strong> : In order to print the  Dropping.</span><br>
                                                    <span><strong style="color:#e67c30">#order_date</strong> : In order to print the  Order Date.</span><br>
                                                    <span><strong style="color:#e67c30">#status</strong> : In order to print the  Order Status.</span><br>
                                                    <span><strong style="color:#e67c30">#payment</strong> : In order to print the  Payment Method.</span><br>
                                                    <span><strong style="color:#e67c30">#booking_details</strong> : In order to print the  Booking Details.</span><br>
                                                    <span><strong style="color:#e67c30">#seat_details</strong> : In order to print the  Ticket Details.</span><br>
                                                    <span><strong style="color:#e67c30">#bill_info</strong> : In order to print the  Billing Information.</span><br>
                                                    <span><strong style="color:#e67c30">#item_price</strong> : In order to print the  Total Price.</span><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Admin Notification Mail</th>
                                                <td colspan="3">After an order is placed, if the admin would want to get a PDF ticket, please give a mail address.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Mail From Name</th>
                                                <td colspan="3"> The email from name should be added here. otherwise it will be Transportation</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Mail From Mail</th>
                                                <td colspan="3">	The email from mail should be added here. otherwise it will be your admin mail.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global contact-->
                                    <div class="tabsItem" data-tabs="#abptm_contact">
                                        <h2 class="_abp_text_theme">Configuration: Contact Information </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe Contact Information Configuration .</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.12.contact_info.png"><img class="_img_control_reflex_6" src="#" alt="Contact Information "></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Company Name</th>
                                                <td colspan="3"> Kindly enter the name of your company here.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Address</th>
                                                <td colspan="3">Add the whole address of your company, please.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Contact Number</th>
                                                <td colspan="3">Add your company`s phone number here, please.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">E-mail</th>
                                                <td colspan="3">Kindly enter your business email address here.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global Slider-->
                                    <div class="tabsItem" data-tabs="#abptm_slider">
                                        <h2 class="_abp_text_theme">Configuration: Slider </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe Slider Configuration .</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.13.slider.png"><img class="_img_control_reflex_6" src="#" alt="Slider"></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Slider/Thumbnail ?</th>
                                                <td colspan="3">Please turn the slider switch <strong class="_abp_text_theme"> ON</strong> or <strong class="_abp_text_theme"> OFF</strong> if you are only showing the thumbnail . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Slider Theme</th>
                                                <td colspan="3">Please choose the theme style for the slider. </td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Visible Indicator ?</th>
                                                <td colspan="3">If you hide Indicator , please Switch <strong class="_abp_text_theme"> OFF</strong> or to Show Indicator Switch <strong class="_abp_text_theme"> ON</strong> . By default, <strong class="_abp_text_theme"> ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Indicator Type</th>
                                                <td colspan="3"> Please Select Slider Indicator Type Default Icon. Default Icon</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Visible Showcase ?</th>
                                                <td colspan="3">	If you hide Showcase , please Switch <strong class="_abp_text_theme"> OFF</strong> or to Show Showcase Switch <strong class="_abp_text_theme"> ON</strong>. By default,&nbsp;<strong class="_abp_text_theme">ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Showcase Position</th>
                                                <td colspan="3">Please Select Slider Showcase Position . Default Right</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Visible Popup ?</th>
                                                <td colspan="3">If you hide popup slider , please Switch  <strong class="_abp_text_theme"> OFF</strong>&nbsp;or to Show popup slider Switch&nbsp;<strong class="_abp_text_theme"> ON</strong>. By default,&nbsp;<strong class="_abp_text_theme">ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Popup Image Indicator</th>
                                                <td colspan="3">f you hide Popup Image Indicator , please Switch <strong class="_abp_text_theme"> OFF</strong>&nbsp;or to Show Popup Image Indicator Switch&nbsp;<strong class="_abp_text_theme"> ON</strong>. By default,&nbsp;<strong class="_abp_text_theme">ON</strong></td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Popup Icon Indicator</th>
                                                <td colspan="3">If you hide Popup Icon Indicator , please Switch <strong class="_abp_text_theme"> OFF</strong>&nbsp;or to Show Popup Icon Indicator Switch&nbsp;<strong class="_abp_text_theme"> ON</strong>. By default,&nbsp;<strong class="_abp_text_theme">ON</strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global css value-->
                                    <div class="tabsItem" data-tabs="#abptm_css_value">
                                        <h2 class="_abp_text_theme">Configuration: CSS Value </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe CSS Value Configuration . </i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Note: this value applicable only for Transport section area not full site. </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.14.css_value.png"><img class="_img_control_reflex_6" src="#" alt="CSS Value "></div>
                                        <table class="_abp_tl_fixed_text_left_mt">
                                            <tbody>
                                            <tr>
                                                <th class="_text_theme">Base Color</th>
                                                <td colspan="3"> Choose the Standard base color.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Alternate Color</th>
                                                <td colspan="3">By choosing Default Theme Alternate Color, the text color will be used if the backdrop color is Base Color or alternately.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Default Color</th>
                                                <td colspan="3">Select Default Text Color.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Default Border Radios</th>
                                                <td colspan="3"> Type Default Border Radios(in PX Unit).</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Default Font Size</th>
                                                <td colspan="3">	Enter the default font size (in PX units).</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Font Size h1</th>
                                                <td colspan="3">Enter the h1 font size (in PX units). default:35px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Font Size h2</th>
                                                <td colspan="3">Enter the h2 font size (in PX units). default:30px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Font Size h3</th>
                                                <td colspan="3">Enter the h3 font size (in PX units).default:25px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Font Size h4</th>
                                                <td colspan="3">Enter the h4 font size (in PX units). default:20px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Font Size h5</th>
                                                <td colspan="3">Enter the h5 font size (in PX units). default:17px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Font Size h6</th>
                                                <td colspan="3">Enter the h6 font size (in PX units). default:15px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Label Font Size</th>
                                                <td colspan="3">Enter the label font size (in PX units). default:14px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Button Font Size</th>
                                                <td colspan="3">Enter the button font size (in PX units). default:13px</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Button Text Color</th>
                                                <td colspan="3">Select Button Text Color.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Button Background Color</th>
                                                <td colspan="3">Select Button Background Color.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Warning Color</th>
                                                <td colspan="3">	Select Warning Color.</td>
                                            </tr>
                                            <tr>
                                                <th class="_text_theme">Section Background color</th>
                                                <td colspan="3">Here you can add Section Background color.</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--    Global css -->
                                    <div class="tabsItem" data-tabs="#abptm_css">
                                        <h2 class="_abp_text_theme">Configuration: Custom CSS </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">	Here is where you can write your own CSS code.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/5.15.add_css.png"><img class="_img_control_reflex_6" src="#" alt="Custom CSS"></div>
                                    </div>
                                    <!--    Menu -->
                                    <div class="tabsItem" data-tabs="#abptm_menu">
                                        <h3 class="_abp_text_theme">Menu</h3>
                                        <div class="_divider"></div>
                                        <ol class="_abp_list_marin">
                                            <li><strong class="_text_theme">Transportation & all transport : </strong>view all transport</li>
                                            <li><strong class="_text_theme">add new transport : </strong>to add new transport click this</li>
                                            <li><strong class="_text_theme">Category : </strong>create transport category like AC/Non-AC</li>
                                            <li><strong class="_text_theme">Organizer : </strong>create transport Organizer like Flix</li>
                                            <li><strong class="_text_theme">Configuration : </strong>To config transport click this menu which describe before.</li>
                                            <li><strong class="_text_theme">Traveler List : </strong>You may build traveler lists in PDF/CSV format, send mail, view booking lists, and delete travelers, and many other features.</li>
                                            <li><strong class="_text_theme">Add Order : </strong>Admin create order directly</li>
                                        </ol>
                                    </div>
                                    <!--    Menu Transport-->
                                    <div class="tabsItem" data-tabs="#display_abptm_transport">
                                        <h2 class="_abp_text_theme">Transportation / All Transport </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are the list of all Transport</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/6.0.transport_list.png"><img class="_img_control_reflex_6" src="#" alt="Transportation / All Transport "></div>
                                        <ol class="_abp_list_margin">
                                            <li><strong>Clone Transport :</strong> Transport can be copied or cloned. Click on "clone transport" if you wish to duplicate an existing transport and create a new one.</li>
                                            <li>Transport identifying numbers are visible.</li>
                                            <li>Total Capacity or Number of Seat .</li>
                                            <li>Current Transport seat type or ticket Type</li>
                                            <li>These are indicate Transport Category like Non-AC,AC, etc</li>
                                            <li>Transport Organizer.</li>
                                        </ol>
                                    </div>
                                    <!--    Add new Transport-->
                                    <div class="tabsItem" data-tabs="#abptm_add_transport">
                                        <h2 class="_abp_text_theme">Add new Transport</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here You can create a new Transport</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.add_transport.png"><img class="_img_control_reflex_6" src="#" alt="Add new Transport "></div>
                                        <ol class="_abp_list_margin">
                                            <li>Type your transport Name Here</li>
                                            <li>These are wp default editor. you can describe here about your transport</li>
                                            <li>These are configuration of current transport which every section will be described one by one.</li>
                                        </ol>
                                    </div>
                                    <!--    General Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_general">
                                        <h2 class="_abp_text_theme">General Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">These are describe transport general Information</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.0.general.png"><img class="_img_control_reflex_6" src="#" alt="General Configuration "></div>
                                        <ol class="_abp_list_margin">
                                            <li>You can close/continue sale by this switch. By default, sale continue</li>
                                            <li>Transport id is unique id for your transport which you can on/off by this switch. If switch ON, you can type your transport id.</li>
                                            <li>This switch indicate Transport Category . You can on/off by this switch. If category switch On, then category select option will be visible. you can select category which you created before and describe in category menu.</li>
                                            <li>This switch indicate Transport Organizer . You can on/off by this switch. If Organizer switch On, then Organizer select option will be visible. you can select Organizer which you created before and describe in Organizer menu.</li>
                                            <li>Here You can change your details page template.</li>
                                        </ol>
                                    </div>
                                    <!--    Date Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_date">
                                        <h2 class="_abp_text_theme">Date Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can control transport Operational day and date. </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.1.date_periodic.png"><img class="_img_control_reflex_6" src="#" alt="Date Configuration"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Our Operational date two types. Specific date and Periodic Dates. Periodic Dates describe below</i>
                                        <ol class="_abp_list_margin">
                                            <li> Please Select your Transport operational date type. Default operational date will be Periodic</li>
                                            <li>Add your Transport Launching Date otherwise it will be start today.</li>
                                            <li>Add your Transport Terminate Date otherwise it will be Continuously running periodically</li>
                                            <li>Add your periodically after days. if your Transport operation day everyday this will be one(1).</li>
                                            <li>Add your number of advance booking days. default advance booking days is 15. Note: You set large number of date then your search process will be slow. we refer less than 30.</li>
                                            <li>Select your weekend.Default all days open</li>
                                            <li>you can move or sorting specific off dates</li>
                                            <li>select your specific off dates. if you have any special Operation date off . otherwise ignore it</li>
                                            <li>To remove specific off dates click this button.</li>
                                            <li>To add more specific off dates click on add specific off Date</li>
                                            <li>you can move or sorting off dates range</li>
                                            <li>select your start date off dates range . if you have any off dates range. otherwise ignore it</li>
                                            <li>select your End date off dates range . if you have any off dates range. otherwise ignore it</li>
                                            <li>To remove off dates range click this button.</li>
                                            <li>To add more specific off dates range click on add specific off Date range</li>
                                        </ol>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.2.date_specific.png"><img class="_img_control_reflex_6" src="#" alt="Date Configuration"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If your operational day particular / specific. Specific date describe below</i>
                                        <ol class="_abp_list_margin">
                                            <li> Please Select your Transport operational date type specific Date</li>
                                            <li>you can move or sorting specific on dates</li>
                                            <li>select your specific on dates.</li>
                                            <li>To remove specific on dates click this button.</li>
                                            <li>To add more specific dates click on add specific Date</li>
                                        </ol>
                                    </div>
                                    <!--    Ticket Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_ticket">
                                        <h2 class="_abp_text_theme">Ticket Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can Config transport seat or ticket. we have only two types . seat plan and ticket </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.3.seat_plan.png"><img class="_img_control_reflex_6" src="#" alt="Seat Plan"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If you want to sale seat (like bus) select seat plan.</i>
                                        <ol class="_abp_list_margin">
                                            <li> select your Transport seat type . By default, Seat Plan</li>
                                            <li>This switch indicate Transport ticket type. if all ticket/seat same type then switch will be off. if you want to multiple type please switch on</li>
                                            <li>If you have multiple ticket type select above this.</li>
                                            <li>If your transport has upper deck or double section , please click this switch .</li>
                                            <li>type number of row of you transport to create seat plan</li>
                                            <li>type number of Column of you transport to create seat plan</li>
                                            <li>Click to create seat plan</li>
                                            <li>here you select , current space what types. currently we have four types. Ticket: that you can sell as seat. Blank space: which indicates as black space in your transport. Driver: driver position. Others: In this type, you can show some text.</li>
                                            <li>If seat type is ticket , type ticket name(please use unique seat name) , seat type is blank or driver then this fiend empty, seat type is others then types your text</li>
                                            <li>you can extend your position space to increase this value.</li>
                                            <li>Click this to add new row</li>
                                            <li>type number of row of you transport to create Upper deck seat plan</li>
                                            <li>type number of Column of you transport to create Upper deck seat plan</li>
                                            <li>Click to create Upper deck seat plan</li>
                                            <li>Click this to add new row in Upper deck section</li>
                                            <li>To move row click this button.</li>
                                            <li>To remove row click this button.</li>
                                        </ol>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If you want to sale Ticket (like Ferry) select Ticket.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.4.ticket.png"><img class="_img_control_reflex_6" src="#" alt="Date Configuration"></div>
                                        <ol class="_abp_list_margin">
                                            <li> Please Select your Transport seat type as ticket</li>
                                            <li>Click this icon , if you want to add image for this ticket type</li>
                                            <li>Click this icon , if you want to add icon for this ticket type</li>
                                            <li>To remove icon/image click this icon</li>
                                            <li>Please type your ticket name(This field mandatory)</li>
                                            <li>Type your ticket Quantity (This field mandatory)</li>
                                            <li>Type your ticket Maximum Quantity for a customer per order</li>
                                            <li>Type your ticket description</li>
                                            <li>To move row click this button.</li>
                                            <li>To remove row click this button.</li>
                                            <li>Click this to add new Ticket type</li>
                                        </ol>
                                        <div class="_section_alert"><strong class="_abp">Note : </strong> Please config transport one by one. Accordingly, Ticket configuration > Route Configuration >Price Configuration</div>
                                    </div>
                                    <!--    Route Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_route">
                                        <h2 class="_abp_text_theme">Route Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can Config transport routing. Please flow below steps </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.5.route.png"><img class="_img_control_reflex_6" src="#" alt="Route Configuration"></div>
                                        <ol class="_abp_list_margin">
                                            <li>This switch indicate Traveller Pickup Point ON/OFF.if you want Pickup Point please switch on</li>
                                            <li>This switch indicate Traveller Pickup Point Mandatory or not. if you want Pickup Point Mandatory please switch on.</li>
                                            <li>This switch indicate Traveller Drop-off Point ON/OFF.if you want Drop-off Point please switch on</li>
                                            <li>This switch indicate Traveller Drop-off Point Mandatory or not. if you want Drop-off Point Mandatory please switch on.</li>
                                            <li>Type or Select Stop name.</li>
                                            <li>Select your stop type. Boarding: for only boarding . Dropping: Only for Dropping . Both : for Boarding & Dropping :. Note: First stop must be Boarding and last stop Dropping</li>
                                            <li>type your boarding time</li>
                                            <li>If pickup point on this step show . type or select your Pickup Point name.</li>
                                            <li>Type your Pickup Point Time.</li>
                                            <li>Click this to add new Pickup Point</li>
                                            <li>Type or select your Drop-off Point name.</li>
                                            <li>Type your Drop-off Point Time.</li>
                                            <li>Click this to add new Drop-off Point</li>
                                            <li>Click this to add new Stop</li>
                                        </ol>
                                        <div class="_section_alert"><strong class="_abp">Note : </strong> Please config transport one by one. Accordingly, Ticket configuration > Route Configuration >Price Configuration</div>
                                    </div>
                                    <!--    Price Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_price">
                                        <h2 class="_abp_text_theme">Price Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can Config transport Price. </i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If your ticket single type , see just like this image . please type your information</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.6.price.png"><img class="_img_control_reflex_6" src="#" alt="Price Configuration"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If your ticket Multiple type , see just like this image . please type your information</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.7.price.png"><img class="_img_control_reflex_6" src="#" alt="Price Configuration"></div>
                                        <div class="_section_alert"><strong class="_abp">Note : </strong> Please config transport one by one. Accordingly, Ticket configuration > Route Configuration >Price Configuration</div>
                                    </div>
                                    <!--    post Form Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_form">
                                        <h2 class="_abp_text_theme">Traveller Form Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can design Traveller Registration Form </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.8.form.png"><img class="_img_control_reflex_6" src="#" alt="Traveller Form "></div>
                                        <ol class="_abp_list_margin">
                                            <li>This switch indicate Traveller Form ON/OFF. if you want to active Traveller Form please switch on</li>
                                            <li>Click this button to import global Traveller Form which design in our configuration section</li>
                                            <li>You can activate single form for all Traveller. To activate this please switch ON.</li>
                                            <li>Type Filed title or Label . These Field are required. if these input empty , field not save.</li>
                                            <li>Type Filed unique id. only a-z and 0-9 allowed . These Field are required. if these input empty , field not save.</li>
                                            <li>Select input type. These Field are required. if these input empty , field not save.</li>
                                            <li>if input type select , checkbox, Radio then these field show otherwise this field will be hidden. if field show then it will be required.</li>
                                            <li>Type default value or select date. These Field not required.</li>
                                            <li>Switch ON to mandatory fill up this field.</li>
                                            <li>you can re-arrange / move top or down to press this icon && you can Delete / Remove to press this icon</li>
                                            <li>Click to add new form field</li>
                                        </ol>
                                    </div>
                                    <!--    post Additional Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_additional">
                                        <h2 class="_abp_text_theme">Additional services Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can design Additional services or Extra Service which payable Or Free. </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.9.additional.png"><img class="_img_control_reflex_6" src="#" alt="Additional services"></div>
                                        <ol class="_abp_list_margin">
                                            <li>This switch indicate Additional services ON/OFF. if you want to active Additional services please switch on</li>
                                            <li>Click this button to import global Additional services which design in our configuration section</li>
                                            <li>You can activate single Additional services for all Traveller. To activate this please switch ON.</li>
                                            <li>you can Delete / Remove to press this icon</li>
                                            <li>Click to add Additional Service icon / image</li>
                                            <li>Click to Remove Additional Service icon / image</li>
                                            <li>Type Additional Service Name. These Field are required. if these input empty , field not save.</li>
                                            <li>Type Maximum Available Qty . These Field are required. if these input empty , field not save.</li>
                                            <li>Type Additional Service per-unit price. These Field are required. if these input empty , field not save.</li>
                                            <li>Type Maximum Qty per order/Traveller. These Field not required.</li>
                                            <li>Description about these Additional Service.These Field not required.</li>
                                            <li>you can re-arrange / move top or down to press this icon</li>
                                            <li>Click to add new Additional field</li>
                                        </ol>
                                    </div>
                                    <!--    Slider Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_slider">
                                        <h2 class="_abp_text_theme">Slider Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can design Slider. </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.10.slider.png"><img class="_img_control_reflex_6" src="#" alt="Slider"></div>
                                        <ol class="_abp_list_margin">
                                            <li>This switch indicate Slider ON/OFF. if you want to active Slider please switch on</li>
                                            <li>you can Delete / Remove to press this icon</li>
                                            <li>Click to add new Image</li>
                                        </ol>
                                    </div>
                                    <!--    Tax Configuration-->
                                    <div class="tabsItem" data-tabs="#abptm_post_tax">
                                        <h2 class="_abp_text_theme">Tax Configuration</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can config Tax. </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/4.11.tax.png"><img class="_img_control_reflex_6" src="#" alt="Tax"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If you want to enable tax please enable woo-commerce tax. </i>
                                    </div>
                                    <!--    Menu Category-->
                                    <div class="tabsItem" data-tabs="#abptm_category">
                                        <h2 class="_abp_text_theme">Menu : Category </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can design Transport Category </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/6.1.category.png"><img class="_img_control_reflex_6" src="#" alt="Category"></div>
                                        <ul class="_abp_list_margin">
                                            <li>1. Type Your Category Name here</li>
                                            <li>2. Click to Save Category</li>
                                        </ul>
                                    </div>
                                    <!--    Menu Organizer-->
                                    <div class="tabsItem" data-tabs="#abptm_organizer">
                                        <h2 class="_abp_text_theme">Menu : Organizer </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here you can design Transport Organizer </i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/6.2.organizer.png"><img class="_img_control_reflex_6" src="#" alt="Organizer"></div>
                                        <ol class="_abp_list_margin">
                                            <li>Type Your Organizer Name here</li>
                                            <li>Click to Save Organizer</li>
                                        </ol>
                                    </div>
                                    <!--    Traveller List-->
                                    <div class="tabsItem" data-tabs="#abptm_list">
                                        <h2 class="_abp_text_theme">Menu : Traveller List </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">You can find travelers very easily on this page. And you can download pdf and csv file, send mail to customer, cancel order etc.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/7.1.traveller_list.png"><img class="_img_control_reflex_6" src="#" alt="abptm_list"></div>
                                        <ol class="_abp_list_margin">
                                            <li>Here you can select the transport and see its traveler list.</li>
                                            <li>To filter by journey date select dates here</li>
                                            <li>To filter between two journey dates, select dates here</li>
                                            <li>Select Boarding and Dropping here to filter between boarding and dropping</li>
                                            <li>Type order id here to filter guests of specific order id</li>
                                            <li>To filter by Order date select dates here</li>
                                            <li>To filter between two order dates, select dates here</li>
                                            <li>Type billing name here to filter guests of specific billing name</li>
                                            <li>Type billing email here to filter guests of specific billing email</li>
                                            <li>Type billing phone here to filter guests of specific billing phone</li>
                                            <li>The search results will show if the above input changes. If it doesn't come, click on this button and it will come</li>
                                            <li>All the above inputs will not show at first, some inputs will appear on clicking this button.</li>
                                            <li>By clicking this button you can download the PDF ticket of this guest only</li>
                                            <li>By clicking on this button, you can download the PDF ticket of the number of tickets that this guest has in this transport.</li>
                                            <li>By clicking this button, you can resend the mail and ticket of the number of tickets that this guest has in this transport.</li>
                                            <li>By clicking this button, you can cancel this guest.</li>
                                            <li>Here you will see the list of all order status. Click on it to show the guest list.</li>
                                            <li>Here you have to click guest check in. Which you can do from frontend in ticket page.</li>
                                        </ol>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/7.2.traveller_list.png"><img class="_img_control_reflex_6" src="#" alt="abptm_list"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">After selecting transport in the filter section , you will open some new tabs in the filter list. Which can be seen in the above picture.</i>
                                        <ol class="_abp_list_margin">
                                            <li>By clicking this button, you will get all the travelers list and all information of this transport in a PDF file. It will be better if you select the transport and journey date and download the PDF. You can change the information you want to show in this file from the traveler lists pdf in the configuration section.</li>
                                            <li>By clicking this button, you will get all the travelers Additional service information of this transport in a PDF file. It will be better if you select the transport and journey date and download the PDF.</li>
                                            <li>By clicking this button, you will get all the travelers list and all information of this transport in a CSV file. You can change the information you want to show in this file from the CSV in the configuration section.</li>
                                            <li>After selecting transport in the filter section, Here you will see this information. Which indicates the traveler's billing information.</li>
                                            <li>After selecting transport in the filter section, Here you will see this information. Which indicates the traveler's registration information.</li>
                                            <li>After selecting transport in the filter section, Here you will see this information. Which indicates the traveler's additional service information.</li>
                                        </ol>
                                    </div>
                                    <!--    Add Order-->
                                    <div class="tabsItem" data-tabs="#abptm_create_order">
                                        <h2 class="_abp_text_theme">Menu : Add Order </h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">This page is for admin only. Admin can directly book tickets from this page without payment.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/3.1.add_order.png"><img class="_img_control_reflex_6" src="#" alt="Add Order"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Clicking this page from the menu will only show the search form. Here you can select transport, boarding, dropping, journey date, return date. If you select transport then you won't get any information by selecting return date. It will work if you don't select transport.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If transport is selected and transport is seat type, this transport will look like above according to its configuration.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/3.2.add_order.png"><img class="_img_control_reflex_6" src="#" alt="Add Order"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If transport is selected and transport is ticket type, this transport will look like above according to its configuration.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/3.3.add_order.png"><img class="_img_control_reflex_6" src="#" alt="Add Order"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If transport is not selected then it will look like above. According to your information the transport list will show and return date input will work.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Clicking view ticket or view seat will show the details of that transport. From where the order can be confirmed by selecting ticket or seat select.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">There will be a new field from the frontend. That is: Mail & Ticket Send to .If the customer's email is given here, the order information and ticket will be sent to the customer's email</i>
                                    </div>
                                    <!--    shortcode -->
                                    <div class="tabsItem" data-tabs="#abptm_shortcode">
                                        <h2 class="_abp_text_theme">ABP - WooCommerce Transport Manager : Shortcode</h2>
                                        <div class="_divider"></div>
                                        <!--    Search shortcode -->
                                        <strong>Our Available Shortcode list :</strong>
                                        <pre>[<strong class="_abp_text_theme">abptm-search</strong>]</pre>
                                        <p class="_abp">You can add this shortcode any page to show transport search form , you can create it automatically from <strong>Configuration > tools &amp; Info</strong> Tab.</p>
                                        <table class="_abp">
                                            <tbody>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>form</td>
                                                <td><strong class="_abp_text_theme">inline</strong> or <strong class="_abp_text_theme">column</strong> | Default: <strong class="_abp_text_theme">inline</strong><code>[ <strong class="_abp_text_theme">abptm-search form='column' </strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>transport</td>
                                                <td><strong class="_abp_text_theme">on</strong> or <strong class="_abp_text_theme">off</strong> | Default: <strong class="_abp_text_theme">off</strong><code>[<strong class="_abp_text_theme">abptm-search transport='on'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>return</td>
                                                <td><strong class="_abp_text_theme">on</strong> or <strong class="_abp_text_theme">off</strong> | Default: <strong class="_abp_text_theme">on</strong><code>[<strong class="_abp_text_theme">abptm-search return='off'</strong>]</code></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--    Transport List shortcode -->
                                        <pre>[<strong class="_abp_text_theme">abptm-list</strong>]</pre>
                                        <p class="_abp">You can add this shortcode any page to show Transport LIst .</p>
                                        <table class="_abp">
                                            <tbody>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>style</td>
                                                <td><strong class="_abp_text_theme">grid , grid_2 , button , anchor,list</strong> | Default: <strong class="_abp_text_theme">grid</strong><code>[<strong class="_abp_text_theme">abptm-list style='button'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>from</td>
                                                <td>To show specific start point , use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-list from='start_place_name'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>to</td>
                                                <td>To show specific end point, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-list from='start_place_name' to='end_place_name'</strong> ]</code></td>
                                            </tr>
                                            <tr>
                                                <td>cat</td>
                                                <td>To show specific category transport, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-list cat='category_id'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>post</td>
                                                <td>To show number of transport, use this parameter | Default: <strong class="_abp_text_theme">9</strong>(default 9 port for grid type others default 50)<code>[<strong class="_abp_text_theme">abptm-list post='15</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>column</td>
                                                <td>To show number of transport in a line(this parameter active when style parameter any grid type), use this parameter | Default: <strong class="_abp_text_theme">3</strong><code>[<strong class="_abp_text_theme">abptm-list post='16' column='4'</strong>]</code></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--    Route shortcode -->
                                        <pre>[<strong class="_abp_text_theme">abptm-route</strong>]</pre>
                                        <p class="_abp">You can add this shortcode any page to show Transport Route .</p>
                                        <!--   Download ticket shortcode -->
                                        <table class="_abp">
                                            <tbody>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>style</td>
                                                <td><strong class="_abp_text_theme"> button , anchor,list</strong> | Default: <strong class="_abp_text_theme">button</strong><code>[<strong class="_abp_text_theme">abptm-route style='anchor'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>from</td>
                                                <td>To show specific start point , use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-route from='start_place_name'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>to</td>
                                                <td>To show specific end point, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-route from='start_place_name' to='end_place_name' </strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>cat</td>
                                                <td>To show specific category transport, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-route cat='category_id'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>post</td>
                                                <td>To show number of transport, use this parameter | Default: <strong class="_abp_text_theme">50</strong><code>[<strong class="_abp_text_theme">abptm-route post='15'</strong>]</code></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <pre>[<strong class="_abp_text_theme">abptm-ticket</strong>]</pre>
                                        <p>You can add this shortcode any page to show Ticket Download page , you can create it automatically from <strong>Configuration >tools &amp; Info</strong> Tab.</p>
                                    </div>
                                    <!--    Search shortcode -->
                                    <div class="tabsItem" data-tabs="#abptm_search_page">
                                        <h2 class="_abp_text_theme">ABP - WooCommerce Transport Manager : Transport Search Shortcode</h2>
                                        <div class="_divider"></div>
                                        <pre>[<strong class="_abp_text_theme">abptm-search</strong>]</pre>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">You can add this shortcode any page to show transport search form , you can create it automatically from <strong>Configuration > tools &amp; Info</strong> Tab.</i>
                                        <table class="_abp">
                                            <tbody>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>form</td>
                                                <td><strong class="_abp_text_theme">inline</strong> or <strong class="_abp_text_theme">column</strong> | Default: <strong class="_abp_text_theme">inline</strong><code>[ <strong class="_abp_text_theme">abptm-search form='column' </strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>transport</td>
                                                <td><strong class="_abp_text_theme">on</strong> or <strong class="_abp_text_theme">off</strong> | Default: <strong class="_abp_text_theme">off</strong><code>[<strong class="_abp_text_theme">abptm-search transport='on'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>return</td>
                                                <td><strong class="_abp_text_theme">on</strong> or <strong class="_abp_text_theme">off</strong> | Default: <strong class="_abp_text_theme">on</strong><code>[<strong class="_abp_text_theme">abptm-search return='off'</strong>]</code></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="_divider"></div>
                                        <code>[<strong class="_abp_text_theme">abptm-search</strong>]</code>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block"> The output of this shortcode below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.2.search_form.png"><img class="_img_control_reflex_6" src="#" alt="Search Form"></div>
                                        <code>[<strong class="_abp_text_theme">abptm-search form='column'</strong>]</code>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block"> The output of this shortcode below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.1.search_form.png"><img class="_img_control_reflex_6" src="#" alt="Search Form"></div>
                                        <code>[<strong class="_abp_text_theme">abptm-search transport='on'</strong>]</code>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block"> The output of this shortcode below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.0.search_form.png"><img class="_img_control_reflex_6" src="#" alt="Search Form"></div>
                                        <ol class="_abp_list_margin">
                                            <li>Here , you can book transport by transport name. these are not mandatory. you can hide this from global layout configuration or use shortcode parameter transport='off '.</li>
                                            <li>These are mandatory field . select you Boarding Point</li>
                                            <li>These are mandatory field . select you Dropping Point</li>
                                            <li>These are mandatory field . select you Journey date</li>
                                            <li>You can select your return date but these are not mandatory. You can hide this from global layout configuration or use shortcode parameter return='off '.</li>
                                            <li>Click this button to search Transport according to our parameter</li>
                                        </ol>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block"> If you click on the search button, if the transport is seat type, then it will look like the photo below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/2.0.result_seat_plan.png"><img class="_img_control_reflex_6" src="#" alt="Seat plan"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If you click on the search button, if the transport is of the ticket type, then it will look like the photo below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/2.1.result_ticket.png"><img class="_img_control_reflex_6" src="#" alt="Ticket"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If you click on the search button, if the transport input is empty, it will look like the image below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/2.2.result_list.png"><img class="_img_control_reflex_6" src="#" alt="List"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Click on View Details from your search results</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If the transport is seat type it will look like below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/2.3.result_seatplan.png"><img class="_img_control_reflex_6" src="#" alt="Seat plan"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If the transport is Ticket type it will look like below</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/2.4.result_ticket.png"><img class="_img_control_reflex_6" src="#" alt="Ticket"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Now you have to select your seat or ticket and click the continue button with the passenger information.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">After clicking the continue button, the transport will be added into cart.But you can do it in three ways</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">There are three options in the Configure Section and Layout Configuration Tab Checkout System</i>
                                        <ol class="_abp_list_margin">
                                            <li><strong class="_text_theme">Default : </strong>The default checkout system is the woocommerce checkout system. Transport will add to cart and current page will reload</li>
                                            <li><strong class="_text_theme">Single page Checkout : </strong>Single Page Checkout system is transport add to cart and checkout page will show on same page into current page..</li>
                                            <li><strong class="_text_theme">Direct Checkout : </strong>Direct checkout system is transport add to cart and redirect to checkout page</li>
                                        </ol>
                                    </div>
                                    <!--    Transport List shortcode -->
                                    <div class="tabsItem" data-tabs="#abptm_list_page">
                                        <h2 class="_abp_text_theme">ABP - WooCommerce Transport Manager : Transport List Shortcode</h2>
                                        <div class="_divider"></div>
                                        <pre>[<strong class="_abp_text_theme">abptm-list</strong>]</pre>
                                        <p class="_abp">You can add this shortcode any page to show Transport LIst .</p>
                                        <table class="_abp">
                                            <tbody>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>style</td>
                                                <td><strong class="_abp_text_theme">grid , grid_2 , button , anchor,list</strong> | Default: <strong class="_abp_text_theme">grid</strong><code>[<strong class="_abp_text_theme">abptm-list style='button'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>from</td>
                                                <td>To show specific start point , use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-list from='start_place_name'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>to</td>
                                                <td>To show specific end point, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-list from='start_place_name' to='end_place_name'</strong> ]</code></td>
                                            </tr>
                                            <tr>
                                                <td>cat</td>
                                                <td>To show specific category transport, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-list cat='category_id'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>post</td>
                                                <td>To show number of transport, use this parameter | Default: <strong class="_abp_text_theme">9</strong>(default 9 port for grid type others default 50)<code>[<strong class="_abp_text_theme">abptm-list post='15</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>column</td>
                                                <td>To show number of transport in a line(this parameter active when style parameter any grid type), use this parameter | Default: <strong class="_abp_text_theme">3</strong><code>[<strong class="_abp_text_theme">abptm-list post='16' column='4'</strong>]</code></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.4.list.png"><img class="_img_control_reflex_6" src="#" alt="list Shortcode"></div>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.5.list.png"><img class="_img_control_reflex_6" src="#" alt="list Shortcode"></div>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.6.list.png"><img class="_img_control_reflex_6" src="#" alt="list Shortcode"></div>
                                    </div>
                                    <!--    Route shortcode -->
                                    <div class="tabsItem" data-tabs="#abptm_route_page">
                                        <h2 class="_abp_text_theme">ABP - WooCommerce Transport Manager : Route Shortcode</h2>
                                        <div class="_divider"></div>
                                        <pre>[<strong class="_abp_text_theme">abptm-route</strong>]</pre>
                                        <p class="_abp">You can add this shortcode any page to show Transport Route .</p>
                                        <table class="_abp">
                                            <tbody>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>style</td>
                                                <td><strong class="_abp_text_theme"> button , anchor,list</strong> | Default: <strong class="_abp_text_theme">button</strong><code>[<strong class="_abp_text_theme">abptm-route style='anchor'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>from</td>
                                                <td>To show specific start point , use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-route from='start_place_name'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>to</td>
                                                <td>To show specific end point, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-route from='start_place_name' to='end_place_name' </strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>cat</td>
                                                <td>To show specific category transport, use this parameter | Default: blank<code>[<strong class="_abp_text_theme">abptm-route cat='category_id'</strong>]</code></td>
                                            </tr>
                                            <tr>
                                                <td>post</td>
                                                <td>To show number of transport, use this parameter | Default: <strong class="_abp_text_theme">50</strong><code>[<strong class="_abp_text_theme">abptm-route post='15'</strong>]</code></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/1.8.route.png"><img class="_img_control_reflex_6" src="#" alt="Route Shortcode"></div>
                                    </div>
                                    <!--   Download ticket shortcode -->
                                    <div class="tabsItem" data-tabs="#abptm_download_ticket_page">
                                        <h2 class="_abp_text_theme">ABP - WooCommerce Transport Manager : Ticket Download page</h2>
                                        <div class="_divider"></div>
                                        <pre>[<strong class="_abp_text_theme">abptm-ticket</strong>]</pre>
                                        <p>You can add this shortcode any page to show Ticket Download page , you can create it automatically from <strong>Configuration >tools &amp; Info</strong> Tab.</p>
                                        <p>This shortcode will show the view/download ticket form. A user needs to put their ticket PIN(order id or attendee id) into the box and hit the enter button then the ticket will appear. Who can view this page ? please set rules from <strong> Configuration > QR > Allowed User Role for QR Code</strong></p>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/8.1.ticket.png"><img class="_img_control_reflex_6" src="#" alt="Ticket"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Order id or ticket number can be entered in the above input field. Here multiple inputs will be given but separated by dash sign (-).</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Clicking on the view ticket button will show the result as below.</i>
                                        <div class="_mar_tb" data-abp-image="<?php echo esc_url(ABPTM_DOC_URL . '/') ?>image/8.2.ticket.png"><img class="_img_control_reflex_6" src="#" alt="Ticket"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">From here the customer can view his order information and can download the ticket and check in.</i>
                                    </div>
                                    <!--    Templating -->
                                    <div class="tabsItem" data-tabs="#abptm_template">
                                        <h3 class="_abp_text_theme">Templating</h3>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">If you would like to add or delete a class or modify the icons, for example, you may be required to customize some of the default information or design to yourself. We offer ABP-WWooCommerce Transport Manager's override feature. Thus, you can do it quickly and smartly.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">The first step is to copy the abptm_templates folder from our Transport plugin and place it into your wp-content directory. Our template can now be overridden by you.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Delete everything in this folder except the ones you want to change. Otherwise, our plugin will not work on your site if there is a new feature or any change.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">To change you must have enough knowledge to know what you change.</i>
                                    </div>
                                    <!--    Translate -->
                                    <div class="tabsItem" data-tabs="#abptm_translate">
                                        <h3 class="_abp_text_theme">Translate</h3>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Can be translated by many WordPress plugins. We ask you to use the Loco Translate plugin</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">First, click Plugin>add new plugin menu . Search by typing loco translate here and install and active this.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">After install loco-translate plugin, goto loco translate menu click on plugin which is sub-menu of loco translate. then click on ABP-WooCommerce Transport Manager plugin. </i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Now Create template or edit template then press on sync and last press on save button.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Now you can translate very easily. All text except the plugin's documentation section can be translated. But no variables.</i>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Remember, put your translation file in another dir. Otherwise, your translations will be lost when the plugin is updated</i>
                                    </div>
                                    <!--    License -->
                                    <div class="tabsItem" data-tabs="#abptm_license">
                                        <h2 class="_abp_text_theme">Retrieve your license key</h2>
                                        <div class="_divider"></div>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">To obtain your license key for the product, please follow these comprehensive steps__</i>
                                        <ol class="_abp_list_margin">
                                            <li>Log in to your <code>Envato Account</code>.</li>
                                            <li>Navigate to the <code>Downloads</code> section.</li>
                                            <li>Search for <code>ABP - WooCommerce Transport Manager</code></li>
                                            <li>Click the <code>Download</code> button.</li>
                                            <li>Access the <code>License Certificate and Purchase Code</code> link.</li>
                                            <li>Open the downloaded <code>PDF</code> file.</li>
                                            <li>Copy the <code>Item Purchase Code</code>.</li>
                                        </ol>
                                        <i class="_text_light_3_fs_label_mar_tb_d_block">Here's a detailed summary of the steps to retrieve your license key for the <code>ABP - WooCommerce Transport Manager</code> on Envato:</i>
                                        <ol class="_abp_list_margin">
                                            <li><strong>Login to Your Envato Account</strong>: Begin by logging into your Envato account. If you don't have one, you will need to create an account or use your existing credentials to sign in.</li>
                                            <li><strong>Navigate to the "Downloads" Section</strong>: Once you're logged in, go to the "Downloads" section. This is typically where you can find all the items you've purchased or downloaded from Envato.</li>
                                            <li><strong>Locate "ABP - WooCommerce Transport Manager"</strong>: In the "Downloads" section, search for the specific item you're interested in, which in this case is "ABP - WooCommerce Transport Manager" You can use the search bar or scroll through your list of downloads.</li>
                                            <li><strong>Click the "Download" Button</strong>: When you find the correct item, click on the "Download" button next to it. This action will lead you to the download options for this theme.</li>
                                            <li><strong>Access the "License Certificate and Purchase Code" Link</strong>: Within the download options, look for the "License Certificate and Purchase Code" link. This link is usually provided for each item you've purchased.</li>
                                            <li><strong>Open the Downloaded PDF File</strong>: Click on the "License Certificate and Purchase Code" link, and it will initiate the download of a PDF file. Once the PDF file is downloaded, locate it on your computer and open it using a PDF reader.</li>
                                            <li><strong>Copy the "Item Purchase Code"</strong>: Inside the PDF document, you will find important information about your purchase, including the "Item Purchase Code." This code is unique to your purchase and is what you'll need for licensing purposes. Copy this code to your clipboard.</li>
                                        </ol>
                                        <p>By following these steps, you will have successfully retrieved your license key for the "ABP - WooCommerce Transport Manager" This key is essential for authorizing and using the Plugin on your website.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
			}
		}
		new ABPTM_Documentation();
	}

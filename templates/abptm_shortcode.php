<?php
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
?>
    <div class="tabsItem" data-tabs="#abptm_shortcode">
        <h2 class="_abp_text_theme">ABP Transportation Manager : Shortcode</h2>
        <div class="_divider"></div>
        <strong>Our Available Shortcode list :</strong>
        <pre>[abptm-search]</pre>
        <p class="_abp">You can add this shortcode any page to show transport search form or you can create it automatically from <strong>Configuration > tools &amp; Info</strong> Tab.</p>
        <table>
            <tbody>
            <tr>
                <td><strong>Parameter</strong></td>
                <td><strong>Value</strong></td>
            </tr>
            <tr>
                <td>form</td>
                <td><strong class="_abp_text_theme">inline</strong> or <strong class="_abp_text_theme">column</strong> | Default: <strong class="_abp_text_theme">inline</strong><code>[abptm-search form='column']</code></td>
            </tr>
            <tr>
                <td>transport</td>
                <td><strong class="_abp_text_theme">yes</strong> or <strong class="_abp_text_theme">no</strong> | Default: <strong class="_abp_text_theme">no</strong><code>[abptm-search transport='yes']</code></td>
            </tr>
            </tbody>
        </table>
        <pre>[download-ticket]</pre>
        <p>You can add this shortcode any page to show Ticket Download page or you can create it automatically from <strong>Configuration >tools &amp; Info</strong> Tab.</p>
    </div>
<?php

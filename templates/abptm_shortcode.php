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
        <p class="_abp">You can add this shortcode any page to show transport search form , you can create it automatically from <strong>Configuration > tools &amp; Info</strong> Tab.</p>
        <table>
            <tbody>
            <tr> <th>Parameter</th> <th>Value</th></tr>
            <tr> <td>form</td> <td><strong class="_abp_text_theme">inline</strong> or <strong class="_abp_text_theme">column</strong> | Default: <strong class="_abp_text_theme">inline</strong><code>[abptm-search form='column']</code></td> </tr>
            <tr> <td>transport</td> <td><strong class="_abp_text_theme">yes</strong> or <strong class="_abp_text_theme">no</strong> | Default: <strong class="_abp_text_theme">no</strong><code>[abptm-search transport='yes']</code></td> </tr>
            </tbody>
        </table>
        <pre>[abptm-list]</pre>
        <p class="_abp">You can add this shortcode any page to show Transport LIst .</p>
        <table>
            <tbody>
            <tr> <th>Parameter</th> <th>Value</th></tr>
            <tr> <td>style</td> <td><strong class="_abp_text_theme">grid , grid_2 , button , anchor</strong> | Default: <strong class="_abp_text_theme">grid</strong><code>[abptm-list style='button']</code></td> </tr>
            <tr> <td>from</td><td>To show specific start point , use this parameter | Default: blank<code>[abptm-list from='start_place_name']</code></td> </tr>
            <tr> <td>to</td><td>To show specific end point, use this parameter | Default: blank<code>[abptm-list from='start_place_name' to='end_place_name' ]</code></td> </tr>
            <tr> <td>cat</td><td>To show specific category transport, use this parameter | Default: blank<code>[abptm-list cat='category_id']</code></td> </tr>
            <tr> <td>post</td><td>To show number of transport, use this parameter | Default: <strong class="_abp_text_theme">9</strong>(default 9 port for grid type others default 50)<code>[abptm-list post='15']</code></td> </tr>
            <tr> <td>column</td><td>To show number of transport in a line(this parameter active when style parameter any grid type), use this parameter | Default: <strong class="_abp_text_theme">3</strong><code>[abptm-list post='16' column='4']</code></td> </tr>
            </tbody>
        </table>
        <pre>[abptm-route]</pre>
        <p class="_abp">You can add this shortcode any page to show Transport Route .</p>
        <table>
            <tbody>
            <tr> <th>Parameter</th> <th>Value</th></tr>
            <tr> <td>style</td> <td><strong class="_abp_text_theme"> button , anchor</strong> | Default: <strong class="_abp_text_theme">button</strong><code>[abptm-route style='anchor']</code></td> </tr>
            <tr> <td>from</td><td>To show specific start point , use this parameter | Default: blank<code>[abptm-route from='start_place_name']</code></td> </tr>
            <tr> <td>to</td><td>To show specific end point, use this parameter | Default: blank<code>[abptm-route from='start_place_name' to='end_place_name' ]</code></td> </tr>
            <tr> <td>cat</td><td>To show specific category transport, use this parameter | Default: blank<code>[abptm-route cat='category_id']</code></td> </tr>
            <tr> <td>post</td><td>To show number of transport, use this parameter | Default: <strong class="_abp_text_theme">50</strong><code>[abptm-route post='15']</code></td> </tr>
            </tbody>
        </table>
        <pre>[abptm-ticket]</pre>
        <p>You can add this shortcode any page to show Ticket Download page or you can create it automatically from <strong>Configuration >tools &amp; Info</strong> Tab.</p>
    </div>
<?php

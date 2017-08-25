<?php
function cortex_cgg_options($sections) {

	$sections[] = array(
        'title' => __('Welcome Window', ''),
        'desc' => __('<p class="description">Adds a popup window with content from the "Welcome Window" page in the WordPress admin. Displays for new users, or users who haven\'t been to the site in 30 days.</p>', 'cortex'),
        // Redux ships with the glyphicons free icon pack, included in the options folder.
        // Feel free to use them, add your own icons, or leave this blank for the default.
        'icon' => 'el el-cogs',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array(
            array(
                'id'       => 'c9-welcome-window',
                'type'     => 'radio',
                'title'    => __( 'Enable Welcome Window', 'cortex' ),
                'options'  => array(
	                'disable' => __('Disable', 'cortex' ),
	                'enable' => __('Enable', 'cortex' ),
                ),
                'default' => 'disable'
            ),
        ),
    );

    return $sections;

}
add_filter('redux/options/cortex_options/sections', 'cortex_cgg_options');
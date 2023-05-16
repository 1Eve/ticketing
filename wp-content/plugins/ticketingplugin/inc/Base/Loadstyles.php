<?php

/**
 * @package ticketingplugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Loadstyles extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'my_enqueue_styles']);
        
    }
    function my_enqueue_styles()
    {
        // echo ;
        wp_enqueue_style('customstyle', $this->plugin_url. 'pluginstyle.css');
        wp_enqueue_script('customjs', $this->plugin_url. 'pluginjs.js');
    }
}
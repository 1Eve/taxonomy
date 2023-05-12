<?php
/**
 * @package customplugin
 */

namespace Inc\Root;

use \Inc\Root\RootController;

class Enqueue extends RootController{
    public function register(){
        add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
    }

    function enqueueScripts(){
        wp_enqueue_style('custompluginstyles', $this->plugin_url.'assets/assess.css');
        wp_enqueue_script('custompluginscript', $this->plugin_url.'assets/assess.js');     
    }
}
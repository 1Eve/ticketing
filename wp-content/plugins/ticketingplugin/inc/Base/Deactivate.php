<?php

/**
 * @package ticketingplugin
 */

 namespace Inc\Base;
 class Deactivate{
    static function deactivatePlugin(){
        flush_rewrite_rules();
    }
}
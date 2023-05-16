<?php

/**
 * @package ticketingplugin
 */

 namespace Inc\Base;
 class Activate{
    static function activatePlugin(){
        // addTicket::creating_database_table();
        flush_rewrite_rules();
    }
}
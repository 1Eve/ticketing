<?php

/**
 * @package ticketingplugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class ViewMainMenu extends BaseController
{
    public $pages;
    function register()
    {
        add_action('admin_menu', [$this, 'add_ticket_page']);
    }

    function add_ticket_page()
    {
        add_menu_page('Admin Ticket', 'View Tickets', 'manage_options', 'view_tickets', [$this, 'view_index_cb'], 'dashicons-tickets-alt', 111);
    }
    function view_index_cb()
    {
        require_once $this->plugin_path . 'Templates/Admin-ticket-view.php';
    }
}
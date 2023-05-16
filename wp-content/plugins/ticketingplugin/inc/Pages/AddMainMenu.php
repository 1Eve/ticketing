<?php

/**
 * @package ticketingplugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;

class AddMainMenu extends BaseController
{
    public $pages;
    function register()
    {
        add_action('admin_menu', [$this, 'add_ticket_page']);
    }

    function add_ticket_page()
    {
        add_menu_page('Admin Tickets', 'Add Tickets', 'manage_options', 'add_tickets', [$this, 'admin_index_cb'], 'dashicons-tickets-alt', 110);
        add_menu_page('Admin Ticket', 'View Tickets', 'manage_options', 'view_tickets', [$this, 'view_index_cb'], 'dashicons-tickets-alt', 111);
        add_submenu_page('add_tickets', 'Update Tickets', 'Update Tickets', 'manage_options', 'update_tickets', [$this, 'update_index_cb']);
        add_submenu_page('temporary_tickets', 'Temporary Tickets', 'Temporary Tickets', 'manage_options', 'temporary_tickets', [$this, 'view_temporary_deleted_tickets_cb']);
    }
    function admin_index_cb()
    {
        require_once $this->plugin_path . 'Templates/Admin-dashboard.php';
    }
    function view_index_cb(){
        require_once $this->plugin_path . 'Templates/Admin-ticket-view.php';
    }
    function update_index_cb(){
        require_once $this->plugin_path . 'Templates/Admin-update-template.php';

    }
    
    function view_temporary_deleted_tickets_cb() {
        require_once $this->plugin_path . 'Templates/Admin-done-tickets.php';
    }
}
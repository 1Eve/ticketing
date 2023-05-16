<?php
/**
 * @package ticketingplugin
 */

/*
* Plugin Name: Custom Ticketing Plugin
* Plugin URI:https://............
* Description: A simple ticketing system, that has 2 users.
* Author: Patrick Mwaniki
* Author URI: https://............
* Version: 1.0.0
*/

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Initialize;
// security check
if(!defined('ABSPATH')){
    echo 'File not found';
    exit;
}

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once(dirname(__FILE__).'/vendor/autoload.php');
}
class addTicket{
    function __construct()
    {
        $this->createEmployee();
        $this->creating_database_table();
    }

    function activatePlugin()
    {
        require_once plugin_dir_path(__FILE__). '/inc/Base/Activate.php';
        Activate::activatePlugin();
    }

    function DeactivatePlugin()
    {
        require_once plugin_dir_path(__FILE__). '/inc/Base/Deactivate.php';
        Deactivate::deactivatePlugin();
    }

    static function creating_database_table()
    {
        
        global $wpdb;

        $table_name = $wpdb->prefix.'Tickets';

        $Ticket_details = "CREATE TABLE IF NOT EXISTS ".$table_name."(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            employee-name text NOT NULL,
            ticket-number text NOT NULL,
            ticket-description text NOT NULL     
        );";

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($Ticket_details);
    }

    function add_Ticket_to_db(){
        if(isset($_POST['submitbtn'])){
            $data =[
                'employee-name'=> $_POST['employee-name'],
                'ticket-number'=> $_POST['ticket_number'],
                'ticket-description'=> $_POST['ticket-description']
            ];

            global $wpdb;
           
            $table_name = $wpdb->prefix.'Tickets';

            $result = $wpdb->insert($table_name, $data, $format=NULL);

            if($result == true){
                $successmessage = true;
                echo "<script> alert('Ticket Registered successfully'); </script>";
            }else{
                $errormessage = true;
                echo "<script> alert('Unable to Register'); </script>";
            }
        }
    }

    function createEmployee(){
        add_role(
            'Employee',
            'Employee',
            [
                'read'=> true,
                'edit_posts'=>true,
                'edit_pages'=>true,
                'edit_published_posts'=> true,
            ]
        );
    }
}
if(class_exists('Inc\\Initialize')){
    Initialize::register_services(); 
}
if(class_exists('addTicket')){
    $TicketRegInstance = new addTicket();
}

$TicketRegInstance->activatePlugin();
$TicketRegInstance->deactivatePlugin();

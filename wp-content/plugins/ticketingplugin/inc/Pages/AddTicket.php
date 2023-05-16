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
namespace Inc\Pages;
//security check 
if(!defined('ABSPATH')){
    echo 'File not found';
    exit;
}



class AddTicket{
    function register(){
        $this->add_ticket_to_db();
        $this->create_ticket_to_db();
        $this->update_ticket_to_db();

    }
    function create_ticket_to_db(){
        global $wpdb;

        $table_name = $wpdb->prefix.'tickets';

        $ticket_details = "CREATE TABLE IF NOT EXISTS ".$table_name."(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            employee_name text NOT NULL,
            ticket_number text NOT NULL, 
            ticket_description text NOT NULL,
            temporary_delete text NOT NULL default 0
            
        );";

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        dbDelta($ticket_details);
    }

    function add_ticket_to_db(){
        if(isset($_POST['SendTicket'])){
            $data =[
                'employee_name'=> $_POST['EmployeeName'],
                'ticket_number'=> $_POST['TicketNumber'],
                'ticket_description'=> $_POST['TicketDescription']
                
            ];

            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;

            $table_name = $wpdb->prefix.'tickets';

            $result = $wpdb->insert($table_name, $data, $format=NULL);

            if($result == true){
                $successmessage = true;
            }else{
                $errormessage = true;
            }
        }
    }

    function update_ticket_to_db(){
        if(isset($_POST['UpdateTicket'])){
            $data =[
                'employee_name'=> $_POST['EmployeeName'],
                'ticket_number'=> $_POST['TicketNumber'],
                'ticket_description'=> $_POST['TicketDescription']
            ];

            global $wpdb;
            global $successmessage;
            global $errormessage;

            $successmessage = false;
            $errormessage = false;

            $table_name = $wpdb->prefix.'tickets';

            $result = $wpdb->update($table_name, $data, ['id' => $_POST['TicketId']]);

            if($result == true){
                $successmessage = true;
            }else{
                $errormessage = true;
            }
        }
    }
    
}



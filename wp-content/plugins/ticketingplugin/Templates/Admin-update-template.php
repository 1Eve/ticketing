<div class="backend-admin-form">

        <!-- success-message -->
        <?php
        echo '<div class="success-message" id="successmsg" > <p>Ticket Updated Successfully</p> </div>';
        echo '<script> document.getElementById("successmsg")</script>';
    
        global $successmessage;
        if ($successmessage == true) {
            echo '<script> document.getElementById("successmsg").style.display = "flex"; </script>';
            echo '<script> setTimeout(function(){ document.getElementById("successmsg").style.display ="none" }, 2000);</script>';
        }
        ?>
        
        <?php
        echo '<div class="errormsg" id="errormsg" role="alert"> <p>OPPS!! Ticket Not Updated</p> </div>';
        echo '<script> document.getElementById(errormsg)</script>';
    
        global $errormessage;
        if ($errormessage == true) {
            echo '<script> document.getElementById("errormsg").style.display = "flex"; </script>';
            echo '<script> setTimeout(function(){ document.getElementById("errormsg").style.display ="none" }, 2000);</script>';
        }
        ?>
       
        <!-- error message -->
    
    </div>

<?php
if (isset($_GET['edit_ticket'])) {
 }

global $wpdb;
$table = $wpdb->prefix . 'tickets';
// Check if a ticket deletion request was made

$ticket_id = $_GET['edit_ticket'];

$tickets = $wpdb->get_results("SELECT * FROM $table  WHERE id=$ticket_id");
$ticket = $tickets[0];
?>
<div class="update-form">   
        <form action="" method="post">                 
                    <div>
                        <input type="hidden" value="<?php echo $ticket->id; ?>"  name="TicketId">
                        <label for="">Employee Name:</label>
                        <input type="text" value="<?php echo $ticket->employee_name; ?>" name="EmployeeName" id="employee-name">
                        <label for="">Ticket id:</label>
                        <input type="text" value="<?php echo $ticket->ticket_number; ?>" name="TicketNumber" id="ticket-number">
                        <label for="">Ticket Description:</label>
                        <input type="text" value="<?php echo $ticket->ticket_description; ?>" name="TicketDescription" id="ticket-description">
                        <input type="submit" value="Update Ticket" name="UpdateTicket">
                    </div>
            <a href="http://localhost/ticketing-system/">Go back to home</a>
        </form>
      
</div>

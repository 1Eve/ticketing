<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <div class="backend-admin-form">

<!-- success-message -->
<?php
echo '<div class="success-message" id="successmsg" > <p>Ticket Deleted Successfully</p> </div>';
echo '<script> document.getElementById("successmsg")</script>';

global $successmessage;
if ($successmessage == true) {
    echo '<script> document.getElementById("successmsg").style.display = "flex"; </script>';
    echo '<script> setTimeout(function(){ document.getElementById("successmsg").style.display ="none" }, 2000);</script>';
}
?>

<?php
echo '<div class="errormsg" id="errormsg" role="alert"> <p>OPPS!! Ticket Not Deleted</p> </div>';
echo '<script> document.getElementById(errormsg)</script>';

global $errormessage;
if ($errormessage == true) {
    echo '<script> document.getElementById("errormsg").style.display = "flex"; </script>';
    echo '<script> setTimeout(function(){ document.getElementById("errormsg").style.display ="none" }, 2000);</script>';
}
?>

<!-- error message -->

</div>
    <!-- Get Table and Results -->
<?php
global $wpdb;
$table = $wpdb->prefix . 'tickets';
// Check if a ticket deletion request was made
if (isset($_GET['delete_ticket']) && !empty($_GET['delete_ticket'])) {
    $ticket_id = $_GET['delete_ticket'];
    $wpdb->delete($table, ['id' => $ticket_id]);
}
// Restore Tickets

$table_restore = $wpdb->prefix . 'tickets';
// Check if a ticket deletion request was made
if (isset($_GET['ticket_id']) && !empty($_GET['ticket_id'])) {
    $ticket_id = $_GET['ticket_id'];
    // var_dump($ticket_id);
    $wpdb->update($table_restore ,["temporary_delete"=>'0'] , ['id' => $ticket_id]);
}

// // ?Get Results For VIEWING TICKET
$tickets = $wpdb->get_results("SELECT * FROM $table WHERE temporary_delete=1");
// ?>
<section>
    <div class="view-container">
        <table>
        
            <thead>
                <tr>
                    <th class="container-narrow">Ticket Number</th>
                    <th class="container-narrow">Employee Name</th>
                    <th class="container-wide">Ticket Description</th>
                    <th class="container-wide">Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($tickets as $ticket) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $ticket->ticket_number; ?>
                        </td>
                        <td>
                            <?php echo $ticket->employee_name; ?>
                        </td>

                        <td>
                            <?php echo $ticket->ticket_description; ?>
                        </td>
                        <td class="Actions">
                            <div class="restore-button">
                                <ion-icon name="checkbox-outline"></ion-icon>
                                <a href="?page=temporary_tickets&ticket_id=<?php echo $ticket->id; ?>">Restore</a>
                            </div>
                            <div class="complete-delete-button" >
                                <ion-icon name="trash-outline"></ion-icon>
                                <a href="?page=temporary_tickets&delete_ticket=<?php echo $ticket->id; ?>">Delete</a>
                            </div>
                        </td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
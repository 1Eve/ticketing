<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- Get Table and Results -->
<?php
global $wpdb;
$table = $wpdb->prefix . 'tickets';
// Check if a ticket deletion request was made
if (isset($_GET['delete_ticket']) && !empty($_GET['delete_ticket'])) {
    $ticket_id = $_GET['delete_ticket'];
    $wpdb->update($table,["temporary_delete"=>'1'] , ['id' => $ticket_id]);
}
// // ?Get Results For VIEWING TICKET
$tickets = $wpdb->get_results("SELECT * FROM $table WHERE temporary_delete=0");
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
                            <div class="edit-button">
                                <ion-icon name="create-outline"></ion-icon>
                                <a href="?page=update_tickets&edit_ticket=<?php echo $ticket->id; ?>">Edit</a>
                            </div>
                            <div class="delete-button" >
                                <ion-icon name="trash-outline"></ion-icon>
                                <a href="?page=view_tickets&delete_ticket=<?php echo $ticket->id; ?>">Delete</a>
                            </div>
                        </td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
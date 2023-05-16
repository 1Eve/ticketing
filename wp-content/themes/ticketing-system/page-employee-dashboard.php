<?php get_header(); ?>

<?php
/**
 * Template Name: Employee Dashboard
 */
?>
<!-- Get Table and Results -->
<?php
global $wpdb;
$table = $wpdb->prefix . 'tickets';
// Check if a ticket deletion request was made
if (isset($_GET['delete_ticket']) && !empty($_GET['delete_ticket'])) {
    $ticket_id = $_GET['delete_ticket'];
    $wpdb->update($table,["temporary_delete"=>'1'] , ['id' => $ticket_id]);
}

$tickets = $wpdb->get_results("SELECT * FROM $table WHERE temporary_delete=0");
?>
<section>
    <div class="view-container">
        <table>
            <thead>
                <tr>
                    <th class="container-narrow">Ticket Number</th>
                    <th class="container-wide">Ticket Description</th>
                    <th class="container-wide">Status</th>
                </tr>
            </thead>
    
            <tbody>
            <?php
            foreach($tickets as $ticket){
        ?>
                <tr>
                    <td><?php echo $ticket->ticket_number; ?></td>
                    <td><?php echo $ticket->ticket_description; ?></td>
                    <td><a href="?delete_ticket=<?php echo $ticket->id; ?>" class="delete-btn">Done</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>



<?php get_footer(); ?>
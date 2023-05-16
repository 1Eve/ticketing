<?php
if(is_user_logged_in()){
    wp_redirect(home_url());
}

if (isset($_POST['submitbtn'])) {
    $user = wp_signon([
        'user_login' => $_POST['EmployeeName'],
        'user_password' => $_POST['TicketNumber'],
        'remember' => false,
    ]);
    if (is_wp_error($user)) {
        // echo $user->get_error_message();
    }else{
        do_action('wp_login', $user->user_login, $user);
           exit( wp_redirect(home_url()));
    }
}


?>

<?php get_header(); ?>


<?php
/**
 * Template Name: Sign in Form
 */
?>


<section>
    <div class="login-details">
        <form action="" method="post">
            <div>
                <input type="text" name="EmployeeName" id="title" placeholder="Enter Your RegNumber" required>
            </div>
            <div>
                <input type="text" name="TicketNumber" id="title" placeholder="Enter Password" required>
            </div>
            <div>
                <a href="http://localhost/ticketing-system/">Go back to home</a>
            </div>
            <div>
                <input type="submit" value="Sign in" name="submitbtn">
            </div>
        </form>
    </div>
</section>
<?php get_header(); ?>
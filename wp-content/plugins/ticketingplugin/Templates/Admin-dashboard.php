<div class="backend-admin-form">

        <!-- success-message -->
        <?php
        echo '<div class="success-message" id="successmsg" > <p>Ticket Added Successfully</p> </div>';
        echo '<script> document.getElementById("successmsg")</script>';
    
        global $successmessage;
        if ($successmessage == true) {
            echo '<script> document.getElementById("successmsg").style.display = "flex"; </script>';
            echo '<script> setTimeout(function(){ document.getElementById("successmsg").style.display ="none" }, 2000);</script>';
        }
        ?>
        
        <?php
        echo '<div class="errormsg" id="errormsg" role="alert"> <p>OPPS!! Ticket Not Added</p> </div>';
        echo '<script> document.getElementById(errormsg)</script>';
    
        global $errormessage;
        if ($errormessage == true) {
            echo '<script> document.getElementById("errormsg").style.display = "flex"; </script>';
            echo '<script> setTimeout(function(){ document.getElementById("errormsg").style.display ="none" }, 2000);</script>';
        }
        ?>
       
        <!-- error message -->
    
    </div>
    
    
    
    <section class="container-column">
    
        <div class="flex-container">
            <h2>Dashboard</h2>
            <a href="?page=view_tickets">View Tickets </a>
            <a href="?page=temporary_tickets">Completed Tickets</a>
        </div>
    
        <div class="ticket-form">
            <form action="" method="post">
                <div class="flex-row">
                    <div>
                        <input type="text" name="EmployeeName" id="employee-name" placeholder="Employee Name" required>
                    </div>
                    <div>
                        <input type="text" name="TicketNumber" id="ticket-number" placeholder="Ticket Number" required>
                    </div>
                </div>
                <div>
                    <input type="text" name="TicketDescription" id="ticket-description" placeholder="Ticket Description"
                        required>
                </div>
                <div>
                    <input type="submit" name="SendTicket" value="Create Ticket">
                </div>
            </form>
        </div>
    
    </section>
</div>
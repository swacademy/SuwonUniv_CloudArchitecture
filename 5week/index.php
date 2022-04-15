<dev>
<center>
<?php
        echo "<h3>CPU Load: ";
        include 'getcpuload.php';
        echo "</h3></br></br>";

        # Get the instance CPU Load Generation form
        include 'putcpuload.php';

        # Check to see if genload session variable has been set, if so, refresh$
        session_start();
        if (isset($_SESSION['genload'])) echo "<meta http-equiv=\"refresh\" content=\"1\">" ;
?>
</center>
</div>
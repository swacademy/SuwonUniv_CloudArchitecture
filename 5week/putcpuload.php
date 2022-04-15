<?php
  session_start();
  
  if ($_GET['genload'] == 1 && !isset($_SESSION['genload'])) {
    $_SESSION['genload'] = 1;   # load is being generated
    $_SESSION['cpuload'] = 100; # initially set cpuload to 100%

    echo exec('dd if=/dev/zero bs=100M count=100 | gzip | gzip -d  > /dev/null &');
    echo "<meta http-equiv=\"refresh\" content=\"2,URL=/\" />";
    exit; 
  }
  if ($_SESSION['cpuload'] > 50) echo "Performing CPU intensive operations</br>Instance under high CPU Load!";
  else {
    unset($_SESSION['genload']);
?>
<form action="putcpuload.php" type="GET">
<input type="hidden" name="genload" value="1">
<input type="submit" value="Generate Load">
</form>
<?php } ?>
<?php
  $idle_cpu = exec('vmstat 1 2 | awk \'{ for (i=1; i<=NF; i++) if ($i=="id") { getline; getline; print $i }}\'');
  echo 100-$idle_cpu . "%";
  session_start();
  $_SESSION['cpuload'] = 100-$idle_cpu;
?>
<?php
    session_start();
    session_unset();
    session_destroy();
echo "<script>alert('You have successfully logout')</script>";
    echo "<script>location.href='search_ticket.php'</script>";
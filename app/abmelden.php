<?php
    if(isset($_SESSION['username']))
    {
        $_SESSION = array();
        unset($_SESSION);
        session_destroy();
        echo "session destroyed...";
    }
?>
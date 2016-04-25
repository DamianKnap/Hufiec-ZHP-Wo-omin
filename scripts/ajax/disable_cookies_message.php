<?php
    $cookie_name = "cookie_message";
    // Kill cookie
    setcookie( $cookie_name, 'false', time() - 3600 );
    // Set new cookie
    setcookie( $cookie_name, 'false', time() + ( 86400 * 30 ), '/' );
?>

<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: parent_log.html");
exit();
?>